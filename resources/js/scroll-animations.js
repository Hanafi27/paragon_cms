/**
 * WordPress-Style Scroll Animations
 * Global animation handler untuk semua halaman dengan optimasi performa
 */

(function() {
    'use strict';

    // Konfigurasi observer yang optimal untuk WordPress-like smoothness
    const observerOptions = {
        threshold: [0, 0.15],
        rootMargin: '0px 0px -80px 0px'
    };

    // Buat Intersection Observer dengan performance optimization
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Hapus border debug jika ada
                entry.target.style.border = '';
                // Tambahkan delay bertingkat jika ada data-delay
                const delay = parseInt(entry.target.getAttribute('data-delay') || '0', 10);
                setTimeout(() => {
                    requestAnimationFrame(() => {
                        entry.target.classList.add('animate-in');
                    });
                }, delay);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Fungsi untuk initialize scroll animations
    function initScrollAnimations() {
        // Query semua jenis animasi termasuk review cards
        const animateElements = document.querySelectorAll(
            '.animate-fade-up, .animate-fade-left, .animate-fade-right, ' +
            '.animate-scale-in, .animate-stagger, .animate-on-scroll, ' +
            '.animate-slide-left, .animate-slide-right, .review-card, .carousel-item'
        );
        
        // Observe setiap element
        animateElements.forEach(element => {
            // Observe hanya element yang belum teranimate
            if (!element.classList.contains('animate-in')) {
                observer.observe(element);
            }
        });
    }

    // Initialize berdasarkan document state dengan optimal timing
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            requestAnimationFrame(initScrollAnimations);
        });
    } else {
        // Gunakan requestAnimationFrame untuk smooth initialization
        requestAnimationFrame(initScrollAnimations);
    }

    // Export untuk digunakan secara global jika diperlukan
    window.scrollAnimations = {
        init: initScrollAnimations,
        observer: observer
    };

})();
