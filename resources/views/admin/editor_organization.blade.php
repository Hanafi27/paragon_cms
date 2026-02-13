@extends('admin.layouts.cms')

@section('title', 'Editor Struktur Organisasi')

@section('content')
    <div class="max-w-4xl mx-auto mt-8">
        <div class="bg-white rounded shadow p-6">
            <div class="mb-6">
                <div class="flex border-b mb-6 gap-2">
                    
                    <button id="tab-btn-bagan" class="tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative" onclick="showTab('bagan')">
                        Bagan
                        <span class="tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300"></span>
                    </button>
                    <button id="tab-btn-founder" class="tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative" onclick="showTab('founder')">
                        Founder & Co-Founder
                        <span class="tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300"></span>
                    </button>
                    <button id="tab-btn-tim" class="tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative" onclick="showTab('tim')">
                        Tim
                        <span class="tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300"></span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.organization.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="active_tab" id="active_tab" value="bagan">
                    <div id="tab-bagan" class="tab-content hidden" style="background:transparent!important">
                        <label class="block font-semibold mb-2">Bagan Organisasi (Gambar)</label>
                        <input type="file" name="org_chart" class="w-full border rounded px-3 py-2" />
                        @if(!empty($organization->org_chart))
                            <img src="{{ $organization->org_chart }}" alt="Bagan Organisasi" class="w-40 mt-2 rounded shadow" />
                        @endif
                    </div>
                    <div id="tab-founder" class="tab-content hidden" style="background:transparent!important">
                        <div class="mb-6">
                            <label class="block font-semibold mb-2">Foto Founder</label>
                            <input type="file" name="founder_img" class="w-full border rounded px-3 py-2 mb-2" />
                            @if(!empty($organization->founder_img))
                                <img src="{{ $organization->founder_img }}" alt="Foto Founder" class="w-32 mt-2 rounded shadow" />
                            @endif
                            <label class="block font-semibold mb-2">Nama Founder</label>
                            <input type="text" name="founder_name" value="{{ $organization->founder_name ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" />
                            <label class="block font-semibold mb-2">Jabatan Founder</label>
                            <input type="text" name="founder_role" value="{{ $organization->founder_role ?? '' }}" class="w-full border rounded px-3 py-2" />
                        </div>
                        <div>
                            <label class="block font-semibold mb-2">Foto Co-Founder</label>
                            <input type="file" name="co_founder_img" class="w-full border rounded px-3 py-2 mb-2" />
                            @if(!empty($organization->co_founder_img))
                                <img src="{{ $organization->co_founder_img }}" alt="Foto Co-Founder" class="w-32 mt-2 rounded shadow" />
                            @endif
                            <label class="block font-semibold mb-2">Nama Co-Founder</label>
                            <input type="text" name="co_founder_name" value="{{ $organization->co_founder_name ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" />
                            <label class="block font-semibold mb-2">Jabatan Co-Founder</label>
                            <input type="text" name="co_founder_role" value="{{ $organization->co_founder_role ?? '' }}" class="w-full border rounded px-3 py-2" />
                        </div>
                    </div>
                    <div id="tab-tim" class="tab-content hidden" style="background:transparent!important">
                        <label class="block font-semibold mb-2">Foto Tim</label>
                        <input type="file" name="team_img" class="w-full border rounded px-3 py-2 mb-4" />
                        @if(!empty($organization->team_img))
                            <img src="{{ $organization->team_img }}" alt="Foto Tim" class="w-40 mt-2 rounded shadow" />
                        @endif
                    </div>
                    <button type="submit" class="bg-[#a81d5d] text-white px-6 py-2 rounded-lg font-semibold mt-4 shadow hover:bg-[#8c1a52] transition">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
<script>
    let currentTab = 'bagan';
    function showTab(tab) {
        currentTab = tab;
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.getElementById('tab-' + tab).classList.remove('hidden');
        document.querySelectorAll('.tab').forEach(el => {
            el.className = 'tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative text-[#a81d5d]';
            const underline = el.querySelector('.tab-underline');
            if (underline) underline.className = 'tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300';
        });
        const activeBtn = document.getElementById('tab-btn-' + tab);
        activeBtn.className = 'tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative text-[#a81d5d]';
        const activeUnderline = activeBtn.querySelector('.tab-underline');
        if (activeUnderline) activeUnderline.className = 'tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-full h-[3px] bg-[#a81d5d] rounded transition-all duration-300';
    }
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('active_tab').value = currentTab;
        });
        // Default tab dari session jika ada
        @if(session('active_tab'))
            showTab('{{ session('active_tab') }}');
        @else
            showTab('bagan');
        @endif
    });
</script>
@endsection
