@extends('layouts.app')

@section('title', 'Detail Produk - Company Profile')

@section('content')
<section class="bg-white py-8 sm:py-12 overflow-x-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <!-- Breadcrumb & Back -->
        <div class="flex items-center justify-between gap-4 animate-fade-left mb-6">
            <a href="{{ route('products') }}"
                class="inline-flex items-center gap-2 text-accent hover:text-accent-dark transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span class="font-medium">Kembali ke Produk</span>
            </a>
            <div class="text-xs sm:text-sm text-neutral">Home / Produk / Detail</div>
        </div>

        <!-- Hero Detail -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-start">
            <div class="space-y-3 sm:space-y-4 animate-fade-right">
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full bg-accent-soft text-primary text-xs font-semibold">{{ $product->category ?? 'Kategori Produk' }}</span>
                <h1 class="font-heading text-2xl sm:text-3xl lg:text-4xl font-semibold text-primary leading-tight">Nama
                    {{ $product->name }}</h1>
                <p class="text-neutral text-sm sm:text-base leading-relaxed">
                    {{ $product->description ?? '-' }}</p>
                <div class="flex flex-wrap gap-2 sm:gap-3 pt-1 sm:pt-2">
                    <span
                        class="px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg sm:rounded-xl bg-white border border-neutral-border text-xs sm:text-sm text-primary shadow-sm">Kode:
                        {{ $product->code ?? '-' }}</span>
                    <span
                        class="px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg sm:rounded-xl bg-white border border-neutral-border text-xs sm:text-sm text-emerald-600 shadow-sm">Stok:
                        {{ $product->stock ?? '-' }}</span>
                    <span
                        class="px-2 sm:px-3 py-1.5 sm:py-2 rounded-lg sm:rounded-xl bg-white border border-neutral-border text-xs sm:text-sm text-primary shadow-sm">Sertifikasi:
                        {{ $product->certification ?? '-' }}</span>
                </div>
                <div class="flex flex-wrap gap-2 sm:gap-3 pt-2 sm:pt-3">
                    <a href="{{ route('products') }}"
                        class="px-4 sm:px-5 py-2 sm:py-3 text-sm sm:text-base border border-primary text-primary rounded-lg sm:rounded-xl transition-all duration-300 hover:bg-primary hover:text-white">Lihat
                        Produk Lain</a>
                </div>
            </div>

            <div class="animate-fade-up">
                <button type="button" data-main-preview
                        data-src="{{ $product->main_image ? asset('storage/' . $product->main_image) : '' }}"
                        class="relative w-full aspect-[4/3] overflow-hidden rounded-2xl shadow-lg bg-neutral-light border border-neutral-border group">
                        @if($product->main_image)
                            <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-400">Tidak ada gambar utama</div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-accent/8 to-neutral-light pointer-events-none"></div>
                       
                        <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">
                        </div>
                    </button>
            </div>
        </div>

        <!-- Specs & Highlights removed for clean layout -->

        <!-- Gallery -->
        <!-- Purchase Options removed for clean layout -->

        <div
            class="mt-10 sm:mt-12 bg-white rounded-xl sm:rounded-2xl shadow-lg border border-neutral-border p-4 sm:p-6 animate-fade-up">
            <div class="flex items-center justify-between mb-3 sm:mb-4">
                <h3 class="font-heading text-lg sm:text-xl text-primary">Galeri Produk</h3>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-3">
                @forelse($product->galleries as $gallery)
                    <button type="button" data-gallery-item
                        data-src="{{ asset('storage/' . $gallery->image_path) }}"
                        class="relative overflow-hidden rounded-xl border border-neutral-border bg-neutral-light aspect-square focus:outline-none focus:ring-2 focus:ring-accent">
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="Galeri" class="w-full h-full object-cover">
                    </button>
                @empty
                    <div class="col-span-4 text-center text-slate-400 py-8">Tidak ada galeri produk.</div>
                @endforelse
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const lightbox = document.createElement('div');
        lightbox.id = 'lightbox-overlay';
        lightbox.className =
            'fixed inset-0 bg-black/70 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300 z-50 flex items-center justify-center px-4';
        lightbox.innerHTML = `
                <div class="relative max-w-4xl w-full animate-scale-in">
                    <button type="button" data-close class="absolute -top-10 right-0 text-white/80 hover:text-white transition-colors" aria-label="Tutup">
                        ✕
                    </button>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-2xl border border-neutral-border">
                        <div class="bg-neutral-light">
                            <img data-lightbox-img src="" alt="Pratinjau" class="w-full h-full max-h-[80vh] object-contain">
                        </div>
                    </div>
                </div>
            `;
        document.body.appendChild(lightbox);

        const overlay = lightbox;
        const imgEl = lightbox.querySelector('[data-lightbox-img]');
        const closeBtn = lightbox.querySelector('[data-close]');

        const placeholderSrc =
            "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='1200' height='800'><rect width='100%' height='100%' fill='%23f5f7fb'/><text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle' fill='%23606c88' font-size='32' font-family='Arial'>Pratinjau Produk</text></svg>";

        function openLightbox(src) {
            if (!src) return;
            imgEl.src = src || placeholderSrc;
            overlay.classList.remove('pointer-events-none');
            requestAnimationFrame(() => {
                overlay.classList.add('opacity-100');
            });
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
            overlay.addEventListener('transitionend', function handler() {
                overlay.classList.add('pointer-events-none');
                overlay.removeEventListener('transitionend', handler);
            });
            document.body.style.overflow = '';
        }

        closeBtn.addEventListener('click', closeLightbox);
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) closeLightbox();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeLightbox();
        });

        // Main preview click
        const mainPreview = document.querySelector('[data-main-preview]');
        if (mainPreview) {
            mainPreview.addEventListener('click', () => {
                    const src = mainPreview.getAttribute('data-src') || mainPreview.querySelector('img')?.src || placeholderSrc;
                openLightbox(src);
            });
        }

        // Gallery items (limit display to first 4 via markup; script handles any count)
        const galleryItems = document.querySelectorAll('[data-gallery-item]');
        galleryItems.forEach((btn) => {
            btn.addEventListener('click', () => {
                    const src = btn.getAttribute('data-src') || btn.querySelector('img')?.src || placeholderSrc;
                openLightbox(src);
            });
        });
    });
</script>
@endsection

@section('footer')
@include('partials.footer')
@endsection