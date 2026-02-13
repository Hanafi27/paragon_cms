@extends('layouts.app')

@section('title', 'Galeri')

{{-- Gallery data is now from $images passed by controller --}}

@section('content')
<section class="max-w-7xl mx-auto px-4 py-12 pt-20 md:pt-24 mt-6">
    <h1 class="text-3xl md:text-4xl font-bold mb-2 text-center">Galeri Perusahaan</h1>
    <p class="text-center text-neutral-600 mb-8 max-w-2xl mx-auto">Galeri ini menampilkan aktivitas kerja PT. Paragon Medika Pharma</p>
    <div id="gallery-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
        @foreach($images as $idx => $img)
            <img src="{{ asset('storage/' . $img->image_path) }}" alt="{{ $img->caption }}"
                class="w-full h-48 sm:h-56 md:h-64 object-cover rounded-xl cursor-pointer transition-transform duration-200 hover:scale-105"
                loading="lazy"
                style="transition: opacity 0.7s cubic-bezier(.4,0,.2,1), transform 0.7s cubic-bezier(.4,0,.2,1); transition-delay: {{ 0.08 * $idx }}s;"
                onclick="openGalleryModal({{ $img->id }})"
                onload="this.classList.add('gallery-fade-in')"
            >
        @endforeach
    </div>
</section>

<!-- Modal/Lightbox -->
<div id="gallery-modal" class="fixed inset-0 z-[100] bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4 md:p-8 opacity-0 transition-opacity duration-500" tabindex="-1" aria-modal="true" role="dialog" style="transition: background 0.2s;">
    <button id="gallery-close" onclick="closeGalleryModal()" class="absolute right-4 top-4 z-30 bg-black/80 hover:bg-black/90 rounded-full p-2 transition-colors shadow-lg flex items-center justify-center" style="width:36px;height:36px;" aria-label="Tutup">
        <svg class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="white"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
    </button>
    <div class="flex flex-col items-center justify-center w-full max-w-md">
        <div class="relative w-full flex items-center justify-center">
            <button id="gallery-prev" onclick="galleryPrev()" class="absolute left-0 top-1 z-30 text-white bg-black/30 hover:bg-black/60 rounded-full p-2 transition-colors" aria-label="Sebelumnya" style="display:none;">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
            </button>
            <img id="gallery-modal-img" src="" alt="" class="max-h-80 max-w-xs sm:max-w-sm w-auto object-contain rounded-xl shadow-xl mb-4 mx-auto block">
            <button id="gallery-next" onclick="galleryNext()" class="absolute right-0 top-1 z-30 text-white bg-black/30 hover:bg-black/60 rounded-full p-2 transition-colors" aria-label="Berikutnya" style="display:none;">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
            </button>
        </div>
        <div id="gallery-modal-caption" class="text-center text-white font-semibold text-base mt-2"></div>
    </div>
</div>

<script>
const galleryData = @json($images);
let currentIdx = 0;

function openGalleryModal(idx) {
    currentIdx = galleryData.findIndex(img => img.id === idx);
    updateGalleryModal();
    const modal = document.getElementById('gallery-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    setTimeout(() => {
        modal.classList.add('opacity-100');
    }, 10);
    document.body.style.overflow = 'hidden';
    modal.focus();
    // Tampilkan/hide tombol next/prev jika gambar > 1
    const prevBtn = document.getElementById('gallery-prev');
    const nextBtn = document.getElementById('gallery-next');
    if (galleryData.length > 1) {
        prevBtn.style.display = 'block';
        nextBtn.style.display = 'block';
    } else {
        prevBtn.style.display = 'none';
        nextBtn.style.display = 'none';
    }
    // ESC, panah kiri/kanan hanya aktif saat modal terbuka
    if (!window.galleryKeyListener) {
        window.galleryKeyListener = function(e) {
            if (modal.classList.contains('hidden')) return;
            if (e.key === 'ArrowLeft') galleryPrev();
            if (e.key === 'ArrowRight') galleryNext();
            if (e.key === 'Escape') closeGalleryModal();
        };
        document.addEventListener('keydown', window.galleryKeyListener);
    }
}

function closeGalleryModal() {
    const modal = document.getElementById('gallery-modal');
    modal.classList.remove('opacity-100');
    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }, 400);
    if (window.galleryKeyListener) {
        document.removeEventListener('keydown', window.galleryKeyListener);
        window.galleryKeyListener = null;
    }
}

function galleryPrev() {
    currentIdx = (currentIdx - 1 + galleryData.length) % galleryData.length;
    updateGalleryModal();
}

function galleryNext() {
    currentIdx = (currentIdx + 1) % galleryData.length;
    updateGalleryModal();
}

function updateGalleryModal() {
    const img = galleryData[currentIdx];
    const modalImg = document.getElementById('gallery-modal-img');
    const modalCaption = document.getElementById('gallery-modal-caption');
    modalImg.src = '/storage/' + img.image_path;
    modalImg.alt = img.caption;
    modalCaption.textContent = img.caption;
}

document.getElementById('gallery-modal').addEventListener('click', function(e) {
    if (e.target === this) closeGalleryModal();
});
</script>
<style>
.gallery-fade-in {
    opacity: 1 !important;
    transform: translateY(0) !important;
    transition: opacity 0.7s cubic-bezier(.4,0,.2,1), transform 0.7s cubic-bezier(.4,0,.2,1);
}
</style>
<script>
    document.getElementById('gallery-modal').addEventListener('click', function(e) {
    if (e.target === this) closeGalleryModal();
</script>
</script>
@include('partials.footer')
@endsection
