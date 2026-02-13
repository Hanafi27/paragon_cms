@extends('admin.layouts.cms')

@section('title', 'Kelola Konten')

@section('content')
<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-4xl font-extrabold text-[#a81d5d] tracking-tight mb-2">Kelola Konten Halaman</h1>
        <p class="text-lg text-slate-500">Manajemen konten website secara terstruktur dan profesional. Pilih section, filter status, dan kelola konten dengan mudah.</p>
    </div>
    <a href="{{ route('admin.content.add') }}" class="px-7 py-3 rounded-xl bg-[#a81d5d] text-white hover:bg-[#a81d5d]/90 text-lg font-bold shadow-lg flex items-center gap-3">
        <i class="fas fa-plus"></i> Tambah Konten
    </a>
</div>

<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <div class="flex flex-wrap gap-4 items-center">
        <label class="font-semibold text-base">Section:</label>
        <select class="border border-slate-200 rounded-lg px-4 py-2 text-base focus:ring-2 focus:ring-[#a81d5d] bg-white">
            <option>Semua</option>
            <option>Beranda</option>
            <option>Tentang Kami</option>
            <option>Produk</option>
            <option>Galeri</option>
            <option>Lainnya</option>
        </select>
        <label class="ml-4 font-semibold text-base">Status:</label>
        <select class="border border-slate-200 rounded-lg px-4 py-2 text-base focus:ring-2 focus:ring-[#a81d5d] bg-white">
            <option>Semua</option>
            <option>Draft</option>
            <option>Published</option>
        </select>
    </div>
    <div class="flex items-center gap-3">
        <input type="text" class="border border-slate-200 rounded-lg px-5 py-2 text-base focus:ring-2 focus:ring-[#a81d5d] bg-white" placeholder="Cari judul atau isi konten...">
        <button class="px-5 py-2 rounded-lg bg-[#a81d5d]/10 text-[#a81d5d] text-base font-bold hover:bg-[#a81d5d]/20"><i class="fas fa-search"></i></button>
    </div>
</div>
<div class="bg-white rounded-2xl border border-slate-200 shadow-xl p-10">
    <table class="w-full text-base">
        <thead class="text-[#a81d5d] border-b border-slate-200">
            <tr>
                <th class="py-5 text-left font-bold">Judul Konten</th>
                <th class="py-5 text-left font-bold">Section</th>
                <th class="py-5 text-left font-bold">Status</th>
                <th class="py-5 text-left font-bold">Terakhir Diubah</th>
                <th class="py-5 text-left font-bold">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            <tr class="hover:bg-[#a81d5d]/5">
                <td class="py-5 font-semibold text-slate-900">Company Profile 2026</td>
                <td class="py-5 text-slate-600">Beranda</td>
                <td class="py-5">
                    <span class="px-4 py-1 text-xs rounded-full bg-emerald-50 text-emerald-700 font-bold">Published</span>
                </td>
                <td class="py-5 text-slate-500">2 jam lalu</td>
                <td class="py-5 flex gap-2">
                    <button class="px-4 py-2 rounded-lg bg-[#a81d5d]/10 text-[#a81d5d] font-bold hover:bg-[#a81d5d]/20 transition">Edit</button>
                    <button class="px-4 py-2 rounded-lg bg-blue-50 text-blue-700 font-bold hover:bg-blue-100 transition">Preview</button>
                    <button class="px-4 py-2 rounded-lg bg-red-50 text-red-600 font-bold hover:bg-red-100 transition">Hapus</button>
                </td>
            </tr>
            <tr class="hover:bg-[#a81d5d]/5">
                <td class="py-5 font-semibold text-slate-900">Landing Page Program</td>
                <td class="py-5 text-slate-600">Produk</td>
                <td class="py-5">
                    <span class="px-4 py-1 text-xs rounded-full bg-amber-50 text-amber-700 font-bold">Draft</span>
                </td>
                <td class="py-5 text-slate-500">Kemarin</td>
                <td class="py-5 flex gap-2">
                    <button class="px-4 py-2 rounded-lg bg-[#a81d5d]/10 text-[#a81d5d] font-bold hover:bg-[#a81d5d]/20 transition">Edit</button>
                    <button class="px-4 py-2 rounded-lg bg-blue-50 text-blue-700 font-bold hover:bg-blue-100 transition">Preview</button>
                    <button class="px-4 py-2 rounded-lg bg-red-50 text-red-600 font-bold hover:bg-red-100 transition">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
