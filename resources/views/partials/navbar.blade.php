<nav x-data="{ get openMobile() { return $store.menu.openMobile }, set openMobile(value) { $store.menu.openMobile = value } }"
 class="bg-neutral-lighter border-b border-neutral-border fixed top-0 inset-x-0 z-50 shadow-sm w-full">
    <div>
        <div class="flex justify-between items-center h-24 px-4 sm:px-6 lg:px-8 w-full">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('assets/logo.png') }}" alt="PT Paragon Medika Pharma" class="w-auto" style="height: 4.5rem; max-height: 5rem;">
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex md:items-center">
                <a href="{{ route('home') }}" onclick="if(window.location.pathname === '/') { event.preventDefault(); window.scrollTo({top: 0, behavior: 'smooth'}); }" class="px-3 py-2 text-primary hover:underline hover:underline-offset-4 hover:decoration-accent-yellow transition-all duration-300 {{ request()->routeIs('home') ? 'text-accent font-semibold underline underline-offset-4 decoration-accent-yellow' : '' }}">
                    Beranda
                </a>
                
                <!-- Dropdown: Tentang Kami -->
                <div class="relative group" x-data="{ open: false }">
                    <button 
                        @click="open = !open"
                        @mouseenter="open = true"
                        @mouseleave="open = false"
                        class="px-3 py-2 text-primary hover:underline hover:underline-offset-4 hover:decoration-accent-yellow transition-all duration-300 flex items-center {{ request()->routeIs('about', 'vision-mission', 'organization') ? 'text-accent font-semibold underline underline-offset-4 decoration-accent-yellow' : '' }}">
                        Tentang Kami
                        <svg class="ml-1 h-4 w-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div 
                        x-show="open"
                        x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        @mouseenter="open = true"
                        @mouseleave="open = false"
                        class="absolute left-0 mt-2 w-56 bg-neutral-lighter border border-neutral-border rounded shadow-lg py-2 z-50"
                        style="display: none;">
                        <a href="{{ url('/') }}#about-section" onclick="if(window.location.pathname === '/') { event.preventDefault(); smoothScrollToElement('about-section'); }" class="block px-4 py-2 text-primary hover:bg-neutral-light hover:text-accent transition-colors duration-200 {{ request()->routeIs('about') ? 'text-accent font-semibold bg-accent-soft' : '' }}">
                            Tentang Kami
                        </a>
                        <a href="{{ route('vision-mission') }}" class="block px-4 py-2 text-primary hover:bg-neutral-light hover:text-accent transition-colors duration-200 {{ request()->routeIs('vision-mission') ? 'text-accent font-semibold bg-accent-soft' : '' }}">
                            Visi Misi
                        </a>
                        <a href="{{ route('organization') }}" class="block px-4 py-2 text-primary hover:bg-neutral-light hover:text-accent transition-colors duration-200 {{ request()->routeIs('organization') ? 'text-accent font-semibold bg-accent-soft' : '' }}">
                            Struktur Organisasi
                        </a>
                    </div>
                </div>
                <a href="{{ route('products') }}" onclick="if(window.location.pathname === '/') { event.preventDefault(); smoothScrollToElement('products-section'); }" class="px-4 py-2 text-primary hover:underline hover:underline-offset-4 hover:decoration-accent-yellow transition-all duration-300 {{ request()->routeIs('products') ? 'text-accent font-semibold underline underline-offset-4 decoration-accent-yellow' : '' }}">
                    Produk
                </a>
                <a href="{{ route('home') }}#partners-section" onclick="if(window.location.pathname === '/') { event.preventDefault(); smoothScrollToElement('partners-section'); }" class="px-3 py-2 text-primary hover:underline hover:underline-offset-4 hover:decoration-accent-yellow transition-all duration-300 {{ request()->routeIs('partners') ? 'text-accent font-semibold underline underline-offset-4 decoration-accent-yellow' : '' }}">
                    Mitra
                </a>
                <a href="{{ route('home') }}#reviews-section" onclick="if(window.location.pathname === '/') { event.preventDefault(); smoothScrollToElement('reviews-section'); }" class="px-4 py-2 text-primary hover:underline hover:underline-offset-4 hover:decoration-accent-yellow transition-all duration-300 {{ request()->routeIs('reviews') ? 'text-accent font-semibold underline underline-offset-4 decoration-accent-yellow' : '' }}">
                    Ulasan
                </a>
                <a href="{{ route('gallery') }}" class="px-4 py-2 text-primary hover:underline hover:underline-offset-4 hover:decoration-accent-yellow transition-all duration-300 {{ request()->routeIs('gallery') ? 'text-accent font-semibold underline underline-offset-4 decoration-accent-yellow' : '' }}">
                    Galeri
                </a>
                <a href="{{ route('contact') }}" class="ml-2 px-6 py-2.5 bg-accent text-white rounded-md transition-all duration-300 hover:bg-accent-dark {{ request()->routeIs('contact') ? 'bg-accent-dark' : '' }}" style="border-radius: 4px;" onclick="if(window.location.pathname === '/') { event.preventDefault(); smoothScrollToElement('kontak'); }">
                    Kontak Kami
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="openMobile = !openMobile" class="text-primary hover:text-accent focus:outline-none transition-colors duration-300 relative w-8 h-8 flex items-center justify-center group">
                    <!-- Hamburger Icon -->
                    <svg id="menu-icon" 
                         :class="{ 'hidden': openMobile }"
                         class="h-6 w-6 absolute transition-all duration-300 group-hover:scale-110" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    
                    <!-- Close Icon (X) -->
                    <svg id="close-icon" 
                         :class="{ 'hidden': !openMobile }"
                         class="h-6 w-6 absolute transition-all duration-300 group-hover:scale-110" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="openMobile" 
         x-cloak 
         @click.away="openMobile = false"
         class="mobile-menu md:hidden bg-neutral-lighter border-t border-neutral-border overflow-hidden"
         :class="{ 'menu-open': openMobile, 'menu-closed': !openMobile }"
         style="display: none;">
        <div class="px-4 pt-4 pb-6 space-y-2">
            <a href="{{ route('home') }}" @click="openMobile = false" onclick="if(window.location.pathname === '/') { event.preventDefault(); window.scrollTo({top: 0, behavior: 'smooth'}); }" class="menu-item block px-4 py-3 text-primary hover:text-accent hover:bg-accent-soft transition-all duration-300 rounded-lg {{ request()->routeIs('home') ? 'text-accent font-semibold bg-accent-soft' : '' }}">
                Beranda
            </a>
            <a href="{{ url('/') }}#about-section" @click="openMobile = false" onclick="if(window.location.pathname === '/') { event.preventDefault(); smoothScrollToElement('about-section'); }" class="menu-item block px-4 py-3 text-primary hover:text-accent hover:bg-accent-soft transition-all duration-300 rounded-lg {{ request()->routeIs('about') ? 'text-accent font-semibold bg-accent-soft' : '' }}">
                Tentang Kami
            </a>
            <a href="{{ route('vision-mission') }}" @click="openMobile = false" class="menu-item block px-6 py-3 text-primary hover:text-accent hover:bg-accent-soft transition-all duration-300 rounded-lg {{ request()->routeIs('vision-mission') ? 'text-accent font-semibold bg-accent-soft' : '' }}">
                Visi Misi
            </a>
            <a href="{{ route('organization') }}" @click="openMobile = false" class="menu-item block px-6 py-3 text-primary hover:text-accent hover:bg-accent-soft transition-all duration-300 rounded-lg {{ request()->routeIs('organization') ? 'text-accent font-semibold bg-accent-soft' : '' }}">
                Struktur Organisasi
            </a>
            <a href="{{ route('products') }}" @click="openMobile = false" onclick="if(window.location.pathname === '/') { event.preventDefault(); smoothScrollToElement('products-section'); }" class="menu-item block px-4 py-3 text-primary hover:text-accent hover:bg-accent-soft transition-all duration-300 rounded-lg {{ request()->routeIs('products') ? 'text-accent font-semibold bg-accent-soft' : '' }}">
                Produk
            </a>
            <a href="{{ route('home') }}#partners-section" @click="openMobile = false" onclick="if(window.location.pathname === '/') { event.preventDefault(); smoothScrollToElement('partners-section'); }" class="menu-item block px-4 py-3 text-primary hover:text-accent hover:bg-accent-soft transition-all duration-300 rounded-lg {{ request()->routeIs('partners') ? 'text-accent font-semibold bg-accent-soft' : '' }}">
                Mitra
            </a>
            <a href="{{ route('home') }}#reviews-section" @click="openMobile = false" onclick="if(window.location.pathname === '/') { event.preventDefault(); smoothScrollToElement('reviews-section'); }" class="menu-item block px-4 py-3 text-primary hover:text-accent hover:bg-accent-soft transition-all duration-300 rounded-lg {{ request()->routeIs('reviews') ? 'text-accent font-semibold bg-accent-soft' : '' }}">
                Ulasan
            </a>
            <a href="{{ route('gallery') }}" @click="openMobile = false" class="menu-item block px-4 py-3 text-primary hover:text-accent hover:bg-accent-soft transition-all duration-300 rounded-lg {{ request()->routeIs('gallery') ? 'text-accent font-semibold bg-accent-soft' : '' }}">
                Galeri
            </a>
            <a href="{{ route('contact') }}" @click="openMobile = false" onclick="if(window.location.pathname === '/') { event.preventDefault(); smoothScrollToElement('kontak'); }" class="menu-item block px-4 py-3 bg-accent text-white rounded-lg text-center transition-all duration-300 hover:bg-accent-dark {{ request()->routeIs('contact') ? 'bg-accent-dark' : '' }}">
                Kontak Kami
            </a>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
  /* Custom mobile menu animations */
  .mobile-menu {
    max-height: 0;
    opacity: 0;
    transition: max-height 0.8s cubic-bezier(0.4, 0, 0.2, 1), 
                opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    display: block !important;
  }

  .mobile-menu.menu-open {
    max-height: 600px;
    opacity: 1;
  }

  .mobile-menu.menu-closed {
    max-height: 0;
    opacity: 0;
  }

  /* Smooth stagger animation for menu items */
  .menu-item {
    opacity: 0;
    transform: translateY(-10px);
    transition: opacity 0.4s ease-out, transform 0.4s ease-out;
    cursor: pointer;
  }

  .mobile-menu.menu-open .menu-item {
    opacity: 1;
    transform: translateY(0);
  }

  /* Stagger animation timing */
  .mobile-menu .menu-item:nth-child(1) { transition-delay: 0.1s; }
  .mobile-menu .menu-item:nth-child(2) { transition-delay: 0.2s; }
  .mobile-menu .menu-item:nth-child(3) { transition-delay: 0.3s; }
  .mobile-menu .menu-item:nth-child(4) { transition-delay: 0.4s; }
  .mobile-menu .menu-item:nth-child(5) { transition-delay: 0.5s; }
  .mobile-menu .menu-item:nth-child(6) { transition-delay: 0.6s; }
  .mobile-menu .menu-item:nth-child(7) { transition-delay: 0.7s; }
  .mobile-menu .menu-item:nth-child(8) { transition-delay: 0.8s; }
</style>

<script>
    // Smooth scroll dengan offset untuk navbar
    function smoothScrollToElement(elementId) {
        const element = document.getElementById(elementId);
        if (!element) return;
        
        const navbar = document.querySelector('nav');
        const navbarHeight = navbar ? navbar.offsetHeight : 96;
        const elementPosition = element.getBoundingClientRect().top + window.scrollY;
        const offsetPosition = elementPosition - navbarHeight - 20; // 20px extra padding
        
        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }

  document.addEventListener('alpine:init', () => {
    Alpine.store('menu', {
      openMobile: false
    });

    Alpine.effect(() => {
      document.body.classList.toggle('overflow-hidden', Alpine.store('menu').openMobile);
    });
  });
</script>
