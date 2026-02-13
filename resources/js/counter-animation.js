/**
 * Counter Animation
 * Animasi penghitung untuk menampilkan statistik dengan efek smooth
 */

(function() {
    /**
     * Animate counter from 0 to target number
     */
    function animateCounter(id, target, duration = 4500) {
        const element = document.getElementById(id);
        if (!element) return;

        let start = 0;
        const increment = target / (duration / 16); // asumsi ~60fps
        
        const counter = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.innerText = target.toLocaleString(); // format angka ribuan
                clearInterval(counter);
            } else {
                element.innerText = Math.floor(start).toLocaleString();
            }
        }, 16);
    }

    // Run animation when page is ready
    function initCounterAnimation() {
        animateCounter('mitra-counter', 1945);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCounterAnimation);
    } else {
        initCounterAnimation();
    }
})();
