<header class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-neutral-border shadow-sm">
    <div class="h-14 px-3 sm:px-8 flex items-center justify-between">
        <!-- Left: Hamburger + Logo + Branding -->
        <div class="flex items-center gap-2 flex-1 min-w-0">
            <button onclick="openSidebar()"
                class="lg:hidden inline-flex items-center justify-center w-9 h-9 rounded-lg hover:bg-slate-100 transition mr-1"
                aria-label="Open Sidebar">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-slate-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <a href="#" class="flex items-center gap-2 min-w-0">
                <img src="/assets/logo.png" alt="Paragon Logo" class="w-9 h-9 object-contain rounded-lg border border-[#a81d5d]/60 bg-white" />
                <div class="flex flex-col justify-center min-w-0">
                    <p class="text-sm font-bold text-[#a81d5d] leading-tight truncate">Paragon CMS</p>
                    <p class="text-[10px] text-neutral leading-tight truncate">Admin</p>
                </div>
            </a>
        </div>
        <!-- Right: Profile -->
        @php $admin = request()->attributes->get('admin'); @endphp
        <div class="flex items-center gap-2">
            <div class="w-9 h-9 rounded-full bg-[#a81d5d]/10 flex items-center justify-center border border-[#a81d5d]/60 overflow-hidden">
                @if($admin && $admin->photo)
                    <img src="{{ asset('storage/' . $admin->photo) }}" alt="Foto Admin" class="w-9 h-9 object-cover rounded-full" />
                @else
                    <i class="fas fa-user-circle text-[#a81d5d] text-lg"></i>
                @endif
            </div>
            @if($admin)
                <span class="ml-2 font-semibold text-sm text-slate-800">{{ $admin->username }}</span>
            @endif
        </div>
    </div>
</header>
