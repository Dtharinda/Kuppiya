<?php
require_once 'config.php';
require_once 'includes/header.php';
?>

    <!-- Background Elements -->
    <div class="gradient-blob blob-primary" style="top: -100px; left: -100px;"></div>
    <div class="gradient-blob blob-secondary" style="top: 20%; right: -50px;"></div>

    <!-- Hero Section -->
    <header class="container" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; position: relative;">
        <div class="text-center animate-slideUp" style="max-width: 800px; z-index: 1;">
            <div class="badge glass-panel mb-4 inline-block px-4 py-2 text-sm text-primary" style="padding: 0.5rem 1rem; border-radius: 99px; display: inline-block; color: var(--secondary)">
                ✨ The #1 Platform for Academic Assets
            </div>
            <h1 class="mb-4" id="hero-title">Unlock Your Academic Potential with <span class="text-gradient">Kuppiya</span></h1>
            <p class="text-muted mb-8 text-lg" style="font-size: 1.25rem;">
                Browse, preview, and purchase high-quality assignments instantly. We provide the best resources to help you excel in your studies without the hassle.
            </p>
            <div class="flex justify-center gap-4">
                <a href="store.php" class="btn btn-primary animate-pulse" style="font-size: 1.1rem; padding: 1rem 2rem;" id="hero-btn-explore">Explore Store</a>
                <a href="#how-it-works" class="btn btn-secondary" style="font-size: 1.1rem; padding: 1rem 2rem;" id="hero-btn-how">How it Works</a>
            </div>
        </div>
    </header>

    <!-- Featured Assignments Section -->
    <section class="container mt-8" id="featured-section" style="padding-top: 5rem; padding-bottom: 5rem;">
        <div class="flex justify-between items-center mb-8">
            <h2 id="featured-title">Featured <span class="text-gradient">Assignments</span></h2>
            <a href="store.php" class="text-muted hover:text-main" style="transition: color 0.3s;" id="view-all-link">View All →</a>
        </div>

        <div class="grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
            
            <?php
            // Fetch latest 3 assignments from DB
            $stmt = $pdo->query("SELECT a.*, u.username as author_name FROM assignments a LEFT JOIN users u ON a.author_id = u.id ORDER BY a.created_at DESC LIMIT 3");
            while ($row = $stmt->fetch()):
            ?>
            <!-- Dynamic Card -->
            <div class="card hover-lift glass-panel">
                <div class="card-img" style="height: 200px; background: linear-gradient(45deg, #2b1055, #7597de); position: relative; overflow: hidden;">
                    <div style="position: absolute; bottom: 10px; left: 10px; background: rgba(0,0,0,0.6); backdrop-filter: blur(4px); padding: 5px 10px; border-radius: 4px; font-size: 0.8rem; font-weight: 600;">$<?= number_format($row['price'], 2) ?></div>
                </div>
                <div class="card-content" style="padding: 1.5rem;">
                    <h3 class="mb-2 text-xl" style="font-size: 1.25rem; font-weight: 600;"><?= htmlspecialchars($row['title']) ?></h3>
                    <p class="text-muted mb-4 text-sm"><?= htmlspecialchars(substr($row['description'], 0, 80)) ?>...</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-subtle">By: <?= htmlspecialchars($row['author_name'] ?? 'Unknown Formator') ?></span>
                        <a href="assignment.php?id=<?= $row['id'] ?>" class="btn btn-primary" style="padding: 0.5rem 1rem; font-size: 0.9rem;">View Details</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>

        </div>
    </section>

    <!-- How it Works -->
    <section id="how-it-works" class="container mt-8" style="padding-top: 5rem; padding-bottom: 5rem; position: relative;">
        <div class="gradient-blob blob-primary" style="top: 0; right: 20%; width: 250px; height: 250px; opacity: 0.3;"></div>
        
        <div class="text-center mb-8">
            <h2 id="how-title">How <span class="text-gradient">Kuppiya</span> Works</h2>
            <p class="text-muted mt-2">Simple, fast, and secure process.</p>
        </div>

        <div class="grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem;">
            <div class="card glass-panel text-center" style="padding: 2rem;">
                <div style="width: 60px; height: 60px; background: rgba(157, 78, 221, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 1.5rem; border: 1px solid var(--primary);">🔍</div>
                <h3>1. Search</h3>
                <p class="text-muted mt-2 text-sm">Find exactly what you need using our advanced filtering and search tools.</p>
            </div>
            <div class="card glass-panel text-center" style="padding: 2rem;">
                <div style="width: 60px; height: 60px; background: rgba(0, 245, 255, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 1.5rem; border: 1px solid var(--secondary);">💳</div>
                <h3>2. Purchase</h3>
                <p class="text-muted mt-2 text-sm">Review details and smoothly check out using our secure payment gateways.</p>
            </div>
            <div class="card glass-panel text-center" style="padding: 2rem;">
                <div style="width: 60px; height: 60px; background: rgba(157, 78, 221, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 1.5rem; border: 1px solid var(--primary);">🚀</div>
                <h3>3. Excel</h3>
                <p class="text-muted mt-2 text-sm">Download your premium assets instantly and ace your coursework.</p>
            </div>
        </div>
    </section>

<?php require_once 'includes/footer.php'; ?>
