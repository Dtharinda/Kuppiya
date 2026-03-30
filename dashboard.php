<?php
require_once 'config.php';

// Auth Protection
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT a.*, p.purchase_date FROM purchases p JOIN assignments a ON p.assignment_id = a.id WHERE p.user_id = ? ORDER BY p.purchase_date DESC");
$stmt->execute([$userId]);
$purchases = $stmt->fetchAll();

require_once 'includes/header.php';
?>

    <div class="container animate-slideUp" style="margin-top: 100px; padding-bottom: 5rem; max-width: 1000px;">
        <h1 class="text-3xl mb-8">My Library</h1>

        <div class="glass-panel mb-8" style="padding: 2rem; background: linear-gradient(90deg, rgba(157, 78, 221, 0.1), transparent);">
            <div class="flex items-center gap-6">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: var(--bg-surface-elevated); border: 2px solid var(--primary); display: flex; align-items: center; justify-content: center; font-size: 2rem;">👤</div>
                <div>
                    <h2 class="text-xl"><?= htmlspecialchars($_SESSION['username']) ?></h2>
                    <p class="text-sm text-subtle"><?= htmlspecialchars(ucfirst($_SESSION['role'])) ?> Account</p>
                </div>
            </div>
        </div>

        <h3 class="mb-4 text-xl">Purchased Assignments</h3>
        <?php if (empty($purchases)): ?>
            <p class="text-muted">You haven't purchased any assignments yet. <a href="store.php" class="text-primary hover:text-main">Browse Store</a></p>
        <?php else: ?>
            <div class="grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
                <?php foreach ($purchases as $item): ?>
                    <div class="card glass-panel" style="border-color: rgba(0, 245, 255, 0.3);">
                        <div class="card-img" style="height: 120px; background: linear-gradient(45deg, #1f4037, #99f2c8);"></div>
                        <div class="card-content" style="padding: 1.25rem;">
                            <div class="badge inline-block px-2 py-1 text-xs mb-2" style="background: rgba(0,255,0,0.1); color: #4ade80;">Purchased</div>
                            <h3 class="mb-2 text-lg"><?= htmlspecialchars($item['title']) ?></h3>
                            <div class="mt-4">
                                <a href="#" class="btn btn-secondary w-full text-sm block text-center" style="border-color: var(--secondary); color: var(--secondary);">Download Resource</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

<?php require_once 'includes/footer.php'; ?>
