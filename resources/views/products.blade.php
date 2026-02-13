@extends('layouts.app')

@section('title', 'Produk - Company Profile')

@section('content')
    <section class="bg-white py-16 sm:py-20 relative overflow-hidden">
        <!-- Background Accents -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-10 right-1/4 w-80 h-80 bg-accent/5 rounded-full blur-3xl"></div>
            <div class="absolute top-1/3 -left-32 w-96 h-96 bg-primary/4 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 right-10 w-72 h-72 bg-accent-soft/30 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Back to Home Button -->
            <div class="mb-8 sm:mb-10 animate-fade-left">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-4 py-2 text-accent hover:text-accent-dark transition-colors duration-300 hover:underline underline-offset-4">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="font-medium">Kembali ke Beranda</span>
                </a>
            </div>

            <div class="text-center mb-10 sm:mb-12 animate-fade-up">
                <h2 class="font-heading text-2xl sm:text-3xl md:text-4xl font-medium text-primary mb-3 tracking-heading">
                    Produk Kami
                </h2>
                <div class="h-1 w-16 bg-accent mx-auto mb-4"></div>
                <p class="text-neutral max-w-2xl mx-auto leading-body text-sm sm:text-base">
                    Pilihan produk farmasi berkualitas untuk mendukung pelayanan kesehatan yang lebih baik. Desain minimalis, fokus pada informasi penting.
                </p>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 mb-8 sm:mb-12 px-2 sm:px-0">
                <button type="button" data-filter="all" class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 rounded-xl border border-accent-soft bg-accent-soft text-primary text-xs sm:text-sm font-medium hover:border-accent hover:text-accent transition-all">
                    Semua
                </button>
                <button type="button" data-filter="obat" class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 rounded-xl border border-accent-soft bg-accent-soft text-primary text-xs sm:text-sm font-medium hover:border-accent hover:text-accent transition-all">
                    Obat
                </button>
                <button type="button" data-filter="alat" class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 rounded-xl border border-accent-soft bg-accent-soft text-primary text-xs sm:text-sm font-medium hover:border-accent hover:text-accent transition-all">
                    Alat Kesehatan
                </button>
                <button type="button" data-filter="suplemen" class="inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 rounded-xl border border-accent-soft bg-accent-soft text-primary text-xs sm:text-sm font-medium hover:border-accent hover:text-accent transition-all">
                    Suplemen
                </button>
            </div>

            <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8 mb-0">
                @php $products = \App\Models\Product::with('galleries')->latest()->get(); @endphp
                @if($products->count() > 0)
                    @foreach($products as $product)
                        <div class="bg-neutral-lighter border border-neutral-border rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col h-full min-h-96 animate-stagger">
                            <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover object-center">
                            <div class="p-6 md:p-7 space-y-4 flex flex-col flex-grow">
                                <div class="flex items-center justify-between w-full">
                                    <h3 class="font-heading text-lg font-medium text-primary">{{ $product->name }}</h3>
                                    <span class="px-2 py-1 rounded-xl bg-accent-soft text-primary text-xs">{{ $product->category ?: '-' }}</span>
                                </div>
                                <div class="text-xs text-slate-500">Kode: <span class="font-mono">{{ $product->code ?: '-' }}</span></div>
                                <div class="text-xs text-emerald-600">Stok: {{ $product->stock ?: '-' }}</div>
                                <div class="flex items-center justify-between pt-3 mt-auto">
                                    <span class="text-primary text-sm font-medium">{{ $product->stock ?: '-' }}</span>
                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="px-4 py-2 bg-accent text-white rounded-xl transition-all duration-300 hover:bg-accent-dark">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-span-full text-center text-slate-400 py-16 flex flex-col items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <div class="text-lg">Belum ada produk tersedia.</div>
                    </div>
                @endif
            </div>

            <div id="pagination" class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 px-4 sm:px-0 mt-10 sm:mt-12">
                <button type="button" data-page="prev" class="px-3 py-2 sm:px-4 sm:py-2 rounded-xl border border-neutral-border text-xs sm:text-sm text-primary bg-white hover:border-accent hover:text-accent transition-all">
                    Sebelumnya
                </button>
                <div id="pagination-pages" class="flex items-center gap-1 sm:gap-2 "></div>
                <button type="button" data-page="next" class="px-3 py-2 sm:px-4 sm:py-2 rounded-xl border border-neutral-border text-xs sm:text-sm text-primary bg-white hover:border-accent hover:text-accent transition-all">
                    Selanjutnya
                </button>
            </div>
        </div>
    </section>
@endsection

