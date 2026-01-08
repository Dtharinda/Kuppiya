<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Centered Modal with Full Navbar</title>
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .brand-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s;
        }
        
        .brand-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        
        /* Modal Center කරන්න CSS */
        .modal-center-container {
            display: flex !important;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        
        /* Modal Transitions */
        .modal-hidden {
            opacity: 0;
            transform: scale(0.95);
            pointer-events: none;
        }
        
        .modal-visible {
            opacity: 1;
            transform: scale(1);
            pointer-events: auto;
        }
        
        /* Navbar hover effects */
        .nav-link {
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }
        
        /* Active nav item */
        .nav-active {
            background: rgba(102, 126, 234, 0.15);
            color: #667eea;
            border-radius: 0.75rem;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navbar with Items -->
    <nav class="bg-white shadow-sm fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo Section -->
                <div class="flex items-center space-x-8">
                    <a href="#" class="flex items-center space-x-3">
                        <div class="p-2 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.5 4.06c0-1.336-1.616-2.005-2.56-1.06l-4.5 4.5H4.508c-1.141 0-2.318.664-2.66 1.905A9.76 9.76 0 001.5 12c0 .898.121 1.768.35 2.595.341 1.24 1.518 1.905 2.659 1.905h1.93l4.5 4.5c.945.945 2.561.276 2.561-1.06V4.06z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold gradient-text">Flowbite</span>
                    </a>
                    
                    <!-- Navigation Links (Desktop) -->
                    <div class="hidden md:flex items-center space-x-1">
                        <a href="#" class="nav-link py-2 px-4 text-gray-700 rounded-xl nav-active">
                            <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            Home
                        </a>
                        <a href="#" class="nav-link py-2 px-4 text-gray-700 rounded-xl">
                            <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                            About
                        </a>
                        <a href="#" class="nav-link py-2 px-4 text-gray-700 rounded-xl">
                            <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                            </svg>
                            Services
                        </a>
                        <a href="#" class="nav-link py-2 px-4 text-gray-700 rounded-xl">
                            <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                            </svg>
                            Docs
                        </a>
                        <a href="#" class="nav-link py-2 px-4 text-gray-700 rounded-xl">
                            <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"/>
                            </svg>
                            Contact
                        </a>
                    </div>
                </div>
                
                <!-- Right Section -->
                <div class="flex items-center space-x-4">
                    <!-- Search Bar -->
                    <div class="hidden md:block relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" class="pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500" placeholder="Search...">
                    </div>
                    
                    <!-- Sign In Button -->
                    <button id="openModalBtn" class="brand-button px-5 py-2.5 text-sm text-white rounded-xl">
                        Sign In
                    </button>
                    
                    <!-- Mobile Menu Button -->
                    <button id="mobileMenuBtn" class="md:hidden text-gray-700 hover:text-purple-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Menu (Hidden by default) -->
            <div id="mobileMenu" class="md:hidden hidden border-t border-gray-200 py-4">
                <div class="space-y-2">
                    <a href="#" class="block py-2 px-4 text-gray-700 rounded-lg hover:bg-purple-50 hover:text-purple-600">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        Home
                    </a>
                    <a href="#" class="block py-2 px-4 text-gray-700 rounded-lg hover:bg-purple-50 hover:text-purple-600">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        About
                    </a>
                    <a href="#" class="block py-2 px-4 text-gray-700 rounded-lg hover:bg-purple-50 hover:text-purple-600">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/>
                        </svg>
                        Services
                    </a>
                    <a href="#" class="block py-2 px-4 text-gray-700 rounded-lg hover:bg-purple-50 hover:text-purple-600">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                        </svg>
                        Docs
                    </a>
                    <a href="#" class="block py-2 px-4 text-gray-700 rounded-lg hover:bg-purple-50 hover:text-purple-600">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"/>
                        </svg>
                        Contact
                    </a>
                    
                    <!-- Mobile Search -->
                    <div class="pt-4 border-t border-gray-200">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg" placeholder="Search...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20">
        <div class="min-h-screen flex flex-col items-center justify-center p-4">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Centered Modal Demo</h1>
            <p class="text-lg text-gray-600 mb-8 text-center max-w-2xl">
                This demo shows a perfectly centered modal with a full navbar containing all navigation items.
                The modal is positioned exactly in the center of the screen using CSS flexbox.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white p-6 rounded-xl shadow border border-gray-200">
                    <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Perfect Center</h3>
                    <p class="text-gray-600">Modal is perfectly centered using CSS flexbox properties</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow border border-gray-200">
                    <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Full Navbar</h3>
                    <p class="text-gray-600">Complete navbar with icons, search, and mobile menu</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow border border-gray-200">
                    <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Responsive</h3>
                    <p class="text-gray-600">Works perfectly on all screen sizes and devices</p>
                </div>
            </div>
            
            <button id="openModalBtn2" class="brand-button px-8 py-4 text-lg text-white rounded-xl">
                Open Centered Modal
            </button>
        </div>
    </main>

    <!-- Centered Login Modal -->
    <div id="loginModal" class="fixed inset-0 z-50 bg-black/50 modal-center-container modal-hidden transition-opacity duration-300">
        <div class="relative w-full max-w-md p-4">
            <!-- Modal Content -->
            <div class="bg-white rounded-2xl shadow-2xl transform transition-transform duration-300">
                <!-- Header -->
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Welcome Back</h3>
                                <p class="text-sm text-gray-500">Sign in to your account</p>
                            </div>
                        </div>
                        <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Form -->
                <div class="p-6">
                    <form class="space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="email" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500" placeholder="name@example.com" required>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                                <input type="password" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500" placeholder="••••••••" required>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input type="checkbox" class="w-4 h-4 text-purple-600 border-gray-300 rounded">
                                <label class="ml-2 text-sm text-gray-900">Remember me</label>
                            </div>
                            <a href="#" class="text-sm text-purple-600 hover:text-purple-500">Forgot password?</a>
                        </div>
                        
                        <button type="submit" class="w-full brand-button py-3.5 text-white font-medium rounded-xl text-lg">
                            Sign In
                        </button>
                        
                        <div class="text-center">
                            <span class="text-sm text-gray-500">
                                Don't have an account? 
                                <button type="button" class="text-purple-600 hover:text-purple-500 font-medium">Sign up</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // DOM Elements
        const loginModal = document.getElementById('loginModal');
        const openModalBtns = document.querySelectorAll('#openModalBtn, #openModalBtn2');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        // Open Modal Function
        function openModal() {
            loginModal.classList.remove('modal-hidden');
            loginModal.classList.add('modal-visible');
            document.body.style.overflow = 'hidden';
        }

        // Close Modal Function
        function closeModal() {
            loginModal.classList.remove('modal-visible');
            loginModal.classList.add('modal-hidden');
            document.body.style.overflow = '';
        }

        // Toggle Mobile Menu
        function toggleMobileMenu() {
            mobileMenu.classList.toggle('hidden');
        }

        // Event Listeners
        openModalBtns.forEach(btn => {
            btn.addEventListener('click', openModal);
        });
        
        closeModalBtn.addEventListener('click', closeModal);
        
        mobileMenuBtn.addEventListener('click', toggleMobileMenu);
        
        // Close modal when clicking outside
        loginModal.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                closeModal();
            }
        });
        
        // Close with Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeModal();
                mobileMenu.classList.add('hidden');
            }
        });
        
        // Close mobile menu when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 768 && !mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
        
        // Navbar active state
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    navLinks.forEach(l => l.classList.remove('nav-active'));
                    this.classList.add('nav-active');
                    
                    // Close mobile menu after click on mobile
                    if (window.innerWidth < 768) {
                        mobileMenu.classList.add('hidden');
                    }
                });
            });
            
            // Set Home as active by default
            const homeLink = document.querySelector('.nav-link');
            if (homeLink) {
                homeLink.classList.add('nav-active');
            }
        });
    </script>
</body>
</html>