<!-- Backdrop (mobile) -->
<div id="sidebar-backdrop" onclick="closeSidebar()"
    class="hidden fixed inset-0 bg-black/40 z-40 lg:hidden"></div>

<aside id="sidebar"
    class="fixed lg:static z-50 lg:z-auto top-16 lg:top-0 left-0 w-72 h-[calc(100vh-4rem)] lg:h-auto
           bg-white border-r border-neutral-border
           transform -translate-x-full lg:translate-x-0 transition duration-200 ease-in-out
           shadow-sm overflow-hidden">

    <div class="h-full flex flex-col">

        <!-- Sidebar Header -->
        <div class="flex items-center justify-between p-3 border-b border-slate-100">
            <p class="sidebar-label text-xs font-semibold text-slate-400 uppercase tracking-wider">
                Menu
            </p>

            <div class="flex items-center gap-2">
                <!-- Desktop collapse button -->
                <button id="sidebar-hamburger"
                    class="hidden lg:flex w-10 h-10 rounded-lg hover:bg-slate-100 transition items-center justify-center"
                    title="Perbesar/Kecilkan Sidebar">
                    <span id="sidebar-hamburger-icon">
                        <i class="fas fa-bars text-slate-700"></i>
                    </span>
                </button>

                <!-- Mobile close -->
                <button onclick="closeSidebar()"
                    class="lg:hidden w-10 h-10 rounded-lg hover:bg-slate-100 transition flex items-center justify-center"
                    aria-label="Close Sidebar">
                    <i class="fas fa-times text-slate-700"></i>
                </button>
            </div>
        </div>

        <!-- Menu -->
        <nav class="px-2 pb-6 overflow-y-auto h-full">


            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-[#a81d5d]/10 text-[#a81d5d] border border-[#a81d5d]/20' : 'hover:bg-[#a81d5d]/10 transition' }}">
                <span class="sidebar-icon w-9 h-9 rounded-lg bg-white flex items-center justify-center border border-[#a81d5d]/20">
                    <i class="fas fa-home text-[#a81d5d] text-lg"></i>
                </span>
                <div class="sidebar-text">
                    <p class="text-sm font-semibold">Dashboard</p>
                    <p class="text-xs text-[#a81d5d]">Ringkasan & statistik</p>
                </div>
            </a>

            <div class="mt-4 space-y-1">
                <a href="{{ route('admin.editor.beranda') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.editor.beranda') ? 'bg-[#a81d5d]/10 text-[#a81d5d] border border-[#a81d5d]/20' : 'hover:bg-[#a81d5d]/10 transition' }}">
                    <span class="sidebar-icon w-9 h-9 rounded-lg bg-white flex items-center justify-center border border-[#a81d5d]/10">
                        <i class="fas fa-home text-[#a81d5d] text-lg"></i>
                    </span>
                    <span class="sidebar-text text-sm font-medium text-primary flex-1">Editor Beranda</span>
                </a>
                <a href="{{ route('admin.editor.vision') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.editor.vision') ? 'bg-[#a81d5d]/10 text-[#a81d5d] border border-[#a81d5d]/20' : 'hover:bg-[#a81d5d]/10 transition' }}">
                    <span class="sidebar-icon w-9 h-9 rounded-lg bg-white flex items-center justify-center border border-[#a81d5d]/10">
                        <i class="fas fa-eye text-[#a81d5d] text-lg"></i>
                    </span>
                    <span class="sidebar-text text-sm font-medium text-primary flex-1">Editor Visi Misi</span>
                </a>
                <a href="{{ route('admin.editor.organization') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.editor.organization') ? 'bg-[#a81d5d]/10 text-[#a81d5d] border border-[#a81d5d]/20' : 'hover:bg-[#a81d5d]/10 transition' }}">
                    <span class="sidebar-icon w-9 h-9 rounded-lg bg-white flex items-center justify-center border border-[#a81d5d]/10">
                        <i class="fas fa-sitemap text-[#a81d5d] text-lg"></i>
                    </span>
                    <span class="sidebar-text text-sm font-medium text-primary flex-1">Editor Struktur Organisasi</span>
                </a>
                <a href="{{ route('product.index') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('product.index') ? 'bg-[#a81d5d]/10 text-[#a81d5d] border border-[#a81d5d]/20' : 'hover:bg-[#a81d5d]/10 transition' }}">
                    <span class="sidebar-icon w-9 h-9 rounded-lg bg-white flex items-center justify-center border border-[#a81d5d]/10">
                        <i class="fas fa-box-open text-[#a81d5d] text-lg"></i>
                    </span>
                    <p class="sidebar-text text-sm font-medium text-primary">Kelola Produk</p>
                </a>
                <a href="{{ route('gallery.index') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('gallery.index') ? 'bg-[#a81d5d]/10 text-[#a81d5d] border border-[#a81d5d]/20' : 'hover:bg-[#a81d5d]/10 transition' }}">
                    <span class="sidebar-icon w-9 h-9 rounded-lg bg-white flex items-center justify-center border border-[#a81d5d]/10">
                        <i class="fas fa-images text-[#a81d5d] text-lg"></i>
                    </span>
                    <p class="sidebar-text text-sm font-medium text-primary">Kelola Gallery</p>
                </a>
                <a href="{{ route('faq.index') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('faq.index') ? 'bg-[#a81d5d]/10 text-[#a81d5d] border border-[#a81d5d]/20' : 'hover:bg-[#a81d5d]/10 transition' }}">
                    <span class="sidebar-icon w-9 h-9 rounded-lg bg-white flex items-center justify-center border border-[#a81d5d]/10">
                        <i class="fas fa-question-circle text-[#a81d5d] text-lg"></i>
                    </span>
                    <p class="sidebar-text text-sm font-medium text-primary">Kelola FAQ Chatbot</p>
                </a>
                <a href="{{ route('admin.settings') }}"
                    class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-xl {{ request()->routeIs('admin.settings') ? 'bg-[#a81d5d]/10 text-[#a81d5d] border border-[#a81d5d]/20' : 'hover:bg-[#a81d5d]/10 transition' }}">
                    <span class="sidebar-icon w-9 h-9 rounded-lg bg-white flex items-center justify-center border border-[#a81d5d]/10">
                        <i class="fas fa-cogs text-[#a81d5d] text-lg"></i>
                    </span>
                    <p class="sidebar-text text-sm font-medium text-primary">Pengaturan</p>
                </a>

            <!-- Footer actions -->
            <div class="mt-8 flex flex-col gap-4 items-center">

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit"
                        class="sidebar-link w-full flex items-center justify-center gap-2 px-4 py-2 rounded-xl bg-[#a81d5d] text-white font-semibold shadow-sm hover:bg-[#a81d5d]/90 transition">
                        <i class="fas fa-sign-out-alt"></i> <span class="sidebar-text">Logout</span>
                    </button>
                </form>

                <div class="w-full flex items-center justify-center mt-2">
                    <span id="sidebar-clock" class="sidebar-text text-xs text-primary font-mono tracking-widest"></span>
                </div>
            </div>
        </nav>
    </div>
</aside>

<!-- Styles (keep at bottom) -->
<style>
    @media (max-width: 1023px) {
        #sidebar {
            width: 80vw !important;
            min-width: 220px !important;
            max-width: 320px !important;
        }
        #sidebar.sidebar-collapsed {
            width: 0 !important;
        }
    }

    @media (max-width: 640px) {
        #sidebar {
            width: 100vw !important;
            min-width: 0 !important;
            max-width: 100vw !important;
        }
    }

    #sidebar.sidebar-collapsed .sidebar-text,
    #sidebar.sidebar-collapsed .sidebar-label {
        display: none !important;
    }


    #sidebar.sidebar-collapsed .sidebar-link {
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        padding-left: 0.25rem !important;
        padding-right: 0.25rem !important;
        gap: 0 !important;
    }
    #sidebar.sidebar-collapsed .sidebar-icon {
        margin: 0 auto !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        width: 2.5rem !important;
        height: 2.5rem !important;
    }

    #sidebar.sidebar-collapsed nav {
        overflow-y: visible !important;
    }

    #sidebar.sidebar-collapsed {
        overflow-x: visible !important;
        overflow-y: hidden !important;
    }
</style>

<!-- Scripts (keep at bottom) -->
<script>
    // gunakan variabel 'sidebar' dari cms.blade.php
    const sidebarHamburger = document.getElementById('sidebar-hamburger');
    const sidebarHamburgerIcon = document.getElementById('sidebar-hamburger-icon');

    if (sidebarHamburger && sidebarHamburgerIcon && sidebar) {
        sidebarHamburger.addEventListener('click', function () {
            setTimeout(() => {
                sidebarHamburgerIcon.innerHTML = sidebar.classList.contains('sidebar-collapsed')
                    ? '<i class="fas fa-times text-slate-700"></i>'
                    : '<i class="fas fa-bars text-slate-700"></i>';
            }, 10);
        });
    }

    function updateSidebarClock() {
        const el = document.getElementById('sidebar-clock');
        if (!el) return;

        const now = new Date();
        const h = String(now.getHours()).padStart(2, '0');
        const m = String(now.getMinutes()).padStart(2, '0');
        const s = String(now.getSeconds()).padStart(2, '0');
        el.textContent = `${h}:${m}:${s}`;
    }

    setInterval(updateSidebarClock, 1000);
    updateSidebarClock();
</script>
