<?php
// includes/header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = isset($_SESSION['user_id']);
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$asset_path = defined('ASSET_PATH') ? ASSET_PATH : './';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuppiya | Premium Assignment Store</title>
    <link rel="stylesheet" href="<?= $asset_path ?>css/index.css">
    <link rel="stylesheet" href="<?= $asset_path ?>css/animations.css">
</head>
<body>

    <!-- Header Navigation -->
    <nav class="navbar <?= ($currentPage !== 'index') ? 'scrolled' : '' ?>" id="navbar">
        <div class="container navbar-content">
            <a href="<?= $asset_path ?>index.php" class="logo text-gradient">Kuppiya <?= $isAdmin ? '<span style="font-size: 0.5em; color: var(--secondary)">ADMIN</span>' : '' ?></a>
            <div class="nav-links">
                <a href="<?= $asset_path ?>index.php" class="nav-link <?= ($currentPage == 'index') ? 'active' : '' ?>">Home</a>
                <a href="<?= $asset_path ?>store.php" class="nav-link <?= ($currentPage == 'store') ? 'active' : '' ?>">Store</a>
                <a href="<?= $asset_path ?>contact.php" class="nav-link <?= ($currentPage == 'contact') ? 'active' : '' ?>">Contact</a>
                <?php if ($isLoggedIn && !$isAdmin): ?>
                    <a href="<?= $asset_path ?>dashboard.php" class="nav-link <?= ($currentPage == 'dashboard') ? 'active' : '' ?>">Dashboard</a>
                <?php endif; ?>
                <?php if ($isAdmin): ?>
                    <a href="<?= $asset_path ?>admin/index.php" class="nav-link <?= ($currentPage == 'admin') ? 'active' : '' ?>">Admin Panel</a>
                <?php endif; ?>
            </div>
            <div class="nav-actions flex gap-4 items-center">
                <?php if (!$isAdmin): ?>
                    <!-- Cart removed -->
                <?php endif; ?>

                <!-- Theme Toggle -->
                <button id="theme-toggle" class="btn btn-secondary" style="padding: 0.5rem; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                    <span id="theme-icon">🌙</span>
                </button>

                <?php if ($isLoggedIn): ?>
                    <span class="text-sm text-subtle">Hi, <?= htmlspecialchars($_SESSION['username']) ?></span>
                    <a href="<?= $asset_path ?>processes/logout.php" class="text-xs text-muted hover:text-main">Logout</a>
                <?php else: ?>
                    <button class="btn btn-primary" id="nav-login-btn">Login</button>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Generic Login Modal -->
    <?php if (!$isLoggedIn): ?>
    <div class="modal-overlay" id="login-modal">
        <div class="modal card glass-panel" style="padding: 2.5rem;">
            <button class="modal-close" id="close-modal">&times;</button>
            <div class="text-center mb-6">
                <div style="width: 50px; height: 50px; background: rgba(157, 78, 221, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; border: 1px solid var(--primary);">🔒</div>
                <h3 class="text-2xl" id="modal-title">Welcome</h3>
                <p class="text-xs text-subtle mt-2" id="modal-desc">Access your Kuppiya account</p>
                <!-- For quick testing -->
                <p class="text-xs text-secondary mt-1">Admin: admin@kuppiya.com | admin123</p>
            </div>
            
            <!-- Tabs -->
            <div class="flex mb-4" style="border-bottom: 1px solid var(--border);">
                <button class="w-full form-label py-2 active-tab" id="tab-login" style="border-bottom: 2px solid var(--primary); color: var(--text-main); cursor: pointer; background: transparent;">Login</button>
                <button class="w-full form-label py-2" id="tab-register" style="border-bottom: 2px solid transparent; color: var(--text-muted); cursor: pointer; background: transparent;">Register</button>
            </div>

            <form action="<?= $asset_path ?>processes/auth.php" method="POST" id="auth-form">
                <input type="hidden" name="action" id="auth-action" value="login">
                
                <div class="input-group" id="group-username" style="display: none;">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-input" placeholder="johndoe">
                </div>
                
                <div class="input-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" placeholder="admin@kuppiya.com" required>
                </div>
                <div class="input-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-primary w-full mt-4" style="padding: 0.8rem;" id="auth-submit-btn">Login</button>
            </form>
        </div>
    </div>
    
    <script>
        const loginBtn = document.getElementById('nav-login-btn');
        const loginModal = document.getElementById('login-modal');
        const closeBtn = document.getElementById('close-modal');
        
        const tabLogin = document.getElementById('tab-login');
        const tabRegister = document.getElementById('tab-register');
        const authAction = document.getElementById('auth-action');
        const groupUsername = document.getElementById('group-username');
        const authSubmitBtn = document.getElementById('auth-submit-btn');
        const modalTitle = document.getElementById('modal-title');
        const modalDesc = document.getElementById('modal-desc');

        // Theme Toggle Logic
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        
        // Init theme from localStorage
        const savedTheme = localStorage.getItem('theme') || 'dark';
        if (savedTheme === 'light') {
            document.documentElement.setAttribute('data-theme', 'light');
            themeIcon.textContent = '☀️';
        }

        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                const currentTheme = document.documentElement.getAttribute('data-theme');
                if (currentTheme === 'light') {
                    document.documentElement.removeAttribute('data-theme');
                    localStorage.setItem('theme', 'dark');
                    themeIcon.textContent = '🌙';
                } else {
                    document.documentElement.setAttribute('data-theme', 'light');
                    localStorage.setItem('theme', 'light');
                    themeIcon.textContent = '☀️';
                }
            });
        }
        
        if (loginBtn && loginModal && closeBtn) {
            loginBtn.addEventListener('click', (e) => {
                e.preventDefault();
                loginModal.classList.add('active');
            });
            closeBtn.addEventListener('click', () => {
                loginModal.classList.remove('active');
            });
            loginModal.addEventListener('click', (e) => {
                if (e.target === loginModal) {
                    loginModal.classList.remove('active');
                }
            });
            
            // Tab switching logic
            tabLogin.addEventListener('click', () => {
                tabLogin.style.borderBottomColor = 'var(--primary)';
                tabLogin.style.color = 'var(--text-main)';
                tabRegister.style.borderBottomColor = 'transparent';
                tabRegister.style.color = 'var(--text-muted)';
                authAction.value = 'login';
                groupUsername.style.display = 'none';
                groupUsername.querySelector('input').removeAttribute('required');
                authSubmitBtn.textContent = 'Login';
                modalTitle.textContent = 'Login';
                modalDesc.textContent = 'Access your Kuppiya account';
            });
            
            tabRegister.addEventListener('click', () => {
                tabRegister.style.borderBottomColor = 'var(--primary)';
                tabRegister.style.color = 'var(--text-main)';
                tabLogin.style.borderBottomColor = 'transparent';
                tabLogin.style.color = 'var(--text-muted)';
                authAction.value = 'register';
                groupUsername.style.display = 'flex';
                groupUsername.querySelector('input').setAttribute('required', 'required');
                authSubmitBtn.textContent = 'Register';
                modalTitle.textContent = 'Create Account';
                modalDesc.textContent = 'Join Kuppiya today';
            });
        }
    </script>
    <?php endif; ?>