@section('footer')
@include('partials.footer')
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var perPage = 6;
        var currentCategory = 'all';
        var currentPage = 1;

        var grid = document.getElementById('product-grid');
        if (!grid) {
            return;
        }

        var cards = Array.prototype.slice.call(grid.querySelectorAll('[data-product-card]'));
        var filterButtons = Array.prototype.slice.call(document.querySelectorAll('[data-filter]'));
        var triggerButtons = Array.prototype.slice.call(document.querySelectorAll('[data-filter-trigger]'));
        var pagination = document.getElementById('pagination');
        var paginationPages = document.getElementById('pagination-pages');

        function setActiveFilterButton() {
            filterButtons.forEach(function (btn) {
                var isActive = btn.getAttribute('data-filter') === currentCategory || (currentCategory === 'all' && btn.getAttribute('data-filter') === 'all');
                if (isActive) {
                    btn.classList.add('border-accent', 'text-accent');
                } else {
                    btn.classList.remove('border-accent', 'text-accent');
                }
            });
        }

        function getFilteredCards() {
            if (currentCategory === 'all') {
                return cards;
            }
            return cards.filter(function (card) {
                return card.getAttribute('data-category') === currentCategory;
            });
        }

        function renderPagination(totalItems) {
            var totalPages = Math.max(1, Math.ceil(totalItems / perPage));
            if (currentPage > totalPages) {
                currentPage = totalPages;
            }

            paginationPages.innerHTML = '';

            for (var i = 1; i <= totalPages; i++) {
                var btn = document.createElement('button');
                btn.type = 'button';
                btn.textContent = i;
                btn.setAttribute('data-page-number', String(i));
                btn.className = 'px-3 py-2 rounded-full text-sm border border-neutral-border bg-white text-primary hover:border-accent hover:text-accent transition-all';
                if (i === currentPage) {
                    btn.classList.add('border-accent', 'text-accent');
                }
                paginationPages.appendChild(btn);
            }

            var prevButton = pagination.querySelector('[data-page="prev"]');
            var nextButton = pagination.querySelector('[data-page="next"]');

            if (prevButton) {
                prevButton.disabled = currentPage === 1;
                prevButton.classList.toggle('opacity-50', currentPage === 1);
                prevButton.classList.toggle('cursor-not-allowed', currentPage === 1);
            }
            if (nextButton) {
                nextButton.disabled = currentPage === totalPages;
                nextButton.classList.toggle('opacity-50', currentPage === totalPages);
                nextButton.classList.toggle('cursor-not-allowed', currentPage === totalPages);
            }
        }

        function renderGrid() {
            var filtered = getFilteredCards();
            var start = (currentPage - 1) * perPage;
            var end = start + perPage;

            cards.forEach(function (card) {
                card.classList.add('hidden');
            });

            filtered.slice(start, end).forEach(function (card) {
                card.classList.remove('hidden');
            });

            renderPagination(filtered.length);
            setActiveFilterButton();
        }

        filterButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var category = btn.getAttribute('data-filter');
                currentCategory = category || 'all';
                currentPage = 1;
                renderGrid();
            });
        });

        triggerButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var category = btn.getAttribute('data-filter-trigger');
                currentCategory = category || 'all';
                currentPage = 1;
                renderGrid();
            });
        });

        pagination.addEventListener('click', function (event) {
            var target = event.target;
            if (!(target instanceof HTMLElement)) {
                return;
            }

            var pageType = target.getAttribute('data-page');
            if (pageType === 'prev') {
                if (currentPage > 1) {
                    currentPage -= 1;
                    renderGrid();
                }
                return;
            }
            if (pageType === 'next') {
                var filtered = getFilteredCards();
                var totalPages = Math.max(1, Math.ceil(filtered.length / perPage));
                if (currentPage < totalPages) {
                    currentPage += 1;
                    renderGrid();
                }
                return;
            }

            var pageNumber = target.getAttribute('data-page-number');
            if (pageNumber) {
                currentPage = parseInt(pageNumber, 10) || 1;
                renderGrid();
            }
        });

        renderGrid();
    });

    // Initialize Scroll Animations
    (function() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    requestAnimationFrame(() => {
                        entry.target.classList.add('animate-in');
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        function initScrollAnimations() {
            const animateElements = document.querySelectorAll(
                '.animate-fade-up, .animate-fade-left, .animate-fade-right, ' +
                '.animate-scale-in, .animate-stagger, .animate-slide-left, .animate-slide-right'
            );
            animateElements.forEach(element => {
                if (!element.classList.contains('animate-in')) {
                    observer.observe(element);
                }
            });
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initScrollAnimations);
        } else {
            requestAnimationFrame(initScrollAnimations);
        }
    })();
</script>
@endpush
