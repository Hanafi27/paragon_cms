@extends('admin.layouts.cms')

@section('title', 'Tambah Konten')

@section('content')
<div class="w-full max-w-5xl mx-auto">
    <h1 class="text-3xl font-bold text-[#a81d5d] mb-2">Tambah Konten Baru</h1>
    <p class="text-base text-slate-500 mb-8">Pilih section di bawah, lalu isi data sesuai kebutuhan. Anda dapat mengedit teks, menambah/menghapus gambar, dan mengatur tema khusus untuk event tertentu.</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Card Beranda -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-8 flex flex-col">
            <h2 class="text-xl font-bold text-[#a81d5d] mb-4 flex items-center gap-2"><i class="fas fa-home"></i> Konten Beranda</h2>
            <form class="space-y-4 flex-1 flex flex-col justify-between">
                <div>
                    <label class="block text-sm font-semibold mb-1">Judul Konten</label>
                    <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d]" placeholder="Judul konten...">
                    <label class="block text-sm font-semibold mb-1">Deskripsi Singkat</label>
                    <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2" placeholder="Deskripsi singkat...">
                    <label class="block text-sm font-semibold mb-1">Isi Konten (Rich Text)</label>
                    <textarea class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d]" rows="5" placeholder="Tulis isi konten..."></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Gambar Section</label>
                    <input type="file" multiple class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2">
                    <div class="flex flex-wrap gap-2 mt-2">
                        <!-- Preview gambar yang sudah diupload, tombol hapus -->
                        <div class="w-20 h-20 bg-slate-100 rounded-lg flex items-center justify-center relative">
                            <span class="text-xs text-slate-400">Preview</span>
                            <button class="absolute top-1 right-1 bg-white rounded-full p-1 shadow hover:bg-red-100"><i class="fas fa-times text-red-500"></i></button>
                        </div>
                        <!-- Tambah gambar lain ... -->
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Tema Event Khusus</label>
                    <div class="flex flex-col gap-2">
                        <select class="border border-slate-200 rounded-lg px-3 py-2">
                            <option>Default</option>
                            <option>Ramadhan</option>
                            <option>Imlek</option>
                            <option>Hari Kemerdekaan</option>
                            <option>Custom</option>
                        </select>
                        <div class="flex gap-2 mt-2">
                            <input type="color" class="w-10 h-10 border rounded-lg" title="Warna Tema">
                            <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2" placeholder="Animasi (misal: fade, slide, bounce)">
                            <input type="file" class="border border-slate-200 rounded-lg px-3 py-2" title="Icon/Gambar Event">
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 justify-end mt-4">
                    <button type="submit" class="px-4 py-2 rounded-lg bg-slate-300 text-slate-700 font-semibold hover:bg-slate-400">Draft</button>
                    <button type="submit" class="px-4 py-2 rounded-lg bg-[#a81d5d] text-white font-semibold hover:bg-[#a81d5d]/90">Publish</button>
                </div>
            </form>
        </div>
        <!-- Card Tentang Kami -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-8 flex flex-col">
            <h2 class="text-xl font-bold text-[#a81d5d] mb-4 flex items-center gap-2"><i class="fas fa-users"></i> Tentang Kami</h2>
            <form class="space-y-4 flex-1 flex flex-col justify-between">
                <div>
                    <label class="block text-sm font-semibold mb-1">Judul Konten</label>
                    <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d]" placeholder="Judul konten...">
                    <label class="block text-sm font-semibold mb-1">Isi Konten (Rich Text)</label>
                    <textarea class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d]" rows="5" placeholder="Tulis isi konten..."></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Gambar Section</label>
                    <input type="file" multiple class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2">
                    <div class="flex flex-wrap gap-2 mt-2">
                        <div class="w-20 h-20 bg-slate-100 rounded-lg flex items-center justify-center relative">
                            <span class="text-xs text-slate-400">Preview</span>
                            <button class="absolute top-1 right-1 bg-white rounded-full p-1 shadow hover:bg-red-100"><i class="fas fa-times text-red-500"></i></button>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Tema Event Khusus</label>
                    <div class="flex flex-col gap-2">
                        <select class="border border-slate-200 rounded-lg px-3 py-2">
                            <option>Default</option>
                            <option>Ramadhan</option>
                            <option>Imlek</option>
                            <option>Hari Kemerdekaan</option>
                            <option>Custom</option>
                        </select>
                        <div class="flex gap-2 mt-2">
                            <input type="color" class="w-10 h-10 border rounded-lg" title="Warna Tema">
                            <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2" placeholder="Animasi (misal: fade, slide, bounce)">
                            <input type="file" class="border border-slate-200 rounded-lg px-3 py-2" title="Icon/Gambar Event">
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 justify-end mt-4">
                    <button type="submit" class="px-4 py-2 rounded-lg bg-slate-300 text-slate-700 font-semibold hover:bg-slate-400">Draft</button>
                    <button type="submit" class="px-4 py-2 rounded-lg bg-[#a81d5d] text-white font-semibold hover:bg-[#a81d5d]/90">Publish</button>
                </div>
            </form>
        </div>
        <!-- Card Produk -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-8 flex flex-col">
            <h2 class="text-xl font-bold text-[#a81d5d] mb-4 flex items-center gap-2"><i class="fas fa-box"></i> Produk</h2>
            <form class="space-y-4 flex-1 flex flex-col justify-between">
                <div>
                    <label class="block text-sm font-semibold mb-1">Nama Produk</label>
                    <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d]" placeholder="Nama produk...">
                    <label class="block text-sm font-semibold mb-1">Deskripsi</label>
                    <textarea class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d]" rows="4" placeholder="Deskripsi produk..."></textarea>
                    <label class="block text-sm font-semibold mb-1">Gambar Produk</label>
                    <input type="file" multiple class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2">
                    <div class="flex flex-wrap gap-2 mt-2">
                        <div class="w-20 h-20 bg-slate-100 rounded-lg flex items-center justify-center relative">
                            <span class="text-xs text-slate-400">Preview</span>
                            <button class="absolute top-1 right-1 bg-white rounded-full p-1 shadow hover:bg-red-100"><i class="fas fa-times text-red-500"></i></button>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Tema Event Khusus</label>
                    <div class="flex flex-col gap-2">
                        <select class="border border-slate-200 rounded-lg px-3 py-2">
                            <option>Default</option>
                            <option>Ramadhan</option>
                            <option>Imlek</option>
                            <option>Hari Kemerdekaan</option>
                            <option>Custom</option>
                        </select>
                        <div class="flex gap-2 mt-2">
                            <input type="color" class="w-10 h-10 border rounded-lg" title="Warna Tema">
                            <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2" placeholder="Animasi (misal: fade, slide, bounce)">
                            <input type="file" class="border border-slate-200 rounded-lg px-3 py-2" title="Icon/Gambar Event">
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 justify-end mt-4">
                    <button type="submit" class="px-4 py-2 rounded-lg bg-slate-300 text-slate-700 font-semibold hover:bg-slate-400">Draft</button>
                    <button type="submit" class="px-4 py-2 rounded-lg bg-[#a81d5d] text-white font-semibold hover:bg-[#a81d5d]/90">Publish</button>
                </div>
            </form>
        </div>
        <!-- Card Galeri -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-8 flex flex-col">
            <h2 class="text-xl font-bold text-[#a81d5d] mb-4 flex items-center gap-2"><i class="fas fa-image"></i> Galeri</h2>
            <form class="space-y-4 flex-1 flex flex-col justify-between">
                <div>
                    <label class="block text-sm font-semibold mb-1">Judul Gambar</label>
                    <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d]" placeholder="Judul gambar...">
                    <label class="block text-sm font-semibold mb-1">Upload Gambar</label>
                    <input type="file" multiple class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2">
                    <div class="flex flex-wrap gap-2 mt-2">
                        <div class="w-20 h-20 bg-slate-100 rounded-lg flex items-center justify-center relative">
                            <span class="text-xs text-slate-400">Preview</span>
                            <button class="absolute top-1 right-1 bg-white rounded-full p-1 shadow hover:bg-red-100"><i class="fas fa-times text-red-500"></i></button>
                        </div>
                    </div>
                    <label class="block text-sm font-semibold mb-1">Caption (opsional)</label>
                    <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2" placeholder="Caption...">
                    <label class="block text-sm font-semibold mb-1">Urutan Tampil</label>
                    <input type="number" class="w-full border border-slate-200 rounded-lg px-3 py-2 mb-2" placeholder="1">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Tema Event Khusus</label>
                    <div class="flex flex-col gap-2">
                        <select class="border border-slate-200 rounded-lg px-3 py-2">
                            <option>Default</option>
                            <option>Ramadhan</option>
                            <option>Imlek</option>
                            <option>Hari Kemerdekaan</option>
                            <option>Custom</option>
                        </select>
                        <div class="flex gap-2 mt-2">
                            <input type="color" class="w-10 h-10 border rounded-lg" title="Warna Tema">
                            <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2" placeholder="Animasi (misal: fade, slide, bounce)">
                            <input type="file" class="border border-slate-200 rounded-lg px-3 py-2" title="Icon/Gambar Event">
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 justify-end mt-4">
                    <button type="submit" class="px-4 py-2 rounded-lg bg-slate-300 text-slate-700 font-semibold hover:bg-slate-400">Draft</button>
                    <button type="submit" class="px-4 py-2 rounded-lg bg-[#a81d5d] text-white font-semibold hover:bg-[#a81d5d]/90">Publish</button>
                </div>
            </form>
        </div>
    </div>
    <div class="flex gap-2 justify-end mt-10">
        <a href="{{ route('admin.content') }}" class="px-5 py-2 rounded-lg bg-slate-100 text-slate-700 font-semibold hover:bg-slate-200">Kembali</a>
    </div>
</div>
@endsection
