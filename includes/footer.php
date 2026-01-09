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
                <a href="#about" class="text-gray-300 hover:text-white">About Us</a>
                <a href="#contact" class="text-gray-300 hover:text-white">Contact</a>
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
            anchor.addEventListener('click', function (e) {
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
</footer>