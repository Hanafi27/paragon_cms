@extends('layouts.app')

@section('title', 'Ulasan - Company Profile')

@section('content')
    <section class="bg-white py-16 sm:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10 sm:mb-12">
                <h2 class="font-heading text-2xl sm:text-3xl md:text-4xl font-medium text-primary mb-3 tracking-heading">
                    Ulasan Pelanggan
                </h2>
                <div class="h-1 w-16 bg-accent mx-auto mb-4"></div>
                <p class="text-neutral max-w-2xl mx-auto leading-body text-sm sm:text-base">
                    Testimoni dari mitra dan pelanggan yang mempercayakan distribusi farmasi kepada kami.
                </p>
            </div>

            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <div class="bg-neutral-lighter border border-neutral-border rounded-xl overflow-hidden hover:border-accent hover:shadow-sm transition-all duration-300">
                    <div class="p-6 space-y-4">
                        <div class="text-accent-yellow text-lg">★★★★★</div>
                        <p class="text-neutral leading-body text-sm">
                            Mitra terpercaya untuk distribusi farmasi. Pelayanan cepat dan produk selalu tersedia saat dibutuhkan.
                        </p>
                        <div class="flex items-center pt-4 border-t border-neutral-border">
                            <div class="w-10 h-10 bg-primary-light rounded-full flex items-center justify-center text-white font-semibold text-sm">BD</div>
                            <div class="ml-3">
                                <p class="font-semibold text-primary text-sm">Budi Santoso</p>
                                <p class="text-xs text-neutral">Rumah Sakit Umum Daerah</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-neutral-lighter border border-neutral-border rounded-xl overflow-hidden hover:border-accent hover:shadow-sm transition-all duration-300">
                    <div class="p-6 space-y-4">
                        <div class="text-accent-yellow text-lg">★★★★★</div>
                        <p class="text-neutral leading-body text-sm">
                            Kualitas produk konsisten dan pengiriman tepat waktu. Tim support responsif dan profesional.
                        </p>
                        <div class="flex items-center pt-4 border-t border-neutral-border">
                            <div class="w-10 h-10 bg-primary-light rounded-full flex items-center justify-center text-white font-semibold text-sm">RA</div>
                            <div class="ml-3">
                                <p class="font-semibold text-primary text-sm">Rina Anggraini</p>
                                <p class="text-xs text-neutral">Apotek Sehat Sentosa</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-neutral-lighter border border-neutral-border rounded-xl overflow-hidden hover:border-accent hover:shadow-sm transition-all duration-300">
                    <div class="p-6 space-y-4">
                        <div class="text-accent-yellow text-lg">★★★★★</div>
                        <p class="text-neutral leading-body text-sm">
                            Proses koordinasi mudah dan transparan. Sangat membantu operasional klinik kami.
                        </p>
                        <div class="flex items-center pt-4 border-t border-neutral-border">
                            <div class="w-10 h-10 bg-primary-light rounded-full flex items-center justify-center text-white font-semibold text-sm">AT</div>
                            <div class="ml-3">
                                <p class="font-semibold text-primary text-sm">Andi Taufik</p>
                                <p class="text-xs text-neutral">Klinik Utama Medika</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-neutral-lighter border border-neutral-border rounded-xl overflow-hidden hover:border-accent hover:shadow-sm transition-all duration-300">
                    <div class="p-6 space-y-4">
                        <div class="text-accent-yellow text-lg">★★★★★</div>
                        <p class="text-neutral leading-body text-sm">
                            Layanan distribusi yang rapi dan aman. Pengelolaan stok terkoordinasi dengan baik.
                        </p>
                        <div class="flex items-center pt-4 border-t border-neutral-border">
                            <div class="w-10 h-10 bg-primary-light rounded-full flex items-center justify-center text-white font-semibold text-sm">MF</div>
                            <div class="ml-3">
                                <p class="font-semibold text-primary text-sm">Maya Fitriani</p>
                                <p class="text-xs text-neutral">Rumah Sakit Harapan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-neutral-lighter border border-neutral-border rounded-xl overflow-hidden hover:border-accent hover:shadow-sm transition-all duration-300">
                    <div class="p-6 space-y-4">
                        <div class="text-accent-yellow text-lg">★★★★★</div>
                        <p class="text-neutral leading-body text-sm">
                            Produk lengkap dan berkualitas. Tim selalu siap mendukung kebutuhan kami.
                        </p>
                        <div class="flex items-center pt-4 border-t border-neutral-border">
                            <div class="w-10 h-10 bg-primary-light rounded-full flex items-center justify-center text-white font-semibold text-sm">DN</div>
                            <div class="ml-3">
                                <p class="font-semibold text-primary text-sm">Deni Nugroho</p>
                                <p class="text-xs text-neutral">Apotek Sentra Farma</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-neutral-lighter border border-neutral-border rounded-xl overflow-hidden hover:border-accent hover:shadow-sm transition-all duration-300">
                    <div class="p-6 space-y-4">
                        <div class="text-accent-yellow text-lg">★★★★★</div>
                        <p class="text-neutral leading-body text-sm">
                            Kerjasama yang solid dan komunikatif. Mendukung peningkatan kualitas layanan kami.
                        </p>
                        <div class="flex items-center pt-4 border-t border-neutral-border">
                            <div class="w-10 h-10 bg-primary-light rounded-full flex items-center justify-center text-white font-semibold text-sm">SR</div>
                            <div class="ml-3">
                                <p class="font-semibold text-primary text-sm">Sari Rahma</p>
                                <p class="text-xs text-neutral">Klinik Pratama Sejahtera</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('contact') }}" class="inline-block px-6 py-3 border-2 border-primary text-primary font-medium rounded-xl transition-all duration-300 hover:bg-primary hover:text-white">
                    Ingin memberikan ulasan atau berdiskusi? Hubungi Kami
                </a>
            </div>
        </div>
    </section>
@endsection

@section('footer')
@include('partials.footer')
@endsection
