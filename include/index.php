<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Single Line Flowbite Navbar with Login Modal</title>
    <style>
        :root {
            --brand-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --brand-light: #8b5cf6;
            --brand-dark: #7c3aed;
        }
        
        .gradient-text {
            background: var(--brand-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-blur {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
        }
        
        @media (prefers-color-scheme: dark) {
            .nav-blur {
                backdrop-filter: blur(10px);
                background-color: rgba(15, 23, 42, 0.9);
            }
        }
        
        .nav-shadow {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        .brand-button {
            background: var(--brand-gradient);
            transition: all 0.3s ease;
        }
        
        .brand-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        
        .modal-blur {
            backdrop-filter: blur(8px);
        }
        
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">
    <!-- Single Line Navbar -->
    <header>
        <nav class="nav-blur nav-shadow fixed w-full z-50 top-0 start-0 border-b border-gray-200 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 py-3 sm:px-6 lg:px-8">
                <!-- Single Line Layout -->
                <div class="flex items-center justify-between">
                    <!-- Logo Section -->
                    <div class="flex items-center space-x-8">
                        <a href="#" class="flex items-center space-x-3 group">
                            <div class="p-2 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-md group-hover:shadow-lg transition-all duration-300">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.5 4.06c0-1.336-1.616-2.005-2.56-1.06l-4.5 4.5H4.508c-1.141 0-2.318.664-2.66 1.905A9.76 9.76 0 001.5 12c0 .898.121 1.768.35 2.595.341 1.24 1.518 1.905 2.659 1.905h1.93l4.5 4.5c.945.945 2.561.276 2.561-1.06V4.06zM18.584 5.106a.75.75 0 011.06 0c3.808 3.807 3.808 9.98 0 13.788a.75.75 0 11-1.06-1.06 8.25 8.25 0 000-11.668.75.75 0 010-1.06z"/>
                                    <path d="M15.932 7.757a.75.75 0 011.061 0 6 6 0 010 8.486.75.75 0 01-1.06-1.061 4.5 4.5 0 000-6.364.75.75 0 010-1.06z"/>
                                </svg>
                            </div>
                            <span class="self-center text-2xl font-bold gradient-text hidden sm:block">Flowbite</span>
                        </a>
                        
                        <!-- Navigation Links -->
                        <div class="hidden lg:flex items-center space-x-1">
                            <a href="#" class="flex items-center py-2 px-4 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 group transition-all duration-200">
                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                Home
                            </a>
                            <a href="#" class="flex items-center py-2 px-4 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 group transition-all duration-200">
                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                About
                            </a>
                            <a href="#" class="flex items-center py-2 px-4 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 group transition-all duration-200">
                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                                </svg>
                                Services
                            </a>
                            <a href="#" class="flex items-center py-2 px-4 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 group transition-all duration-200">
                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                                </svg>
                                Docs
                            </a>
                            <a href="#" class="flex items-center py-2 px-4 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 group transition-all duration-200">
                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                                </svg>
                                Contact
                            </a>
                        </div>
                    </div>
                    
                    <!-- Search Bar and Action Buttons (All in one line) -->
                    <div class="flex items-center space-x-4">
                        <!-- Search Bar -->
                        <div class="relative hidden md:block">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" class="block w-48 lg:w-64 ps-10 pe-4 py-2.5 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 shadow-sm placeholder:text-gray-500 dark:placeholder:text-gray-400 transition-all duration-200" placeholder="Search...">
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="hidden md:flex items-center space-x-2">
                            <button type="button" data-modal-target="loginModal" data-modal-toggle="loginModal" class="brand-button px-5 py-2.5 text-sm font-medium text-white rounded-xl hover:shadow-lg transition-all duration-300">
                                Sign In
                            </button>
                        </div>
                        
                        <!-- Mobile Menu Button -->
                        <button data-collapse-toggle="mobile-menu" type="button" class="inline-flex items-center p-2.5 w-10 h-10 justify-center text-sm text-gray-700 dark:text-gray-300 rounded-xl md:hidden hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-purple-500" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Mobile Menu (Hidden by default) -->
                <div class="hidden md:hidden mt-4" id="mobile-menu">
                    <!-- Mobile Navigation Links -->
                    <div class="space-y-2 py-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="#" class="flex items-center py-3 px-4 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 group transition-all duration-200">
                            <svg class="w-5 h-5 mr-3 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Home
                        </a>
                        <a href="#" class="flex items-center py-3 px-4 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 group transition-all duration-200">
                            <svg class="w-5 h-5 mr-3 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            About
                        </a>
                        <a href="#" class="flex items-center py-3 px-4 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 group transition-all duration-200">
                            <svg class="w-5 h-5 mr-3 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                            </svg>
                            Services
                        </a>
                        <a href="#" class="flex items-center py-3 px-4 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 group transition-all duration-200">
                            <svg class="w-5 h-5 mr-3 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                            </svg>
                            Docs
                        </a>
                        <a href="#" class="flex items-center py-3 px-4 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 group transition-all duration-200">
                            <svg class="w-5 h-5 mr-3 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                            </svg>
                            Contact
                        </a>
                        
                        <!-- Mobile Search -->
                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="text" class="block w-full ps-10 pe-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 placeholder:text-gray-500 dark:placeholder:text-gray-400" placeholder="Search...">
                            </div>
                        </div>
                        
                        <!-- Mobile Action Buttons -->
                        <div class="flex space-x-3 pt-4">
                            <button type="button" data-modal-target="loginModal" data-modal-toggle="loginModal" class="flex-1 brand-button px-4 py-3 text-sm font-medium text-white rounded-xl">
                                Sign In
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Login Modal -->
    <div id="loginModal" tabindex="-1" aria-hidden="true" class="modal-blur hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-2xl shadow-lg dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-6 pb-0">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                Welcome Back
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Sign in to your account</p>
                        </div>
                    </div>
                    <button type="button" data-modal-hide="loginModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-xl text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                
                <!-- Modal body -->
                <div class="p-6">
                    <form class="space-y-5" id="loginForm">
                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="email" name="email" id="email" class="input-focus bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 block w-full ps-10 p-3.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="name@company.com" required>
                            </div>
                        </div>
                        
                        <!-- Password Input -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label for="password" class="block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <a href="#" class="text-sm font-medium text-purple-600 hover:text-purple-500 dark:text-purple-400 dark:hover:text-purple-300 transition-colors">Forgot password?</a>
                            </div>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
                                    </svg>
                                </div>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="input-focus bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 block w-full ps-10 p-3.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" required>
                                <button type="button" id="togglePassword" class="absolute inset-y-0 end-0 flex items-center pe-3.5">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300" id="eyeIcon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Remember Me Checkbox -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember" type="checkbox" class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="brand-button w-full text-white font-medium rounded-2xl text-sm px-5 py-3.5 text-center transition-all duration-300 hover:shadow-lg">
                            Sign in to account
                        </button>
                        
                        <!-- Divider -->
                        <div class="flex items-center">
                            <div class="flex-1 border-t border-gray-300 dark:border-gray-600"></div>
                            <div class="px-4 text-sm text-gray-500 dark:text-gray-400">Or continue with</div>
                            <div class="flex-1 border-t border-gray-300 dark:border-gray-600"></div>
                        </div>
                        
                        <!-- Social Login Options -->
                        <div class="grid grid-cols-2 gap-3">
                            <a href="#" class="flex items-center justify-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-2xl hover:bg-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 transition-colors">
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                                    <path fill-rule="evenodd" d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z" clip-rule="evenodd"/>
                                </svg>
                                Google
                            </a>
                            <a href="#" class="flex items-center justify-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-2xl hover:bg-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 transition-colors">
                                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                                    <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                                </svg>
                                Facebook
                            </a>
                        </div>
                        
                        <!-- Sign Up Link -->
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400 text-center">
                            Not registered? <a href="#" class="text-purple-600 hover:text-purple-500 dark:text-purple-400 dark:hover:text-purple-300 font-medium transition-colors">Create account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="pt-24 px-4 sm:px-6 lg:px-8 pb-16">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Login Modal <span class="gradient-text">Demo</span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Click the "Sign In" button in the navbar to open the login modal. The modal features a modern design with gradient accents, form validation, and social login options.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-100 to-indigo-100 dark:from-purple-900/30 dark:to-indigo-900/30 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 005 10a6 6 0 0112 0c0 .459-.031.907-.086 1.333A5 5 0 0010 11z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Secure Login</h3>
                    <p class="text-gray-600 dark:text-gray-400">Password visibility toggle and form validation for a secure login experience.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-100 to-indigo-100 dark:from-purple-900/30 dark:to-indigo-900/30 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Social Login</h3>
                    <p class="text-gray-600 dark:text-gray-400">Quick login options with Google and Facebook for enhanced user convenience.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-100 to-indigo-100 dark:from-purple-900/30 dark:to-indigo-900/30 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm4.707 3.707a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L8.414 9H10a3 3 0 013 3v1a1 1 0 102 0v-1a5 5 0 00-5-5H8.414l1.293-1.293z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Password Recovery</h3>
                    <p class="text-gray-600 dark:text-gray-400">Forgot password link with easy recovery options to help users regain access.</p>
                </div>
            </div>
            
            <div class="mt-16 text-center">
                <button type="button" data-modal-target="loginModal" data-modal-toggle="loginModal" class="brand-button px-8 py-4 text-lg font-medium text-white rounded-2xl hover:shadow-lg transition-all duration-300">
                    Try the Login Modal
                </button>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-gray-600 dark:text-gray-400">Login Modal Demo • Made with ❤️</p>
                <p class="text-sm text-gray-500 dark:text-gray-500 mt-2">Click the Sign In button to experience the login modal</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    <script>
        // Add active state to current page link
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('nav a');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath || 
                   (currentPath === '/' && link.getAttribute('href') === '#') ||
                   (link.textContent.trim() === 'Home' && currentPath.includes('index'))) {
                    link.classList.add('bg-purple-50', 'dark:bg-purple-900/20', 'text-purple-700', 'dark:text-purple-300');
                    link.classList.remove('text-gray-700', 'dark:text-gray-300');
                }
            });
            
            // Password visibility toggle
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (togglePassword && passwordInput && eyeIcon) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    
                    // Toggle eye icon
                    if (type === 'text') {
                        eyeIcon.innerHTML = `
                            <path stroke="currentColor" stroke-width="2" d="M3.293 3.293a1 1 0 0 1 1.414 0l8.4 8.4a.5.5 0 0 1 0 .707l-8.4 8.4a1 1 0 0 1-1.414-1.414L11.586 12 3.293 3.707a1 1 0 0 1 0-1.414Z"/>
                        `;
                    } else {
                        eyeIcon.innerHTML = `
                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        `;
                    }
                });
            }
            
            // Form submission handling
            const loginForm = document.getElementById('loginForm');
            if (loginForm) {
                loginForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const email = document.getElementById('email').value;
                    const password = document.getElementById('password').value;
                    
                    // Simple validation
                    if (!email || !password) {
                        alert('Please fill in all fields');
                        return;
                    }
                    
                    // Email validation
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        alert('Please enter a valid email address');
                        return;
                    }
                    
                    // In a real application, you would send this data to a server
                    console.log('Login attempt:', { email, password });
                    
                    // Show success message
                    alert('Login successful! (This is a demo)');
                    
                    // Close modal
                    const modal = document.getElementById('loginModal');
                    if (modal) {
                        modal.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>