<?php
// includes/footer.php
?>
    <!-- Footer -->
    <footer style="border-top: 1px solid var(--border); padding: 3rem 0; margin-top: 4rem; background: rgba(0,0,0,0.2);">
        <div class="container flex justify-between items-center" style="flex-wrap: wrap;">
            <div class="mb-4">
                <h3 class="logo text-gradient mb-2" id="footer-logo">Kuppiya</h3>
                <p class="text-muted text-sm">Empowering students through shared knowledge.</p>
            </div>
            <div class="flex gap-4 text-sm text-subtle">
                <a href="#" class="hover:text-main">Terms</a>
                <a href="#" class="hover:text-main">Privacy Policy</a>
                <a href="#" class="hover:text-main">Contact</a>
            </div>
            <div class="w-full mt-4 text-center text-subtle text-xs" style="margin-top: 2rem;">
                &copy; <?= date('Y'); ?> Kuppiya. All rights reserved.
            </div>
        </div>
    </footer>

    <script src="<?php echo defined('ASSET_PATH') ? ASSET_PATH : './'; ?>js/app.js"></script>
</body>
</html>
