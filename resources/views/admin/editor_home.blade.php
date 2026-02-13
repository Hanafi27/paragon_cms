@extends('admin.layouts.cms')

@section('title', 'Editor Beranda')

@section('content')
<!-- Hero Section -->
<section class="bg-neutral-light py-24 lg:py-32 overflow-hidden relative">
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-20 -left-20 w-72 h-72 bg-accent/5 rounded-full blur-3xl hidden sm:block"></div>
        <div class="absolute top-40 -right-32 w-96 h-96 bg-primary/4 rounded-full blur-3xl hidden sm:block"></div>
        <div class="absolute bottom-20 left-1/3 w-64 h-64 bg-accent-soft/40 rounded-full blur-2xl hidden sm:block"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-7 lg:pr-12 animate-fade-left">
                <form method="POST" action="{{ route('admin.homepage.update') }}" enctype="multipart/form-data">
                    @csrf
                    <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-medium mb-6 leading-tight tracking-heading text-primary">
                        <input type="text" name="hero_title" value="{{ $hero_title ?? 'PT. PARAGON MEDIKA PHARMA' }}" class="w-full border rounded px-3 py-2" />
                    </h1>
                    <p class="text-lg md:text-xl text-neutral mb-8 leading-body max-w-xl">
                        <input type="text" name="hero_subtitle" value="{{ $hero_subtitle ?? 'Mitra Terpercaya dalam Distribusi Farmasi untuk Pelayanan Kesehatan yang Lebih Baik.' }}" class="w-full border rounded px-3 py-2" />
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <a href="#" class="px-6 py-3 bg-accent text-white font-semibold rounded transition-all duration-300 hover:bg-accent-dark inline-block text-center">Lihat Produk</a>
                        <a href="#kontak" class="px-6 py-3 border-2 border-primary text-primary font-medium rounded transition-all duration-300 hover:bg-primary hover:text-white inline-block text-center">Hubungi Kami</a>
                    </div>
                    <!-- About Section -->
                    <h2 class="font-heading text-3xl md:text-4xl font-medium mb-4 text-primary tracking-heading">
                        <input type="text" name="about_title" value="{{ $about_title ?? 'Tentang Kami' }}" class="w-full border rounded px-3 py-2" />
                    </h2>
                    <div class="h-1 w-16 bg-accent mb-6"></div>
                    <textarea name="about_desc" class="w-full border rounded px-3 py-2 mb-8" rows="6">{{ $about_desc ?? 'PT. Paragon Medika Pharma merupakan perusahaan yang bergerak di bidang Pedagang Besar Farmasi (PBF)...' }}</textarea>
                    <button type="submit" class="bg-accent text-white px-6 py-2 rounded font-semibold">Simpan Perubahan</button>
                </form>
            </div>
            <div class="lg:col-span-5 mt-8 lg:mt-0 animate-fade-right hero-parallax">
                <div class="bg-neutral-lighter rounded-lg p-8 border border-neutral-border shadow-sm">
                    <img src="{{ asset('assets/img_about.jpg') }}" alt="Farmasi" class="rounded-lg shadow-md w-full h-80 object-cover mb-6">
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
</section>
<!-- Editor Form -->
<!-- Products Section -->
<section id="products-section" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12 animate-fade-up">
            <h2 class="font-heading text-3xl md:text-4xl font-medium text-primary mb-4 tracking-heading">Produk Kami</h2>
            <div class="h-1 w-16 bg-accent mb-4"></div>
            <input type="text" name="products_desc" value="{{ $products_desc ?? 'Menyediakan produk farmasi berkualitas dengan standar tinggi untuk mendukung pelayanan kesehatan yang lebih baik.' }}" class="w-full border rounded px-3 py-2 mb-4" />
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
            @for($i = 1; $i <= 3; $i++)
            <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col">
                <div class="h-40 bg-slate-100 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                    <input type="file" name="product_img_{{ $i }}" />
                </div>
                <input type="text" name="product_name_{{ $i }}" value="{{ isset(${'product_name_'.$i}) ? ${'product_name_'.$i} : 'Produk '.$i }}" class="font-bold text-lg text-primary mb-1 w-full border rounded px-2 py-1" />
                <input type="text" name="product_category_{{ $i }}" value="{{ isset(${'product_category_'.$i}) ? ${'product_category_'.$i} : '-' }}" class="text-slate-500 text-sm mb-2 w-full border rounded px-2 py-1" />
                <input type="text" name="product_stock_{{ $i }}" value="{{ isset(${'product_stock_'.$i}) ? ${'product_stock_'.$i} : '-' }}" class="text-slate-400 text-xs mb-4 w-full border rounded px-2 py-1" />
                <a href="#" class="mt-auto px-4 py-2 bg-accent text-white rounded-lg text-center font-semibold hover:bg-accent-dark transition">Detail</a>
            </div>
            @endfor
        </div>
        <div class="mt-10 justify-center flex">
            <a href="#" class="inline-block px-6 py-3 bg-accent text-white font-medium rounded transition-all duration-300 hover:bg-accent-dark">Lihat Semua Produk</a>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section id="partners-section" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="lg:col-span-5 space-y-6 animate-fade-left">
                <div class="space-y-3">
                    <h2 class="font-heading text-3xl md:text-4xl font-medium text-primary tracking-heading">Mitra Kami</h2>
                    <div class="w-16 h-1 bg-accent rounded-full"></div>
                    <input type="text" name="partners_desc" value="{{ $partners_desc ?? 'Didukung lebih dari seribu mitra outlet dan kerjasama korporat yang tersebar di seluruh Indonesia.' }}" class="w-full border rounded px-3 py-2 mb-4" />
                </div>
                <div class="flex flex-wrap items-center gap-6">
                    <div class="space-y-1">
                        <input type="text" name="partners_total" value="{{ $partners_total ?? '1945+' }}" class="text-5xl md:text-6xl font-bold text-primary tabular-nums w-full border rounded px-2 py-1" />
                        <p class="text-sm text-neutral">Total Mitra</p>
                    </div>
                    <div class="w-px h-12 bg-neutral-200"></div>
                    <div class="space-y-1">
                        <input type="text" name="partners_outlet" value="{{ $partners_outlet ?? '973+' }}" class="text-3xl md:text-4xl font-semibold text-primary tabular-nums w-full border rounded px-2 py-1" />
                        <p class="text-sm text-neutral">Outlet</p>
                    </div>
                    <div class="w-px h-12 bg-neutral-200"></div>
                    <div class="space-y-1">
                        <input type="text" name="partners_kerjasama" value="{{ $partners_kerjasama ?? '972+' }}" class="text-3xl md:text-4xl font-semibold text-primary tabular-nums w-full border rounded px-2 py-1" />
                        <p class="text-sm text-neutral">Kerjasama</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <input type="text" name="partners_mutu" value="{{ $partners_mutu ?? 'Seleksi mitra dengan standar mutu distribusi' }}" class="w-full border rounded px-2 py-1 mb-2" />
                    <input type="text" name="partners_jangkauan" value="{{ $partners_jangkauan ?? 'Jangkauan nasional untuk kebutuhan farmasi' }}" class="w-full border rounded px-2 py-1 mb-2" />
                    <input type="text" name="partners_logistik" value="{{ $partners_logistik ?? 'Dukungan logistik dan kepatuhan regulasi' }}" class="w-full border rounded px-2 py-1 mb-2" />
                </div>
            </div>
            <div class="lg:col-span-7 animate-fade-up">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8 items-center justify-items-center auto-rows-min">
                    <img src="/assets/pim.png" alt="PIM Farmasi" class="h-16 sm:h-20 object-contain transition duration-300 transform hover:scale-105" loading="lazy" />
                    <img src="/assets/berno.png" alt="Bernofarm" class="h-16 sm:h-20 object-contain transition duration-300 transform hover:scale-105" loading="lazy" />
                    <img src="/assets/trifa.png" alt="Trifa" class="h-16 sm:h-20 object-contain transition duration-300 transform hover:scale-105 scale-105" loading="lazy" />
                    <img src="/assets/mersi.png" alt="Mersi Farma" class="h-16 sm:h-20 object-contain transition duration-300 transform hover:scale-105" loading="lazy" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section id="reviews-section" class="py-20 bg-neutral-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12 animate-fade-up">
            <h2 class="font-heading text-3xl md:text-4xl font-medium text-primary mb-4 tracking-heading">Ulasan Klien</h2>
            <div class="h-1 w-16 bg-accent mb-4"></div>
            <input type="text" name="reviews_desc" value="{{ $reviews_desc ?? 'Apa kata mitra kami tentang layanan distribusi farmasi' }}" class="w-full border rounded px-3 py-2 mb-4" />
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
            @for($i = 1; $i <= 5; $i++)
            <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col">
                <input type="text" name="review_text_{{ $i }}" value="{{ isset(${'review_text_'.$i}) ? ${'review_text_'.$i} : 'Ulasan '.$i }}" class="text-neutral mb-5 leading-relaxed text-sm sm:text-base flex-1 w-full border rounded px-2 py-1" />
                <div class="flex items-center pt-4 border-t border-neutral-border/70">
                    <input type="text" name="review_initials_{{ $i }}" value="{{ isset(${'review_initials_'.$i}) ? ${'review_initials_'.$i} : 'XX' }}" class="w-10 h-10 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center text-white font-bold text-xs shadow-md flex-shrink-0 border px-2 py-1" />
                    <div class="ml-3">
                        <input type="text" name="review_name_{{ $i }}" value="{{ isset(${'review_name_'.$i}) ? ${'review_name_'.$i} : 'Reviewer '.$i }}" class="font-semibold text-primary text-sm w-full border rounded px-2 py-1 mb-1" />
                        <input type="text" name="review_from_{{ $i }}" value="{{ isset(${'review_from_'.$i}) ? ${'review_from_'.$i} : 'Instansi '.$i }}" class="text-xs text-neutral w-full border rounded px-2 py-1" />
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="kontak" class="py-12 sm:py-16 md:py-20 bg-white relative">
    <div class="absolute inset-0 pointer-events-none">
        <div class="w-40 h-40 bg-accent-soft rounded-full blur-3xl opacity-60 absolute -top-10 -left-10"></div>
        <div class="w-32 h-32 bg-accent-yellow-light rounded-full blur-2xl opacity-60 absolute bottom-10 right-10"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative">
        <div class="text-center mb-8 sm:mb-12 animate-fade-up">
            <h2 class="mt-4 text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-800">
                <input type="text" name="contact_title" value="{{ $contact_title ?? 'Butuh bantuan?' }}" class="w-full border rounded px-3 py-2" />
            </h2>
            <input type="text" name="contact_desc" value="{{ $contact_desc ?? 'Tim Paragon siap membantu Anda. Silakan pilih cara kontak di bawah ini.' }}" class="w-full border rounded px-3 py-2 mt-2" />
        </div>
        <div class="grid md:grid-cols-2 gap-6 sm:gap-8 md:gap-10">
            <div class="space-y-6 animate-fade-left">
                <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-reveal>
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-accent-soft text-accent flex items-center justify-center shadow flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.188 3.563a1 1 0 01-.272 1.06L9.12 9.88a16.017 16.017 0 006.001 6.001l1.575-1.052a1 1 0 011.06-.272l3.563 1.188A1 1 0 0122 16.72V20a2 2 0 01-2 2h-1C9.163 22 2 14.837 2 6V5z" /></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-1 sm:mb-2">Chat via WhatsApp</h3>
                            <p class="text-xs sm:text-sm text-gray-600 mb-2 sm:mb-3 break-words">Mau tanya cepat? Klik tombol di bawah untuk langsung chat.</p>
                            <input type="text" name="contact_whatsapp" value="{{ $contact_whatsapp ?? 'https://wa.me/628876634529' }}" class="w-full border rounded px-3 py-2 mt-2" />
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-reveal>
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-accent-soft text-primary flex items-center justify-center shadow flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 8c0 7-7.5 12-7.5 12S4.5 15 4.5 8a7.5 7.5 0 1115 0z" /></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-1 sm:mb-2">Alamat</h3>
                            <input type="text" name="contact_address" value="{{ $contact_address ?? 'PT. Paragon Medika Pharma, Jl. Karangnanas No. 10, Sokaraja, Banyumas, Jawa Tengah' }}" class="w-full border rounded px-3 py-2 mt-2" />
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-reveal>
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-accent-yellow-light text-accent-yellow-dark flex items-center justify-center shadow flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22a10 10 0 100-20 10 10 0 000 20z" /></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-1 sm:mb-2">Hari/Jam Operasional</h3>
                            <input type="text" name="contact_hours" value="{{ $contact_hours ?? "Senin - Jum'at pukul 08.00 – 17.00 WIB" }}" class="w-full border rounded px-3 py-2 mt-2" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="animate-fade-right">
                <div class="bg-white rounded-3xl shadow-lg p-4 sm:p-6 md:p-8 hover:shadow-2xl transition-all duration-300" data-reveal>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-4 sm:mb-6">Kirim Pesan</h3>
                    <form class="space-y-3 sm:space-y-4">
                        <div>
                            <label class="block text-sm sm:text-base text-gray-700 mb-1 sm:mb-2">Nama</label>
                            <input type="text" name="contact_form_nama" value="" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-xl" placeholder="Nama lengkap" />
                        </div>
                        <div>
                            <label class="block text-sm sm:text-base text-gray-700 mb-1 sm:mb-2">Email</label>
                            <input type="email" name="contact_form_email" value="" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-xl" placeholder="email@contoh.com" />
                        </div>
                        <div>
                            <label class="block text-sm sm:text-base text-gray-700 mb-1 sm:mb-2">Pesan</label>
                            <textarea name="contact_form_pesan" rows="4" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-xl resize-none" placeholder="Tulis pesan Anda"></textarea>
                        </div>
                        <button type="button" class="w-full py-2 rounded-xl bg-accent text-white text-sm font-semibold shadow">Email</button>
                        <p class="text-xs text-gray-500 mt-2 sm:mt-3 text-center">Kami akan merespons dalam waktu 24 jam</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
