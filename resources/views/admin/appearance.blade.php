@extends('admin.layouts.cms')

@section('title', 'Kelola Tampilan Website')

@section('content')
<div class="w-full max-w-6xl mx-auto px-2 md:px-0">
    <!-- Header Halaman -->
    <div class="mb-5">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-4xl font-extrabold text-[#a81d5d] tracking-tight mb-2 flex items-center gap-3">
                    <i class="fas fa-palette text-[#a81d5d] text-3xl"></i>
                    Kelola Tema & Event
                </h1>
                <p class="text-base text-slate-500 leading-relaxed max-w-2xl">Atur branding, konten, dan event perusahaan dengan mudah</p>
            </div>
            <div class="flex flex-col items-end gap-2">
                <span class="px-5 py-2 rounded-xl bg-gradient-to-r from-[#a81d5d]/10 to-[#a81d5d]/20 text-[#a81d5d] font-extrabold text-lg shadow">Tema Aktif: <span class="font-bold">Default</span></span>
                <span class="text-xs text-slate-400">Hanya satu tema dapat aktif dalam satu waktu</span>
            </div>
        </div>
    </div>

    <!-- Section: Pilihan Tema (Dropdown) -->
    <div class="">
        <h2 class="text-2xl font-bold text-[#a81d5d] mb-4">Pilih Tema</h2>
        <div x-data="{ selected: 'Default', themes: [
            {name: 'Default', icon: 'fa-star', color: '#a81d5d'},
            {name: 'Natal', icon: 'fa-tree', color: '#1e293b'},
            {name: 'Imlek', icon: 'fa-dragon', color: '#eab308'},
            {name: 'Ramadan', icon: 'fa-moon', color: '#22d3ee'},
        ], customName: '', customColor: '#a81d5d', customIcon: '' }">
            <select x-model="selected" class="border border-slate-200 rounded-lg px-4 py-3 text-lg font-bold focus:ring-2 focus:ring-[#a81d5d] bg-white w-full max-w-md mb-4">
                <template x-for="theme in themes" :key="theme.name">
                    <option x-text="theme.name"></option>
                </template>
                <option value="Custom">Custom...</option>
            </select>
            <template x-if="selected === 'Custom'">
                <div class="bg-white rounded-xl border-2 border-dashed border-[#a81d5d] shadow-xl p-6 flex flex-col gap-3 max-w-md">
                    <label class="font-bold text-base">Nama Tema Custom</label>
                    <input x-model="customName" type="text" class="border border-slate-200 rounded-lg px-4 py-2 text-base focus:ring-2 focus:ring-[#a81d5d]" placeholder="Nama Tema Custom">
                    <label class="font-bold text-base">Warna Aksen</label>
                    <input x-model="customColor" type="color" class="w-16 h-10 border rounded-lg">
                    <label class="font-bold text-base">Icon Dekoratif</label>
                    <input x-model="customIcon" type="file" class="border border-slate-200 rounded-lg px-3 py-2">
                </div>
            </template>
        </div>
    </div>

    <!-- Section: Panel Konfigurasi Tema (Detail Panel) -->
    <div class="mb-10">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl p-0 flex flex-col lg:flex-row gap-0">
            <!-- Kolom Kiri: Pengaturan Tema (Card Group) -->
            <div class="flex-1 min-w-[260px] p-8 flex flex-col gap-6 border-r border-slate-100">
                <h3 class="text-2xl font-extrabold text-[#a81d5d] mb-4">Konfigurasi Tema</h3>
                <form class="space-y-6">
                    <!-- Status Tema (Toggle) -->
                    <div class="bg-slate-50 rounded-xl p-5 flex flex-col gap-2 shadow-sm">
                        <label class="block text-base font-bold mb-1">Status Tema</label>
                        <div class="flex items-center gap-3">
                            <button type="button" x-data="{on:true}" @click="on=!on" :class="on ? 'bg-[#a81d5d]' : 'bg-slate-300'" class="relative w-14 h-8 rounded-full transition flex items-center px-1">
                                <span :class="on ? 'translate-x-6 bg-white' : 'translate-x-0 bg-white'" class="absolute left-1 top-1 w-6 h-6 rounded-full shadow transition-transform duration-200"></span>
                            </button>
                            <span class="text-base font-semibold" x-text="on ? 'Aktif' : 'Nonaktif'"></span>
                        </div>
                        <p class="text-xs text-slate-400 mt-1">Hanya satu tema dapat aktif dalam satu waktu.</p>
                    </div>
                    <!-- Warna Aksen -->
                    <div class="bg-slate-50 rounded-xl p-5 flex flex-col gap-2 shadow-sm">
                        <label class="block text-base font-bold mb-1">Warna Aksen</label>
                        <input type="color" class="w-20 h-12 border-2 border-[#a81d5d] rounded-xl" x-bind:value="selected === 'Custom' ? customColor : (themes.find(t => t.name === selected)?.color || '#a81d5d')">
                        <p class="text-xs text-slate-400 mt-1">Pilih warna utama untuk tema ini.</p>
                    </div>
                    <!-- Icon Dekoratif (Drag Drop) -->
                    <div class="bg-slate-50 rounded-xl p-5 flex flex-col gap-2 shadow-sm">
                        <label class="block text-base font-bold mb-1">Icon Dekoratif</label>
                        <div class="flex flex-col gap-2">
                            <div class="border-2 border-dashed border-[#a81d5d] rounded-xl p-4 flex flex-col items-center justify-center cursor-pointer hover:bg-[#a81d5d]/5 transition">
                                <span class="text-slate-400 text-sm mb-2">Drag & drop icon di sini</span>
                                <input type="file" class="hidden" id="iconUpload">
                                <label for="iconUpload" class="px-4 py-2 rounded-lg bg-[#a81d5d] text-white font-bold cursor-pointer">Pilih Icon</label>
                            </div>
                        </div>
                        <p class="text-xs text-slate-400 mt-1">Upload atau pilih icon dekoratif untuk tema.</p>
                    </div>
                    <!-- CTA Simpan -->
                    <div class="flex flex-row gap-3 justify-end mt-2">
                        <button type="submit" class="px-6 py-3 rounded-xl bg-[#a81d5d] text-white font-bold shadow-lg hover:bg-[#a81d5d]/90">Simpan Perubahan</button>
                        <button type="button" class="px-6 py-3 rounded-xl bg-slate-100 text-slate-500 font-bold shadow-lg hover:bg-slate-200 transition">Reset ke Default</button>
                    </div>
                </form>
            </div>
            <!-- Kolom Kanan: Preview Tema (UI Card) -->
            <div class="flex-1 min-w-[260px] flex flex-col items-center justify-center p-8">
                <h3 class="text-2xl font-extrabold text-[#a81d5d] mb-4">Preview Tema</h3>
                <div class="w-full max-w-md bg-white rounded-xl border border-slate-200 shadow-lg p-6 flex flex-col gap-4">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center" :style="'background:' + (selected === 'Custom' ? customColor : (themes.find(t => t.name === selected)?.color || '#a81d5d')) + '22'">
                            <i class="fas" :class="selected === 'Custom' ? 'fa-star' : (themes.find(t => t.name === selected)?.icon || 'fa-star')" :style="'color:' + (selected === 'Custom' ? customColor : (themes.find(t => t.name === selected)?.color || '#a81d5d'))" class="text-2xl"></i>
                        </div>
                        <span class="font-bold text-lg" :style="'color:' + (selected === 'Custom' ? customColor : (themes.find(t => t.name === selected)?.color || '#a81d5d'))">Contoh Judul Beranda</span>
                    </div>
                    <div class="w-full h-3 rounded bg-slate-100 mb-2">
                        <div :style="'background:' + (selected === 'Custom' ? customColor : (themes.find(t => t.name === selected)?.color || '#a81d5d'))" class="h-3 rounded" style="width: 60%"></div>
                    </div>
                    <div class="flex gap-2">
                        <span class="px-3 py-1 rounded-full bg-[#a81d5d]/10 text-[#a81d5d] font-bold text-xs">Button</span>
                        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-500 font-bold text-xs">Label</span>
                    </div>
                </div>
                <p class="text-xs text-slate-400 mt-4">Preview hanya menampilkan elemen UI yang terpengaruh tema.</p>
            </div>
        </div>
    </div>

    <!-- Section: Aksi -->
    <div class="mb-10 flex gap-4 justify-end">
        <button class="px-6 py-3 rounded-xl bg-[#a81d5d] text-white font-bold shadow-lg hover:bg-[#a81d5d]/90">Simpan Perubahan</button>
        <button class="px-6 py-3 rounded-xl bg-slate-100 text-slate-500 font-bold shadow-lg hover:bg-slate-200">Batalkan Perubahan</button>
    </div>
</div>
@endsection
