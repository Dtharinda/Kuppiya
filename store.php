<?php
require_once 'config.php';
require_once 'includes/header.php';
?>

    <div class="container" style="flex: 1; margin-top: 100px; display: flex; gap: 2rem;">
        
        <!-- Sidebar Filters -->
        <aside class="glass-panel animate-slideUp delay-100" style="width: 280px; padding: 1.5rem; height: fit-content; position: sticky; top: 100px;">
            <h3 class="mb-4 text-xl">Filters</h3>
            
            <div class="input-group">
                <label class="form-label">Search</label>
                <input type="text" class="form-input" placeholder="Search assignments..." id="search-input">
            </div>
            
            <div class="mt-4 mb-2 form-label">Category</div>
            <div class="flex flex-col gap-2">
                <label class="flex items-center gap-2 cursor-pointer text-sm text-muted hover:text-main">
                    <input type="checkbox" checked> Computer Science
                </label>
                <label class="flex items-center gap-2 cursor-pointer text-sm text-muted hover:text-main">
                    <input type="checkbox"> Business
                </label>
            </div>

            <button class="btn btn-primary w-full mt-6" style="padding: 0.5rem;">Apply Filters</button>
        </aside>

        <!-- Main Product Grid -->
        <main style="flex: 1;" class="animate-slideUp delay-200">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl">Browse Assignments</h1>
            </div>

            <div class="grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem;">
                
                <?php
                $stmt = $pdo->query("SELECT a.*, u.username as author_name FROM assignments a LEFT JOIN users u ON a.author_id = u.id");
                while ($row = $stmt->fetch()):
                ?>
                <div class="card hover-lift glass-panel">
                    <div class="card-img" style="height: 160px; background: linear-gradient(45deg, #2b1055, #7597de); position: relative;">
                        <div style="position: absolute; bottom: 10px; left: 10px; background: rgba(0,0,0,0.6); backdrop-filter: blur(4px); padding: 5px 10px; border-radius: 4px; font-size: 0.8rem; font-weight: 600;">$<?= number_format($row['price'], 2) ?></div>
                    </div>
                    <div class="card-content" style="padding: 1.25rem;">
                        <span class="text-xs text-secondary mb-1 block"><?= htmlspecialchars($row['category']) ?></span>
                        <h3 class="mb-2 text-lg"><?= htmlspecialchars($row['title']) ?></h3>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-xs text-subtle">By: <?= htmlspecialchars($row['author_name'] ?? 'System') ?></span>
                            <a href="assignment.php?id=<?= $row['id'] ?>" class="btn btn-primary" style="padding: 0.4rem 0.8rem; font-size: 0.85rem;">View</a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>

            </div>
        </main>
    </div>

<?php require_once 'includes/footer.php'; ?>
