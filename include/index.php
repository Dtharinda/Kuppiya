<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Enhanced Flowbite Navbar</title>
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
    </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">
    <!-- Enhanced Navbar -->
    <header>
        <nav class="nav-blur nav-shadow fixed w-full z-50 top-0 start-0 border-b border-gray-200 dark:border-gray-800">
            <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto px-4 py-3 sm:px-6 lg:px-8">
                <!-- Logo Section -->
                <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse group">
                    <div class="p-2 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-md group-hover:shadow-lg transition-all duration-300">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.5 4.06c0-1.336-1.616-2.005-2.56-1.06l-4.5 4.5H4.508c-1.141 0-2.318.664-2.66 1.905A9.76 9.76 0 001.5 12c0 .898.121 1.768.35 2.595.341 1.24 1.518 1.905 2.659 1.905h1.93l4.5 4.5c.945.945 2.561.276 2.561-1.06V4.06zM18.584 5.106a.75.75 0 011.06 0c3.808 3.807 3.808 9.98 0 13.788a.75.75 0 11-1.06-1.06 8.25 8.25 0 000-11.668.75.75 0 010-1.06z"/>
                            <path d="M15.932 7.757a.75.75 0 011.061 0 6 6 0 010 8.486.75.75 0 01-1.06-1.061 4.5 4.5 0 000-6.364.75.75 0 010-1.06z"/>
                        </svg>
                    </div>
                    <span class="self-center text-2xl font-bold gradient-text">Flowbite</span>
                </a>
                
                <!-- Desktop Search & Actions -->
                <div class="flex items-center md:order-2 space-x-4">
                    <!-- Search Bar -->
                    <div class="relative hidden md:block">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" class="block w-64 ps-10 pe-4 py-2.5 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 shadow-sm placeholder:text-gray-500 dark:placeholder:text-gray-400 transition-all duration-200" placeholder="Search...">
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="hidden md:flex items-center space-x-2">
                        <button class="px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-xl transition-colors duration-200">
                            Sign In
                        </button>
                        <button class="brand-button px-5 py-2.5 text-sm font-medium text-white rounded-xl">
                            Get Started
                        </button>
                    </div>
                    
                    <!-- Mobile Menu Button -->
                    <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2.5 w-10 h-10 justify-center text-sm text-gray-700 dark:text-gray-300 rounded-xl md:hidden hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-purple-500" aria-controls="navbar-search" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                        </svg>
                    </button>
                </div>
                
                <!-- Navigation Links -->
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                    <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-2xl bg-gray-50 dark:bg-gray-900 md:flex-row md:space-x-2 rtl:space-x-reverse md:mt-0 md:bg-transparent md:dark:bg-transparent">
                        <li>
                            <a href="#" class="flex items-center py-3 px-5 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 md:hover:bg-transparent md:dark:hover:bg-transparent md:border-0 md:hover:text-purple-600 dark:md:hover:text-purple-400 group transition-all duration-200">
                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center py-3 px-5 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 md:hover:bg-transparent md:dark:hover:bg-transparent md:border-0 md:hover:text-purple-600 dark:md:hover:text-purple-400 group transition-all duration-200">
                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                About
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center py-3 px-5 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 md:hover:bg-transparent md:dark:hover:bg-transparent md:border-0 md:hover:text-purple-600 dark:md:hover:text-purple-400 group transition-all duration-200">
                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                                </svg>
                                Services
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center py-3 px-5 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 md:hover:bg-transparent md:dark:hover:bg-transparent md:border-0 md:hover:text-purple-600 dark:md:hover:text-purple-400 group transition-all duration-200">
                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                                </svg>
                                Docs
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center py-3 px-5 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 md:hover:bg-transparent md:dark:hover:bg-transparent md:border-0 md:hover:text-purple-600 dark:md:hover:text-purple-400 group transition-all duration-200">
                                <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400 group-hover:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                                </svg>
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Mobile Search (Hidden by default) -->
            <div class="md:hidden px-4 pb-4 hidden" id="mobile-search">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" class="block w-full ps-10 pe-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 placeholder:text-gray-500 dark:placeholder:text-gray-400" placeholder="Search...">
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="pt-24 px-4 sm:px-6 lg:px-8 pb-16">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Enhanced <span class="gradient-text">Flowbite Navbar</span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    A beautifully redesigned navbar with modern gradients, smooth animations, and improved responsiveness. 
                    This enhanced version works seamlessly on both light and dark modes.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-100 to-indigo-100 dark:from-purple-900/30 dark:to-indigo-900/30 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Modern Design</h3>
                    <p class="text-gray-600 dark:text-gray-400">Features gradient accents, rounded corners, and subtle shadows for a contemporary look.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-100 to-indigo-100 dark:from-purple-900/30 dark:to-indigo-900/30 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.758a1 1 0 01-.293.707l-4 4C.817 14.769 2.156 18 4.828 18h10.343c2.673 0 4.012-3.231 2.122-5.121l-4-4A1 1 0 0113 8.172V4.414l.707-.707A1 1 0 0013 2H7zm2 6.172V4h2v4.172a3 3 0 00.879 2.12l1.027 1.028a4 4 0 00-2.171.102l-.47.156a4 4 0 01-2.53 0l-.563-.187a1.993 1.993 0 00-.114-.035l1.063-1.063A3 3 0 009 8.172z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Fully Responsive</h3>
                    <p class="text-gray-600 dark:text-gray-400">Optimized for all screen sizes with a collapsible mobile menu and adaptive layout.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-100 to-indigo-100 dark:from-purple-900/30 dark:to-indigo-900/30 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Smooth Animations</h3>
                    <p class="text-gray-600 dark:text-gray-400">Hover effects, transitions, and interactive elements for an engaging user experience.</p>
                </div>
            </div>
            
            <div class="mt-16 text-center">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Navbar Features</h2>
                <div class="inline-flex flex-wrap justify-center gap-4">
                    <span class="px-4 py-2 bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300 rounded-full text-sm font-medium">Gradient Accents</span>
                    <span class="px-4 py-2 bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 rounded-full text-sm font-medium">Dark Mode Support</span>
                    <span class="px-4 py-2 bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 rounded-full text-sm font-medium">Blur Effect</span>
                    <span class="px-4 py-2 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300 rounded-full text-sm font-medium">Mobile Optimized</span>
                    <span class="px-4 py-2 bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300 rounded-full text-sm font-medium">Interactive Elements</span>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-gray-600 dark:text-gray-400">Enhanced Flowbite Navbar Design • Made with ❤️</p>
                <p class="text-sm text-gray-500 dark:text-gray-500 mt-2">Fully compatible with Flowbite CSS framework</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    <script>
        // Toggle mobile search when search icon is clicked
        document.addEventListener('DOMContentLoaded', function() {
            const searchButton = document.querySelector('[data-collapse-toggle="navbar-search"]');
            const mobileSearch = document.getElementById('mobile-search');
            
            if (searchButton) {
                searchButton.addEventListener('click', function() {
                    mobileSearch.classList.toggle('hidden');
                });
            }
            
            // Add active state to current page link
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('nav a');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath || 
                   (currentPath === '/' && link.getAttribute('href') === '#') ||
                   (link.textContent === 'Home' && currentPath.includes('index'))) {
                    link.classList.add('bg-purple-50', 'dark:bg-purple-900/20', 'text-purple-700', 'dark:text-purple-300');
                    link.classList.remove('text-gray-700', 'dark:text-gray-300');
                }
            });
        });
    </script>
</body>
</html>