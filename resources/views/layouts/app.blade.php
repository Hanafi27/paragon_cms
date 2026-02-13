<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Company Profile')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{ asset('assets/logo.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-body antialiased text-primary bg-neutral-light overflow-x-hidden min-h-screen" style="width: 100vw; overflow-x: hidden;">
    @include('partials.navbar')
    <div class="mb-2 md:mb-4"></div>
    <main class="pt-16 md:pt-20">   
        @yield('content')
    </main>

    @yield('contact')

    @yield('footer')

    <!-- Include Chatbot Component -->
    @include('partials.chatbot')

    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
