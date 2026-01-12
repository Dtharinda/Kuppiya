<?php
// Session start කරන්න මුලින්ම
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Error display functions
function showError($message)
{
    echo '<div class="error-message fixed top-4 right-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-lg z-[9999] max-w-md message-box" style="animation: slideIn 0.3s ease-out;">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle text-red-500 mr-3 text-xl"></i>
                <div>
                    <strong class="font-bold">Error!</strong>
                    <p class="text-sm mt-1">' . htmlspecialchars($message) . '</p>
                </div>
                <button class="ml-auto text-red-500 hover:text-red-700 close-message-btn">
                    <i class="fas fa-times"></i>
                </button>
            </div>
          </div>';
}

function showSuccess($message)
{
    echo '<div class="success-message fixed top-4 right-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-lg z-[9999] max-w-md message-box" style="animation: slideIn 0.3s ease-out;">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
                <div>
                    <strong class="font-bold">Success!</strong>
                    <p class="text-sm mt-1">' . htmlspecialchars($message) . '</p>
                </div>
                <button class="ml-auto text-green-500 hover:text-green-700 close-message-btn">
                    <i class="fas fa-times"></i>
                </button>
            </div>
          </div>';
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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Modal Styles - HIGHER z-index than error messages */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            max-width: 400px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            z-index: 10001;
            position: relative;
        }

        /* Login Button */
        .login-btn {
            background: linear-gradient(to right, #4f46e5, #6366f1);
            color: white;
            padding: 8px 20px;
            border-radius: 9999px;
            font-weight: bold;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }

        /* Animation for error/success messages */
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        /* Fix for modal buttons */
        button {
            cursor: pointer;
        }
        
        /* Animation classes for pages */
        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            opacity: 0;
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .card-hover-scale {
            transition: transform 0.3s ease, border-color 0.3s ease;
        }
        
        .card-hover-scale:hover {
            transform: translateY(-5px);
        }
        
        .btn-hover-bounce:hover {
            transform: translateY(-3px);
        }
        
        .btn-hover-bounce {
            transition: transform 0.2s ease, background-color 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- Display Error/Success Messages -->
    <?php
    // Show session messages
    if (isset($_SESSION['error'])) {
        showError($_SESSION['error']);
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
        showSuccess($_SESSION['success']);
        unset($_SESSION['success']);
    }
    ?>

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
                    <a href="index.php" class="text-gray-700 hover:text-indigo-600 font-medium">Home</a>
                    <a href="about.php" class="text-gray-700 hover:text-indigo-600 font-medium">About</a>
                    <a href="contact.php" class="text-gray-700 hover:text-indigo-600 font-medium">Contact</a>
                </div>

                <!-- User Section -->
                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="hidden md:block">
                        <div class="relative">
                            <input type="text" placeholder="Search..."
                                class="pl-10 pr-4 py-2 border rounded-full w-64 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Login/User Info -->
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- User is LOGGED IN -->
                        <div class="flex items-center bg-gray-100 px-4 py-2 rounded-2xl">
                            <div class="text-right mr-3">
                                <p class="text-xs text-gray-500">Welcome</p>
                                <p class="text-sm font-bold text-indigo-700">
                                    <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?>
                                </p>
                            </div>
                            <div class="flex items-center space-x-2 border-l pl-3">
                                <a href="dashboard.php" class="p-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700">
                                    <i class="fas fa-th-large"></i>
                                </a>
                                <a href="../backend/logout.php"
                                    class="p-2 bg-red-100 text-red-600 rounded-xl hover:bg-red-200">
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- User is NOT logged in - Show Login Button -->
                        <button id="show-login-btn" class="login-btn">
                            <i class="fas fa-sign-in-alt mr-2"></i>Login
                        </button>
                    <?php endif; ?>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden text-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div id="login-modal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Login to Kuppiya</h2>
                <button id="close-login-modal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <form action="../backend/login_backend.php" method="POST">
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" required
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="your@email.com">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" required
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="••••••••">
                    </div>

                    <button type="submit" name="login"
                        class="w-full bg-indigo-600 text-white py-3 rounded-lg font-bold hover:bg-indigo-700 transition">
                        Login
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <p class="text-gray-600">
                        Don't have an account?
                        <button type="button" id="show-register-btn" class="text-indigo-600 font-bold hover:underline">
                            Register here
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="register-modal" class="modal">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Create Account</h2>
                <button id="close-register-modal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <form action="../backend/register_backend.php" method="POST" id="register-form">
                <div class="space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Username</label>
                        <input type="text" name="username" required
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Your name">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" required
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="your@email.com">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" required id="register-password"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="••••••••">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Confirm Password</label>
                        <input type="password" name="confirm_password" required id="register-confirm-password"
                            class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="••••••••">
                    </div>

                    <button type="submit" name="register"
                        class="w-full bg-indigo-600 text-white py-3 rounded-lg font-bold hover:bg-indigo-700 transition">
                        Create Account
                    </button>
                </div>

                <div class="mt-4 text-center">
                    <p class="text-gray-600">
                        Already have an account?
                        <button type="button" id="show-login-from-register"
                            class="text-indigo-600 font-bold hover:underline">
                            Login here
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal Elements
        const loginModal = document.getElementById('login-modal');
        const registerModal = document.getElementById('register-modal');
        const showLoginBtn = document.getElementById('show-login-btn');
        const showRegisterBtn = document.getElementById('show-register-btn');
        const showLoginFromRegister = document.getElementById('show-login-from-register');
        const closeLoginModal = document.getElementById('close-login-modal');
        const closeRegisterModal = document.getElementById('close-register-modal');

        // Function to close specific modal
        function closeModal(modal) {
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        }

        // Function to close all modals
        function closeAllModals() {
            [loginModal, registerModal].forEach(modal => {
                if (modal) modal.classList.remove('active');
            });
            document.body.style.overflow = 'auto';
        }

        // Open Login Modal
        if (showLoginBtn) {
            showLoginBtn.addEventListener('click', () => {
                if (loginModal) {
                    loginModal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            });
        }

        // Open Register Modal from Login
        if (showRegisterBtn) {
            showRegisterBtn.addEventListener('click', () => {
                if (loginModal && registerModal) {
                    loginModal.classList.remove('active');
                    registerModal.classList.add('active');
                }
            });
        }

        // Open Login Modal from Register
        if (showLoginFromRegister) {
            showLoginFromRegister.addEventListener('click', () => {
                if (registerModal && loginModal) {
                    registerModal.classList.remove('active');
                    loginModal.classList.add('active');
                }
            });
        }

        // Close Modals
        if (closeLoginModal) {
            closeLoginModal.addEventListener('click', () => closeModal(loginModal));
        }

        if (closeRegisterModal) {
            closeRegisterModal.addEventListener('click', () => closeModal(registerModal));
        }

        // Close modal when clicking outside (ONLY on modal background)
        window.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal')) {
                closeModal(e.target);
            }
        });

        // Close error/success messages
        document.addEventListener('click', function (e) {
            // Close message when clicking X button
            if (e.target.closest('.close-message-btn')) {
                const message = e.target.closest('.error-message, .success-message');
                if (message) {
                    message.style.animation = 'fadeOut 0.3s ease-out';
                    setTimeout(() => {
                        if (message.parentNode) message.remove();
                    }, 300);
                }
            }
        });

        // Auto-hide messages after 5 seconds
        setTimeout(() => {
            document.querySelectorAll('.error-message, .success-message').forEach(message => {
                message.style.animation = 'fadeOut 0.3s ease-out';
                setTimeout(() => {
                    if (message.parentNode) message.remove();
                }, 300);
            });
        }, 5000);

        // Prevent modals from closing when clicking inside modal content
        document.querySelectorAll('.modal-content').forEach(content => {
            content.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        });

        // Mobile menu toggle (simplified version)
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                // You can add mobile menu functionality here if needed
                console.log('Mobile menu clicked');
            });
        }

        // Keyboard escape to close modals
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeAllModals();
            }
        });

        // Register form validation
        const registerForm = document.getElementById('register-form');
        if (registerForm) {
            registerForm.addEventListener('submit', function(e) {
                const password = document.getElementById('register-password')?.value;
                const confirmPassword = document.getElementById('register-confirm-password')?.value;

                if (password && confirmPassword && password !== confirmPassword) {
                    e.preventDefault();
                    alert('Passwords do not match!');
                    return false;
                }
            });
        }
    </script>