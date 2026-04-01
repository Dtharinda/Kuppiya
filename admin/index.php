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

            <!-- Upload Area Section -->
            <div class="glass-panel mt-8" style="padding: 2.5rem;">
                <h3 class="mb-6 text-xl">Quick Upload</h3>
                <form action="upload_process.php" method="POST" enctype="multipart/form-data" class="grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                    <div>
                        <div class="input-group">
                            <label class="form-label">Assignment Title</label>
                            <input type="text" name="title" class="form-input" placeholder="e.g. Advanced Operating Systems" required>
                        </div>
                        <div class="input-group">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-input" rows="3" placeholder="Brief details about the assignment..."></textarea>
                        </div>
                        <div class="flex gap-4">
                            <div class="input-group w-full">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-input" required>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Business">Business</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Mathematics">Mathematics</option>
                                </select>
                            </div>
                            <div class="input-group w-full">
                                <label class="form-label">Price ($)</label>
                                <input type="number" name="price" class="form-input" placeholder="0.00" step="0.01" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="form-label">Download Password (One-Time Use)</label>
                            <input type="text" name="download_password" class="form-input" placeholder="e.g. secret123" required>
                        </div>
                    </div>
                    <div>
                        <div class="input-group h-full">
                            <label class="form-label">Upload ZIP/PDF File</label>
                            <div class="form-input" style="height: 100%; min-height: 150px; display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed rgba(255,255,255,0.2); background: rgba(0,0,0,0.2); position: relative;">
                                <span style="font-size: 2rem; opacity: 0.5;">📁</span>
                                <span class="text-sm text-subtle mt-2" id="file-name-display">Click to select file</span>
                                <input type="file" name="assignment_file" onchange="document.getElementById('file-name-display').innerText = this.files[0] ? this.files[0].name : 'Click to select file'" style="opacity: 0; position: absolute; width: 100%; height: 100%; cursor: pointer;" required>
                            </div>
                        </div>
                    </div>
                    <div style="grid-column: span 2;">
                        <button class="btn btn-primary" type="submit" style="width: 250px;">Publish Assignment</button>
                    </div>
                </form>
            </div>

            <!-- Manage Assignments Table -->
            <div class="glass-panel mt-8" style="padding: 2.5rem;">
                <h3 class="mb-6 text-xl">Manage Passwords</h3>
                <div style="overflow-x: auto;">
                    <table style="width: 100%; text-align: left; border-collapse: collapse;">
                        <thead>
                            <tr style="border-bottom: 1px solid var(--border);">
                                <th style="padding: 1rem; color: var(--text-muted); font-weight: 500;">ID</th>
                                <th style="padding: 1rem; color: var(--text-muted); font-weight: 500;">Title</th>
                                <th style="padding: 1rem; color: var(--text-muted); font-weight: 500;">Current Password</th>
                                <th style="padding: 1rem; color: var(--text-muted); font-weight: 500;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $pdo->query("SELECT id, title, download_password FROM assignments ORDER BY created_at DESC");
                            while ($row = $stmt->fetch()):
                            ?>
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <td style="padding: 1rem;">#<?= $row['id'] ?></td>
                                <td style="padding: 1rem;"><?= htmlspecialchars($row['title']) ?></td>
                                <td style="padding: 1rem;">
                                    <?php if (empty($row['download_password'])): ?>
                                        <span class="text-xs" style="color: #ef4444; background: rgba(239,68,68,0.1); padding: 0.2rem 0.6rem; border-radius: 99px;">Used / None</span>
                                    <?php else: ?>
                                        <span class="text-xs" style="color: #22c55e; background: rgba(34,197,94,0.1); padding: 0.2rem 0.6rem; border-radius: 99px;"><?= htmlspecialchars($row['download_password']) ?></span>
                                    <?php endif; ?>
                                </td>
                                <td style="padding: 1rem;">
                                    <form action="update_password.php" method="POST" class="flex gap-2">
                                        <input type="hidden" name="assignment_id" value="<?= $row['id'] ?>">
                                        <input type="text" name="new_password" class="form-input" style="padding: 0.4rem; font-size: 0.8rem; width: 120px;" placeholder="New password" required>
                                        <button type="submit" class="btn btn-secondary" style="padding: 0.4rem 1rem; font-size: 0.8rem;">Update</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
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
