@extends('admin.layouts.cms')

@section('title', 'Tambah Produk')

@section('content')
<div class="max-w-4xl mx-auto mt-10 space-y-8">
    <!-- Card 1: Data Produk (2 kolom) -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="bg-[#a81d5d]/10 p-3 rounded-full">
                <i class="fas fa-box text-2xl text-[#a81d5d]"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-[#a81d5d]">Tambah Produk</h1>
                <p class="text-sm text-neutral">Form tambah produk baru beserta galeri (maksimal 4 gambar).</p>
            </div>
        </div>
        <form id="formProduk" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="block text-sm font-semibold mb-2">Nama Produk</label>
                    <input type="text" name="name" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d] text-sm" required>
                </div>
                <!-- Field slug dihapus sesuai permintaan -->
                <div>
                    <label class="block text-sm font-semibold mb-2">Kategori</label>
                    <input type="text" name="category" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d] text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Kode Produk</label>
                    <input type="text" name="code" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d] text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Stok</label>
                    <input type="text" name="stock" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d] text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Sertifikasi</label>
                    <input type="text" name="certification" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d] text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Deskripsi</label>
                    <textarea name="description" rows="4" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d] text-sm"></textarea>
                </div>
            </div>
    </div>
    <!-- Card 2: Upload Gambar & Deskripsi -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <label class="block text-sm font-semibold mb-2">Foto Utama Produk <span class="text-red-500">*</span></label>
                <label for="main_image" class="cursor-pointer border-2 border-dashed border-[#a81d5d]/40 rounded-xl p-6 flex flex-col items-center justify-center bg-neutral-light hover:bg-[#a81d5d]/10 transition mb-2 group">
                    <i class="fas fa-cloud-upload-alt text-3xl text-[#a81d5d] mb-2 group-hover:scale-110 transition"></i>
                    <span class="text-sm text-neutral mb-2">Klik atau drag file ke sini</span>
                    <input type="file" name="main_image" id="main_image" required accept="image/*" onchange="previewMainImage(event)" class="hidden">
                    <span class="text-xs text-neutral">Format: JPG, PNG, Max 2MB</span>
                    <div class="mt-3">
                        <img id="mainImagePreview" class="rounded-lg border border-slate-200 w-40 h-40 object-cover hidden" alt="Preview Foto Utama">
                    </div>
                </label>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Galeri Produk (maksimal 4 gambar)</label>
                <label for="gallery_images" class="cursor-pointer border-2 border-dashed border-[#a81d5d]/40 rounded-xl p-6 flex flex-col items-center justify-center bg-neutral-light hover:bg-[#a81d5d]/10 transition mb-2 group">
                    <i class="fas fa-cloud-upload-alt text-3xl text-[#a81d5d] mb-2 group-hover:scale-110 transition"></i>
                    <span class="text-sm text-neutral mb-2">Klik atau drag file ke sini</span>
                    <input type="file" name="gallery[]" id="gallery_images" accept="image/*" multiple class="hidden" onchange="previewGalleryImages(event)">
                    <span class="text-xs text-neutral">Maksimal 4 gambar, masing-masing max 2MB</span>
                    <div class="flex gap-2 mt-3 flex-wrap" id="galleryPreview"></div>
                </label>
            </div>
        </div>
        <!-- Field deskripsi dipindahkan ke card field text -->
        <!-- Caption galeri dihapus sesuai permintaan -->
        <div class="flex gap-3 justify-end mt-8">
            <a href="{{ route('product.index') }}" class="px-4 py-2 rounded-lg bg-slate-100 text-slate-700 font-semibold hover:bg-slate-200 transition">Batal</a>
            <button type="submit" class="px-4 py-2 rounded-lg bg-[#a81d5d] text-white font-semibold shadow-sm hover:bg-[#a81d5d]/90 transition">Simpan</button>
        </div>
    </div>
    </form>
</div>
<script>
    function previewMainImage(event) {
        const input = event.target;
        const preview = document.getElementById('mainImagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.classList.add('hidden');
        }
    }
    // Gallery preview with close button
    let galleryFiles = [];
    function previewGalleryImages(event) {
        const input = event.target;
        const previewContainer = document.getElementById('galleryPreview');
        previewContainer.innerHTML = '';
        galleryFiles = Array.from(input.files).slice(0,4);
        galleryFiles.forEach((file, idx) => {
            const reader = new FileReader();
            const wrapper = document.createElement('div');
            wrapper.className = 'relative group';
            const img = document.createElement('img');
            img.className = 'rounded-lg border border-slate-200 w-20 h-20 object-cover';
            img.style.display = 'block';
            reader.onload = function(e) {
                img.src = e.target.result;
            }
            reader.readAsDataURL(file);
            // Close button
            const closeBtn = document.createElement('button');
            closeBtn.type = 'button';
            closeBtn.innerHTML = '&times;';
            closeBtn.className = 'absolute -top-2 -right-2 bg-white border border-slate-300 rounded-full w-6 h-6 flex items-center justify-center text-[#a81d5d] font-bold shadow group-hover:scale-110 transition';
            closeBtn.onclick = function() {
                galleryFiles.splice(idx, 1);
                updateGalleryInput();
            };
            wrapper.appendChild(img);
            wrapper.appendChild(closeBtn);
            previewContainer.appendChild(wrapper);
        });
        updateGalleryInput();
    }
    function updateGalleryInput() {
        const input = document.getElementById('gallery_images');
        // Create a new DataTransfer to update input.files
        const dt = new DataTransfer();
        galleryFiles.forEach(file => dt.items.add(file));
        input.files = dt.files;
        // Re-render preview
        const previewContainer = document.getElementById('galleryPreview');
        previewContainer.innerHTML = '';
        galleryFiles.forEach((file, idx) => {
            const reader = new FileReader();
            const wrapper = document.createElement('div');
            wrapper.className = 'relative group';
            const img = document.createElement('img');
            img.className = 'rounded-lg border border-slate-200 w-20 h-20 object-cover';
            img.style.display = 'block';
            reader.onload = function(e) {
                img.src = e.target.result;
            }
            reader.readAsDataURL(file);
            // Close button
            const closeBtn = document.createElement('button');
            closeBtn.type = 'button';
            closeBtn.innerHTML = '&times;';
            closeBtn.className = 'absolute -top-2 -right-2 bg-white border border-slate-300 rounded-full w-6 h-6 flex items-center justify-center text-[#a81d5d] font-bold shadow group-hover:scale-110 transition';
            closeBtn.onclick = function() {
                galleryFiles.splice(idx, 1);
                updateGalleryInput();
            };
            wrapper.appendChild(img);
            wrapper.appendChild(closeBtn);
            previewContainer.appendChild(wrapper);
        });
    }
</script>
@endsection
