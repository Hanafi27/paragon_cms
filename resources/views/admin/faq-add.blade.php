@extends('admin.layouts.cms')

@section('title', 'Tambah FAQ')

@section('content')
<div class="max-w-5xl mx-auto mt-10 bg-white rounded-2xl shadow-md border border-slate-200 p-8">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-xl font-bold text-slate-900">Tambah FAQ Chatbot</h1>
        <p class="text-sm text-slate-500 mt-1">
            Tambahkan pertanyaan dan jawaban untuk sistem chatbot.
        </p>
    </div>

    <form method="POST" action="{{ route('faq.store') }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Pertanyaan -->
            <div class="md:col-span-2">
                <label class="block text-xs font-semibold text-slate-500 mb-1">
                    Pertanyaan / Intent
                </label>
                <input type="text"
                       name="name"
                       class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#a81d5d]/30 focus:border-[#a81d5d] text-sm"
                       required>
            </div>

            <!-- Tipe Jawaban -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 mb-1">
                    Tipe Jawaban
                </label>
                <select name="response_type"
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#a81d5d]/30 text-sm"
                        required>
                    <option value="text">Text</option>
                    <option value="link">Link</option>
                </select>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 mb-1">
                    Status
                </label>
                <select name="status"
                        class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#a81d5d]/30 text-sm"
                        required>
                    <option value="aktif">Aktif</option>
                    <option value="draft">Draft</option>
                </select>
            </div>

            <!-- Jawaban Text -->
            <div class="md:col-span-2">
                <label class="block text-xs font-semibold text-slate-500 mb-1">
                    Jawaban (Text)
                </label>
                <textarea name="response_text"
                          rows="3"
                          class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#a81d5d]/30 text-sm"></textarea>
            </div>

            <!-- Jawaban URL -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 mb-1">
                    Jawaban (URL jika tipe Link)
                </label>
                <input type="text"
                       name="response_url"
                       class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#a81d5d]/30 text-sm">
            </div>

            <!-- Keywords -->
            <div>
                <label class="block text-xs font-semibold text-slate-500 mb-1">
                    Keyword
                </label>
                <input type="text"
                       name="keywords"
                       placeholder="order, beli, produk"
                       class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#a81d5d]/30 text-sm">
            </div>

        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end gap-3 mt-8">
            <a href="{{ route('faq.index') }}"
               class="px-5 py-2.5 rounded-lg bg-slate-100 text-slate-700 font-medium hover:bg-slate-200 transition text-sm">
                Batal
            </a>

            <button type="submit"
                    class="px-6 py-2.5 rounded-lg bg-[#a81d5d] text-white font-semibold shadow hover:bg-[#a81d5d]/90 transition text-sm">
                Simpan FAQ
            </button>
        </div>

    </form>
</div>

@endsection
