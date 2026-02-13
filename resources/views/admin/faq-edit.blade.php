@extends('admin.layouts.cms')

@section('title', 'Edit FAQ Chatbot')

@section('content')
<div class="max-w-5xl mx-auto mt-10 bg-white rounded-2xl shadow-md border border-slate-200 p-8">
    <div class="mb-6">
        <h1 class="text-xl font-bold text-slate-900">Edit FAQ Chatbot</h1>
        <p class="text-sm text-slate-500 mt-1">
            Ubah pertanyaan dan jawaban untuk sistem chatbot.
        </p>
    </div>
    <form method="POST" action="{{ route('faq.update', $faq->id) }}">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-xs font-semibold text-slate-500 mb-1">Pertanyaan / Intent</label>
                <input type="text" name="name" value="{{ old('name', $faq->name) }}" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#a81d5d]/30 focus:border-[#a81d5d] text-sm" required>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 mb-1">Tipe Jawaban</label>
                <select name="response_type" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#a81d5d]/30 text-sm" required>
                    <option value="text" @if(old('response_type', $faq->response_type)==='text') selected @endif>Text</option>
                    <option value="link" @if(old('response_type', $faq->response_type)==='link') selected @endif>Link</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 mb-1">Status</label>
                <select name="status" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#a81d5d]/30 text-sm" required>
                    <option value="aktif" @if(old('status', $faq->status)==='aktif') selected @endif>Aktif</option>
                    <option value="draft" @if(old('status', $faq->status)==='draft') selected @endif>Draft</option>
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs font-semibold text-slate-500 mb-1">Jawaban (Text)</label>
                <textarea name="response_text" rows="3" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#a81d5d]/30 text-sm">{{ old('response_text', $faq->response_text) }}</textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 mb-1">Jawaban (URL jika tipe Link)</label>
                <input type="text" name="response_url" value="{{ old('response_url', $faq->response_url) }}" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#a81d5d]/30 text-sm">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-500 mb-1">Keyword</label>
                <input type="text" name="keywords" value="{{ old('keywords', $faq->keywords->pluck('keyword')->implode(', ')) }}" placeholder="order, beli, produk" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#a81d5d]/30 text-sm">
            </div>
        </div>
        <div class="flex justify-end gap-3 mt-8">
            <a href="{{ route('faq.index') }}" class="px-5 py-2.5 rounded-lg bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 transition text-sm">Batal</a>
            <button type="submit" class="px-6 py-2.5 rounded-lg bg-[#a81d5d] text-white font-semibold shadow hover:bg-[#a81d5d]/90 transition text-sm">Update FAQ</button>
        </div>
    </form>
</div>
@endsection
