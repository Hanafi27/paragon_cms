document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('reviews-carousel');
    const wrapper = document.getElementById('carousel-wrapper');
    const prevBtn = document.getElementById('reviews-prev');
    const nextBtn = document.getElementById('reviews-next');
    const dotsContainer = document.getElementById('pagination-dots');
    const items = Array.from(document.querySelectorAll('.carousel-item'));

    if (!carousel || !wrapper || items.length === 0) return;

    const GAP = 24;
    let currentIndex = 0;
    let isAnimating = false;

    function getCardWidth() {
        return items[0].getBoundingClientRect().width + GAP;
    }

    function getVisibleCount() {
        const wrapperWidth = wrapper.getBoundingClientRect().width;
        const cardWidth = getCardWidth();
        return Math.max(1, Math.floor(wrapperWidth / cardWidth));
    }

    function getMaxIndex() {
        const visibleCount = getVisibleCount();
        return Math.max(0, items.length - visibleCount);
    }

    function updateCarousel() {
        const cardWidth = getCardWidth();
        const maxIndex = getMaxIndex();

        if (currentIndex > maxIndex) {
            currentIndex = maxIndex;
        }
        if (currentIndex < 0) {
            currentIndex = 0;
        }

        const offset = -(currentIndex * cardWidth);
        carousel.style.transform = `translateX(${offset}px)`;

        // Update nav disabled
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex === maxIndex;

        updateDots();
    }

    function nextSlide() {
        if (isAnimating) return;
        const maxIndex = getMaxIndex();
        if (currentIndex >= maxIndex) return;

        isAnimating = true;
        currentIndex++;
        updateCarousel();
        setTimeout(() => (isAnimating = false), 500);
    }

    function prevSlide() {
        if (isAnimating) return;
        if (currentIndex <= 0) return;

        isAnimating = true;
        currentIndex--;
        updateCarousel();
        setTimeout(() => (isAnimating = false), 500);
    }

    function renderDots() {
        dotsContainer.innerHTML = '';
        const visibleCount = getVisibleCount();
        const totalPages = Math.ceil(items.length / visibleCount);

        for (let i = 0; i < totalPages; i++) {
            const dot = document.createElement('button');
            dot.className = 'pagination-dot w-3 h-3 rounded-full bg-neutral-400 transition-all duration-300';
            dot.dataset.index = i;
            dot.addEventListener('click', () => {
                currentIndex = i * visibleCount;
                updateCarousel();
            });
            dotsContainer.appendChild(dot);
        }
    }

    function updateDots() {
        const visibleCount = getVisibleCount();
        const page = Math.floor(currentIndex / visibleCount);
        const dots = dotsContainer.querySelectorAll('.pagination-dot');
        dots.forEach((d, i) => {
            d.classList.toggle('bg-accent', i === page);
            d.classList.toggle('bg-neutral-400', i !== page);
        });
    }

    prevBtn?.addEventListener('click', prevSlide);
    nextBtn?.addEventListener('click', nextSlide);

    // Swipe Support
    let startX = 0;
    wrapper.addEventListener('touchstart', (e) => {
        startX = e.changedTouches[0].screenX;
    });
    wrapper.addEventListener('touchend', (e) => {
        const endX = e.changedTouches[0].screenX;
        const diff = startX - endX;
        if (Math.abs(diff) > 50) {
            diff > 0 ? nextSlide() : prevSlide();
        }
    });

    // Resize
    window.addEventListener('resize', () => {
        renderDots();
        updateCarousel();
    });

    renderDots();
    updateCarousel();
});
