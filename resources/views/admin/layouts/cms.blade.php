<!DOCTYPE html>
<html lang="id">
<head>
        @vite(['resources/css/app.css'])
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'CMS Dashboard')</title>

    <!-- Tailwind CSS sudah di-bundle oleh Vite -->
    <!-- Alpine.js for dropdown -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- FontAwesome CDN for icons -->
    <!-- Chart.js CDN for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body { font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, Arial; }
        /* Fallback for accent text if Tailwind fails */
        .text-accent { color: #7B1FA2 !important; }
        .text-accent-yellow { color: #FFD600 !important; }
        .bg-accent { background-color: #7B1FA2 !important; }
        .bg-accent-yellow { background-color: #FFD600 !important; }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

    <!-- NAVBAR -->
    @include('admin.layouts.navbar')


    <div class="flex min-h-screen pt-16 overflow-hidden">
        <!-- SIDEBAR -->
        @include('admin.layouts.sidebar')

        <!-- MAIN CONTENT -->
        <main id="main-content" class="flex-1 p-4 sm:p-6 lg:p-8 h-[calc(100vh-4rem)] overflow-y-auto transition-all duration-300">
            @yield('content')
        </main>
    </div>

    <!-- SIMPLE JS untuk toggle sidebar mobile -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarBackdrop = document.getElementById('sidebar-backdrop');

        window.openSidebar = function() {
            sidebar.classList.remove('-translate-x-full');
            sidebarBackdrop.classList.remove('hidden');
        }

        window.closeSidebar = function() {
            sidebar.classList.add('-translate-x-full');
            sidebarBackdrop.classList.add('hidden');
        }
        // Sidebar collapse/expand
        const hamburger = document.getElementById('sidebar-hamburger');
        const sidebarEl = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        let sidebarCollapsed = false;
        if (hamburger) {
            hamburger.addEventListener('click', function() {
                sidebarCollapsed = !sidebarCollapsed;
                if (sidebarCollapsed) {
                    sidebarEl.classList.add('sidebar-collapsed');
                    mainContent.classList.add('main-collapsed');
                } else {
                    sidebarEl.classList.remove('sidebar-collapsed');
                    mainContent.classList.remove('main-collapsed');
                }
            });
        }
    </script>
    <style>
        /* Sidebar collapse/expand styles */
        #sidebar {
            transition: width 0.3s cubic-bezier(.22,1,.36,1);
        }
        #sidebar.sidebar-collapsed {
            width: 64px !important;
        }
        #sidebar.sidebar-collapsed nav > a > span,
        #sidebar.sidebar-collapsed nav > div > a > span {
            margin-right: 0;
        }
        #sidebar.sidebar-collapsed .text-sm,
        #sidebar.sidebar-collapsed .text-xs,
        #sidebar.sidebar-collapsed .font-medium,
        #sidebar.sidebar-collapsed .font-semibold,
        #sidebar.sidebar-collapsed .text-primary,
        #sidebar.sidebar-collapsed .text-neutral,
        #sidebar.sidebar-collapsed .text-[#a81d5d] {
            display: none !important;
        }
        #sidebar.sidebar-collapsed .w-9 {
            margin: 0 auto;
        }
        #sidebar.sidebar-collapsed .mt-8,
        #sidebar.sidebar-collapsed .mt-2,
        #sidebar.sidebar-collapsed .mb-3,
        #sidebar.sidebar-collapsed .mb-4,
        #sidebar.sidebar-collapsed .mb-5,
        #sidebar.sidebar-collapsed .mb-6 {
            margin: 0 !important;
        }
        #main-content {
            transition: margin-left 0.3s cubic-bezier(.22,1,.36,1);
        }
        @media (min-width: 1024px) {
            #sidebar.sidebar-collapsed {
                width: 64px !important;
            }
            #main-content.main-collapsed {
                margin-left: 64px !important;
            }
        }
        @media (max-width: 1023px) {
            #main-content {
                margin-left: 0 !important;
            }
        }
    </style>
</body>
</html>
