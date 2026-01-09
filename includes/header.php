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
        /* Custom styles for modals and animations */
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-close:hover {
            transform: rotate(90deg);
            transition: transform 0.3s;
        }

        /* Custom colors for Kuppiya */
        .kuppiya-primary {
            background-color: #4f46e5;
        }

        .kuppiya-secondary {
            background-color: #f8fafc;
        }

        .kuppiya-accent {
            color: #f59e0b;
        }

        .btn-primary {
            background-color: #4f46e5;
            color: white;
        }

        .btn-primary:hover {
            background-color: #4338ca;
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
                        <div class="w-8 h-8 rounded-full kuppiya-primary flex items-center justify-center">
                            <span class="text-white font-bold">K</span>
                        </div>
                        <span class="text-xl font-bold text-gray-800">Kuppiya</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php"
                        class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200">Home</a>
                    <a href="./pages/about.php"
                        class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200">About
                        Us</a>
                    <a href="./pages/contact.php"
                        class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200">Contact</a>
                </div>

                <!-- Search and Login Section -->
                <div class="flex items-center space-x-4">
                    <!-- Search Bar -->
                    <div class="hidden md:block relative">
                        <input type="text" placeholder="Search assignments..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-64">
                        <div class="absolute left-3 top-2.5 text-gray-400">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>

                    <!-- Mobile Search Button -->
                    <button id="mobile-search-btn" class="md:hidden text-gray-600">
                        <i class="fas fa-search text-lg"></i>
                    </button>

                    <!-- Login Button -->
                    <button id="login-btn"
                        class="btn-primary px-5 py-2 rounded-full font-medium transition-colors duration-200">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </button>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden text-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Search Bar (Hidden by default) -->
            <div id="mobile-search" class="md:hidden mt-2 hidden">
                <div class="relative">
                    <input type="text" placeholder="Search assignments..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu (Hidden by default) -->
            <div id="mobile-menu" class="md:hidden mt-4 pb-4 hidden">
                <div class="flex flex-col space-y-4">
                    <a href="index.php"
                        class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200">Home</a>
                    <a href="./pages/about.php"
                        class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200">About
                        Us</a>
                    <a href="./pages/contact.php"
                        class="text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-200">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div id="login-modal" class="modal">
        <div class="modal-content bg-white rounded-lg shadow-xl max-w-md w-full mx-auto mt-20">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Login to Kuppiya</h2>
                    <button id="close-login-modal" class="modal-close text-gray-500 hover:text-gray-700 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="login-form" class="space-y-4">
                    <div>
                        <label for="login-email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="login-email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                            placeholder="student@campus.edu" required>
                    </div>

                    <div>
                        <label for="login-password" class="block text-gray-700 font-medium mb-2">Password</label>
                        <input type="password" id="login-password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                            placeholder="••••••••" required>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember-me"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                        </div>
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Forgot password?</a>
                    </div>

                    <button type="submit" class="w-full btn-primary py-3 rounded-lg font-medium">Login</button>

                    <div class="text-center mt-4">
                        <p class="text-gray-600">Don't have an account?
                            <button id="show-register"
                                class="text-indigo-600 hover:text-indigo-800 font-medium">Register here</button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="register-modal" class="modal">
        <div class="modal-content bg-white rounded-lg shadow-xl max-w-md w-full mx-auto mt-10">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Create Account</h2>
                    <button id="close-register-modal" class="modal-close text-gray-500 hover:text-gray-700 text-2xl">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form id="register-form" class="space-y-4">
                    <div>
                        <label for="register-name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input type="text" id="register-name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                            placeholder="John Smith" required>
                    </div>

                    <div>
                        <label for="register-email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="register-email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                            placeholder="student@campus.edu" required>
                    </div>

                    <div>
                        <label for="register-password" class="block text-gray-700 font-medium mb-2">Password</label>
                        <input type="password" id="register-password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                            placeholder="••••••••" required>
                    </div>

                    <div>
                        <label for="register-confirm-password" class="block text-gray-700 font-medium mb-2">Confirm
                            Password</label>
                        <input type="password" id="register-confirm-password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                            placeholder="••••••••" required>
                    </div>

                    <div>
                        <label for="register-role" class="block text-gray-700 font-medium mb-2">I want to</label>
                        <select id="register-role"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="buyer">Buy assignments</option>
                            <option value="seller">Sell assignments</option>
                            <option value="both">Both buy and sell</option>
                        </select>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="terms"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" required>
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-800">Terms &
                                Conditions</a>
                        </label>
                    </div>

                    <button type="submit" class="w-full btn-primary py-3 rounded-lg font-medium">Create Account</button>

                    <div class="text-center mt-4">
                        <p class="text-gray-600">Already have an account?
                            <button id="show-login" class="text-indigo-600 hover:text-indigo-800 font-medium">Login
                                here</button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>