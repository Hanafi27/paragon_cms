@extends('admin.layouts.cms')

@section('title', 'Tambah Ulasan')

@section('content')
<div class="max-w-2xl mx-auto mt-8 bg-white rounded shadow p-8">
    <h1 class="text-2xl font-bold mb-6 text-primary">Tambah Ulasan</h1>
    <form method="POST" action="{{ route('admin.review.store') }}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
            <div>
                <label class="block font-semibold mb-1">Nama</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required />
            </div>
            <div>
                <label class="block font-semibold mb-1">Perusahaan</label>
                <input type="text" name="company" class="w-full border rounded px-3 py-2" />
            </div>
            <div>
                <label class="block font-semibold mb-1">Bintang</label>
                <select name="stars" class="w-full border rounded px-3 py-2" required>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                </select>
            </div>
            <div>
                <label class="block font-semibold mb-1">Badge</label>
                <input type="text" name="badge" class="w-full border rounded px-3 py-2" />
            </div>
        </div>
        <div class="mb-6">
            <label class="block font-semibold mb-1">Pesan</label>
            <textarea name="message" class="w-full border rounded px-3 py-2" rows="3" required></textarea>
        </div>
        <div class="flex items-center gap-4">
            <button type="submit" class="bg-[#a81d5d] text-white px-6 py-2 rounded-lg font-semibold shadow hover:bg-[#8c1a52] transition">Simpan</button>
            <a href="{{ route('admin.editor.beranda') }}" class="text-primary underline">Batal</a>
        </div>
    </form>
</div>
@endsection
