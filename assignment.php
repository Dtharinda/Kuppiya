<?php
require_once 'config.php';

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT a.*, u.username as author_name FROM assignments a LEFT JOIN users u ON a.author_id = u.id WHERE a.id = ?");
$stmt->execute([$id]);
$assignment = $stmt->fetch();

if (!$assignment) {
    die("Assignment not found.");
}

require_once 'includes/header.php';
?>

    <div class="container animate-slideUp" style="margin-top: 100px; padding-bottom: 5rem;">
        <a href="store.php" class="text-muted hover:text-main text-sm mb-6 inline-block">← Back to Store</a>

        <div class="grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start;">
            <!-- Left: Media/Preview -->
            <div class="glass-panel" style="padding: 1.5rem; border-radius: 20px;">
                <div style="background: linear-gradient(45deg, #2b1055, #7597de); height: 400px; border-radius: 12px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                    <span style="font-size: 4rem; opacity: 0.5;">📄</span>
                    <div style="position: absolute; top: 1rem; right: 1rem;" class="badge glass-panel px-3 py-1 text-sm">PDF/ZIP</div>
                </div>
            </div>

            <!-- Right: Details -->
            <div>
                <div class="badge glass-panel inline-block px-3 py-1 text-xs text-secondary mb-4" style="color: var(--secondary)"><?= htmlspecialchars($assignment['category']) ?></div>
                <h1 class="text-3xl mb-2"><?= htmlspecialchars($assignment['title']) ?></h1>
                <p class="text-muted mb-4">By <?= htmlspecialchars($assignment['author_name'] ?? 'System') ?> &bull; Uploaded on <?= date('M d, Y', strtotime($assignment['created_at'])) ?></p>

                <div class="text-4xl text-gradient font-bold mb-6">$<?= number_format($assignment['price'], 2) ?></div>

                <p class="mb-6 text-sm leading-relaxed" style="color: #cbd5e1;">
                    <?= nl2br(htmlspecialchars($assignment['description'])) ?>
                </p>

                <div class="flex gap-4 mb-8">
                    <button class="btn btn-primary animate-pulse" style="flex: 1; padding: 1.25rem;">Add to Cart</button>
                    <button class="btn btn-secondary" style="padding: 1.25rem;"><span style="font-size: 1.2rem;">Bookmark 🔖</span></button>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
