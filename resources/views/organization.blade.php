@extends('layouts.app')

@section('title', 'Struktur Organisasi - PT Paragon Medika Pharma')

@section('content')
    {{-- Hero Section --}}
    <div class="bg-white py-16 sm:py-24 relative overflow-hidden pt-44 md:pt-24" style="padding-top: 6.5rem !important;">
        <!-- Background Accents -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-10 left-1/4 w-80 h-80 bg-primary/4 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 -right-20 w-72 h-72 bg-accent-soft/40 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-up relative z-10">
            <h1 class="font-heading text-4xl sm:text-5xl font-bold text-primary mb-4 tracking-heading">
                Struktur Organisasi
            </h1>
            <div class="w-12 h-1 bg-accent mx-auto rounded-full mb-6"></div>
            <p class="text-lg text-neutral max-w-2xl mx-auto leading-body">
                {{ $organization->org_intro ?? '' }}
            </p>
        </div>
    </div>

    {{-- Organizational Chart Section --}}
    <div class="bg-neutral-light py-16 relative overflow-hidden pt-4 md:pt-0">
        <!-- Background Accents -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-20 -left-32 w-96 h-96 bg-accent/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 right-1/4 w-80 h-80 bg-accent-soft/30 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-fade-up relative z-10">
            <div class="text-center mb-12">
                <h2 class="font-heading text-3xl font-bold text-primary mb-4">Bagan Organisasi</h2>
                <p class="text-neutral">Alur koordinasi dan tanggung jawab PT Paragon Medika Pharma</p>
            </div>
            
            <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-6 animate-fade-up" data-delay="100">
                <div class="relative group cursor-pointer" data-lightbox-trigger data-image="{{ $organization->org_chart ?? '' }}" data-title="Bagan Struktur Organisasi">
                    <img src="{{ $organization->org_chart ?? '' }}" 
                         alt="Struktur Organisasi" 
                         class="w-full h-auto object-contain rounded-lg transition-transform duration-300 hover:scale-105" />
                    
                    <!-- Click to Enlarge Overlay -->
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 flex items-center justify-center transition-all duration-300 rounded-lg">
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white/90 px-4 py-2 rounded-lg">
                            <svg class="w-6 h-6 text-primary inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                            </svg>
                            <span class="text-sm font-medium text-primary">Klik untuk Memperbesar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Leadership Section (Founders) --}}
    <div class="bg-white py-16 sm:py-24">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-fade-up">
    <div class="text-center mb-16">
      <h2 class="font-heading text-3xl font-bold text-primary mb-4">Pimpinan Kami</h2>
      <p class="text-neutral text-lg mb-6">Tokoh di balik berdirinya PT Paragon Medika Pharma</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-3xl mx-auto text-center">
            <!-- Founder -->
            <div class="animate-stagger" data-delay="0">
                <div class="flex justify-center mb-4 cursor-pointer" data-lightbox-trigger data-image="{{ $organization->founder_img ?? '' }}" data-title="{{ $organization->founder_name ?? '' }} - {{ $organization->founder_role ?? '' }}">
                        <img src="{{ $organization->founder_img ?? '' }}" 
                                 alt="{{ $organization->founder_name ?? '' }}"
                                 class="w-40 h-40 object-cover rounded-full border-4 border-accent shadow-md hover:scale-105 transition-transform duration-300" />
                </div>
                <h3 class="font-heading text-lg font-bold text-primary mb-1">{{ $organization->founder_name ?? '' }}</h3>
                <p class="text-accent font-medium text-sm uppercase">{{ $organization->founder_role ?? '' }}</p>
            </div>

            <!-- Co-Founder -->
            <div class="animate-stagger" data-delay="100">
                <div class="flex justify-center mb-4 cursor-pointer" data-lightbox-trigger data-image="{{ $organization->co_founder_img ?? '' }}" data-title="{{ $organization->co_founder_name ?? '' }} - {{ $organization->co_founder_role ?? '' }}">
                        <img src="{{ $organization->co_founder_img ?? '' }}" 
                                 alt="{{ $organization->co_founder_name ?? '' }}"
                                 class="w-40 h-40 object-cover rounded-full border-4 border-accent shadow-md hover:scale-105 transition-transform duration-300" />
                </div>
                <h3 class="font-heading text-lg font-bold text-primary mb-1">{{ $organization->co_founder_name ?? '' }}</h3>
                <p class="text-accent font-medium text-sm uppercase">{{ $organization->co_founder_role ?? '' }}</p>
            </div>
    </div>
  </div>
    </div>

    {{-- Team Photo Section --}}
    <div class="bg-neutral-light py-16">
    <div class="max-w-4xl mx-auto px-4 animate-fade-up">
        <div class="text-center mb-8">
            <h2 class="font-heading text-3xl font-bold text-primary mb-4">Tim Hebat Kami</h2>
            <p class="text-neutral text-lg">Sinergi profesional muda yang berdedikasi</p>
        </div>

        <!-- Fix: Relative + Aspect Ratio + Overflow -->
        <div class="w-full mx-auto aspect-video rounded-2xl overflow-hidden shadow-lg animate-scale-in cursor-pointer" data-delay="100" data-lightbox-trigger data-image="{{ $organization->team_img ?? '' }}" data-title="Tim Hebat PT Paragon Medika Pharma">
            <img src="{{ $organization->team_img ?? '' }}"
                 alt="Tim Paragon Medika Pharma"
                 class="inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105">
        </div>
    </div>
    </div>


