// DOM Elements
const loginBtn = document.getElementById('loginBtn');
const loginModal = document.getElementById('loginModal');
const registerModal = document.getElementById('registerModal');
const closeLoginModal = document.getElementById('closeLoginModal');
const closeRegisterModal = document.getElementById('closeRegisterModal');
const showRegisterBtn = document.getElementById('showRegisterBtn');
const showLoginBtn = document.getElementById('showLoginBtn');
const searchInput = document.getElementById('searchInput');
const searchResults = document.getElementById('searchResults');

// Show Login Modal
if (loginBtn) {
    loginBtn.addEventListener('click', () => {
        loginModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    });
}

// Close Login Modal
if (closeLoginModal) {
    closeLoginModal.addEventListener('click', () => {
        loginModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    });
}

// Show Register Modal from Login
if (showRegisterBtn) {
    showRegisterBtn.addEventListener('click', () => {
        loginModal.classList.add('hidden');
        registerModal.classList.remove('hidden');
    });
}

// Show Login Modal from Register
if (showLoginBtn) {
    showLoginBtn.addEventListener('click', () => {
        registerModal.classList.add('hidden');
        loginModal.classList.remove('hidden');
    });
}

// Close Register Modal
if (closeRegisterModal) {
    closeRegisterModal.addEventListener('click', () => {
        registerModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    });
}

// Close modals when clicking outside
window.addEventListener('click', (e) => {
    if (e.target === loginModal) {
        loginModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    if (e.target === registerModal) {
        registerModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
});

// Search functionality
if (searchInput) {
    let searchTimeout;
    
    searchInput.addEventListener('input', (e) => {
        clearTimeout(searchTimeout);
        const query = e.target.value.trim();
        
        if (query.length < 2) {
            searchResults.classList.add('hidden');
            return;
        }
        
        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 300);
    });
    
    // Hide results when clicking outside
    document.addEventListener('click', (e) => {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });
}

function performSearch(query) {
    // This is a placeholder for actual search functionality
    // You would typically make an AJAX request to a PHP endpoint
    
    const mockResults = [
        { title: 'Data Structures Assignment', price: '$20', url: '#' },
        { title: 'Calculus Problem Set', price: '$15', url: '#' },
        { title: 'Research Paper Template', price: '$25', url: '#' }
    ];
    
    if (mockResults.length > 0) {
        let resultsHTML = '<div class="py-2">';
        mockResults.forEach(result => {
            resultsHTML += `
                <a href="${result.url}" class="flex items-center px-4 py-2 hover:bg-gray-100">
                    <div class="flex-1">
                        <div class="font-medium text-gray-900">${result.title}</div>
                    </div>
                    <div class="text-indigo-600 font-semibold">${result.price}</div>
                </a>
            `;
        });
        resultsHTML += '</div>';
        
        searchResults.innerHTML = resultsHTML;
        searchResults.classList.remove('hidden');
    }
}

// Form validation
if (document.getElementById('registerForm')) {
    const registerForm = document.getElementById('registerForm');
    const password = document.getElementById('registerPassword');
    const confirmPassword = document.getElementById('registerConfirmPassword');
    
    registerForm.addEventListener('submit', (e) => {
        if (password.value !== confirmPassword.value) {
            e.preventDefault();
            alert('Passwords do not match!');
            confirmPassword.focus();
        }
    });
}