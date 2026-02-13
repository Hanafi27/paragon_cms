@extends('admin.layouts.cms')

@section('title', 'Kelola Produk')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-[#a81d5d]">Kelola Produk</h1>
        <p class="text-base text-neutral">Manajemen produk dan galeri produk.</p>
        <!-- ...existing code... -->
    </div>
    <a href="{{ route('product.create') }}" class="px-5 py-2 rounded-lg bg-[#a81d5d] text-white hover:bg-[#a81d5d]/90 text-base font-semibold shadow-lg flex items-center gap-2">
        <i class="fas fa-plus"></i> Tambah Produk
    </a>
</div>
<div class="bg-white rounded-2xl border border-slate-200 shadow-xl p-8">
    @php $products = \App\Models\Product::latest()->get(); @endphp
    @if($products->isEmpty())
    <div class="col-span-full text-center text-slate-400 py-16 flex flex-col items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <div class="text-lg">Belum ada produk.</div>
    </div>
    @endif
    @if($products->isNotEmpty())
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($products as $product)
            <div class="relative group rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition bg-slate-50 flex flex-col">
                <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover object-center transition group-hover:scale-105 duration-300 rounded-t-2xl">
                <div class="px-4 py-3 flex-1 flex flex-col justify-between">
                    <div class="text-base font-bold text-[#a81d5d] truncate mb-1">{{ $product->name }}</div>
                    <div class="text-xs text-slate-500 mb-1">Kode: <span class="font-mono">{{ $product->code ?: '-' }}</span></div>
                    <div class="text-xs text-slate-500 mb-1">Kategori: <span>{{ $product->category ?: '-' }}</span></div>
                    <div class="text-xs text-emerald-600 mb-2">Stok: {{ $product->stock ?: '-' }}</div>
                    <div class="flex gap-2 mt-auto">
                        <button type="button" onclick="showProductModal({{ $product->id }})" class="p-2 rounded-full bg-white border border-slate-200 text-blue-600 shadow hover:bg-blue-600 hover:text-white transition" title="Lihat"><i class="fas fa-eye"></i></button>
                        <a href="{{ route('product.edit', $product->id) }}" class="p-2 rounded-full bg-white border border-slate-200 text-yellow-500 shadow hover:bg-yellow-500 hover:text-white transition" title="Edit"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 rounded-full bg-white border border-slate-200 text-danger shadow hover:bg-danger hover:text-white transition" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>
    <!-- Modal Ringkasan Produk -->
    <div id="productModal" class="fixed inset-0 z-50 items-center justify-center bg-black/40 hidden">
        <div class="bg-white rounded-3xl shadow-2xl max-w-lg md:max-w-xl mx-auto p-0 md:p-8 relative animate-fade-in border border-slate-200 hidden">
                <div class="flex justify-between items-center px-6 pt-6 pb-2 border-b border-slate-100">
                    <div class="text-lg font-bold text-[#a81d5d] tracking-wide">Ringkasan Produk</div>
                    <button onclick="closeProductModal()" class="text-slate-400 hover:text-[#a81d5d] text-2xl font-bold transition">&times;</button>
                </div>
                <div id="modalContent" class="px-6 py-6">
                    <!-- Konten produk akan diisi via JS -->
                </div>
            </div>
        </div>
    <script>
        const products = @json($products);
        function showProductModal(id) {
            const modal = document.getElementById('productModal');
            const content = document.getElementById('modalContent');
            const product = products.find(p => p.id === id);
            if (!product) return;
            content.innerHTML = `
                <div class="flex flex-col md:flex-row gap-6 items-start w-full">
                    <div class="flex-shrink-0">
                        <img src="/storage/${product.main_image}" alt="${product.name}" class="w-24 h-24 md:w-28 md:h-28 object-cover rounded-xl border border-slate-200 shadow bg-white">
                    </div>
                    <div class="flex-1 w-full min-w-0">
                        <div class="text-xl font-bold text-[#a81d5d] mb-2 truncate">${product.name}</div>
                        <div class="flex flex-wrap gap-2 mb-2">
                            <span class="inline-block px-3 py-1 rounded-lg bg-[#a81d5d]/10 text-[#a81d5d] text-xs font-semibold">Kode: <span class="font-mono">${product.code ?? '-'}<\/span></span>
                            <span class="inline-block px-3 py-1 rounded-lg bg-slate-100 text-slate-700 text-xs font-semibold">Kategori: ${product.category ?? '-'}<\/span>
                            <span class="inline-block px-3 py-1 rounded-lg bg-emerald-50 text-emerald-700 text-xs font-semibold">Stok: ${product.stock ?? '-'}<\/span>
                        </div>
                        <div class="text-sm text-neutral mb-2 leading-relaxed break-words">${product.description ?? ''}</div>
                    </div>
                </div>
            `;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.querySelector('#productModal > div').classList.remove('hidden');
        }
        function closeProductModal() {
            const modal = document.getElementById('productModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.querySelector('#productModal > div').classList.add('hidden');
        }
            window.showProductModal = showProductModal;
            window.closeProductModal = closeProductModal;
        // Optional: close modal on ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeProductModal();
        });
    </script>
@endsection
