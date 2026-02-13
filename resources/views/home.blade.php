@extends('layouts.app')

@php
    $heroTitle = $contents['hero_title'] ?? 'PT. PARAGON MEDIKA PHARMA';
    $heroSubtitle = $contents['hero_subtitle'] ?? 'Mitra Terpercaya dalam Distribusi Farmasi untuk Pelayanan Kesehatan yang Lebih Baik.';
    $aboutTitle = $contents['about_title'] ?? 'Tentang Kami';
    $aboutDesc = $contents['about_desc'] ?? 'PT Paragon Medika Pharma adalah ...';
    $aboutImage = $contents['about_image'] ?? asset('assets/img_about.jpg');
    $visi = $contents['visi'] ?? 'Menjadi perusahaan jasa distribusi dan logistic ...';
    $misi = $contents['misi'] ?? 'Turut serta membangun bangsa ...';
    $heroList1 = $contents['hero_list_1'] ?? 'Distribusi farmasi terpercaya';
    $heroList2 = $contents['hero_list_2'] ?? 'Layanan kesehatan profesional';
    $heroList3 = $contents['hero_list_3'] ?? 'Standar kualitas tinggi';
    $defaultReviews = [
        [
            'message' => 'Layanan distribusi yang sangat profesional dan terpercaya. Produk selalu tersedia dan kualitas terjaga dengan baik.',
            'name' => 'Ahmad Kurniawan',
            'from' => 'Apotek Sehat Jaya',
            'badge' => 'Distribusi',
            'stars' => 5,
        ],
        [
            'message' => 'Kerja sama yang sangat baik. Tim responsif dan produk farmasi yang didistribusikan selalu sesuai standar kualitas.',
            'name' => 'Siti Mulyani',
            'from' => 'Klinik Pratama Sejahtera',
            'badge' => 'Responsif',
            'stars' => 5,
        ],
        [
            'message' => 'Mitra terpercaya untuk distribusi farmasi. Pelayanan cepat dan produk selalu tersedia saat dibutuhkan.',
            'name' => 'Budi Santoso',
            'from' => 'Rumah Sakit Umum Daerah',
            'badge' => 'Kecepatan',
            'stars' => 5,
        ],
        [
            'message' => 'Distribusi farmasi terbaik dengan sistem logistik yang efisien dan produk berkualitas tinggi.',
            'name' => 'Rini Wijaya',
            'from' => 'Farmasi Mandiri Indonesia',
            'badge' => 'Logistik',
            'stars' => 5,
        ],
        [
                // Email admin dari backend
            'name' => 'Rini Wijaya',
            'from' => 'Farmasi Mandiri Indonesia',
            'badge' => 'Kualitas',
            'stars' => 5,
        ],
    ];
    $dummyReviews = [
        [
            'stars' => 5,
            'badge' => 'Top Client',
            'message' => 'Pelayanan sangat profesional, hasil kerja memuaskan dan tepat waktu.',
            'name' => 'Andi Kurniawan',
            'from' => 'PT Sukses Makmur',
        ],
        [
            'stars' => 4,
            'badge' => 'Loyal Customer',
            'message' => 'Sudah beberapa kali order, selalu puas dengan hasil dan komunikasi timnya.',
            'name' => 'Rina Putri',
            'from' => 'CV Maju Bersama',
        ],
        [
            'stars' => 5,
            'badge' => '',
            'message' => 'Rekomendasi untuk yang butuh solusi cepat dan berkualitas.',
            'name' => 'Budi Santoso',
            'from' => 'Freelancer',
        ],
        [
            'stars' => 4,
            'badge' => 'Best Partner',
            'message' => 'Tim sangat responsif dan ramah, proses mudah dan hasil sesuai harapan.',
            'name' => 'Siti Aminah',
            'from' => 'PT Aman Sentosa',
        ],
        [
            'stars' => 5,
            'badge' => '',
            'message' => 'Harga kompetitif, kualitas premium. Akan repeat order lagi.',
            'name' => 'Dedi Gunawan',
            'from' => 'UMKM Mandiri',
        ],
    ];
@endphp

@section('title', 'Beranda - Company Profile')

