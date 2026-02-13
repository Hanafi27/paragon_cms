@extends('admin.layouts.cms')

@section('title', 'Kelola Produk')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-primary">Kelola Produk</h1>
        <p class="text-sm text-neutral">Daftar dan manajemen seluruh produk Paragon.</p>
    </div>
    <a href="{{ route('admin.product.add') }}" class="px-4 py-2 rounded-xl bg-[#a81d5d] text-white hover:bg-[#a81d5d]/90 text-sm font-semibold shadow-sm">
        <i class="fas fa-plus mr-2"></i> Tambah Produk
    </a>
</div>
<div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-6" x-data="productAdmin()">
    @php $products = \App\Models\Product::latest()->get(); @endphp
    @if($products->isEmpty())
    <div class="col-span-full text-center text-slate-400 py-16 flex flex-col items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <div class="text-lg">Belum ada produk.</div>
    </div>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="rounded-xl bg-slate-50 border border-slate-100 shadow group hover:shadow-xl transition flex flex-col">
            <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover object-center rounded-t-xl">
            <div class="flex-1 flex flex-col p-4 gap-2">
                <div class="flex items-center gap-2 mb-1">
                    <span class="px-2 py-1 text-xs rounded-full font-bold {{ $product->status === 'Aktif' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-700' }}">{{ $product->status }}</span>
                    <span class="text-xs text-slate-400 ml-auto">{{ $product->updated_at->diffForHumans() }}</span>
                </div>
                <div class="font-semibold text-slate-900 text-base truncate">{{ $product->name }}</div>
                <div class="text-xs text-slate-500 mb-2">{{ $product->category }}</div>
                <div class="flex gap-2 mt-auto">
                    <a href="{{ route('admin.product.edit', $product->id) }}" class="px-3 py-1.5 rounded-lg bg-white border border-[#a81d5d]/20 text-[#a81d5d] text-xs font-bold hover:bg-[#a81d5d]/10 transition flex items-center gap-1"><i class="fas fa-edit"></i> Edit</a>
                    <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-white border border-red-200 text-red-600 text-xs font-bold hover:bg-red-50 transition flex items-center gap-1"><i class="fas fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
@endsection
