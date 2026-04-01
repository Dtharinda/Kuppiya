<?php
require_once 'config.php';
require_once 'includes/header.php';
?>

    <div class="gradient-blob blob-primary" style="top: 10%; left: -5%;"></div>
    <div class="gradient-blob blob-secondary" style="top: 60%; right: -5%;"></div>

    <div class="container animate-slideUp" style="margin-top: 120px; padding-bottom: 5rem; min-height: 70vh;">
        <div class="text-center mb-12">
            <h1 class="text-4xl mb-4">Get in <span class="text-gradient">Touch</span></h1>
            <p class="text-muted text-lg">We're here to help you ace your academics. Reach out via WhatsApp or email.</p>
        </div>

        <div class="grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; max-width: 1000px; margin: 0 auto; align-items: start;">
            
            <!-- Contact Info -->
            <div class="glass-panel" style="padding: 2.5rem;">
                <h3 class="text-2xl mb-6">Contact Information</h3>
                
                <div class="flex items-center gap-4 mb-6">
                    <div style="width: 50px; height: 50px; background: rgba(157, 78, 221, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; border: 1px solid var(--primary);">📧</div>
                    <div>
                        <div class="text-sm text-subtle">Email Us</div>
                        <a href="mailto:support@kuppiya.com" class="text-lg hover:text-main" style="color: var(--primary);">support@kuppiya.com</a>
                    </div>
                </div>

                <div class="flex items-center gap-4 mb-8">
                    <div style="width: 50px; height: 50px; background: rgba(37, 211, 102, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; border: 1px solid #25D366;">💬</div>
                    <div>
                        <div class="text-sm text-subtle">WhatsApp (Fastest Response)</div>
                        <a href="https://wa.me/94701234567" target="_blank" class="text-lg hover:text-main" style="color: #25D366;">+94 70 123 4567</a>
                    </div>
                </div>

                <a href="https://wa.me/94701234567" target="_blank" class="btn w-full" style="background: linear-gradient(135deg, #128C7E, #25D366); color: white; padding: 1rem; font-size: 1.1rem; border-radius: 99px;">
                    <span style="font-size: 1.3rem;">📱</span> Chat on WhatsApp
                </a>
            </div>

            <!-- Email Form -->
            <div class="glass-panel" style="padding: 2.5rem;">
                <h3 class="text-xl mb-6">Send a Message</h3>
                <form action="#" method="POST">
                    <div class="input-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-input" placeholder="Your Name" required>
                    </div>
                    <div class="input-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-input" placeholder="you@example.com" required>
                    </div>
                    <div class="input-group">
                        <label class="form-label">Message</label>
                        <textarea class="form-input" rows="4" placeholder="How can we help?" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-full mt-4" style="padding: 1rem;">Send Message</button>
                </form>
            </div>

        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