@section('content')
<!-- Hero Section - Clean & Professional -->
<section class="bg-neutral-light py-24 lg:py-32 overflow-hidden relative">
    <!-- Background Accents -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-20 -left-20 w-72 h-72 bg-accent/5 rounded-full blur-3xl hidden sm:block"></div>
        <div class="absolute top-40 -right-32 w-96 h-96 bg-primary/4 rounded-full blur-3xl hidden sm:block"></div>
        <div class="absolute bottom-20 left-1/3 w-64 h-64 bg-accent-soft/40 rounded-full blur-2xl hidden sm:block"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-7 lg:pr-12 animate-fade-left">
                @php
                    $heroTitle = $contents['hero_title'] ?? 'PT. PARAGON MEDIKA PHARMA';
                    $heroSubtitle = $contents['hero_subtitle'] ?? 'Mitra Terpercaya dalam Distribusi Farmasi untuk Pelayanan Kesehatan yang Lebih Baik.';
                @endphp
                <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-medium mb-6 leading-tight tracking-heading text-primary">{{ $heroTitle }}</h1>
                <p class="text-lg md:text-xl text-neutral mb-8 leading-body max-w-xl">{{ $heroSubtitle }}</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('products') }}"
                        class="px-6 py-3 bg-accent text-white font-semibold rounded transition-all duration-300 hover:bg-accent-dark inline-block text-center">
                        Lihat Produk
                    </a>
                    <a href="#kontak"
                        onclick="document.getElementById('kontak').scrollIntoView({behavior: 'smooth'}); return false;"
                        class="px-6 py-3 border-2 border-primary text-primary font-medium rounded transition-all duration-300 hover:bg-primary hover:text-white inline-block text-center">
                        Hubungi Kami
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5 mt-8 lg:mt-0 animate-fade-right hero-parallax">
                <div class="bg-neutral-lighter rounded-lg p-8 border border-neutral-border shadow-sm">
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-accent-yellow rounded-full"></div>
                            <span class="text-neutral">{{ $heroList1 }}</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-accent-yellow rounded-full"></div>
                            <span class="text-neutral">{{ $heroList2 }}</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-accent-yellow rounded-full"></div>
                            <span class="text-neutral">{{ $heroList3 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section - Minimalis & Modern -->
<section id="about-section" class="py-20 bg-neutral-lighter animate-on-scroll" data-animation="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <!-- Header with Image Grid -->
            <div class="grid md:grid-cols-2 items-center gap-8 mb-12">
                <!-- Image Side -->
                <div class="animate-fade-left">
                    <img src="{{ $aboutImage }}" alt="Farmasi"
                        class="rounded-lg shadow-md w-full h-80 object-cover">
                </div>
                <!-- Text Side -->
                <div class="animate-fade-right">
                    <h2 class="font-heading text-3xl md:text-4xl font-medium mb-4 text-primary tracking-heading">
                        {{ $aboutTitle }}
                    </h2>
                    <div class="h-1 w-16 bg-accent mb-6"></div>
                    <p class="text-md text-neutral leading-body text-justify" style="text-align: justify;">
                        {{ $aboutDesc }}
                    </p>
                </div>

            </div>

            <!-- Komitmen Kami (Editable) -->
            <div class="space-y-4 animate-stagger mb-12" data-delay="0">
                <h3 class="font-heading text-xl font-medium text-primary mb-3">Komitmen Kami</h3>
                <p class="text-neutral leading-body">
                    {{ $contents['about_commitment'] ?? 'Sejak berdiri, kami fokus pada distribusi produk farmasi yang aman, berkualitas, dan terpercaya. Setiap produk yang kami distribusikan telah melalui proses seleksi ketat untuk memastikan standar kualitas dan keamanan yang tinggi.' }}
                </p>
            </div>

            <!-- CTA Cards - Visi Misi & Struktur Organisasi -->
            <div class="grid md:grid-cols-2 gap-6">

                <a href="{{ route('vision-mission') }}"
                    class="group bg-neutral-lighter border-2 border-neutral-border rounded-lg p-6 hover:border-accent transition-all duration-300 hover:shadow-md cursor-pointer animate-stagger" data-delay="200">
                    <div class="flex items-start justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-accent-soft rounded-lg flex items-center justify-center group-hover:bg-accent transition-colors duration-300">
                            <svg class="w-6 h-6 text-accent group-hover:text-white transition-colors duration-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <svg class="w-5 h-5 text-neutral group-hover:text-accent transition-colors duration-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-medium text-primary mb-2 group-hover:text-accent transition-colors duration-300">
                        Visi Misi
                    </h3>
                    <p class="text-neutral text-sm leading-body">
                        Pelajari visi dan misi Paragon dalam memberikan pelayanan distribusi farmasi terbaik di Indonesia.
                    </p>
                </a>

                <a href="{{ route('organization') }}"
                    class="group bg-neutral-lighter border-2 border-neutral-border rounded-lg p-6 hover:border-accent transition-all duration-300 hover:shadow-md cursor-pointer animate-stagger" data-delay="300">
                    <div class="flex items-start justify-between mb-4">
                        <div
                            class="w-12 h-12 bg-accent-soft rounded-lg flex items-center justify-center group-hover:bg-accent transition-colors duration-300">
                            <svg class="w-6 h-6 text-accent group-hover:text-white transition-colors duration-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <svg class="w-5 h-5 text-neutral group-hover:text-accent transition-colors duration-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <h3
                        class="font-heading text-xl font-medium text-primary mb-2 group-hover:text-accent transition-colors duration-300">
                        Struktur Organisasi
                    </h3>
                    <p class="text-neutral text-sm leading-body">
                        Kenali tim profesional yang berdedikasi dalam menjalankan visi dan misi perusahaan untuk
                        pelayanan kesehatan yang lebih baik.
                    </p>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Products Preview Section - Asymmetric Grid -->
<section id="products-section" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12 animate-fade-up">
            <h2 class="font-heading text-3xl md:text-4xl font-medium text-primary mb-4 tracking-heading">
                Produk Kami
            </h2>
            <div class="h-1 w-16 bg-accent mb-4"></div>
            <p class="text-lg text-neutral max-w-2xl leading-body">
                Menyediakan produk farmasi berkualitas dengan standar tinggi untuk mendukung pelayanan kesehatan yang
                lebih baik.
            </p>
        </div>
        @php $products = \App\Models\Product::orderBy('created_at', 'desc')->take(3)->get(); @endphp
        @if($products->isEmpty())
        <div class="flex flex-col items-center justify-center mt-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mb-4 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <div class="text-slate-500 text-base">Belum ada produk tersedia.</div>
        </div>
        @endif
        @if($products->isNotEmpty())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
            @foreach($products as $product)
            <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col">
                <div class="h-40 bg-slate-100 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                    @if($product->main_image)
                        <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="object-cover h-full w-full">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    @endif
                </div>
                <div class="font-bold text-lg text-primary mb-1">{{ $product->name }}</div>
                <div class="text-slate-500 text-sm mb-2">{{ $product->category ?: '-' }}</div>
                <div class="text-slate-400 text-xs mb-4">Stok: {{ $product->stock ?: '-' }}</div>
                <a href="{{ route('product.detail', $product->id) }}" class="mt-auto px-4 py-2 bg-accent text-white rounded-lg text-center font-semibold hover:bg-accent-dark transition">Detail</a>
            </div>
            @endforeach
        </div>
        @endif
               
        <div class="mt-10 justify-center flex">
            <a href="{{ route('products') }}"
                class="inline-block px-6 py-3 bg-accent text-white font-medium rounded transition-all duration-300 hover:bg-accent-dark">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>

<!-- Partners Section - Minimal Split Layout -->
<section id="partners-section" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-10 lg:gap-14 items-center">

            <!-- Left: Headline & Stats -->
            <div class="lg:col-span-5 space-y-6 animate-fade-left">
                <div class="space-y-3">
                    <h2 class="font-heading text-3xl md:text-4xl font-medium text-primary tracking-heading">{{ $contents['mitra_title'] ?? 'Mitra Kami' }}</h2>
                    <div class="w-16 h-1 bg-accent rounded-full"></div>
                    <p class="text-neutral text-base leading-relaxed pt-2">{{ $contents['mitra_desc'] ?? 'Didukung lebih dari seribu mitra outlet dan kerjasama korporat yang tersebar di seluruh Indonesia.' }}</p>
                </div>

                <div class="flex flex-wrap items-center gap-6">
                    <div class="space-y-1">
                        <div class="text-5xl md:text-6xl font-bold text-primary tabular-nums"><span class="counter-value" data-counter-target="{{ $contents['mitra_total'] ?? 1945 }}">0</span><span class="text-4xl md:text-5xl text-accent">+</span></div>
                        <p class="text-sm text-neutral">Total Mitra</p>
                    </div>
                    <div class="w-px h-12 bg-neutral-200"></div>
                    <div class="space-y-1">
                        <div class="text-3xl md:text-4xl font-semibold text-primary tabular-nums"><span class="counter-value" data-counter-target="{{ $contents['mitra_outlet'] ?? 973 }}">0</span><span class="text-2xl md:text-3xl text-accent">+</span></div>
                        <p class="text-sm text-neutral">Outlet</p>
                    </div>
                    <div class="w-px h-12 bg-neutral-200"></div>
                    <div class="space-y-1">
                        <div class="text-3xl md:text-4xl font-semibold text-primary tabular-nums"><span class="counter-value" data-counter-target="{{ $contents['mitra_collab'] ?? 972 }}">0</span><span class="text-2xl md:text-3xl text-accent">+</span></div>
                        <p class="text-sm text-neutral">Kerjasama</p>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-accent/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-sm text-neutral leading-relaxed pt-0.5">{{ $contents['mitra_highlight_1'] ?? 'Seleksi mitra dengan standar mutu distribusi' }}</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-accent/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-sm text-neutral leading-relaxed pt-0.5">{{ $contents['mitra_highlight_2'] ?? 'Jangkauan nasional untuk kebutuhan farmasi' }}</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-accent/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-sm text-neutral leading-relaxed pt-0.5">{{ $contents['mitra_highlight_3'] ?? 'Dukungan logistik dan kepatuhan regulasi' }}</p>
                    </div>
                </div>
            </div>

            <!-- Right: Logo Cloud -->
            <div class="lg:col-span-7 animate-fade-up">
                <div class="grid grid-cols-2 gap-6 items-center justify-items-center auto-rows-min">
                    @for($i=1;$i<=4;$i++)
                        @if(!empty($contents['mitra_logo_'.$i]))
                            <img src="{{ $contents['mitra_logo_'.$i] }}" alt="Logo Mitra {{ $i }}" class="h-16 sm:h-20 object-contain transition duration-300 transform hover:scale-105" loading="lazy" />
                        @endif
                    @endfor
                </div>
            </div>

        </div>
    </div>
</section>

@push('scripts')

@endpush

<!-- Reviews Preview Section - Carousel -->
<section id="reviews-section" class="py-20 bg-neutral-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12 animate-fade-up">
            <h2 class="font-heading text-3xl md:text-4xl font-medium text-primary mb-4 tracking-heading">
                Ulasan Klien
            </h2>
            <div class="h-1 w-16 bg-accent mb-4"></div>
            <p class="text-lg text-neutral max-w-2xl leading-body">
                Apa kata mitra kami tentang layanan distribusi farmasi
            </p>
        </div>
        
        <!-- Reviews Carousel Container -->
        <div class="relative w-full px-4 sm:px-0">
            <!-- Carousel Wrapper -->
            <div id="carousel-wrapper" class="relative overflow-hidden w-full">
                <div id="reviews-carousel" class="flex transition-transform duration-700 ease-out gap-4 sm:gap-6">
                    @for($i=1;$i<=5;$i++)
                        @php
                            // Fallback: admin > dummy
                            $msg = $contents['review'.$i.'_message'] ?? $dummyReviews[$i-1]['message'];
                            $name = $contents['review'.$i.'_name'] ?? $dummyReviews[$i-1]['name'];
                            $from = $contents['review'.$i.'_from'] ?? $dummyReviews[$i-1]['from'];
                            $badge = $contents['review'.$i.'_badge'] ?? $dummyReviews[$i-1]['badge'];
                            $stars = $contents['review'.$i.'_stars'] ?? $dummyReviews[$i-1]['stars'];
                            $avatarColors = ['from-primary to-[#a81d5d]','from-accent to-[#fbbf24]','from-[#6366f1] to-[#a81d5d]','from-[#fbbf24] to-[#6366f1]','from-[#0ea5e9] to-[#a81d5d]','from-[#0ea5e9] to-[#fbbf24]','from-accent to-[#0ea5e9]'];
                            $badgeColors = ['bg-primary/10','bg-accent/10','bg-[#fbbf24]/10','bg-[#6366f1]/10','bg-[#0ea5e9]/10','bg-[#fbbf24]/10','bg-accent/10'];
                            $randAvatar = $avatarColors[($i-1)%count($avatarColors)];
                            $randBadge = $badgeColors[($i-1)%count($badgeColors)];
                            // Initials logic: ambil 2 huruf pertama nama, jika ada spasi ambil huruf depan dan setelah spasi
                            $initials = strtoupper(substr($name,0,1));
                            if(strpos($name,' ')!==false){
                                $initials .= strtoupper(substr($name,strpos($name,' ')+1,1));
                            }else{
                                $initials .= strtoupper(substr($name,1,1));
                            }
                        @endphp
                        <div class="carousel-item flex-shrink-0 w-full sm:w-72 md:w-80 animate-slide-left min-h-72 flex flex-col justify-between" data-delay="{{ ($i-1)*100 }}">
                            <div class="review-card bg-white rounded-2xl shadow-md border border-neutral-200 p-6 flex flex-col h-full justify-between gap-3">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-2xl font-serif">“</span>
                                    @if(!empty($badge))
                                        <span class="text-white px-3 py-1 rounded-full text-xs font-semibold" style="background-color:{{ ['#a81d5d','#fbbf24','#0ea5e9','#6366f1','#22c55e'][$i%5] }};">{{ $badge }}</span>
                                    @endif
                                </div>
                                <div class="text-neutral-700 text-base font-normal whitespace-pre-line break-words text-left overflow-hidden" style="word-break:break-word;max-width:100%;">
                                    {{ $msg }}
                                </div>
                                <div class="mt-auto pt-4 border-t border-neutral-100 flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br {{ $randAvatar }} flex items-center justify-center text-white font-bold text-lg" style="background-color:{{ ['#a81d5d','#fbbf24','#0ea5e9','#6366f1','#a81d5d'][$i%5] }};">
                                        {{ $initials }}
                                    </div>
                                    <div class="text-left">
                                        <div class="font-bold text-primary">{{ $name }}</div>
                                        <div class="text-neutral-500 text-sm">{{ $from }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="hidden md:flex items-center justify-center gap-4 mt-10">
                <button id="reviews-prev" class="w-12 h-12 rounded-full bg-accent text-white hover:bg-accent-dark transition-all duration-300 flex items-center justify-center shadow-lg hover:shadow-xl transform hover:scale-110 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 disabled:hover:shadow-lg disabled:hover:bg-accent" aria-label="Previous review">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                
                <!-- Pagination Dots -->
                <div id="pagination-dots" class="flex gap-2">
                    <!-- <button class="pagination-dot w-3 h-3 rounded-full bg-accent transition-all duration-300" data-index="0" aria-label="Go to review 1"></button>
                    <button class="pagination-dot w-3 h-3 rounded-full bg-neutral-400 transition-all duration-300" data-index="1" aria-label="Go to review 2"></button>
                    <button class="pagination-dot w-3 h-3 rounded-full bg-neutral-400 transition-all duration-300" data-index="2" aria-label="Go to review 3"></button>
                    <button class="pagination-dot w-3 h-3 rounded-full bg-neutral-400 transition-all duration-300" data-index="3" aria-label="Go to review 4"></button>
                    <button class="pagination-dot w-3 h-3 rounded-full bg-neutral-400 transition-all duration-300" data-index="4" aria-label="Go to review 5"></button> -->
                </div>
                
                <button id="reviews-next" class="w-12 h-12 rounded-full bg-accent text-white hover:bg-accent-dark transition-all duration-300 flex items-center justify-center shadow-lg hover:shadow-xl transform hover:scale-110 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100 disabled:hover:shadow-lg disabled:hover:bg-accent" aria-label="Next review">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="kontak" class="py-12 sm:py-16 md:py-20 bg-white relative">
    <div class="absolute inset-0 pointer-events-none">
        <div class="w-40 h-40 bg-accent-soft rounded-full blur-3xl opacity-60 absolute -top-10 -left-10"></div>
        <div class="w-32 h-32 bg-accent-yellow-light rounded-full blur-2xl opacity-60 absolute bottom-10 right-10">
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative">
        <div class="text-center mb-8 sm:mb-12 animate-fade-up">
            <!-- <span class="inline-block px-4 py-1 rounded-full bg-emerald-50 text-emerald-700 text-sm font-semibold shadow-sm">Hubungi Kami</span> -->
            <h2 class="mt-4 text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-800">Butuh bantuan?</h2>
            <p class="mt-2 text-sm sm:text-base text-gray-600 px-4">Tim Paragon siap membantu Anda. Silakan pilih
                cara kontak di bawah ini.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-6 sm:gap-8 md:gap-10">
            <!-- Info Cards -->
            <div class="space-y-6 animate-fade-left">
                <!-- WhatsApp (Dynamic) -->
                <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-reveal>
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-accent-soft text-accent flex items-center justify-center shadow flex-shrink-0">
                            <!-- phone icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.188 3.563a1 1 0 01-.272 1.06L9.12 9.88a16.017 16.017 0 006.001 6.001l1.575-1.052a1 1 0 011.06-.272l3.563 1.188A1 1 0 0122 16.72V20a2 2 0 01-2 2h-1C9.163 22 2 14.837 2 6V5z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-1 sm:mb-2">Chat via WhatsApp</h3>
                            <p class="text-xs sm:text-sm text-gray-600 mb-2 sm:mb-3 break-words">{{ $contents['contact_whatsapp_desc'] ?? 'Mau tanya cepat? Klik tombol di bawah untuk langsung chat.' }}</p>
                            <a href="https://wa.me/{{ $contents['contact_whatsapp'] ?? '628876634529' }}?text={{ rawurlencode($contents['contact_whatsapp_text'] ?? 'Halo PT. Paragon Medika Pharma, saya ingin bertanya seputar produk farmasi dan layanan distribusi.') }}"
                                target="_blank" rel="noopener noreferrer"
                                class="mt-2 sm:mt-3 inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 sm:py-2 rounded-xl bg-accent text-white text-xs sm:text-sm font-semibold shadow hover:bg-accent-dark transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.52 3.48A11.91 11.91 0 0012 0a12 12 0 00-10.3 17.93L0 24l6.22-1.65A12 12 0 0024 12a12 12 0 00-3.48-8.52zM12 22a10 10 0 01-5.37-1.56l-.39-.24-3.7.98.99-3.6-.25-.41A10 10 0 1112 22zm5.44-7.2c-.3-.15-1.78-.88-2.06-.98s-.48-.15-.68.15-.78.98-.95 1.18-.35.22-.64.07a8.11 8.11 0 01-2.38-1.47 8.9 8.9 0 01-1.65-2.06c-.17-.3 0-.46.13-.62s.3-.35.45-.55.2-.3.3-.49a.55.55 0 00-.03-.53c-.08-.15-.68-1.62-.93-2.22s-.49-.51-.68-.52l-.58-.01a1.1 1.1 0 00-.8.37c-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08a10.85 10.85 0 004 3.62c.56.24 1 .38 1.35.49.57.18 1.09.15 1.5.09a2.45 2.45 0 001.62-1.14c.2-.34.2-.62.14-.76s-.26-.2-.56-.35z" />
                                </svg>
                                <span class="whitespace-nowrap">WhatsApp Sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Alamat & Map (Dynamic) -->
                <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-reveal>
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-accent-soft text-primary flex items-center justify-center shadow flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 8c0 7-7.5 12-7.5 12S4.5 15 4.5 8a7.5 7.5 0 1115 0z" /></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-1 sm:mb-2">Alamat</h3>
                            <p class="text-xs sm:text-sm text-gray-600 mb-2 sm:mb-3 break-words">{{ $contents['contact_address'] ?? 'PT. Paragon Medika Pharma, Jl. Karangnanas No. 10, Sokaraja, Banyumas, Jawa Tengah' }}</p>
                            <div class="mt-2 sm:mt-3 rounded-xl overflow-hidden shadow relative group">
                                <!-- Overlay hint untuk aktivasi maps -->
                                <div class="absolute inset-0 bg-black/5 flex items-center justify-center z-10 group-hover:opacity-0 transition-opacity duration-300 pointer-events-none">
                                    <div class="bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg shadow-lg">
                                        <p class="text-xs text-gray-700 font-medium">Klik untuk interaksi maps</p>
                                    </div>
                                </div>
                                @php
                                    $mapLink = $contents['contact_map'] ?? null;
                                    function getEmbedMap($link) {
                                        if (!$link) return null;
                                        // Ambil src jika user input <iframe ...>
                                        if (preg_match('/src=["\']([^"\']+)["\']/', $link, $m)) {
                                            $link = $m[1];
                                        }
                                        // Jika sudah embed
                                        if (strpos($link, 'https://www.google.com/maps/embed?') === 0) {
                                            return $link;
                                        }
                                        // Jika user input shortlink maps.app.goo.gl
                                        if (strpos($link, 'https://maps.app.goo.gl/') === 0) {
                                            // Coba resolve shortlink ke embed
                                            // Gunakan file_get_contents dengan stream context agar follow redirect
                                            $context = stream_context_create(['http' => ['follow_location' => 1, 'max_redirects' => 5]]);
                                            $finalUrl = @file_get_contents($link, false, $context);
                                            // Jika gagal, fallback ke curl
                                            if (!$finalUrl) {
                                                if (function_exists('curl_init')) {
                                                    $ch = curl_init($link);
                                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                    curl_setopt($ch, CURLOPT_HEADER, true);
                                                    curl_setopt($ch, CURLOPT_NOBODY, true);
                                                    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                                                    curl_exec($ch);
                                                    $resolved = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
                                                    curl_close($ch);
                                                    if ($resolved && strpos($resolved, 'google.com/maps/place/') !== false) {
                                                        $placeId = null;
                                                        if (preg_match('#/maps/place/([^/]+)#', $resolved, $pm)) {
                                                            $placeId = $pm[1];
                                                        }
                                                        if ($placeId) {
                                                            return 'https://www.google.com/maps/embed?pb=!1s'.$placeId;
                                                        }
                                                    }
                                                }
                                                // Gagal resolve
                                                return null;
                                            }
                                            // Jika berhasil, cari url embed
                                            if (preg_match('#https://www.google.com/maps/place/([^/]+)#', $http_response_header[0] ?? '', $pm)) {
                                                $placeId = $pm[1];
                                                return 'https://www.google.com/maps/embed?pb=!1s'.$placeId;
                                            }
                                            // Fallback gagal
                                            return null;
                                        }
                                        // Jika user input link Google Maps biasa (bukan embed)
                                        if (preg_match('#https://www.google.com/maps/(place|dir|search)/([^/?]+)#', $link, $pm)) {
                                            // Coba konversi ke embed
                                            return 'https://www.google.com/maps/embed?pb=!1s'.$pm[2];
                                        }
                                        // Jika bukan embed, return null (tidak valid)
                                        return null;
                                    }
                                @endphp
                                @php $embedMap = getEmbedMap($mapLink); @endphp
                                @if($embedMap)
                                    <iframe title="Lokasi PT. Paragon Medika Pharma"
                                        src="{{ $embedMap }}"
                                        width="100%" height="140" class="sm:h-[160px] cursor-pointer" style="border:0" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                        allow="geolocation"></iframe>
                                @elseif($mapLink)
                                    <div class="bg-red-50 text-red-700 text-xs rounded p-2 mt-2">Format link Google Maps tidak valid. Silakan input hanya <b>link src embed</b> Google Maps, contoh:<br><span class="break-all">https://www.google.com/maps/embed?pb=...</span></div>
                                    <iframe title="Lokasi PT. Paragon Medika Pharma"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14484.636054909573!2d109.2474702956583!3d-7.468059759772228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655c417aeda8df%3A0xf9141e87e42cb4ef!2sKarangnanas%20Regency!5e1!3m2!1sid!2sid!4v1768365328056!5m2!1sid!2sid"
                                        width="100%" height="140" class="sm:h-[160px] cursor-pointer" style="border:0" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                        allow="geolocation"></iframe>
                                @else
                                    <iframe title="Lokasi PT. Paragon Medika Pharma"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14484.636054909573!2d109.2474702956583!3d-7.468059759772228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655c417aeda8df%3A0xf9141e87e42cb4ef!2sKarangnanas%20Regency!5e1!3m2!1sid!2sid!4v1768365328056!5m2!1sid!2sid"
                                        width="100%" height="140" class="sm:h-[160px] cursor-pointer" style="border:0" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                        allow="geolocation"></iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- hari/Jam Operasional (Dynamic) -->
                <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-300" data-reveal>
                    <div class="flex items-start gap-3 sm:gap-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-accent-yellow-light text-accent-yellow-dark flex items-center justify-center shadow flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22a10 10 0 100-20 10 10 0 000 20z" /></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-1 sm:mb-2">Hari/Jam Operasional</h3>
                            <p class="text-xs sm:text-sm text-gray-600 break-words">{{ $contents['contact_hours'] ?? "Senin - Jum'at pukul 08.00 – 17.00 WIB" }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="animate-fade-right">
                <div class="bg-white rounded-3xl shadow-lg p-4 sm:p-6 md:p-8 hover:shadow-2xl transition-all duration-300" data-reveal>
                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-4 sm:mb-6">Kirim Pesan</h3>
                    <form id="contactForm" class="space-y-3 sm:space-y-4">
                        <div>
                            <label class="block text-sm sm:text-base text-gray-700 mb-1 sm:mb-2">Nama</label>
                            <input type="text" name="nama" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-xl focus:ring-2 focus:ring-accent focus:border-accent" placeholder="Nama lengkap" required>
                        </div>
                        <div>
                            <label class="block text-sm sm:text-base text-gray-700 mb-1 sm:mb-2">Email</label>
                            <input type="email" name="email" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-xl focus:ring-2 focus:ring-accent focus:border-accent" placeholder="email@contoh.com" required>
                        </div>
                        <div>
                            <label class="block text-sm sm:text-base text-gray-700 mb-1 sm:mb-2">Pesan</label>
                            <textarea name="pesan" rows="4" class="w-full px-3 sm:px-4 py-2 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-xl focus:ring-2 focus:ring-accent focus:border-accent resize-none" placeholder="Tulis pesan Anda" required></textarea>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <button type="button" id="sendEmail" class="flex-1 py-2.5 sm:py-3 rounded-xl bg-accent text-white text-sm sm:text-base font-semibold shadow hover:bg-accent-dark transition flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                <span>Email</span>
                            </button>
                        </div>
                        <p class="text-xs text-gray-500 mt-2 sm:mt-3 text-center">Kami akan merespons dalam waktu 24 jam</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
@include('partials.footer')
@endsection     

@push('scripts')
    <script>
        // Subtle Parallax Effect untuk Hero Section
        (function() {
            const parallaxElement = document.querySelector('.hero-parallax');
            
            if (parallaxElement) {
                window.addEventListener('scroll', () => {
                    // Hitung offset dengan faktor 0.3 untuk efek yang sangat subtle
                    const scrollPosition = window.pageYOffset;
                    const parallaxOffset = scrollPosition * 0.3;
                    
                    parallaxElement.style.transform = `translateY(${parallaxOffset}px)`;
                }, { passive: true });
            }
        })();

        // Counter Animation untuk statistik (hanya aktif saat section terlihat)
        (function() {
            const section = document.getElementById('partners-section');
            if (!section) return;
            const counters = section.querySelectorAll('.counter-value');
            const duration = 2200;
            function animateCounter(el) {
                const target = Number(el.dataset.counterTarget || 0);
                let start = 0;
                const increment = target / (duration / 16);
                const counter = setInterval(() => {
                    start += increment;
                    if (start >= target) {
                        el.innerText = target.toLocaleString('id-ID');
                        clearInterval(counter);
                    } else {
                        el.innerText = Math.floor(start).toLocaleString('id-ID');
                    }
                }, 16);
            }
            let animated = false;
            const observer = new window.IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !animated) {
                        counters.forEach(animateCounter);
                        animated = true;
                        obs.unobserve(section);
                    }
                });
            }, { threshold: 0.3 });
            observer.observe(section);
        })();

        // Contact Form Handler
        (function() {
            function initContactForm() {
                const form = document.getElementById('contactForm');
                const sendWaBtn = document.getElementById('sendWhatsapp');
                const sendEmailBtn = document.getElementById('sendEmail');

                if (!form) return;

                if (sendWaBtn) {
                    sendWaBtn.addEventListener('click', () => {
                        const nama = form.querySelector('input[name="nama"]').value;
                        const email = form.querySelector('input[name="email"]').value;
                        const pesan = form.querySelector('textarea[name="pesan"]').value;

                        if (!nama || !email || !pesan) {
                            alert('Semua field harus diisi');
                            return;
                        }

                        const message = `Nama: ${nama}\nEmail: ${email}\n\nPesan:\n${pesan}`;
                        const whatsappUrl = `https://wa.me/6281234567890?text=${encodeURIComponent(message)}`;
                        window.open(whatsappUrl, '_blank');
                    });
                }

                if (sendEmailBtn) {
                    sendEmailBtn.addEventListener('click', () => {
                        const nama = form.querySelector('input[name="nama"]').value;
                        const email = form.querySelector('input[name="email"]').value;
                        const pesan = form.querySelector('textarea[name="pesan"]').value;

                        if (!nama || !email || !pesan) {
                            alert('Semua field harus diisi');
                            return;
                        }

                        const subject = `Pesan Baru dari ${nama}`;
                        const body = `Nama: ${nama}\nEmail Pengirim: ${email}\n\nPesan:\n${pesan}`;
                        const adminEmail = {!! json_encode($contents['contact_email'] ?? '') !!};
                        console.log('Klik tombol Email!');
                        console.log('Email admin:', adminEmail);
                        if (!adminEmail) {
                            alert('Alamat email admin belum diatur.');
                            return;
                        }
                        const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(adminEmail)}&su=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
                        window.open(gmailUrl, '_blank');
                    });
                }
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initContactForm);
            } else {
                initContactForm();
            }
        })();

        // Reviews Carousel - Horizontal Sliding
        (function() {
            function initCarousel() {
                const carousel = document.getElementById('reviews-carousel');
                const prevBtn = document.getElementById('reviews-prev');
                const nextBtn = document.getElementById('reviews-next');
                const paginationDots = document.querySelectorAll('.pagination-dot');
                const carouselItems = document.querySelectorAll('.carousel-item');
                const carouselWrapper = document.getElementById('carousel-wrapper');
                
                if (!carousel || !carouselItems.length) return;

                let currentIndex = 0;
                let isTransitioning = false;
                let touchStartX = 0;
                let touchEndX = 0;
                const totalItems = carouselItems.length;
                const gap = 24;
                let slideWidth = 0;
                let visibleCards = 1;

                function getSlideWidth() {
                    // Kalkulasi gap secara dinamis berdasarkan actual DOM spacing
                    const containerWidth = carouselWrapper?.offsetWidth || 0;
                    const firstCard = carouselItems[0];
                    if (firstCard) {
                        const cardWidth = firstCard.getBoundingClientRect().width;
                        // Get actual gap dari carousel element computed style
                        const style = window.getComputedStyle(carousel);
                        const gapValue = style.gap;
                        const actualGap = parseInt(gapValue) || 16;
                        slideWidth = cardWidth + actualGap;
                        
                        // Hitung berapa banyak card yang terlihat dalam viewport
                        if (containerWidth > 0 && slideWidth > 0) {
                            visibleCards = Math.floor(containerWidth / slideWidth);
                            // Minimal 1 card visible
                            visibleCards = Math.max(1, visibleCards);
                        }
                        return slideWidth;
                    }
                    return 344;
                }

                function getMaxIndex() {
                    // Maksimum index adalah total cards - jumlah cards yang terlihat
                    return Math.max(0, totalItems - visibleCards);
                }

                function updateCarousel() {
                    getSlideWidth();
                    const maxIndex = getMaxIndex();
                    
                    // Batasi currentIndex agar tidak melebihi maxIndex
                    currentIndex = Math.min(currentIndex, maxIndex);
                    
                    const offset = -currentIndex * slideWidth;
                    carousel.style.transform = `translateX(${offset}px)`;
                    
                    paginationDots.forEach((dot, index) => {
                        if (index === currentIndex) {
                            dot.classList.remove('bg-neutral-400');
                            dot.classList.add('bg-accent');
                        } else {
                            dot.classList.remove('bg-accent');
                            dot.classList.add('bg-neutral-400');
                        }
                    });
                    
                    if (prevBtn) {
                        prevBtn.disabled = currentIndex === 0;
                    }
                    if (nextBtn) {
                        nextBtn.disabled = currentIndex >= maxIndex;
                    }
                }

                function nextSlide() {
                    const maxIndex = getMaxIndex();
                    if (isTransitioning || currentIndex >= maxIndex) return;
                    isTransitioning = true;
                    currentIndex++;
                    updateCarousel();
                    
                    setTimeout(() => {
                        isTransitioning = false;
                    }, 700);
                }

                function prevSlide() {
                    if (isTransitioning || currentIndex <= 0) return;
                    isTransitioning = true;
                    currentIndex--;
                    updateCarousel();
                    
                    setTimeout(() => {
                        isTransitioning = false;
                    }, 700);
                }

                function goToSlide(index) {
                    const maxIndex = getMaxIndex();
                    if (isTransitioning || index === currentIndex) return;
                    isTransitioning = true;
                    currentIndex = Math.min(index, maxIndex);
                    updateCarousel();
                    
                    setTimeout(() => {
                        isTransitioning = false;
                    }, 700);
                }

                function handleSwipe() {
                    const maxIndex = getMaxIndex();
                    const swipeThreshold = 50;
                    const diff = touchStartX - touchEndX;

                    if (Math.abs(diff) > swipeThreshold) {
                        if (diff > 0 && currentIndex < maxIndex) {
                            nextSlide();
                        } else if (diff < 0 && currentIndex > 0) {
                            prevSlide();
                        }
                    }
                }

                if (prevBtn) {
                    prevBtn.addEventListener('click', () => {
                        if (!prevBtn.disabled) {
                            prevSlide();
                        }
                    });
                }
                
                if (nextBtn) {
                    nextBtn.addEventListener('click', () => {
                        if (!nextBtn.disabled) {
                            nextSlide();
                        }
                    });
                }

                paginationDots.forEach(dot => {
                    dot.addEventListener('click', () => {
                        const index = parseInt(dot.getAttribute('data-index'));
                        goToSlide(index);
                    });
                });

                carouselWrapper?.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                }, false);

                carouselWrapper?.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                }, false);

                // Re-calculate on window resize untuk responsive
                window.addEventListener('resize', () => {
                    updateCarousel();
                });

                updateCarousel();
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initCarousel);
            } else {
                initCarousel();
            }
        })();
    </script>
@endpush