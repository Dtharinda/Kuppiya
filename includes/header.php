<?php
// includes/header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = isset($_SESSION['user_id']);
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuppiya | Premium Assignment Store</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/animations.css">
</head>
<body>

    <!-- Header Navigation -->
    <nav class="navbar <?= ($currentPage !== 'index') ? 'scrolled' : '' ?>" id="navbar">
        <div class="container navbar-content">
            <a href="index.php" class="logo text-gradient">Kuppiya <?= $isAdmin ? '<span style="font-size: 0.5em; color: var(--secondary)">ADMIN</span>' : '' ?></a>
            <div class="nav-links">
                <a href="index.php" class="nav-link <?= ($currentPage == 'index') ? 'active' : '' ?>">Home</a>
                <a href="store.php" class="nav-link <?= ($currentPage == 'store') ? 'active' : '' ?>">Store</a>
                <?php if ($isLoggedIn && !$isAdmin): ?>
                    <a href="dashboard.php" class="nav-link <?= ($currentPage == 'dashboard') ? 'active' : '' ?>">Dashboard</a>
                <?php endif; ?>
                <?php if ($isAdmin): ?>
                    <a href="admin.php" class="nav-link <?= ($currentPage == 'admin') ? 'active' : '' ?>">Admin Panel</a>
                <?php endif; ?>
            </div>
            <div class="nav-actions flex gap-4 items-center">
                <?php if (!$isAdmin): ?>
                    <a href="cart.php" class="btn btn-secondary" id="nav-cart">Cart</a>
                <?php endif; ?>

                <?php if ($isLoggedIn): ?>
                    <span class="text-sm text-subtle">Hi, <?= htmlspecialchars($_SESSION['username']) ?></span>
                    <a href="processes/logout.php" class="text-xs text-muted hover:text-main">Logout</a>
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
                <h3 class="text-2xl">Login</h3>
                <p class="text-xs text-subtle mt-2">Access your Kuppiya account</p>
                <!-- For quick testing -->
                <p class="text-xs text-secondary mt-1">Admin: admin@kuppiya.com | admin123</p>
            </div>
            
            <form action="processes/auth.php" method="POST" id="login-form">
                <input type="hidden" name="action" value="login">
                <div class="input-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" placeholder="admin@kuppiya.com" required>
                </div>
                <div class="input-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-primary w-full mt-4" style="padding: 0.8rem;">Login</button>
            </form>
        </div>
    </div>
    
    <script>
        const loginBtn = document.getElementById('nav-login-btn');
        const loginModal = document.getElementById('login-modal');
        const closeBtn = document.getElementById('close-modal');
        
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
        }
    </script>
    <?php endif; ?>
