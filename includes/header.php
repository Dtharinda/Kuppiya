[file name]: header.php
[file content begin]
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuppiya - Campus Assignment Marketplace</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Modal styles */
        .modal {
            display: none !important; 
            position: fixed;
            inset: 0;
            z-index: 9999;
            background-color: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(4px);
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex !important;
        }

        .modal-content {
            animation: scaleIn 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            z-index: 10000;
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Login Button styles */
        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            color: white;
            border: none;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="index.php" class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center">
                            <span class="text-white font-bold">K</span>
                        </div>
                        <span class="text-xl font-bold text-gray-800">Kuppiya</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="./index.php" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200">Home</a>
                    <a href="../pages/about.php" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200">About Us</a>
                    <a href="../pages/contact.php" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200">Contact</a>
                </div>

                <!-- Search and Login Section -->
                <div class="flex items-center space-x-4">
                    <!-- Search Bar -->
                    <div class="hidden md:block relative">
                        <input type="text" placeholder="Search assignments..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-64">
                        <div class="absolute left-3 top-2.5 text-gray-400">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>

                    <!-- Mobile Search Button -->
                    <button id="mobile-search-btn" class="md:hidden text-gray-600">
                        <i class="fas fa-search text-lg"></i>
                    </button>

                    <!-- Login Button -->
                    <div class="flex items-center space-x-4">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <div class="flex items-center bg-gray-100 px-4 py-2 rounded-2xl border border-gray-200">
                                <div class="flex flex-col text-right mr-3">
                                    <span class="text-xs text-gray-500 font-semibold uppercase">Welcome</span>
                                    <span class="text-sm font-bold text-indigo-700"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                                </div>
                                
                                <div class="flex items-center space-x-2 border-l pl-3 ml-1 border-gray-300">
                                    <a href="dashboard.php" class="p-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition shadow-md" title="Dashboard">
                                        <i class="fas fa-th-large"></i>
                                    </a>
                                    <a href="../backend/logout.php" class="p-2 bg-red-100 text-red-600 rounded-xl hover:bg-red-200 transition" title="Logout">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <button id="login-btn" class="btn-primary px-6 py-2.5 rounded-full font-bold shadow-lg transition-all duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login
                            </button>
                        <?php endif; ?>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden text-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Search Bar (Hidden by default) -->
            <div id="mobile-search" class="md:hidden mt-2 hidden">
                <div class="relative">
                    <input type="text" placeholder="Search assignments..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu (Hidden by default) -->
            <div id="mobile-menu" class="md:hidden mt-4 pb-4 hidden">
                <div class="flex flex-col space-y-4">
                    <a href="./index.php" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200">Home</a>
                    <a href="../pages/about.php" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200">About Us</a>
                    <a href="../pages/contact.php" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div id="login-modal" class="modal">
        <div class="modal-content bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Login to Kuppiya</h2>
                    <button id="close-login-modal" class="modal-close text-gray-500 hover:text-gray-700 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="login-form" action="../backend/login_backend.php" method="POST" class="space-y-4">
                    <div>
                        <label for="login-email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" name="email" id="login-email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="student@campus.edu" required>
                    </div>

                    <div>
                        <label for="login-password" class="block text-gray-700 font-medium mb-2">Password</label>
                        <input type="password" name="password" id="login-password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="••••••••" required>
                    </div>

                    <button type="submit" name="login" class="w-full btn-primary py-3 rounded-lg font-medium">Login</button>

                    <div class="text-center mt-4">
                        <p class="text-gray-600">Don't have an account?
                            <button type="button" id="show-register" class="text-indigo-600 hover:text-indigo-800 font-medium">Register here</button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="register-modal" class="modal">
        <div class="modal-content bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Create Account</h2>
                    <button id="close-register-modal" class="modal-close text-gray-500 hover:text-gray-700 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="register-form" action="../backend/register_backend.php" method="POST" class="space-y-4">
                    <div>
                        <label for="register-username" class="block text-gray-700 font-medium mb-2">Username</label>
                        <input type="text" name="username" id="register-username" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="Your Name" required>
                    </div>

                    <div>
                        <label for="register-email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" name="email" id="register-email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="student@campus.edu" required>
                    </div>

                    <div>
                        <label for="register-password" class="block text-gray-700 font-medium mb-2">Password</label>
                        <input type="password" name="password" id="register-password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="••••••••" required minlength="8">
                    </div>

                    <div>
                        <label for="register-confirm-password" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                        <input type="password" name="confirm_password" id="register-confirm-password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="••••••••" required>
                    </div>

                    <button type="submit" name="register" class="w-full btn-primary py-3 rounded-lg font-medium">Create Account</button>

                    <div class="text-center mt-4">
                        <p class="text-gray-600">Already have an account?
                            <button type="button" id="show-login" class="text-indigo-600 hover:text-indigo-800 font-medium">Login here</button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>