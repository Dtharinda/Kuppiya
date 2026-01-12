<!-- Footer -->
<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-6 md:mb-0">
                <a href="index.php" class="flex items-center space-x-2">
                    <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center">
                        <span class="text-white font-bold">K</span>
                    </div>
                    <span class="text-xl font-bold">Kuppiya</span>
                </a>
                <p class="text-gray-400 mt-2">Campus Assignment Marketplace</p>
            </div>
            <div class="flex space-x-6">
                <a href="index.php" class="text-gray-300 hover:text-white">Home</a>
                <a href="about.php" class="text-gray-300 hover:text-white">About Us</a>
                <a href="contact.php" class="text-gray-300 hover:text-white">Contact</a>
                <a href="#" class="text-gray-300 hover:text-white">Terms</a>
                <a href="#" class="text-gray-300 hover:text-white">Privacy</a>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; <?php echo date('Y'); ?> Kuppiya. All rights reserved. For academic purposes only.</p>
        </div>
    </div>
    
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

        // Only run if elements exist
        if (loginBtn && loginModal && closeLoginModal) {
            loginBtn.onclick = () => {
                loginModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            };

            closeLoginModal.onclick = () => {
                loginModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            };
        }

        if (closeRegisterModal && registerModal) {
            closeRegisterModal.onclick = () => {
                registerModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            };
        }

        if (showRegisterBtn && loginModal && registerModal) {
            showRegisterBtn.onclick = () => {
                loginModal.classList.remove('active');
                registerModal.classList.add('active');
            };
        }

        if (showLoginBtn && loginModal && registerModal) {
            showLoginBtn.onclick = () => {
                registerModal.classList.remove('active');
                loginModal.classList.add('active');
            };
        }

        // Close when clicking outside
        window.onclick = (e) => {
            if (e.target === loginModal) {
                loginModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
            if (e.target === registerModal) {
                registerModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        };

        // Toggle Mobile Menu - check if elements exist
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                    if (mobileSearch) mobileSearch.classList.add('hidden'); // Hide search if open
                } else {
                    mobileMenu.classList.add('hidden');
                }
            });
        }

        // Toggle Mobile Search - check if elements exist
        if (mobileSearchBtn && mobileSearch) {
            mobileSearchBtn.addEventListener('click', () => {
                if (mobileSearch.classList.contains('hidden')) {
                    mobileSearch.classList.remove('hidden');
                    if (mobileMenu) mobileMenu.classList.add('hidden'); // Hide menu if open
                } else {
                    mobileSearch.classList.add('hidden');
                }
            });
        }

        // Register form submission - check if element exists
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
                    if (mobileMenu) mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>
</footer>
</body>
</html>