@endsection

@section('footer')
    @include('partials.footer')
@endsection

@push('scripts')
    <script>
        // Lightbox Gallery
        (function() {
            // Create lightbox overlay
            const lightboxHTML = `
                <div id="lightbox-overlay" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4" style="backdrop-filter: blur(8px);">
                    <button id="lightbox-close" class="absolute top-4 right-4 text-white hover:text-accent transition-colors z-10">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <div class="relative max-w-7xl max-h-[90vh] w-full flex flex-col items-center">
                        <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-2xl" />
                        <p id="lightbox-title" class="text-white text-lg mt-4 text-center font-medium"></p>
                    </div>
                </div>
            `;
            
            document.body.insertAdjacentHTML('beforeend', lightboxHTML);
            
            const overlay = document.getElementById('lightbox-overlay');
            const image = document.getElementById('lightbox-image');
            const title = document.getElementById('lightbox-title');
            const closeBtn = document.getElementById('lightbox-close');
            
            // Open lightbox
            document.querySelectorAll('[data-lightbox-trigger]').forEach(trigger => {
                trigger.addEventListener('click', function() {
                    const imgSrc = this.getAttribute('data-image');
                    const imgTitle = this.getAttribute('data-title') || '';
                    
                    image.src = imgSrc;
                    title.textContent = imgTitle;
                    overlay.classList.remove('hidden');
                    overlay.classList.add('flex');
                    document.body.style.overflow = 'hidden';
                });
            });
            
            // Close lightbox
            function closeLightbox() {
                overlay.classList.add('hidden');
                overlay.classList.remove('flex');
                document.body.style.overflow = '';
            }
            
            closeBtn.addEventListener('click', closeLightbox);
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    closeLightbox();
                }
            });
            
            // Close on ESC key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !overlay.classList.contains('hidden')) {
                    closeLightbox();
                }
            });
        })();
        
        // Scroll Animations - Intersection Observer
        (function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        requestAnimationFrame(() => {
                            entry.target.classList.add('animate-in');
                        });
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            function initScrollAnimations() {
                const animateElements = document.querySelectorAll(
                    '.animate-fade-up, .animate-fade-left, .animate-fade-right, ' +
                    '.animate-scale-in, .animate-stagger, .animate-slide-left, .animate-slide-right'
                );
                animateElements.forEach(element => {
                    if (!element.classList.contains('animate-in')) {
                        observer.observe(element);
                    }
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initScrollAnimations);
            } else {
                requestAnimationFrame(initScrollAnimations);
            }
        })();
    </script>
@endpush
