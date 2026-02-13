@extends('admin.layouts.cms')

@section('title', 'Editor Visi Misi')

@section('content')
    <div class="max-w-4xl mx-auto mt-8">
        <div class="bg-white rounded shadow p-6">
            <div class="mb-6">
                <div class="flex border-b mb-6 gap-2">
                    <button id="tab-btn-intro" class="tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative" onclick="showTab('intro')">
                        Intro
                        <span class="tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300"></span>
                    </button>
                    <button id="tab-btn-visi" class="tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative" onclick="showTab('visi')">
                        Visi
                        <span class="tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300"></span>
                    </button>
                    <button id="tab-btn-misi" class="tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative" onclick="showTab('misi')">
                        Misi
                        <span class="tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300"></span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.vision-mission.update') }}">
                    @csrf
                    <input type="hidden" name="active_tab" id="active_tab" value="{{ session('active_tab', 'intro') }}">
                    <div id="tab-intro" class="tab-content hidden" style="background:transparent!important">
                        <label class="block font-semibold mb-2">Intro</label>
                        <input type="text" name="intro" value="{{ old('intro', $visionMission->intro ?? '') }}" class="w-full border rounded px-3 py-2" />
                        @if(session('success') && session('active_tab', 'intro') === 'intro')
                            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
                        @endif
                    </div>
                    <div id="tab-visi" class="tab-content hidden" style="background:transparent!important">
                        <label class="block font-semibold mb-2">Visi</label>
                        <textarea name="visi" class="w-full border rounded px-3 py-2" rows="2">{{ old('visi', $visionMission->visi ?? '') }}</textarea>
                        @if(session('success') && session('active_tab') === 'visi')
                            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
                        @endif
                    </div>
                    <div id="tab-misi" class="tab-content hidden" style="background:transparent!important">
                        <label class="block font-semibold mb-2">Misi</label>
                        <textarea name="misi" class="w-full border rounded px-3 py-2" rows="2">{{ old('misi', $visionMission->misi ?? '') }}</textarea>
                        @if(session('success') && session('active_tab') === 'misi')
                            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="bg-[#a81d5d] text-white px-6 py-2 rounded-lg font-semibold mt-4 shadow hover:bg-[#8c1a52] transition">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        let currentTab = 'intro';
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
                showTab('intro');
            @endif
        });
    </script>
@endsection
