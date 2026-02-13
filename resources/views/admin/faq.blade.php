@extends('admin.layouts.cms')

@section('title', 'Kelola FAQ Chatbot')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-primary">Kelola FAQ Chatbot</h1>
        <p class="text-sm text-neutral">Manajemen pertanyaan & jawaban yang digunakan chatbot untuk membantu user.</p>
    </div>
    <a href="{{ route('faq.create') }}" class="btn btn-primary bg-[#a81d5d] text-white hover:bg-[#8c1a52] transition px-5 py-2 rounded-lg shadow font-semibold">Tambah FAQ</a>
</div>
<div class="bg-white rounded-2xl border border-slate-200 shadow-lg p-6 mt-2">
    <div class="grid grid-cols-1 gap-4">
        @foreach($faqs as $faq)
            <div class="flex flex-row items-center gap-4 p-5 rounded-xl border border-slate-100 bg-slate-50 hover:shadow-md transition group">
                <input type="checkbox" name="ids[]" value="{{ $faq->id }}" class="faq-checkbox w-5 h-5 text-primary border-gray-300 rounded focus:ring-[#a81d5d] mr-4 ml-1" form="bulk-delete-form">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-1">
                        <div class="w-9 h-9 rounded-full bg-[#a81d5d]/10 flex items-center justify-center">
                            <i class="fas fa-question text-[#a81d5d] text-lg"></i>
                        </div>
                        <span class="font-semibold text-slate-900 text-base">{{ $faq->name }}</span>
                    </div>
                    <div class="pl-12 text-slate-600 text-sm">
                        @if($faq->response_type === 'text')
                            {{ $faq->response_text }}
                        @elseif($faq->response_type === 'link')
                            <a href="{{ $faq->response_url }}" class="text-primary underline">{{ $faq->response_url }}</a>
                        @elseif($faq->response_type === 'json')
                            <pre class="bg-slate-100 rounded p-2 text-xs">{{ $faq->response_json }}</pre>
                        @endif
                    </div>
                    <div class="pl-12 mt-2 flex flex-wrap gap-1">
                        @foreach($faq->keywords as $kw)
                            <span class="px-2 py-0.5 rounded bg-slate-200 text-xs text-slate-600">{{ $kw->keyword }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="flex gap-2 md:flex-col md:items-end">
                    <a href="{{ route('faq.edit', $faq->id) }}" class="px-3 py-1.5 rounded-lg bg-white border border-[#a81d5d]/20 text-[#a81d5d] text-xs font-bold hover:bg-[#a81d5d]/10 transition flex items-center gap-1"><i class="fas fa-edit"></i> Edit</a>
                    <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus FAQ ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1.5 rounded-lg bg-white border border-red-200 text-red-600 text-xs font-bold hover:bg-red-50 transition flex items-center gap-1"><i class="fas fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
        @if($faqs->isEmpty())
            <div class="text-center text-slate-400 py-16">
                <i class="fas fa-inbox text-3xl mb-2"></i>
                <div>Belum ada FAQ.</div>
            </div>
        @endif
    </div>
    <form action="{{ route('faq.bulkDelete') }}" method="POST" id="bulk-delete-form" class="mt-6">
        @csrf
        @method('DELETE')
        <div class="flex items-center gap-3">
            <a
                href="#"
                id="bulk-delete-btn"
                class="min-w-[200px] px-6 py-2 rounded-xl text-base font-bold shadow flex items-center gap-2 transition
                    bg-red-600 text-white hover:bg-red-700 cursor-pointer"
            >
                <i class="fas fa-trash"></i>
                <span>Hapus FAQ Terpilih</span>
            </a>
        </div>
    </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.faq-checkbox');
    const bulkDeleteBtn = document.getElementById('bulk-delete-btn');
    const bulkDeleteForm = document.getElementById('bulk-delete-form');
    function updateBulkDeleteBtn() {
        const anyChecked = Array.from(checkboxes).some(c => c.checked);
        if (anyChecked) {
            bulkDeleteBtn.classList.remove('opacity-50');
            bulkDeleteBtn.classList.add('bg-danger', 'hover:bg-danger-dark', 'cursor-pointer', 'text-white');
        } else {
            bulkDeleteBtn.classList.remove('cursor-pointer');
            bulkDeleteBtn.classList.add('opacity-50', 'bg-danger', 'text-white');
        }
    }
    bulkDeleteBtn.addEventListener('click', function(e) {
        if (bulkDeleteBtn.classList.contains('pointer-events-none')) {
            e.preventDefault();
            return false;
        }
        e.preventDefault();
        bulkDeleteForm.submit();
    });

    // Pastikan form hapus satuan tidak terpengaruh JS bulk delete
    document.querySelectorAll('form[action*="faq\\.destroy"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            // Biarkan submit berjalan normal
            // Tidak perlu preventDefault
        });
    });
    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateBulkDeleteBtn);
    });
    updateBulkDeleteBtn();
});
</script>
@endsection
