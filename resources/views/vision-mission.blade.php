@extends('layouts.app')

@section('title', 'Visi Misi - PT Paragon Medika Pharma')

@section('content')
    {{-- Hero Section --}}
    <div class="bg-white py-16 sm:py-24 relative overflow-hidden pt-44 md:pt-24" style="padding-top: 6.5rem !important;">
        <!-- Background Accents -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-10 right-0 sm:right-20 w-64 h-64 bg-accent/5 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 left-10 w-80 h-80 bg-primary/4 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-up relative z-10">
            <h1 class="font-heading text-4xl sm:text-5xl font-bold text-primary mb-4 tracking-heading">
                Visi & Misi
            </h1>
            <div class="w-12 h-1 bg-accent mx-auto rounded-full mb-6"></div>
            <p class="text-lg text-neutral max-w-2xl mx-auto leading-body">
                {{ $visionMission->intro ?? 'Komitmen kami untuk memberikan standar kesehatan terbaik melalui inovasi dan integritas.' }}
            </p>
        </div>
    </div>

    {{-- Vision Section --}}
    <div class="bg-neutral-light py-16 relative overflow-hidden pt-16 md:pt-0">
        <!-- Background Accents -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-accent-soft/30 rounded-full blur-3xl hidden sm:block"></div>
            <div class="absolute top-1/2 -left-32 w-72 h-72 bg-accent/4 rounded-full blur-3xl hidden sm:block"></div>
        </div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 animate-scale-in relative z-10">
            <div class="bg-white rounded-2xl shadow-sm p-8 sm:p-12 text-center border border-neutral-border/50 relative overflow-hidden">
                {{-- Decorative Element --}}
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-accent via-accent-light to-accent"></div>
                
                <h2 class="font-heading text-3xl font-bold text-primary mb-6">Visi Kami</h2>
                <p class="text-xl sm:text-2xl text-neutral-600 font-light italic leading-relaxed">
                    "{{ $visionMission->visi ?? 'Menjadi perusahaan jasa distribusi dan logistic yang terintegrasi di dalam bidang kesehatan, mengutamakan pelayanan yang terbaik, serta dapat dipercaya dengan didukung Sumber Daya Manusia (SDM) yang berkompeten serta ahli, dan didukung oleh system terbaik' }}"
                </p>
            </div>
        </div>
    </div>

    {{-- Mission Section --}}
    <div class="bg-white py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-fade-up">
            <div class="text-center mb-16 bg-neutral-lighter rounded-xl p-6 shadow">
                <h2 class="font-heading text-3xl font-bold text-primary mb-4">Misi Kami</h2>
                <p class="text-neutral text-lg">"{{ $visionMission->misi ?? 'Turut serta membangun bangsa melalui kinerja di dalam pelayanan kesehatan, dimana dapat selalu memastikan ketersediaan logistik.' }}"</p>
           </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

@section('scripts')
        // Scroll Animations - Intersection Observer
    </script>
    @include('partials.footer')
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
@endsection
