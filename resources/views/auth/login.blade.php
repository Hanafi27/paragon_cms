<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin Login | Menggala Ranch</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo2.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS sudah di-bundle oleh Vite -->
    @vite(['resources/css/app.css'])
    <style>
        body {
            font-family: 'IBM Plex Sans', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'IBM Plex Sans', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-neutral-light flex items-center justify-center p-4">
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden ring-1 ring-slate-200 transition hover:shadow-[0_25px_60px_rgba(0,0,0,0.12)]">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <!-- Left: Form Panel -->
            <div class="p-6 sm:p-10">
                <p class="text-sm font-medium mb-2" style="color: rgba(168, 29, 93, 0.75);">Admin Login</p>
                <h3 class="text-2xl font-semibold text-slate-900 mb-6">Masuk untuk mulai mengelola</h3>

                @if(session('error'))
                    <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 rounded-xl">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="mb-4 p-3 rounded-xl" style="background: rgba(168, 29, 93, 0.06); border: 1px solid rgba(168, 29, 93, 0.16); color: rgba(168, 29, 93, 0.75);">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" placeholder="admin" required class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-slate-900 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#c25a8b] focus:border-transparent transition" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                        <div class="relative">
                            <input id="password-admin" type="password" name="password" required class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 pr-12 text-slate-900 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#c25a8b] focus:border-transparent transition" />
                            <button type="button" data-toggle-target="password-admin" class="absolute inset-y-0 right-3 flex items-center text-slate-400 hover:text-slate-600 transition" aria-label="Tampilkan password">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5 toggle-eye-open">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12s3.75-7.5 9.75-7.5 9.75 7.5 9.75 7.5-3.75 7.5-9.75 7.5S2.25 12 2.25 12z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5 toggle-eye-closed hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 002.25 12s3.75 7.5 9.75 7.5c2.038 0 3.873-.583 5.393-1.49M6.228 6.228A10.45 10.45 0 0112 4.5c6 0 9.75 7.5 9.75 7.5a10.523 10.523 0 01-4.318 4.57M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-slate-500">
                        <span class="w-2 h-2 rounded-full animate-pulse" style="background: rgba(168, 29, 93, 0.65);"></span>
                        Mode aman aktif
                    </div>
                    <button type="submit" class="w-full inline-flex items-center justify-center rounded-xl px-4 py-3 text-white font-semibold shadow-lg active:translate-y-px transition transform hover:scale-[1.01]" style="background: linear-gradient(135deg, #d78ab2 0%, #c25a8b 50%, #ad4f7a 100%); box-shadow: 0 10px 25px -8px rgba(194, 90, 139, 0.45);">Masuk Dashboard Admin</button>
                </form>
            </div>

            <!-- Right: Info Panel -->
            <div class="hidden md:flex relative bg-gradient-to-br from-white via-[#f7edf5] to-white p-10 flex-col justify-center">
                <div class="absolute inset-0 pointer-events-none opacity-80">
                    <div class="w-48 h-48 blur-[140px] absolute -top-10 right-0" style="background: rgba(168, 29, 93, 0.12);"></div>
                    <div class="w-56 h-56 blur-[140px] absolute bottom-0 left-4" style="background: rgba(168, 29, 93, 0.08);"></div>
                </div>

                <div class="relative">
                    <div class="flex items-center gap-3 mb-8">
                        <img src="{{ asset('assets/logo2.png') }}" alt="Logo Menggala Ranch" class="w-14 h-14 rounded-2xl border border-white/70 shadow-lg" />
                        <div>
                            <p class="text-sm uppercase tracking-[0.4em]" style="color: rgba(168, 29, 93, 0.7);">Admin Portal</p>
                            <h1 class="text-2xl font-semibold text-slate-800">PT. PARAGON MEDIKA PHARMA</h1>
                        </div>
                    </div>

                    <div class="space-y-5 text-slate-700">
                        <p class="text-xs uppercase tracking-[0.6em]" style="color: rgba(168, 29, 93, 0.6);">Manajemen internal</p>
                        <h2 class="text-2xl font-bold leading-tight text-slate-900">Selamat datang di Sistem Pengelolaan Konten PT Paragon Medika Pharma</h2>
                        <p class="leading-relaxed">Dashboard terpusat untuk pengelolaan konten dan informasi internal perusahaan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
    <script>
        window.addEventListener('load', function() {
            if (typeof tailwind !== 'undefined') {
                console.log('Tailwind CSS loaded successfully');
            } else {
                console.error('Tailwind CSS failed to load');
            }
        });
    </script>
</body>
</html>
