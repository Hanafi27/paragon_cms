@extends('admin.layouts.cms')

@section('title', 'Kelola Gallery')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-[#a81d5d]">Kelola Gallery</h1>
        <p class="text-base text-neutral">Manajemen gambar dan media gallery website.</p>
    </div>
    <a href="{{ route('gallery.create') }}" class="px-5 py-2 rounded-lg bg-[#a81d5d] text-white hover:bg-[#a81d5d]/90 text-base font-semibold shadow-lg flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Gambar
    </a>
</div>
<div class="bg-white rounded-2xl border border-slate-200 shadow-xl p-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($images as $img)
            <div class="flex flex-col items-center">
                <img src="{{ asset('storage/' . $img->image_path) }}" alt="{{ $img->caption }}" class="w-full h-48 object-cover object-center transition group-hover:scale-105 duration-300 rounded-xl">
                <div class="text-sm font-semibold text-[#a81d5d] truncate my-2">{{ $img->caption ?: 'Tanpa Keterangan' }}</div>
                <div class="flex gap-2">
                    <button onclick="openAdminGalleryModal('{{ asset('storage/' . $img->image_path) }}', '{{ $img->caption }}')" class="p-2 rounded-full bg-white border border-slate-200 text-blue-600 shadow hover:bg-blue-600 hover:text-white transition" title="Lihat"><i class="fas fa-eye"></i></button>
                    <form action="{{ route('gallery.destroy', $img->id) }}" method="POST" onsubmit="return confirm('Hapus gambar ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 rounded-full bg-white border border-slate-200 text-danger shadow hover:bg-danger hover:text-white transition" title="Hapus"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-slate-400 py-16">
                <i class="fas fa-images text-4xl mb-2"></i>
                <div class="text-lg">Belum ada gambar di gallery.</div>
            </div>
        @endforelse
    </div>
</div>

<!-- Admin Gallery Lightbox Modal -->
<div id="admin-gallery-modal" class="fixed inset-0 z-[100] bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4 md:p-8 opacity-0 transition-opacity duration-300" tabindex="-1" aria-modal="true" role="dialog">
    <button onclick="closeAdminGalleryModal()" class="absolute right-4 top-4 bg-black/80 hover:bg-black/90 rounded-full p-2 transition-colors shadow-lg flex items-center justify-center z-20" style="width:36px;height:36px;" aria-label="Tutup">
        <svg class="w-6 h-6" fill="white" viewBox="0 0 24 24" stroke="white"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
    </button>
    <div class="flex flex-col items-center justify-center w-full max-w-md">
        <img id="admin-gallery-modal-img" src="" alt="" class="max-h-80 max-w-xs sm:max-w-sm w-auto object-contain rounded-xl shadow-xl mb-4 mx-auto block">
        <div id="admin-gallery-modal-caption" class="text-center text-white font-semibold text-base mt-2"></div>
    </div>
</div>

<script>
function openAdminGalleryModal(imgSrc, caption) {
    const modal = document.getElementById('admin-gallery-modal');
    const img = document.getElementById('admin-gallery-modal-img');
    const cap = document.getElementById('admin-gallery-modal-caption');
    img.src = imgSrc;
    img.alt = caption;
    cap.textContent = caption || 'Tanpa Keterangan';
    modal.classList.remove('hidden', 'opacity-0');
    modal.classList.add('flex', 'opacity-100');
    document.body.style.overflow = 'hidden';
}
function closeAdminGalleryModal() {
    const modal = document.getElementById('admin-gallery-modal');
    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');
    setTimeout(() => {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    }, 300);
}
</script>
@endsection
