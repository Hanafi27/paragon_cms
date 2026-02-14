@extends('admin.layouts.cms')

@section('title', 'Tambah Gambar Gallery')

@section('content')
<div class="max-w-lg mx-auto mt-10">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="bg-[#a81d5d]/10 p-3 rounded-full">
                <i class="fas fa-image text-2xl text-[#a81d5d]"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-[#a81d5d]">Tambah Gambar Gallery</h1>
                <p class="text-sm text-neutral">Upload gambar baru ke gallery website.</p>
            </div>
        </div>
        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-semibold mb-2">Pilih Gambar</label>
                <div id="dropzone" class="border-2 border-dashed border-[#a81d5d]/40 rounded-xl p-6 flex flex-col items-center justify-center bg-neutral-light hover:bg-[#a81d5d]/10 transition mb-2 group cursor-pointer" onclick="document.getElementById('galleryImageInput').click()">
                    <i class="fas fa-cloud-upload-alt text-3xl text-[#a81d5d] mb-2 group-hover:scale-110 transition"></i>
                    <span class="text-sm text-neutral mb-2">Klik atau drag file ke sini</span>
                    <input type="file" name="image" id="galleryImageInput" required accept="image/*" class="hidden" onchange="previewGalleryImage(event)">
                    <span class="text-xs text-neutral mt-2">Format: JPG, PNG, Max 2MB</span>
                    <div class="mt-3">
                        <img id="galleryImagePreview" class="rounded-lg border border-slate-200 w-40 h-40 object-cover hidden" alt="Preview Gambar">
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold mb-2">Keterangan</label>
                <input type="text" name="caption" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d] text-sm" placeholder="Keterangan gambar...">
            </div>
            <div class="flex gap-3 justify-end mt-6">
                <a href="{{ route('gallery.index') }}" class="px-4 py-2 rounded-lg bg-slate-100 text-slate-700 font-semibold hover:bg-slate-200 transition">Batal</a>
                <button type="submit" class="px-4 py-2 rounded-lg bg-[#a81d5d] text-white font-semibold shadow-sm hover:bg-[#a81d5d]/90 transition">Simpan</button>
            </div>
        </form>
    <script>
        // Preview gambar
        function previewGalleryImage(event) {
            const input = event.target;
            const preview = document.getElementById('galleryImagePreview');
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
        // Drag & drop
        const dropzone = document.getElementById('dropzone');
        const input = document.getElementById('galleryImageInput');
        dropzone.addEventListener('dragover', function(e) {
            e.preventDefault();
            dropzone.classList.add('bg-[#a81d5d]/10');
        });
        dropzone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            dropzone.classList.remove('bg-[#a81d5d]/10');
        });
        dropzone.addEventListener('drop', function(e) {
            e.preventDefault();
            dropzone.classList.remove('bg-[#a81d5d]/10');
            if (e.dataTransfer.files.length > 0) {
                input.files = e.dataTransfer.files;
                previewGalleryImage({ target: input });
            }
        });
    </script>
    </div>
</div>
@endsection
