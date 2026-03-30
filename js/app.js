// --- Kuppiya Frontend Interactions ---

document.addEventListener('DOMContentLoaded', () => {

    // 1. Sticky Navbar Effect on Scroll
    const navbar = document.getElementById('navbar');
    if (navbar && !navbar.classList.contains('scrolled')) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    // 2. Scroll Animation Observer (Slide up effects)
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const animateOnScroll = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-slideUp');
                // Optional: Unobserve after animating once
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Add .animate-on-scroll class dynamically to elements we want to animate in viewport
    const featureCards = document.querySelectorAll('#featured-section .card');
    const howItWorksCards = document.querySelectorAll('#how-it-works .card');

    featureCards.forEach((el, index) => {
        el.style.opacity = '0';
        el.style.animationDelay = `${index * 0.15}s`;
        animateOnScroll.observe(el);
    });

    howItWorksCards.forEach((el, index) => {
        el.style.opacity = '0';
        el.style.animationDelay = `${index * 0.2}s`;
        animateOnScroll.observe(el);
    });

    // 3. Simple Cart Logic (Mock)
    // You could put logic here to handle localStorage cart interactions
    const buyButtons = document.querySelectorAll('[id^="buy-btn"]');
    buyButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            // e.preventDefault();
            // console.log('Item added to cart');
        });
    });

});
