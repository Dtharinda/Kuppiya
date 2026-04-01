<?php
require_once 'config.php';

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT a.*, u.username as author_name FROM assignments a LEFT JOIN users u ON a.author_id = u.id WHERE a.id = ?");
$stmt->execute([$id]);
$assignment = $stmt->fetch();

if (!$assignment) {
    $_SESSION['error'] = "Assignment not found.";
    header("Location: store.php");
    exit;
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
                    <?php if (empty($assignment['download_password'])): ?>
                        <button class="btn btn-secondary w-full" disabled style="padding: 1.25rem;">Download Unavailable (Password Used)</button>
                    <?php else: ?>
                        <button class="btn btn-primary animate-pulse w-full" id="btn-download-trigger" style="padding: 1.25rem; font-size: 1.1rem;">Download Document</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Download Password Modal -->
    <div class="modal-overlay" id="download-modal">
        <div class="modal card glass-panel" style="padding: 2.5rem;">
            <button class="modal-close" id="close-download-modal">&times;</button>
            <div class="text-center mb-6">
                <div style="width: 50px; height: 50px; background: rgba(0, 245, 255, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-size: 1.5rem; border: 1px solid var(--secondary);">🔐</div>
                <h3 class="text-2xl">Enter Password</h3>
                <p class="text-xs text-subtle mt-2">Please enter the one-time download password provided by the instructor.</p>
            </div>
            
            <form action="processes/download.php" method="POST">
                <input type="hidden" name="assignment_id" value="<?= $id ?>">
                <div class="input-group">
                    <label class="form-label">Download Password</label>
                    <input type="text" name="password" class="form-input" placeholder="Enter password..." required>
                </div>
                <button type="submit" class="btn btn-primary w-full mt-4" style="padding: 0.8rem;">Confirm & Download</button>
            </form>
        </div>
    </div>

    <script>
        const downloadTrigger = document.getElementById('btn-download-trigger');
        const downloadModal = document.getElementById('download-modal');
        const closeDownloadModal = document.getElementById('close-download-modal');

        if (downloadTrigger) {
            downloadTrigger.addEventListener('click', () => {
                downloadModal.classList.add('active');
            });
        }
        
        if (closeDownloadModal) {
            closeDownloadModal.addEventListener('click', () => {
                downloadModal.classList.remove('active');
            });
            downloadModal.addEventListener('click', (e) => {
                if (e.target === downloadModal) {
                    downloadModal.classList.remove('active');
                }
            });
        }
    </script>

<?php require_once 'includes/footer.php'; ?>
