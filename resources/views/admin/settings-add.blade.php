@extends('admin.layouts.cms')

@section('title', 'Tambah Pengaturan')

@section('content')
<div class="max-w-xl mx-auto">
    <h1 class="text-2xl font-bold text-primary mb-2">Tambah Pengaturan</h1>
    <p class="text-sm text-neutral mb-6">Form tambah pengaturan sistem atau preferensi baru.</p>
    <form class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-5">
        <div>
            <label class="block text-sm font-semibold mb-1">Nama Pengaturan</label>
            <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d]" placeholder="Nama pengaturan...">
        </div>
        <div>
            <label class="block text-sm font-semibold mb-1">Nilai</label>
            <input type="text" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#a81d5d]" placeholder="Nilai pengaturan...">
        </div>
        <div class="flex gap-2 justify-end">
            <a href="{{ route('admin.settings') }}" class="px-4 py-2 rounded-lg bg-slate-100 text-slate-700 font-semibold hover:bg-slate-200">Batal</a>
            <button type="submit" class="px-4 py-2 rounded-lg bg-[#a81d5d] text-white font-semibold hover:bg-[#a81d5d]/90">Simpan</button>
        </div>
    </form>
</div>
@endsection
