<?php
require_once '../config.php';

// Auth Protection
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Redirect non-admins out
    header("Location: ../index.php");
    exit;
}

// Fetch stats
$productCount = $pdo->query("SELECT COUNT(*) FROM assignments")->fetchColumn();
$userCount = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$purchaseCount = $pdo->query("SELECT COUNT(*) FROM purchases")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Kuppiya</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/animations.css">
    <style>
        .admin-sidebar { width: 250px; border-right: 1px solid var(--border); height: calc(100vh - 80px); position: sticky; top: 0; padding: 2rem; background: rgba(0,0,0,0.2); }
        .admin-nav-link { display: block; padding: 0.75rem 1rem; border-radius: 8px; margin-bottom: 0.5rem; color: var(--text-muted); transition: all 0.2s; }
        .admin-nav-link:hover, .admin-nav-link.active { background: rgba(157, 78, 221, 0.1); color: var(--primary); }
    </style>
</head>
<body>
    <nav class="navbar scrolled" style="border-bottom: 1px solid var(--border-glow); position: static;">
        <div class="container navbar-content justify-between" style="max-width: 100%;">
            <a href="../index.php" class="logo text-gradient" id="kuppiya-logo">Kuppiya <span style="font-size: 0.5em; color: var(--secondary)">ADMIN</span></a>
            <div class="nav-actions flex gap-4 items-center">
                <span class="text-sm text-muted">Administrator</span>
                <a href="../processes/logout.php" class="btn btn-secondary text-sm" style="padding: 0.5rem 1rem;">Logout</a>
            </div>
        </div>
    </nav>

    <div class="flex animate-slideUp">
        
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <h4 class="mb-4 text-xs text-subtle font-bold tracking-wider">MANAGEMENT</h4>
            <a href="index.php" class="admin-nav-link active">Dashboard</a>
            <a href="../index.php" class="admin-nav-link">Main Site</a>
        </aside>

        <!-- Main Content -->
        <main style="flex: 1; padding: 3rem;">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl">Overview</h1>
                <button class="btn btn-primary animate-pulse">+ Upload Assignment</button>
            </div>

            <!-- Stats Grid -->
            <div class="grid mb-8" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;">
                <div class="glass-panel" style="padding: 2rem; border-top: 4px solid var(--primary);">
                    <div class="text-sm text-subtle mb-2">Registered Users</div>
                    <div class="text-4xl font-bold"><?= $userCount ?></div>
                </div>
                <div class="glass-panel" style="padding: 2rem; border-top: 4px solid var(--secondary);">
                    <div class="text-sm text-subtle mb-2">Active Assignments</div>
                    <div class="text-4xl font-bold"><?= $productCount ?></div>
                </div>
                 <div class="glass-panel" style="padding: 2rem; border-top: 4px solid #f5af19;">
                    <div class="text-sm text-subtle mb-2">Total Sales (Units)</div>
                    <div class="text-4xl font-bold"><?= $purchaseCount ?></div>
                </div>
            </div>

            <!-- Upload Area Section (Mock UI) -->
            <div class="glass-panel mt-8" style="padding: 2.5rem;">
                <h3 class="mb-6 text-xl">Quick Upload</h3>
                <form class="grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div>
                        <div class="input-group">
                            <label class="form-label">Assignment Title</label>
                            <input type="text" class="form-input" placeholder="e.g. Advanced Operating Systems">
                        </div>
                        <div class="input-group">
                            <label class="form-label">Category</label>
                            <select class="form-input">
                                <option>Computer Science</option>
                                <option>Business</option>
                                <option>Engineering</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label class="form-label">Price ($)</label>
                            <input type="number" class="form-input" placeholder="0.00" step="0.01">
                        </div>
                    </div>
                    <div>
                        <div class="input-group h-full">
                            <label class="form-label">Upload ZIP/PDF File</label>
                            <div class="form-input" style="height: 100%; min-height: 150px; display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed rgba(255,255,255,0.2); background: rgba(0,0,0,0.2);">
                                <span style="font-size: 2rem; opacity: 0.5;">📁</span>
                                <span class="text-sm text-subtle mt-2">Drag and drop file here</span>
                                <input type="file" style="opacity: 0; position: absolute; width: 100%; height: 100%; cursor: pointer;">
                            </div>
                        </div>
                    </div>
                    <div style="grid-column: span 2;">
                        <button class="btn btn-primary" type="button" style="width: 200px;">Publish Assignment</button>
                    </div>
                </form>
            </div>

        </main>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if (isset($_SESSION['error'])): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?= addslashes(htmlspecialchars($_SESSION['error'])) ?>',
                    background: '#1a1a2e',
                    color: '#fff',
                    confirmButtonColor: '#9d4edd'
                });
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '<?= addslashes(htmlspecialchars($_SESSION['success'])) ?>',
                    background: '#1a1a2e',
                    color: '#fff',
                    confirmButtonColor: '#9d4edd'
                });
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
        });
    </script>
</body>
</html>
