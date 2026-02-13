<footer class="bg-neutral-light py-16 lg:py-20 shadow-[inset_0_14px_24px_-16px_rgba(0,0,0,0.35),0_-10px_28px_-18px_rgba(0,0,0,0.28)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main Grid: 3 Columns Balanced -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12 mb-12">
            
            <!-- Column 1: Brand Identity (Strong) -->
            <div class="space-y-6">
                <!-- Brand Name -->
                <div class="space-y-4">
                    <h3 class="font-heading text-2xl font-bold text-primary leading-tight">
                        PT. Paragon<br>Medika Pharma
                    </h3>
                    <div class="w-16 h-1 bg-accent rounded-full"></div>
                </div>

                <!-- Brand Description -->
                <div class="space-y-3">
                    <p class="text-neutral-700 leading-relaxed text-sm">
                        Mitra distribusi farmasi terpercaya yang berkomitmen mendukung pelayanan kesehatan Indonesia dengan produk berkualitas dan berkelanjutan.
                    </p>
                    <p class="text-xs text-neutral-600 italic">
                        Didirikan: 13 Maret 2019
                    </p>
                </div>
            </div>

            <!-- Column 2: Contact Information -->
            <div class="space-y-6">
                <!-- Section Title -->
                <h3 class="font-heading text-lg font-bold text-primary">
                    Hubungi Kami
                </h3>

                <!-- Contact Items -->
                <address class="not-italic space-y-4 text-sm text-neutral-700">
                    <!-- Location -->
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        <div class="leading-relaxed">
                            <p class="font-medium text-neutral-900 mb-1">Alamat</p>
                            <p>Jl. Arsadimeja, Karangnanas,<br>Sokaraja, Kab. Banyumas,<br>Jawa Tengah 53181</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-accent flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        <div class="leading-relaxed">
                            <p class="font-medium text-neutral-900 mb-1">Telepon</p>
                            <a href="tel:+622817775781" class="hover:text-accent transition">
                                (0281) 777 5781
                            </a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-accent flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        <div class="leading-relaxed">
                            <p class="font-medium text-neutral-900 mb-1">Email</p>
                            <a href="mailto:paragonmedikapharma2019@gmail.com" class="hover:text-accent transition break-all">
                                paragonmedikapharma2019@gmail.com
                            </a>
                        </div>
                    </div>
                </address>
            </div>

            <!-- Column 3: Quick Links & Social Media -->
            <div class="space-y-8">
                <!-- Quick Links -->
                <div class="space-y-4">
                    <h3 class="font-heading text-lg font-bold text-primary">
                        Navigasi
                    </h3>
                    <nav class="flex flex-col gap-2 sm:gap-2.5">
                        <a href="{{ route('home') }}" class="text-neutral-700 hover:text-accent transition text-sm font-medium">Beranda</a>
                        <a href="{{ route('products') }}" class="text-neutral-700 hover:text-accent transition text-sm font-medium">Produk</a>
                        <a href="{{ route('partners') }}" class="text-neutral-700 hover:text-accent transition text-sm font-medium">Mitra</a>
                        <a href="{{ route('vision-mission') }}" class="text-neutral-700 hover:text-accent transition text-sm font-medium">Visi & Misi</a>
                    </nav>
                </div>

                <!-- Social Media (Konsisten Hanya di Sini) -->
                <div class="space-y-4 mt-8 border-t border-neutral-200">
                    <h3 class="font-heading text-lg font-bold text-primary mt-8">
                        Ikuti Kami
                    </h3>
                    <div class="flex items-center gap-4">
                        <a href="https://facebook.com/ParagonMedikaPharma" target="_blank" rel="noopener noreferrer" 
                           aria-label="Facebook">
                           <img src="{{ asset('assets/fb-32.png') }}" alt="Facebook" class="w-8 h-8 object-contain transition duration-300 transform hover:scale-110">
                        </a>
                        
                        <a href="https://instagram.com/paragonmedikapharma" target="_blank" rel="noopener noreferrer" 
                           aria-label="Instagram">
                            <img src="{{ asset('assets/ig.png') }}" alt="Instagram" class="w-8 h-8 object-contain transition duration-300 transform hover:scale-110">
                        </a>

                        <a href="#" 
                           aria-label="LinkedIn">
                            <img src="{{ asset('assets/ld32.png') }}" alt="LinkedIn" class="w-8 h-8 object-contain transition duration-300 transform hover:scale-110">
                        </a>
                    </div>
                    <p class="text-xs text-neutral-600">
                        Dapatkan update terbaru dari kami
                    </p>
                </div>
            </div>
        </div>

        <!-- Divider Line -->
        <div class="border-t border-neutral-200 my-12 mb-6"></div>

        <!-- Footer Bottom: Copyright & Trust Statement -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <!-- Copyright -->
            <p class="text-xs text-neutral-600">
                &copy; {{ date('Y') }} PT. Paragon Medika Pharma. Semua hak dilindungi.
            </p>

            <!-- Trust Statement -->
            <p class="text-xs text-neutral-700 font-medium">
                ✓ Dipercaya oleh ribuan mitra di seluruh Indonesia
            </p>
        </div>
    </div>
</footer>
