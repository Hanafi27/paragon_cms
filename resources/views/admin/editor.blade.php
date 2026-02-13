<style>
    /* Hide scrollbar but keep scrolling */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        /* IE & Edge */
        scrollbar-width: none;
        /* Firefox */
    }
</style>

@extends('admin.layouts.cms')

@section('title', 'Editor Beranda')

@section('content')
<div x-data="homeEditor()" x-init="init()" class="h-[calc(100vh-6rem)] flex bg-slate-50 gap-0">


    <!-- LEFT: SECTION LIST -->
    <aside class="w-72 bg-white border-r border-slate-200 p-5 flex flex-col mr-4">
        <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">
            Struktur Beranda
        </h3>

        <div class="space-y-1">
            <template x-for="section in sections" :key="section.id">
                <div x-show="['hero','about','partner','review','contact','vision','organization'].includes(section.id)"
                    @click="selectSection(section.id)"
                    class="flex items-center justify-between px-3 py-2 rounded-lg cursor-pointer transition" :class="activeSection === section.id 
                    ? 'bg-[#a81d5d]/10 text-[#a81d5d]' 
                    : 'hover:bg-slate-100 text-slate-700'">
                    <div class="flex items-center gap-2">
                        <span class="text-slate-400 cursor-move">☰</span>
                        <span class="text-sm font-medium" x-text="section.name"></span>
                    </div>

                    <button @click.stop="section.active = !section.active"
                        class="relative w-9 h-5 rounded-full transition"
                        :class="section.active ? 'bg-[#a81d5d]' : 'bg-slate-300'">
                        <span class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full transition"
                            :class="section.active ? 'translate-x-4' : ''"></span>
                    </button>
                </div>
            </template>
        </div>
    </aside>

    <!-- CENTER: CANVAS PREVIEW -->
    <main
        class="flex-1 overflow-y-auto scrollbar-hide bg-gradient-to-br from-white via-slate-50 to-slate-100 px-0 py-8 mr-4 shadow-[0_8px_24px_rgba(15,23,42,0.08)]">
        <div class="max-w-6xl mx-auto space-y-12 px-0">
            <template x-for="section in sections" :key="section.id">
                <section
                    x-show="section.active && ['hero','about','partner','review','contact','vision','organization'].includes(section.id)"
                    @click="selectSection(section.id)"
                    class="relative group rounded-2xl border border-slate-200 bg-white shadow-sm px-0 py-0 transition-all duration-200 cursor-pointer hover:shadow-lg hover:border-[#a81d5d]/40 mb-8">
                    <span
                        class="absolute top-5 left-7 text-xs font-bold text-[#a81d5d] bg-white px-3 py-1 rounded shadow-sm z-10">
                        <span x-text="section.name"></span>
                    </span>
                    <div>
                        <template x-if="section.id === 'hero'">
                            <div class="bg-neutral-light py-16 md:py-24 px-4 sm:px-8 rounded-t-2xl">
                                <div class="max-w-7xl mx-auto grid lg:grid-cols-12 gap-8 items-center">
                                    <div class="lg:col-span-7 lg:pr-12">
                                        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-medium mb-6 leading-tight tracking-heading text-primary" contenteditable="true" @input="updateSection('hero', 'title', $event.target.innerText)" x-text="section.title ?? 'PT. PARAGON MEDIKA PHARMA'"></h1>
                                        <p class="text-lg md:text-xl text-neutral mb-8 leading-body max-w-xl" contenteditable="true" @input="updateSection('hero', 'subtitle', $event.target.innerText)" x-text="section.subtitle ?? 'Mitra Terpercaya dalam Distribusi Farmasi untuk Pelayanan Kesehatan yang Lebih Baik.'"></p>
                                        <div class="flex flex-col sm:flex-row gap-4 mb-8">
                                            <a href="#" class="px-6 py-3 bg-accent text-white font-semibold rounded transition-all duration-300 hover:bg-accent-dark inline-block text-center">
                                                Lihat Produk
                                            </a>
                                            <a href="#" class="px-6 py-3 border-2 border-primary text-primary font-medium rounded transition-all duration-300 hover:bg-primary hover:text-white inline-block text-center">
                                                Hubungi Kami
                                            </a>
                                        </div>
                                    </div>
                                    <div class="lg:col-span-5 mt-8 lg:mt-0">
                                        <div class="bg-neutral-lighter rounded-lg p-8 border border-neutral-border shadow-sm">
                                            <div class="space-y-4">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-2 h-2 bg-accent-yellow rounded-full"></div>
                                                    <span class="text-neutral">Distribusi farmasi terpercaya</span>
                                                </div>
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-2 h-2 bg-accent-yellow rounded-full"></div>
                                                    <span class="text-neutral">Layanan kesehatan profesional</span>
                                                </div>
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-2 h-2 bg-accent-yellow rounded-full"></div>
                                                    <span class="text-neutral">Standar kualitas tinggi</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template x-if="section.id === 'about'">
                            <div class="py-16 px-8">
                                <div class="grid md:grid-cols-2 items-center gap-8 mb-12">
                                    <div>
                                        <img :src="section.img_about ?? '/assets/img_about.jpg'" alt="Farmasi" class="rounded-lg shadow-md w-full h-80 object-cover mb-2">
                                        <input type="text" class="border px-2 py-1 rounded w-full text-xs" :value="section.img_about ?? '/assets/img_about.jpg'" @input="updateSection('about', 'img_about', $event.target.value)" placeholder="URL gambar tentang perusahaan">
                                    </div>
                                    <div>
                                        <h2 class="font-heading text-3xl md:text-4xl font-medium mb-4 text-primary tracking-heading" contenteditable="true" @input="updateSection('about', 'title', $event.target.innerText)" x-text="section.title ?? 'Tentang Kami'"></h2>
                                        <div class="h-1 w-16 bg-accent mb-6"></div>
                                        <p class="text-md text-neutral leading-body text-justify" contenteditable="true" @input="updateSection('about', 'desc', $event.target.innerText)" x-text="section.desc ?? 'PT. Paragon Medika Pharma merupakan perusahaan yang bergerak di bidang Pedagang Besar Farmasi (PBF). Didirikan pada 13 Maret 2019, perusahaan ini telah berkembang menjadi mitra terpercaya bagi pelanggan dalam pendistribusian produk farmasi. Dalam menjalankan kegiatan usahanya, PT. Paragon Medika Pharma berkomitmen untuk mendukung kualitas pelayanan kesehatan melalui sistem distribusi dan pengelolaan yang sesuai dengan Peraturan Menteri Kesehatan Republik Indonesia Nomor 1148/MENKES/PER/VI/2011.'"></p>
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 gap-8 mb-12">
                                    <div>
                                        <h3 class="font-heading text-xl font-medium text-primary mb-3" contenteditable="true" @input="updateSection('about', 'komitmen_title', $event.target.innerText)" x-text="section.komitmen_title ?? 'Komitmen Kami'"></h3>
                                        <p class="text-neutral leading-body" contenteditable="true" @input="updateSection('about', 'komitmen_desc', $event.target.innerText)" x-text="section.komitmen_desc ?? 'Sejak berdiri, kami fokus pada distribusi produk farmasi yang aman, berkualitas, dan terpercaya. Setiap produk yang kami distribusikan telah melalui proses seleksi ketat untuk memastikan standar kualitas dan keamanan yang tinggi.'"></p>
                                    </div>
                                    <div>
                                        <h3 class="font-heading text-xl font-medium text-primary mb-3" contenteditable="true" @input="updateSection('about', 'visi_title', $event.target.innerText)" x-text="section.visi_title ?? 'Visi Kami'"></h3>
                                        <p class="text-neutral leading-body" contenteditable="true" @input="updateSection('about', 'visi_desc', $event.target.innerText)" x-text="section.visi_desc ?? 'Menjadi mitra terpercaya dalam distribusi farmasi yang berkontribusi pada peningkatan akses dan kualitas pelayanan kesehatan di Indonesia melalui produk-produk berkualitas tinggi.'"></p>
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="group bg-neutral-lighter border-2 border-neutral-border rounded-lg p-6 hover:border-accent transition-all duration-300 hover:shadow-md cursor-pointer">
                                        <div class="flex items-start justify-between mb-4">
                                            <div class="w-12 h-12 bg-accent-soft rounded-lg flex items-center justify-center group-hover:bg-accent transition-colors duration-300">
                                                <svg class="w-6 h-6 text-accent group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            </div>
                                            <svg class="w-5 h-5 text-neutral group-hover:text-accent transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                                        </div>
                                        <h3 class="font-heading text-xl font-medium text-primary mb-2 group-hover:text-accent transition-colors duration-300" contenteditable="true" @input="updateSection('about', 'card1_title', $event.target.innerText)" x-text="section.card1_title ?? 'Visi & Misi'"></h3>
                                        <p class="text-neutral text-sm leading-body" contenteditable="true" @input="updateSection('about', 'card1_desc', $event.target.innerText)" x-text="section.card1_desc ?? 'Pelajari visi dan misi perusahaan yang menjadi landasan komitmen kami dalam melayani kebutuhan kesehatan masyarakat.'"></p>
                                    </div>
                                    <div class="group bg-neutral-lighter border-2 border-neutral-border rounded-lg p-6 hover:border-accent transition-all duration-300 hover:shadow-md cursor-pointer">
                                        <div class="flex items-start justify-between mb-4">
                                            <div class="w-12 h-12 bg-accent-soft rounded-lg flex items-center justify-center group-hover:bg-accent transition-colors duration-300">
                                                <svg class="w-6 h-6 text-accent group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                            </div>
                                            <svg class="w-5 h-5 text-neutral group-hover:text-accent transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                                        </div>
                                        <h3 class="font-heading text-xl font-medium text-primary mb-2 group-hover:text-accent transition-colors duration-300" contenteditable="true" @input="updateSection('about', 'card2_title', $event.target.innerText)" x-text="section.card2_title ?? 'Struktur Organisasi'"></h3>
                                        <p class="text-neutral text-sm leading-body" contenteditable="true" @input="updateSection('about', 'card2_desc', $event.target.innerText)" x-text="section.card2_desc ?? 'Kenali tim profesional yang berdedikasi dalam menjalankan visi dan misi perusahaan untuk pelayanan kesehatan yang lebih baik.'"></p>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template x-if="section.id === 'partner'">
                            <div class="py-16 px-8">
                                <div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                                    <div class="lg:col-span-5 space-y-6">
                                        <div class="space-y-3">
                                            <h2
                                                class="font-heading text-3xl md:text-4xl font-medium text-primary tracking-heading">
                                                Mitra Kami</h2>
                                            <div class="w-16 h-1 bg-accent rounded-full"></div>
                                            <p class="text-neutral text-base leading-relaxed pt-2">Didukung lebih dari
                                                seribu mitra outlet dan kerjasama korporat yang tersebar di seluruh
                                                Indonesia.</p>
                                        </div>
                                        <div class="flex flex-wrap items-center gap-6">
                                            <div class="space-y-1">
                                                <div class="text-5xl md:text-6xl font-bold text-primary tabular-nums">
                                                        <h2 class="font-heading text-3xl md:text-4xl font-medium text-primary tracking-heading" contenteditable="true" @input="updateSection('partner', 'title', $event.target.innerText)" x-text="section.title ?? 'Partner Kami'"></h2>
                                                <p class="text-sm text-neutral">Total Mitra</p>
                                                        <p class="text-neutral text-base leading-relaxed pt-2" contenteditable="true" @input="updateSection('partner', 'desc', $event.target.innerText)" x-text="section.desc ?? 'Didukung lebih dari seribu mitra outlet dan kerjasama korporat yang tersebar di seluruh Indonesia.'"></p>
                                            <div class="w-px h-12 bg-neutral-200"></div>
                                            <div class="space-y-1">
                                                <div
                                                    class="text-3xl md:text-4xl font-semibold text-primary tabular-nums">
                                                    0<span class="text-2xl md:text-3xl text-accent">+</span></div>
                                                <p class="text-sm text-neutral">Outlet</p>
                                            </div>
                                            <div class="w-px h-12 bg-neutral-200"></div>
                                            <div class="space-y-1">
                                                <div
                                                    class="text-3xl md:text-4xl font-semibold text-primary tabular-nums">
                                                    0<span class="text-2xl md:text-3xl text-accent">+</span></div>
                                                <p class="text-sm text-neutral">Kerjasama</p>
                                            </div>
                                        </div>
                                        <div class="space-y-3">
                                            <div class="flex items-start gap-3">
                                                <div
                                                    class="flex-shrink-0 w-8 h-8 rounded-lg bg-accent/10 flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                </div>
                                                <p class="text-sm text-neutral leading-relaxed pt-0.5">Seleksi mitra
                                                    dengan standar mutu distribusi</p>
                                            </div>
                                            <div class="flex items-start gap-3">
                                                <div
                                                    class="flex-shrink-0 w-8 h-8 rounded-lg bg-accent/10 flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                                </div>
                                                <p class="text-sm text-neutral leading-relaxed pt-0.5">Jangkauan
                                                    nasional untuk kebutuhan farmasi</p>
                                            </div>
                                            <div class="flex items-start gap-3">
                                                <div
                                                    class="flex-shrink-0 w-8 h-8 rounded-lg bg-accent/10 flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                    <template x-for="(img, idx) in [section.partner1_img ?? '/assets/pim.png', section.partner2_img ?? '/assets/berno.png', section.partner3_img ?? '/assets/trifa.png', section.partner4_img ?? '/assets/mersi.png']" :key="idx">
                                                        <div class="flex flex-col items-center">
                                                            <img :src="img" :alt="'Partner ' + (idx+1)" class="h-16 object-contain mb-1">
                                                            <input type="text" class="border px-2 py-1 rounded w-32 text-xs" :value="img" @input="updateSection('partner', 'partner'+(idx+1)+'_img', $event.target.value)" placeholder="URL gambar partner">
                                                        </div>
                                                    </template>
                                                <p class="text-sm text-neutral leading-relaxed pt-0.5">Dukungan logistik
                                                    dan kepatuhan regulasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lg:col-span-7 flex flex-wrap gap-6 items-center justify-center">
                                        <img src="/assets/pim.png" alt="PIM Farmasi"
                                            class="h-16 sm:h-20 object-contain" />
                                        <img src="/assets/berno.png" alt="Bernofarm"
                                            class="h-16 sm:h-20 object-contain" />
                                        <img src="/assets/trifa.png" alt="Trifa" class="h-16 sm:h-20 object-contain" />
                                        <img src="/assets/mersi.png" alt="Mersi Farma"
                                            class="h-16 sm:h-20 object-contain" />
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template x-if="section.id === 'review'">
                            <div class="py-20 bg-neutral-light">
                                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                    <div class="mb-12 text-center">
                                        <h2
                                            class="font-heading text-3xl md:text-4xl font-medium text-primary mb-4 tracking-heading">
                                            Ulasan Klien</h2>
                                        <div class="h-1 w-16 bg-accent mb-4 mx-auto"></div>
                                        <p class="text-lg text-neutral max-w-2xl leading-body mx-auto">Apa kata mitra
                                            kami tentang layanan distribusi farmasi</p>
                                    </div>
                                <div class="grid grid-cols-2 gap-6">
                                        <div class="review-card bg-white p-6 sm:p-7 rounded-2xl border border-neutral-border/70 shadow-lg flex flex-col h-full min-h-80" style="opacity:1 !important; display:block !important; pointer-events:auto !important; visibility:visible !important;">
                                            <div class="flex items-center justify-between mb-4">
                                                <div class="flex items-center gap-1 text-accent-yellow text-base sm:text-lg">★★★★★</div>
                                                <span class="inline-flex items-center gap-2 text-xs font-semibold text-primary bg-accent-soft px-3 py-1 rounded-full">Distribusi</span>
                                            </div>
                                            <div class="text-primary text-2xl leading-none mb-3">“</div>
                                            <p class="text-neutral mb-5 leading-relaxed text-sm sm:text-base flex-1" contenteditable="true" @input="updateSection('review', 'review1', $event.target.innerText)" x-text="section.review1 ?? 'Layanan distribusi yang sangat profesional dan terpercaya. Produk selalu tersedia dan kualitas terjaga dengan baik.'"></p>
                                            <div class="flex items-center pt-4 border-t border-neutral-border/70">
                                                <div class="w-10 h-10 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white font-bold text-xs shadow-md flex-shrink-0">AK</div>
                                                <div class="ml-3">
                                                    <p class="font-semibold text-primary text-sm" contenteditable="true" @input="updateSection('review', 'review1_name', $event.target.innerText)" x-text="section.review1_name ?? 'Ahmad Kurniawan'"></p>
                                                    <p class="text-xs text-neutral" contenteditable="true" @input="updateSection('review', 'review1_from', $event.target.innerText)" x-text="section.review1_from ?? 'Apotek Sehat Jaya'"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-card bg-white p-6 sm:p-7 rounded-2xl border border-neutral-border/70 shadow-lg flex flex-col h-full min-h-80" style="opacity:1 !important; display:block !important; pointer-events:auto !important; visibility:visible !important;">
                                            <div class="flex items-center justify-between mb-4">
                                                <div class="flex items-center gap-1 text-accent-yellow text-base sm:text-lg">★★★★★</div>
                                                <span class="inline-flex items-center gap-2 text-xs font-semibold text-primary bg-primary/10 px-3 py-1 rounded-full">Responsif</span>
                                            </div>
                                            <div class="text-primary text-2xl leading-none mb-3">“</div>
                                            <p class="text-neutral mb-5 leading-relaxed text-sm sm:text-base flex-1" contenteditable="true" @input="updateSection('review', 'review2', $event.target.innerText)" x-text="section.review2 ?? 'Kerja sama yang sangat baik. Tim responsif dan produk farmasi yang didistribusikan selalu sesuai standar kualitas.'"></p>
                                            <div class="flex items-center pt-4 border-t border-neutral-border/70">
                                                <div class="w-10 h-10 bg-gradient-to-br from-accent to-accent-dark rounded-full flex items-center justify-center text-white font-bold text-xs shadow-md flex-shrink-0">SM</div>
                                                <div class="ml-3">
                                                    <p class="font-semibold text-primary text-sm" contenteditable="true" @input="updateSection('review', 'review2_name', $event.target.innerText)" x-text="section.review2_name ?? 'Siti Mulyani'"></p>
                                                    <p class="text-xs text-neutral" contenteditable="true" @input="updateSection('review', 'review2_from', $event.target.innerText)" x-text="section.review2_from ?? 'Klinik Pratama Sejahtera'"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-card bg-white p-6 sm:p-7 rounded-2xl border border-neutral-border/70 shadow-lg flex flex-col h-full min-h-80" style="opacity:1 !important; display:block !important; pointer-events:auto !important; visibility:visible !important;">
                                            <div class="flex items-center justify-between mb-4">
                                                <div class="flex items-center gap-1 text-accent-yellow text-base sm:text-lg">★★★★★</div>
                                                <span class="inline-flex items-center gap-2 text-xs font-semibold text-primary bg-accent-soft px-3 py-1 rounded-full">Kecepatan</span>
                                            </div>
                                            <div class="text-primary text-2xl leading-none mb-3">“</div>
                                            <p class="text-neutral mb-5 leading-relaxed text-sm sm:text-base flex-1" contenteditable="true" @input="updateSection('review', 'review3', $event.target.innerText)" x-text="section.review3 ?? 'Mitra terpercaya untuk distribusi farmasi. Pelayanan cepat dan produk selalu tersedia saat dibutuhkan.'"></p>
                                            <div class="flex items-center pt-4 border-t border-neutral-border/70">
                                                <div class="w-10 h-10 bg-gradient-to-br from-primary-light to-primary rounded-full flex items-center justify-center text-white font-bold text-xs shadow-md flex-shrink-0">BD</div>
                                                <div class="ml-3">
                                                    <p class="font-semibold text-primary text-sm" contenteditable="true" @input="updateSection('review', 'review3_name', $event.target.innerText)" x-text="section.review3_name ?? 'Budi Santoso'"></p>
                                                    <p class="text-xs text-neutral" contenteditable="true" @input="updateSection('review', 'review3_from', $event.target.innerText)" x-text="section.review3_from ?? 'Rumah Sakit Umum Daerah'"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-card bg-white p-6 sm:p-7 rounded-2xl border border-neutral-border/70 shadow-lg flex flex-col h-full min-h-80" style="opacity:1 !important; display:block !important; pointer-events:auto !important; visibility:visible !important;">
                                            <div class="flex items-center justify-between mb-4">
                                                <div class="flex items-center gap-1 text-accent-yellow text-base sm:text-lg">★★★★★</div>
                                                <span class="inline-flex items-center gap-2 text-xs font-semibold text-primary bg-accent-soft px-3 py-1 rounded-full">Logistik</span>
                                            </div>
                                            <div class="text-primary text-2xl leading-none mb-3">“</div>
                                            <p class="text-neutral mb-5 leading-relaxed text-sm sm:text-base flex-1" contenteditable="true" @input="updateSection('review', 'review4', $event.target.innerText)" x-text="section.review4 ?? 'Distribusi farmasi terbaik dengan sistem logistik yang efisien dan produk berkualitas tinggi.'"></p>
                                            <div class="flex items-center pt-4 border-t border-neutral-border/70">
                                                <div class="w-10 h-10 bg-gradient-to-br from-accent-yellow to-accent rounded-full flex items-center justify-center text-white font-bold text-xs shadow-md flex-shrink-0">RW</div>
                                                <div class="ml-3">
                                                    <p class="font-semibold text-primary text-sm" contenteditable="true" @input="updateSection('review', 'review4_name', $event.target.innerText)" x-text="section.review4_name ?? 'Rini Wijaya'"></p>
                                                    <p class="text-xs text-neutral" contenteditable="true" @input="updateSection('review', 'review4_from', $event.target.innerText)" x-text="section.review4_from ?? 'Farmasi Mandiri Indonesia'"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template x-if="section.id === 'contact'">
                            <div class="py-12 sm:py-16 md:py-20 bg-white relative">
                                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative">
                                    <div class="text-center mb-8 sm:mb-12">
                                        <h2 class="mt-4 text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-800">
                                            Butuh bantuan?</h2>
                                        <p class="mt-2 text-sm sm:text-base text-gray-600 px-4">Tim Paragon siap
                                            membantu Anda. Silakan pilih cara kontak di bawah ini.</p>
                                    </div>
                                    <div class="grid md:grid-cols-2 gap-6 sm:gap-8 md:gap-10">
                                        <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6">
                                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-1 sm:mb-2">Nama</h3>
                                            <span contenteditable="true" class="outline-none border-b border-dashed border-accent focus:border-primary px-1" @input="updateSection('contact', 'nama', $event.target.innerText)" x-text="section.nama"></span>
                                        </div>
                                        <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6">
                                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-1 sm:mb-2">Email</h3>
                                            <span contenteditable="true" class="outline-none border-b border-dashed border-accent focus:border-primary px-1" @input="updateSection('contact', 'email', $event.target.innerText)" x-text="section.email"></span>
                                        </div>
                                        <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6">
                                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-1 sm:mb-2">No. WhatsApp</h3>
                                            <span contenteditable="true" class="outline-none border-b border-dashed border-accent focus:border-primary px-1" @input="updateSection('contact', 'wa', $event.target.innerText)" x-text="section.wa"></span>
                                        </div>
                                        <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6">
                                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-1 sm:mb-2">Hari/Jam Operasional</h3>
                                            <span contenteditable="true" class="outline-none border-b border-dashed border-accent focus:border-primary px-1" @input="updateSection('contact', 'jam', $event.target.innerText)" x-text="section.jam"></span>
                                        </div>
                                        <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 md:col-span-2">
                                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-1 sm:mb-2">Alamat</h3>
                                            <span contenteditable="true" class="outline-none border-b border-dashed border-accent focus:border-primary px-1" @input="updateSection('contact', 'alamat', $event.target.innerText)" x-text="section.alamat && section.alamat.trim() !== '' ? section.alamat : 'Jl. Karangnanas No. 10, Sokaraja, Banyumas, Jawa Tengah'"></span>
                                        </div>
                                    </div>
                                    <div class="mt-8 flex flex-col items-center">
                                        <img :src="section.map_img ?? '/assets/map.png'" alt="Map" class="rounded-lg shadow-md w-full max-w-xl h-80 object-cover mb-2">
                                        <input type="text" class="border px-2 py-1 rounded w-full max-w-xl text-xs" :value="section.map_img ?? '/assets/map.png'" @input="updateSection('contact', 'map_img', $event.target.value)" placeholder="URL gambar peta">
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template x-if="section.id === 'vision'">
                            <div class="bg-white py-16 sm:py-24 relative overflow-hidden pt-10 md:pt-0">
                                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                                    <h3 class="font-heading text-xl font-medium text-primary mb-2 mt-8 group-hover:text-accent transition-colors duration-300" contenteditable="true" @input="updateSection('vision', 'section_title', $event.target.innerText)" x-text="section.section_title ?? 'Visi & Misi'"></h3>
                                    <div class="w-12 h-1 bg-accent mx-auto rounded-full mb-6"></div>
                                    <p class="text-lg text-neutral max-w-2xl mx-auto leading-body">
                                        <span contenteditable="true" class="outline-none border-b border-dashed border-accent focus:border-primary px-1" @input="updateSection('vision', 'intro', $event.target.innerText)" x-text="section.intro"></span>
                                    </p>
                                </div>
                                <div class="bg-neutral-light py-16 relative overflow-hidden pt-8 md:pt-0">
                                    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                                        <div class="bg-white rounded-2xl shadow-sm p-8 sm:p-12 text-center border border-neutral-border/50 relative overflow-hidden">
                                            <h2 class="font-heading text-3xl font-bold text-primary mb-6" contenteditable="true" @input="updateSection('vision', 'visi_title', $event.target.innerText)" x-text="section.visi_title ?? 'Visi Kami'"></h2>
                                            <p class="text-xl sm:text-2xl text-neutral-600 font-light italic leading-relaxed">
                                                <span contenteditable="true" class="outline-none border-b border-dashed border-accent focus:border-primary px-1" @input="updateSection('vision', 'visi', $event.target.innerText)" x-text="section.visi"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white py-16 sm:py-24">
                                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                        <div class="text-center mb-16 bg-neutral-lighter rounded-xl p-6 shadow">
                                            <h2 class="font-heading text-3xl font-bold text-primary mb-4 mt-6" contenteditable="true" @input="updateSection('vision', 'misi_title', $event.target.innerText)" x-text="section.misi_title ?? 'Misi Kami'"></h2>
                                            <p class="text-neutral text-lg">
                                                <span contenteditable="true" class="outline-none border-b border-dashed border-accent focus:border-primary px-1" @input="updateSection('vision', 'misi', $event.target.innerText)" x-text="section.misi"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template x-if="section.id === 'organization'">
                            <div class="bg-white py-16 sm:py-24 relative overflow-hidden pt-10 md:pt-0">
                                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                                    <h1 class="font-heading text-4xl sm:text-5xl font-bold text-primary mb-4 tracking-heading mt-8" contenteditable="true" @input="updateSection('organization', 'title', $event.target.innerText)" x-text="section.title ?? 'Struktur Organisasi'"></h1>
                                    <div class="w-12 h-1 bg-accent mx-auto rounded-full mb-6"></div>
                                    <p class="text-lg text-neutral max-w-2xl mx-auto leading-body">
                                        <span contenteditable="true" class="outline-none border-b border-dashed border-accent focus:border-primary px-1" @input="updateSection('organization', 'org_intro', $event.target.innerText)" x-text="section.org_intro"></span>
                                    </p>
                                </div>
                                <div class="bg-neutral-light py-16 relative overflow-hidden pt-4 md:pt-0">
                                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                        <div class="text-center mb-12">
                                            <h2 class="font-heading text-3xl font-bold text-primary mb-4">Bagan
                                                Organisasi</h2>
                                            <p class="text-neutral">Alur koordinasi dan tanggung jawab PT Paragon Medika
                                                Pharma</p>
                                        </div>
                                        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-6">
                                            <div class="relative group cursor-pointer">
                                                <img :src="section.org_chart" alt="Struktur Organisasi"
                                                    class="w-full h-auto object-contain rounded-lg transition-transform duration-300 hover:scale-105"
                                                    @click="$refs.orgChartInput.click()" style="cursor:pointer;" />
                                                <input type="file" accept="image/*" class="hidden" x-ref="orgChartInput"
                                                    @change="handleImageUpload($event, section, 'org_chart')">
                                                <div
                                                    class="absolute inset-0 bg-black/0 group-hover:bg-black/10 flex items-center justify-center transition-all duration-300 rounded-lg">
                                                    <div
                                                        class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white/90 px-4 py-2 rounded-lg">
                                                        <svg class="w-6 h-6 text-primary inline-block mr-2" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7">
                                                            </path>
                                                        </svg>
                                                        <span class="text-sm font-medium text-primary">Klik untuk Ganti
                                                            Gambar</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white py-16 sm:py-24">
                                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                        <div class="text-center mb-16">
                                            <h2 class="font-heading text-3xl font-bold text-primary mb-4">Pimpinan Kami
                                            </h2>
                                            <p class="text-neutral text-lg mb-6">Tokoh di balik berdirinya PT Paragon
                                                Medika Pharma</p>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-3xl mx-auto text-center">
                                            <div>
                                                <div class="flex justify-center mb-4 cursor-pointer"
                                                    @click="$refs.founderInput.click()">
                                                    <img :src="section.founder_img" alt="DANIEL SETIAWAN PRIADI,S.E"
                                                        class="w-40 h-40 object-cover rounded-full border-4 border-accent shadow-md hover:scale-105 transition-transform duration-300" />
                                                    <input type="file" accept="image/*" class="hidden"
                                                        x-ref="founderInput"
                                                        @change="handleImageUpload($event, section, 'founder_img')">
                                                </div>
                                                <h3 class="font-heading text-lg font-bold text-primary mb-1"><span
                                                        contenteditable="true"
                                                        @input="section.founder_name = $event.target.innerText"
                                                        x-text="section.founder_name"></span></h3>
                                                <p class="text-accent font-medium text-sm uppercase"><span
                                                        contenteditable="true"
                                                        @input="section.founder_role = $event.target.innerText"
                                                        x-text="section.founder_role"></span></p>
                                            </div>
                                            <div>
                                                <div class="flex justify-center mb-4 cursor-pointer"
                                                    @click="$refs.coFounderInput.click()">
                                                    <img :src="section.co_founder_img" alt="FELISIA DANIKA,S.TP"
                                                        class="w-40 h-40 object-cover rounded-full border-4 border-accent shadow-md hover:scale-105 transition-transform duration-300" />
                                                    <input type="file" accept="image/*" class="hidden"
                                                        x-ref="coFounderInput"
                                                        @change="handleImageUpload($event, section, 'co_founder_img')">
                                                </div>
                                                <h3 class="font-heading text-lg font-bold text-primary mb-1"><span
                                                        contenteditable="true"
                                                        @input="section.co_founder_name = $event.target.innerText"
                                                        x-text="section.co_founder_name"></span></h3>
                                                <p class="text-accent font-medium text-sm uppercase"><span
                                                        contenteditable="true"
                                                        @input="section.co_founder_role = $event.target.innerText"
                                                        x-text="section.co_founder_role"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-neutral-light py-16">
                                    <div class="max-w-4xl mx-auto px-4">
                                        <div class="text-center mb-8">
                                            <h2 class="font-heading text-3xl font-bold text-primary mb-4">Tim Hebat Kami
                                            </h2>
                                            <p class="text-neutral text-lg">Sinergi profesional muda yang berdedikasi
                                            </p>
                                        </div>
                                        <div class="w-full mx-auto aspect-video rounded-2xl overflow-hidden shadow-lg cursor-pointer"
                                            @click="$refs.teamInput.click()">
                                            <img :src="section.team_img" alt="Tim Paragon Medika Pharma"
                                                class="inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                                            <input type="file" accept="image/*" class="hidden" x-ref="teamInput"
                                                @change="handleImageUpload($event, section, 'team_img')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
            </template>
        </div>
        </section>
        </template>
</div>
</div>
</section>
</template>
</div>
</main>


<!-- RIGHT: SETTINGS PANEL -->
<aside class="w-80 bg-white border-l border-slate-200 p-6" x-show="activeSection" x-transition>
    <template x-for="section in sections" :key="section.id">
        <div x-show="activeSection === section.id">

            <h4 class="text-sm font-bold text-slate-900 mb-6">
                Pengaturan Section
            </h4>

            <div class="space-y-5">

                <div>
                    <label class="text-xs font-semibold text-slate-500 uppercase">
                        Judul
                    </label>
                    <input
                        class="mt-1 w-full px-3 py-2 border border-slate-200 rounded-md text-sm focus:ring-2 focus:ring-[#a81d5d]/20"
                        x-model="section.title">
                </div>

                <div>
                    <label class="text-xs font-semibold text-slate-500 uppercase">
                        Deskripsi
                    </label>
                    <textarea rows="4"
                        class="mt-1 w-full px-3 py-2 border border-slate-200 rounded-md text-sm focus:ring-2 focus:ring-[#a81d5d]/20"
                        x-model="section.description"></textarea>
                </div>

                <div>
                    <label class="text-xs font-semibold text-slate-500 uppercase">
                        Tampilan
                    </label>
                    <select class="mt-1 w-full px-3 py-2 border border-slate-200 rounded-md text-sm">
                        <option>Default</option>
                        <option>Minimal</option>
                        <option>Highlight</option>
                    </select>
                </div>

            </div>
        </div>
    </template>
</aside>


</div>


<!-- Alpine Logic -->
<script>
    function homeEditor() {
        return {
            activeSection: 'hero',
            sections: [{
                    id: 'hero',
                    name: 'Hero',
                    active: true
                },
                {
                    id: 'about',
                    name: 'Tentang Perusahaan',
                    active: true
                },
                {
                    id: 'partner',
                    name: 'Mitra',
                    active: true
                },
                {
                    id: 'review',
                    name: 'Ulasan',
                    active: true
                },
                {
                    id: 'contact',
                    name: 'Kontak',
                    active: true,
                    nama: 'PT. Paragon Medika Pharma',
                    email: 'paragonmedikapharma2019@gmail.com',
                    wa: '+62 887-6634-529'
                },
                {
                    id: 'vision',
                    name: 'Visi & Misi',
                    active: true,
                    intro: 'Komitmen kami untuk memberikan standar kesehatan terbaik melalui inovasi dan integritas.',
                    visi: 'Menjadi perusahaan jasa distribusi dan logistic yang terintegrasi di dalam bidang kesehatan, mengutamakan pelayanan yang terbaik, serta dapat dipercaya dengan didukung Sumber Daya Manusia (SDM) yang berkompeten serta ahli, dan didukung oleh system terbaik',
                    misi: 'Turut serta membangun bangsa  melalui kinerja di dalam pelayanan kesehatan, dimana dapat selalu memastikan ketersediaan logistik.'
                },
                {
                    id: 'organization',
                    name: 'Struktur Organisasi',
                    active: true,
                    org_intro: 'Fondasi kuat yang dibangun oleh para profesional berdedikasi untuk mencapai visi perusahaan.',
                    org_chart: '/assets/struktur.png',
                    founder_img: '/assets/ow.png',
                    founder_name: 'DANIEL SETIAWAN PRIADI,S.E',
                    founder_role: 'CEO | Founder',
                    co_founder_img: '/assets/ow2.png',
                    co_founder_name: 'FELISIA DANIKA,S.TP',
                    co_founder_role: 'Kepala BPF',
                    team_img: '/assets/tim.png'
                },
            ],

            selectSection(id) {
                this.activeSection = id;
            },
            // Fallback: jika tidak ada section aktif, pilih section pertama yang tersedia
            init() {
                if (!this.activeSection) {
                    let firstActive = this.sections.find(s => s.active);
                    this.activeSection = firstActive ? firstActive.id : (this.sections[0]?.id || 'hero');
                }
            },
            updateSection(section, key, value, type = 'text') {
                fetch('/admin/homepage/update-section', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                    },
                    body: JSON.stringify({section, key, value, type})
                });
            }
        }
    }
</script>

{{-- Contoh penggunaan pada elemen editable --}}
{{--
<span contenteditable="true"
      @input="updateSection('hero', 'title', $event.target.innerText)"
      x-text="section.title"></span>
--}}

@endsection