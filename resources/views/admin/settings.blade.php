@extends('admin.layouts.cms')

@section('title', 'Pengaturan')

@section('content')
@php $admin = request()->attributes->get('admin'); @endphp
<form class="max-w-5xl mx-auto py-8 space-y-6" method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf
    <!-- Page Header -->
    <div>
        <h1 class="text-2xl font-bold text-slate-900">Pengaturan Profil</h1>
        <p class="text-sm text-slate-500 mt-1">
            Kelola informasi akun dan keamanan Anda.
        </p>
    </div>

    <!-- Profile Card -->
    <div class="bg-white border border-slate-200 rounded-xl shadow-sm">
        <!-- Profile Header -->
        <div class="flex items-center gap-6 p-6 border-b border-slate-200">
            <div class="relative">
                <img 
                    src="{{ $admin && $admin->photo ? asset('storage/' . $admin->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($admin->username ?? 'Admin') . '&background=a81d5d&color=fff&size=128' }}" 
                    class="w-20 h-20 rounded-full border border-slate-200 object-cover"
                >
                <label class="absolute bottom-0 right-0 w-8 h-8 rounded-full bg-white border border-slate-200 flex items-center justify-center shadow hover:bg-slate-50 cursor-pointer" title="Ganti foto">
                    <i class="fas fa-camera text-[#a81d5d] text-sm"></i>
                    <input type="file" name="photo" class="hidden" accept="image/*">
                </label>
            </div>
            <div>
                <p class="text-lg font-semibold text-slate-900">
                    {{ $admin->username ?? 'Admin' }}
                </p>
            </div>
        </div>
        <!-- Profile Form -->
        <div class="p-6 space-y-6">
            <!-- Basic Info -->
            <div>
                <p class="text-sm font-semibold text-slate-700 mb-4">
                    Informasi Akun
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-semibold text-slate-500">Username</label>
                        <input 
                            type="text" 
                            name="username"
                            value="{{ $admin->username ?? '' }}"
                            class="mt-1 w-full px-4 py-2 rounded-lg border border-slate-200 bg-slate-50 text-slate-700"
                        >
                    </div>
                </div>
            </div>
            <!-- Security -->
            <div>
                <p class="text-sm font-semibold text-slate-700 mb-4">
                    Ganti Password
                </p>
                <div class="flex flex-col md:flex-row md:items-center gap-4">
                    <input 
                        type="password" 
                        name="password"
                        placeholder="Password baru (opsional)"
                        class="w-full md:w-1/2 px-4 py-2 rounded-lg border border-slate-200 bg-slate-50 text-slate-700"
                    >
                </div>
            </div>
        </div>
        <!-- Action Bar -->
        <div class="flex justify-end gap-3 px-6 py-4 border-t border-slate-200 bg-slate-50 rounded-b-xl">
            <button 
                class="px-5 py-2 rounded-lg text-slate-600 font-semibold hover:bg-slate-200 transition"
                type="reset"
            >
                Batal
            </button>
            <button 
                class="px-5 py-2 rounded-lg bg-[#a81d5d] text-white font-semibold shadow hover:bg-[#a81d5d]/90 transition"
                type="submit"
            >
                Simpan Perubahan
            </button>
        </div>
    </div>
</form>
@endsection

