@extends('admin.layouts.cms')

@section('title', 'Editor Beranda')

@section('content')
<div class="max-w-4xl mx-auto mt-8">
    <div class="bg-white rounded shadow p-6">
        <div class="mb-6">
            <div class="flex border-b mb-6 gap-2">
                <button id="tab-btn-hero" class="tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative" onclick="showTab('hero')">
                    Hero
                    <span class="tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300"></span>
                </button>
                <button id="tab-btn-about" class="tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative" onclick="showTab('about')">
                    Tentang Kami
                    <span class="tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300"></span>
                </button>
                <button id="tab-btn-reviews" class="tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative" onclick="showTab('reviews')">
                    Ulasan
                    <span class="tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300"></span>
                </button>
                <button id="tab-btn-mitra" class="tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative" onclick="showTab('mitra')">
                    Mitra
                    <span class="tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300"></span>
                </button>
                <button id="tab-btn-contact" class="tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative" onclick="showTab('contact')">
                    Kontak
                    <span class="tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300"></span>
                </button>
            </div>

            <form method="POST" action="{{ route('admin.homepage.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="active_tab" id="active_tab" value="{{ session('active_tab', 'hero') }}">
                <div id="tab-hero" class="tab-content hidden" style="background:transparent!important">
                    <label class="block font-semibold mb-2">Judul Hero</label>
                    <input type="text" name="hero_title" value="{{ $contents['hero_title'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-4" />
                    <label class="block font-semibold mb-2">Subjudul Hero</label>
                    <input type="text" name="hero_subtitle" value="{{ $contents['hero_subtitle'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-4" />
                    <label class="block font-semibold mb-2 mt-4">List Kanan Hero (max 3)</label>
                    <input type="text" name="hero_list_1" value="{{ $contents['hero_list_1'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" placeholder="List 1" />
                    <input type="text" name="hero_list_2" value="{{ $contents['hero_list_2'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" placeholder="List 2" />
                    <input type="text" name="hero_list_3" value="{{ $contents['hero_list_3'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" placeholder="List 3" />
                </div>
                
                <div id="tab-about" class="tab-content hidden" style="background:transparent!important">
                    <label class="block font-semibold mb-2">Judul Tentang Kami</label>
                    <input type="text" name="about_title" value="{{ $contents['about_title'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-4" />
                    <label class="block font-semibold mb-2">Deskripsi Tentang Kami</label>
                    <textarea name="about_desc" class="w-full border rounded px-3 py-2 mb-4" rows="4">{{ $contents['about_desc'] ?? '' }}</textarea>
                    <label class="block font-semibold mb-2">Komitmen Kami</label>
                    <textarea name="about_commitment" class="w-full border rounded px-3 py-2 mb-4" rows="4">{{ $contents['about_commitment'] ?? '' }}</textarea>
                    <label class="block font-semibold mb-2">Gambar Tentang Kami</label>
                    <input type="file" name="about_image" class="mb-2" />
                    @if(!empty($contents['about_image']))
                        <img src="{{ $contents['about_image'] }}" alt="About Image" class="w-32 h-32 object-cover rounded mb-2" />
                    @endif
                </div>

                <div id="tab-reviews" class="tab-content hidden" style="background:transparent!important">
                    <span class="font-bold text-xl mb-2 block text-primary">Edit 5 Ulasan Klien</span>
                    <p class="text-neutral mb-6">Silakan edit isi ulasan pada card di bawah. Pilih card mana saja yang ingin diubah, lalu klik Simpan Perubahan. Maksimal 5 ulasan akan tampil di beranda.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @for($i=1;$i<=5;$i++)
                        <div class="bg-white rounded-xl shadow p-4 mb-4 flex flex-col">
                            <div class="mb-2 font-bold text-primary">Card {{ $i }}</div>
                            <label class="block font-semibold mb-1">Pesan</label>
                            <textarea name="review{{ $i }}_message" class="w-full border rounded px-3 py-2 mb-2" rows="3" placeholder="Isi ulasan...">{{ $contents['review'.$i.'_message'] ?? '' }}</textarea>
                            <div class="flex gap-2">
                                <div class="flex-1">
                                    <label class="block font-semibold mb-1">Nama</label>
                                    <input type="text" name="review{{ $i }}_name" value="{{ $contents['review'.$i.'_name'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" placeholder="Nama klien" />
                                </div>
                                <div class="flex-1">
                                    <label class="block font-semibold mb-1">Asal/Perusahaan</label>
                                    <input type="text" name="review{{ $i }}_from" value="{{ $contents['review'.$i.'_from'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" placeholder="Perusahaan" />
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <div class="flex-1">
                                    <label class="block font-semibold mb-1">Badge <span class="text-xs text-neutral">(opsional, misal: Top Client, Loyal Customer, dsb)</span></label>
                                    <input type="text" name="review{{ $i }}_badge" value="{{ $contents['review'.$i.'_badge'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" placeholder="Badge (opsional)" />
                                </div>
                                <div class="flex-1">
                                    <label class="block font-semibold mb-1">Bintang</label>
                                    <select name="review{{ $i }}_stars" class="w-full border rounded px-3 py-2 mb-2">
                                        @for($star=5;$star>=1;$star--)
                                            <option value="{{ $star }}" @if(($contents['review'.$i.'_stars'] ?? 5)==$star) selected @endif>{{ $star }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                    <!-- Button submit di tab ulasan dihapus, cukup satu button submit global di bawah -->
                </div>
                <div id="tab-mitra" class="tab-content hidden" style="background:transparent!important">
                    <span class="font-bold text-xl mb-2 block text-primary">Edit Section Mitra</span>
                    <label class="block font-semibold mb-2">Judul Mitra</label>
                    <input type="text" name="mitra_title" value="{{ $contents['mitra_title'] ?? 'Mitra Kami' }}" class="w-full border rounded px-3 py-2 mb-4" />
                    <label class="block font-semibold mb-2">Deskripsi Mitra</label>
                    <textarea name="mitra_desc" class="w-full border rounded px-3 py-2 mb-4" rows="3">{{ $contents['mitra_desc'] ?? 'Didukung lebih dari seribu mitra outlet dan kerjasama korporat yang tersebar di seluruh Indonesia.' }}</textarea>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block font-semibold mb-1">Total Mitra</label>
                            <input type="number" name="mitra_total" value="{{ $contents['mitra_total'] ?? 1945 }}" class="w-full border rounded px-3 py-2 mb-2" />
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Total Outlet</label>
                            <input type="number" name="mitra_outlet" value="{{ $contents['mitra_outlet'] ?? 973 }}" class="w-full border rounded px-3 py-2 mb-2" />
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Total Kerjasama</label>
                            <input type="number" name="mitra_collab" value="{{ $contents['mitra_collab'] ?? 972 }}" class="w-full border rounded px-3 py-2 mb-2" />
                        </div>
                    </div>
                    <label class="block font-semibold mb-2">Highlight Mitra</label>
                    <input type="text" name="mitra_highlight_1" value="{{ $contents['mitra_highlight_1'] ?? 'Seleksi mitra dengan standar mutu distribusi' }}" class="w-full border rounded px-3 py-2 mb-2" />
                    <input type="text" name="mitra_highlight_2" value="{{ $contents['mitra_highlight_2'] ?? 'Jangkauan nasional untuk kebutuhan farmasi' }}" class="w-full border rounded px-3 py-2 mb-2" />
                    <input type="text" name="mitra_highlight_3" value="{{ $contents['mitra_highlight_3'] ?? 'Dukungan logistik dan kepatuhan regulasi' }}" class="w-full border rounded px-3 py-2 mb-2" />
                    <label class="block font-semibold mb-2 mt-4">Logo Mitra (max 4, upload gambar)</label>
                    <div class="grid grid-cols-2 gap-4 mb-2">
                        @for($i=1;$i<=4;$i++)
                            <div>
                                <input type="file" name="mitra_logo_{{ $i }}" class="w-full border rounded px-3 py-2 mb-2" accept="image/*" />
                                @if(!empty($contents['mitra_logo_'.$i]))
                                    <img src="{{ $contents['mitra_logo_'.$i] }}" alt="Logo Mitra {{ $i }}" class="w-24 h-24 object-contain rounded mb-2 border" />
                                @endif
                            </div>
                        @endfor
                    </div>
                    <!-- Button submit di tab mitra dihapus, cukup satu button submit global di bawah -->
                </div>
                <div id="tab-contact" class="tab-content hidden" style="background:transparent!important">
                    <span class="font-bold text-xl mb-2 block text-primary">Edit Kontak Perusahaan</span>
                    <p class="text-neutral mb-6">Silakan edit detail kontak di bawah. Semua perubahan akan langsung tampil di halaman beranda.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- WhatsApp Card -->
                        <div class="bg-white rounded-xl shadow p-4 flex flex-col">
                            <div class="mb-2 font-bold text-primary">WhatsApp</div>
                            <label class="block font-semibold mb-1">Nomor WhatsApp</label>
                            <input type="text" name="contact_whatsapp" value="{{ $contents['contact_whatsapp'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" placeholder="Contoh: 628876634529" />
                            <label class="block font-semibold mb-1">Deskripsi</label>
                            <textarea name="contact_whatsapp_desc" class="w-full border rounded px-3 py-2 mb-2" rows="2" placeholder="Deskripsi WhatsApp...">{{ $contents['contact_whatsapp_desc'] ?? '' }}</textarea>
                        </div>
                        <!-- Alamat Card -->
                        <div class="bg-white rounded-xl shadow p-4 flex flex-col">
                            <div class="mb-2 font-bold text-primary">Alamat</div>
                            <label class="block font-semibold mb-1">Alamat Lengkap</label>
                            <input type="text" name="contact_address" value="{{ $contents['contact_address'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" placeholder="Alamat perusahaan" />
                            <label class="block font-semibold mb-1">Deskripsi</label>
                            <textarea name="contact_address_desc" class="w-full border rounded px-3 py-2 mb-2" rows="2" placeholder="Deskripsi alamat...">{{ $contents['contact_address_desc'] ?? '' }}</textarea>
                            <label class="block font-semibold mb-1">Embed Map (iframe)</label>
                            <label class="block font-semibold mb-1">Link Google Maps (bisa shortlink, link biasa, atau embed)</label>
                            <input type="text" name="contact_map" id="contact_map_input" value="{{ $contents['contact_map'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" placeholder="Paste link Google Maps apapun di sini" />
                            <div class="text-xs text-gray-500 mb-2">Cukup paste link Google Maps (shortlink, link biasa, atau embed). Sistem akan otomatis mengubah ke format embed.</div>
                        </div>
                        <!-- Email Card -->
                        <div class="bg-white rounded-xl shadow p-4 flex flex-col">
                            <div class="mb-2 font-bold text-primary">Email</div>
                            <label class="block font-semibold mb-1">Email</label>
                            <input type="email" name="contact_email" value="{{ $contents['contact_email'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" placeholder="Email perusahaan" />
                        </div>
                        <!-- Jam Operasional Card -->
                        <div class="bg-white rounded-xl shadow p-4 flex flex-col">
                            <div class="mb-2 font-bold text-primary">Hari/Jam Operasional</div>
                            <label class="block font-semibold mb-1">Hari/Jam</label>
                            <input type="text" name="contact_hours" value="{{ $contents['contact_hours'] ?? '' }}" class="w-full border rounded px-3 py-2 mb-2" placeholder="Contoh: Senin - Jum'at 08.00 – 17.00 WIB" />
                        </div>
                    </div>
                    {{-- <div class="mt-6 flex justify-end">
                        <button type="submit" class="bg-[#a81d5d] text-white px-6 py-2 rounded-lg font-semibold shadow hover:bg-[#8c1a52] transition">Simpan Perubahan</button>
                    </div> --}}
                </div>
                <button type="submit" class="bg-[#a81d5d] text-white px-6 py-2 rounded-lg font-semibold mt-4 shadow hover:bg-[#8c1a52] transition">Simpan Perubahan</button>
            </form>

        </div>
    </div>
</div>

<script>
        // Otomatis konversi link Google Maps ke embed saat submit
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            if (!form) return;
            form.addEventListener('submit', function(e) {
                const mapInput = document.getElementById('contact_map_input');
                if (!mapInput) return;
                let val = mapInput.value.trim();
                if (!val) return;
                // Jika input iframe, ambil src
                const iframeMatch = val.match(/src=["']([^"']+)["']/);
                if (iframeMatch) {
                    val = iframeMatch[1];
                }
                // Jika sudah embed, biarkan
                if (val.startsWith('https://www.google.com/maps/embed?')) {
                    mapInput.value = val;
                    return;
                }
                // Jika shortlink maps.app.goo.gl, resolve via window.open (tidak bisa di server)
                if (val.startsWith('https://maps.app.goo.gl/')) {
                    alert('Link shortlink Google Maps tidak bisa otomatis diubah ke embed karena keterbatasan browser. Silakan buka link tersebut, klik "Bagikan" lalu pilih "Sematkan peta" dan copy link embed-nya.');
                    e.preventDefault();
                    return false;
                }
                // Jika link Google Maps biasa (place, dir, search)
                const placeMatch = val.match(/https:\/\/www\.google\.com\/maps\/(place|dir|search)\/([^/?]+)/);
                if (placeMatch) {
                    mapInput.value = 'https://www.google.com/maps/embed?pb=!1s' + placeMatch[2];
                    return;
                }
                // Jika bukan format di atas, biarkan (akan tampil error di homepage)
            });
        });
    let currentTab = 'hero';
    function showTab(tab) { 
        currentTab = tab;
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.getElementById('tab-' + tab).classList.remove('hidden');
        // Reset semua tab: warna teks accent, underline shrink
        document.querySelectorAll('.tab').forEach(el => {
            el.className = 'tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative text-[#a81d5d]';
            const underline = el.querySelector('.tab-underline');
            if (underline) underline.className = 'tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-0 h-[3px] bg-[#a81d5d] rounded transition-all duration-300';
        });
        // Tab aktif: warna teks accent, underline full
        const activeBtn = document.getElementById('tab-btn-' + tab);
        activeBtn.className = 'tab group px-5 py-2 font-semibold rounded-t-xl transition-all duration-300 border-none bg-transparent relative text-[#a81d5d]';
        const activeUnderline = activeBtn.querySelector('.tab-underline');
        if (activeUnderline) activeUnderline.className = 'tab-underline absolute left-1/2 -translate-x-1/2 bottom-0 w-full h-[3px] bg-[#a81d5d] rounded transition-all duration-300';
    }
    // Set hidden input saat submit
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('active_tab').value = currentTab;
        });
        // Default tab dari session jika ada
        showTab(document.getElementById('active_tab').value);
    });
</script>
@endsection
