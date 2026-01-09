<?php
    include '../includes/header.php';
    ?>
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="mb-16">
            <div class="text-center py-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Buy and Sell Campus Assignments</h1>
                <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">Kuppiya connects students who need help with assignments to those who can provide quality solutions. Save time and improve your grades.</p>
                <div class="flex flex-col md:flex-row justify-center gap-4">
                    <button class="btn-primary px-8 py-3 rounded-full font-medium text-lg hover:shadow-lg transition-all duration-200">
                        <i class="fas fa-shopping-cart mr-2"></i>Browse Assignments
                    </button>
                    <button class="bg-white border-2 border-indigo-600 text-indigo-600 px-8 py-3 rounded-full font-medium text-lg hover:bg-indigo-50 transition-all duration-200">
                        <i class="fas fa-upload mr-2"></i>Sell Your Work
                    </button>
                </div>
            </div>
        </section>
        
        <!-- Featured Assignments -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Featured Assignments</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Assignment Card 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full">Computer Science</span>
                            <span class="text-2xl font-bold text-indigo-600">$24.99</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Data Structures Final Project</h3>
                        <p class="text-gray-600 mb-4">Complete implementation of binary search trees with analysis report. Includes documentation and test cases.</p>
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <i class="fas fa-university mr-2"></i>
                            <span>University of Tech</span>
                            <i class="fas fa-calendar-alt ml-4 mr-2"></i>
                            <span>Due: 2 weeks</span>
                        </div>
                        <button class="w-full btn-primary py-2 rounded-lg font-medium">View Details</button>
                    </div>
                </div>
                
                <!-- Assignment Card 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">Business</span>
                            <span class="text-2xl font-bold text-indigo-600">$19.99</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Marketing Strategy Analysis</h3>
                        <p class="text-gray-600 mb-4">Comprehensive analysis of Nike's marketing strategy with recommendations for digital transformation.</p>
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <i class="fas fa-university mr-2"></i>
                            <span>Business College</span>
                            <i class="fas fa-calendar-alt ml-4 mr-2"></i>
                            <span>Due: 1 week</span>
                        </div>
                        <button class="w-full btn-primary py-2 rounded-lg font-medium">View Details</button>
                    </div>
                </div>
                
                <!-- Assignment Card 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <span class="bg-red-100 text-red-800 text-xs font-semibold px-3 py-1 rounded-full">Engineering</span>
                            <span class="text-2xl font-bold text-indigo-600">$34.99</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Thermodynamics Lab Report</h3>
                        <p class="text-gray-600 mb-4">Complete analysis of heat transfer experiments with calculations, graphs, and conclusions.</p>
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <i class="fas fa-university mr-2"></i>
                            <span>Engineering Institute</span>
                            <i class="fas fa-calendar-alt ml-4 mr-2"></i>
                            <span>Due: 3 days</span>
                        </div>
                        <button class="w-full btn-primary py-2 rounded-lg font-medium">View Details</button>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- About Us Section -->
        <section id="about" class="mb-16">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">About Kuppiya</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-gray-700 mb-4">Kuppiya is a campus-focused marketplace where students can buy and sell academic assignments, projects, and study materials.</p>
                        <p class="text-gray-700 mb-4">Our platform helps students save time, learn from quality examples, and earn money by sharing their academic work with others.</p>
                        <p class="text-gray-700 mb-6">All assignments are verified for quality and originality before being listed on our platform.</p>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
                            <span>100% plagiarism-free content</span>
                        </div>
                        <div class="flex items-center text-gray-700 my-3">
                            <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
                            <span>Secure payment system</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
                            <span>Direct communication with sellers</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-40 h-40 mx-auto rounded-full kuppiya-primary flex items-center justify-center mb-6">
                                <i class="fas fa-graduation-cap text-white text-6xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Campus Focused</h3>
                            <p class="text-gray-600">Designed specifically for university and college students</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Contact Section -->
        <section id="contact" class="mb-16">
            <div class="bg-white rounded-xl shadow-md p-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Contact Us</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-gray-700 mb-6">Have questions about Kuppiya? Get in touch with our campus support team.</p>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center mr-4">
                                    <i class="fas fa-envelope text-indigo-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Email</h4>
                                    <p class="text-gray-600">support@kuppiya.com</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center mr-4">
                                    <i class="fas fa-phone text-indigo-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Phone</h4>
                                    <p class="text-gray-600">+1 (555) 123-4567</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center mr-4">
                                    <i class="fas fa-map-marker-alt text-indigo-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Campus Office</h4>
                                    <p class="text-gray-600">Student Union Building, Room 205</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <form class="space-y-4">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                                <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="Your name">
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                                <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="Your email">
                            </div>
                            <div>
                                <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                                <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="Your message"></textarea>
                            </div>
                            <button type="submit" class="w-full btn-primary py-3 rounded-lg font-medium">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
   
    
    

    <?php
    include '../includes/footer.php';
    ?>
    
    <script>
        // DOM Elements
        const loginBtn = document.getElementById('login-btn');
        const loginModal = document.getElementById('login-modal');
        const closeLoginModal = document.getElementById('close-login-modal');
        const registerModal = document.getElementById('register-modal');
        const closeRegisterModal = document.getElementById('close-register-modal');
        const showRegisterBtn = document.getElementById('show-register');
        const showLoginBtn = document.getElementById('show-login');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileSearchBtn = document.getElementById('mobile-search-btn');
        const mobileSearch = document.getElementById('mobile-search');
        
        // Open Login Modal
        loginBtn.addEventListener('click', () => {
            loginModal.style.display = 'block';
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        });
        
        // Close Login Modal
        closeLoginModal.addEventListener('click', () => {
            loginModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
        
        // Close Register Modal
        closeRegisterModal.addEventListener('click', () => {
            registerModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
        
        // Show Register Modal from Login Modal
        showRegisterBtn.addEventListener('click', () => {
            loginModal.style.display = 'none';
            registerModal.style.display = 'block';
        });
        
        // Show Login Modal from Register Modal
        showLoginBtn.addEventListener('click', () => {
            registerModal.style.display = 'none';
            loginModal.style.display = 'block';
        });
        
        // Close modals when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                loginModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
            if (e.target === registerModal) {
                registerModal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
        
        // Toggle Mobile Menu
        mobileMenuBtn.addEventListener('click', () => {
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                mobileSearch.classList.add('hidden'); // Hide search if open
            } else {
                mobileMenu.classList.add('hidden');
            }
        });
        
        // Toggle Mobile Search
        mobileSearchBtn.addEventListener('click', () => {
            if (mobileSearch.classList.contains('hidden')) {
                mobileSearch.classList.remove('hidden');
                mobileMenu.classList.add('hidden'); // Hide menu if open
            } else {
                mobileSearch.classList.add('hidden');
            }
        });
        
        // Form Submissions
        document.getElementById('login-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const email = document.getElementById('login-email').value;
            const password = document.getElementById('login-password').value;
            
            // In a real application, you would send this to a PHP backend
            console.log('Login attempt with:', { email, password });
            alert('Login functionality would connect to PHP backend. Email: ' + email);
            
            // Close modal after submission
            loginModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
        
        document.getElementById('register-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('register-name').value;
            const email = document.getElementById('register-email').value;
            const password = document.getElementById('register-password').value;
            const role = document.getElementById('register-role').value;
            
            // In a real application, you would send this to a PHP backend
            console.log('Registration attempt with:', { name, email, password, role });
            alert('Registration would be processed by PHP backend. Name: ' + name);
            
            // Close modal after submission
            registerModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                e.preventDefault();
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>