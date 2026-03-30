<?php
require_once 'config.php';
require_once 'includes/header.php';
?>

    <div class="container animate-slideUp" style="margin-top: 100px; padding-bottom: 5rem; max-width: 1000px;">
        <h1 class="text-3xl mb-8">Your Cart</h1>

        <div class="grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 3rem;">
            <!-- Cart Items -->
            <div class="flex flex-col gap-4">
                <div class="glass-panel" style="padding: 1.5rem; display: flex; gap: 1.5rem; align-items: center;">
                    <div style="width: 100px; height: 80px; background: linear-gradient(45deg, #2b1055, #7597de); border-radius: 8px;"></div>
                    <div style="flex: 1;">
                        <h3 class="text-lg">Data Structures & Algorithms</h3>
                        <p class="text-sm text-subtle">Digital Download &bull; PDF/ZIP</p>
                    </div>
                    <div class="text-xl font-bold">$24.99</div>
                    <button class="btn btn-secondary text-sm" style="padding: 0.5rem; border-color: rgba(255,0,0,0.3); color: #ff6b6b;">✕</button>
                </div>
            </div>

            <!-- Summary Sidebar -->
            <div class="glass-panel" style="padding: 2rem; height: fit-content; position: sticky; top: 100px;">
                <h3 class="mb-6 text-xl">Order Summary</h3>
                <div class="flex justify-between mb-4 text-sm text-muted">
                    <span>Subtotal</span><span>$24.99</span>
                </div>
                <hr style="border-color: var(--border); margin: 1.5rem 0;">
                <div class="flex justify-between mb-8 text-xl font-bold">
                    <span>Total</span><span class="text-gradient">$24.99</span>
                </div>
                <button class="btn btn-primary w-full mt-4" style="padding: 1rem;">Checkout via Gateway (Mock)</button>
            </div>
        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
