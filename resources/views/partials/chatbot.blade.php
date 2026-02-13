<!--Button CTA Chatbot -->
<div class="fixed bottom-6 right-6 flex flex-col items-end gap-3 z-[9999]">
    <!-- Scroll to Top Button (Smaller, Top) -->
    <button id="back-to-top" 
            class="w-11 h-11 bg-white text-primary rounded-full shadow-lg hover:shadow-xl hover:bg-accent hover:text-white transition-all duration-300 opacity-0 invisible transform hover:scale-110 flex items-center justify-center border border-neutral-200"
            aria-label="Kembali ke atas">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

    <!-- Chatbot Button (Larger, Main CTA, Bottom) -->
    <button id="chatbot-trigger" 
            class="w-11 h-11 bg-primary text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 flex items-center justify-center relative group"
            aria-label="Hubungi kami"
            style="pointer-events: auto;">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <!-- Tooltip -->
        <div class="absolute right-16 bg-neutral-800 text-white text-[10px] px-3 py-1.5 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
            Hubungi Kami
        </div>
    </button>
</div>

<!-- Chatbot Modal -->
<div id="chatbot-modal" class="fixed inset-0 bg-black/40 z-50 opacity-0 pointer-events-none flex items-center justify-center p-2 sm:p-4 transition-opacity duration-300">
    <div id="chatbot-window" class="bg-white rounded-2xl shadow-2xl w-full max-w-sm sm:max-w-md h-[70vh] sm:h-[600px] max-h-[550px] sm:max-h-[700px] flex flex-col overflow-hidden" style="position: absolute;">
        <!-- Header (Draggable) - Compact with drag indicator -->
        <div id="chatbot-header" class="bg-gradient-to-r from-primary to-primary/90 px-2.5 sm:px-4 py-1.5 sm:py-2.5 flex items-center justify-between cursor-move select-none group">
            <div class="flex items-center gap-1.5 sm:gap-2 flex-1 min-w-0">
                <img src="/assets/logo.png" alt="Logo" class="w-5 h-5 sm:w-6 sm:h-6 object-contain rounded-full bg-white p-0.5 flex-shrink-0" />
                <div class="min-w-0 flex-1">
                    <h3 class="font-semibold text-xs sm:text-sm text-white truncate">Paragon Assistant</h3>
                    <p class="text-[10px] sm:text-xs text-white/70 flex items-center gap-1">
                        <svg class="w-3 h-3 opacity-60 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4"/>
                        </svg>
                        <span>Geser untuk memindahkan</span>
                    </p>
                </div>
            </div>
            <button id="chatbot-close" class="text-white/90 hover:text-white hover:bg-white/10 transition-all p-1.5 rounded-lg flex-shrink-0 ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Chat Messages -->
        <div id="chatbot-messages" class="flex-1 overflow-y-auto p-2.5 sm:p-4 space-y-2 sm:space-y-3 bg-gradient-to-b from-neutral-50 to-white">
            <!-- Welcome Message -->
            <div class="flex items-start gap-1.5 sm:gap-2">
                <!-- Robot Avatar SVG -->
                <div class="w-6 h-6 sm:w-8 sm:h-8 flex-shrink-0">
                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16" cy="16" r="16" fill="#E8EAF6"/>
                        <path d="M16 4C16.5523 4 17 4.44772 17 5V7H15V5C15 4.44772 15.4477 4 16 4Z" fill="#5C6BC0"/>
                        <rect x="10" y="10" width="12" height="10" rx="2" fill="#5C6BC0"/>
                        <circle cx="13" cy="14" r="1.5" fill="white"/>
                        <circle cx="19" cy="14" r="1.5" fill="white"/>
                        <path d="M13 17H19" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                        <rect x="8" y="21" width="3" height="5" rx="1" fill="#7986CB"/>
                        <rect x="21" y="21" width="3" height="5" rx="1" fill="#7986CB"/>
                    </svg>
                </div>
                <div class="bg-white rounded-2xl rounded-tl-none px-2.5 sm:px-4 py-2 sm:py-2.5 shadow-sm max-w-[85%] border border-neutral-100">
                    <p class="text-xs sm:text-sm text-gray-800 leading-relaxed">
                        Hai! Ada yang bisa dibantu?
                    </p>
                    <p class="text-[10px] sm:text-xs text-gray-600 mt-1 sm:mt-1.5 leading-relaxed">
                        Pilih menu atau langsung chat aja
                    </p>
                </div>
            </div>

            <!-- Quick Action Buttons -->
            <div class="grid grid-cols-1 gap-1.5 sm:gap-2.5 mt-2 sm:mt-3" id="chatbot-quick-actions">
                <!-- Quick actions will be dynamically inserted here -->
            </div>
        </div>

        <!-- Input Area -->
        <div class="bg-white border-t border-neutral-200 p-2 sm:p-3 flex items-center gap-1.5 sm:gap-2">
            <form id="chatbot-form" class="flex-1 flex gap-1.5 sm:gap-2">
                <input type="text" 
                       id="chatbot-input" 
                       placeholder="Tulis pesan..." 
                       class="flex-1 px-2.5 sm:px-4 py-2 sm:py-2.5 bg-neutral-50 border border-neutral-200 rounded-full focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary text-xs sm:text-sm transition-all"
                       autocomplete="off" />
                <button type="submit" 
                        class="bg-accent hover:bg-accent/90 text-white rounded-full w-8 h-8 sm:w-10 sm:h-10 transition-all hover:scale-105 active:scale-95 flex items-center justify-center flex-shrink-0 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // function chatbot
    (function() {
        const chatbotTrigger = document.getElementById('chatbot-trigger');
        const chatbotModal = document.getElementById('chatbot-modal');
        const chatbotClose = document.getElementById('chatbot-close');
        const chatbotMessages = document.getElementById('chatbot-messages');
        const chatbotInput = document.getElementById('chatbot-input');
        const chatbotForm = document.getElementById('chatbot-form');
        const quickActionsContainer = document.getElementById('chatbot-quick-actions');

        // function untuk kembali ke atas
        const backToTopBtn = document.getElementById('back-to-top');

        // Data FAQ/intents dari backend
        let chatbotFaqs = [];

        // Fetch FAQ/intents dari backend
        fetch('/api/chatbot/intents')
            .then(res => res.json())
            .then(data => {
                chatbotFaqs = data;
            });

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.remove('opacity-0', 'invisible');
                backToTopBtn.classList.add('opacity-100', 'visible');
            } else {
                backToTopBtn.classList.add('opacity-0', 'invisible');
                backToTopBtn.classList.remove('opacity-100', 'visible');
            }
        });

        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Konfigurasi quick actions untuk berbagai halaman
        const quickActionsConfig = {
            home: [
                { label: 'Produk Kami', action: 'produk', icon: 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4' },
                { label: 'Tentang Perusahaan', action: 'tentang', icon: 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4' },
                { label: 'Lokasi & Kontak', action: 'lokasi', icon: 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z' },
                { label: 'Hubungi Sales', action: 'kontak', icon: 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z' }
            ],
            products: [
                { label: 'Kategori Produk', action: 'kategori', icon: 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z' },
                { label: 'Rekomendasi Produk', action: 'rekomendasi', icon: 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z' },
                { label: 'Cek Stok Produk', action: 'stok', icon: 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4' },
                { label: 'Hubungi Sales', action: 'kontak', icon: 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z' }
            ],
            productDetail: [
                { label: 'Detail Spesifikasi', action: 'spesifikasi', icon: 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z' },
                { label: 'Cara Pemesanan', action: 'cara-pesan', icon: 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z' },
                { label: 'Info Pengiriman', action: 'pengiriman', icon: 'M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0' },
                { label: 'Hubungi Sales', action: 'kontak', icon: 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z' }
            ]
        };

        // Template respon chatbot
        const responses = {
            produk: {
                text: 'Ada obat-obatan, alat kesehatan, sama suplemen. Mau lihat katalognya?',
                action: 'link',
                link: '/produk'
            },
            kontak: {
                text: 'Ini kontak kami:\n\n📞 (0281) 777 5781\n📧 paragonmedikapharma2019@gmail.com\n📍 Jl. Arsadimeja, Karangnanas, Sokaraja, Kab. Banyumas, Jawa Tengah 53181',
                action: 'text'
            },
            tentang: {
                text: 'Kami distributor farmasi yang sudah berpengalaman. Kalau mau tau lebih detail tentang perusahaan, bisa cek halaman ini',
                action: 'link',
                link: '/visi-misi'
            },
            lokasi: {
                text: 'Kantor kami:\n\n📍 Jl. Arsadimeja, Karangnanas,\nSokaraja, Kab. Banyumas,\nJawa Tengah 53181\n\nLihat peta?',
                action: 'link',
                link: '/#contact-section'
            },
            kategori: {
                text: '3 kategori produk:\n\n• Obat\n• Alat Kesehatan\n• Suplemen\n\nBisa filter langsung di halaman produk',
                action: 'text'
            },
            rekomendasi: {
                text: 'Produk unggulan ada di bawah. Scroll aja. Mau tanya detail? Hubungi sales ya',
                action: 'text'
            },
            stok: {
                text: 'Info stok bisa hubungi:\n\n📞 (0281) 777 5781\n📧 paragonmedikapharma2019@gmail.com',
                action: 'text'
            },
            spesifikasi: {
                text: 'Detail spesifikasi ada di bawah. Scroll aja',
                action: 'text'
            },
            'cara-pesan': {
                text: 'Cara pesan:\n\n1. Hubungi sales\n2. Kasih tau produk & jumlah\n3. Konfirmasi pembayaran\n4. Barang dikirim\n\n📞 (0281) 777 5781\n📧 paragonmedikapharma2019@gmail.com',
                action: 'text'
            },
            pengiriman: {
                text: 'Kirim ke seluruh Indonesia. Estimasi 1-7 hari kerja tergantung lokasi. Info detail biaya? Hubungi kami',
                action: 'text'
            }
        };

        // Deteksi konteks halaman
        function getPageContext() {
            const path = window.location.pathname;
            if (path.includes('/produk') && path.includes('/detail')) {
                return 'productDetail';
            } else if (path.includes('/produk')) {
                return 'products';
            } else {
                return 'home';
            }
        }

        // Render || Menampilkan button quick actions berdasarkan konteks halaman
        function renderQuickActions() {
            const context = getPageContext();
            const actions = quickActionsConfig[context] || quickActionsConfig.home;
            
            let buttonsHTML = '';
            actions.forEach(item => {
                buttonsHTML += `
                    <button class="chatbot-quick-action group bg-white hover:bg-primary hover:border-primary transition-all duration-300 rounded-xl px-2 sm:px-3 py-1.5 sm:py-2 text-left shadow-sm hover:shadow-md border-2 border-neutral-200 flex items-center gap-1.5 sm:gap-2" data-action="${item.action}">
                        <div class="w-6 h-6 sm:w-7 sm:h-7 flex-shrink-0 bg-primary/10 group-hover:bg-white rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-primary group-hover:text-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="${item.icon}"/>
                            </svg>
                        </div>
                        <span class="text-xs sm:text-sm font-medium text-gray-800 group-hover:text-white transition-colors">${item.label}</span>
                    </button>
                `;
            });
            
            quickActionsContainer.innerHTML = buttonsHTML;
            
            // Re-attach event listeners to new buttons
            document.querySelectorAll('.chatbot-quick-action').forEach(button => {
                button.addEventListener('click', function() {
                    const action = this.getAttribute('data-action');
                    const buttonText = this.textContent.trim();
                    
                    addUserMessage(buttonText);
                    
                    setTimeout(() => {
                        const response = responses[action];
                        if (response) {
                            addBotMessage(response.text, response.action, response.link);
                        }
                    }, 400);
                });
            });
        }

        // Drag functionality for chatbot window
        const chatbotWindow = document.getElementById('chatbot-window');
        const chatbotHeader = document.getElementById('chatbot-header');
        let isDragging = false;
        let currentX;
        let currentY;
        let initialX;
        let initialY;
        let xOffset = 0;
        let yOffset = 0;

        chatbotHeader.addEventListener('mousedown', dragStart);
        document.addEventListener('mousemove', drag);
        document.addEventListener('mouseup', dragEnd);

        // Touch events for mobile
        chatbotHeader.addEventListener('touchstart', dragStart);
        document.addEventListener('touchmove', drag);
        document.addEventListener('touchend', dragEnd);

        function dragStart(e) {
            if (e.type === 'touchstart') {
                initialX = e.touches[0].clientX - xOffset;
                initialY = e.touches[0].clientY - yOffset;
            } else {
                initialX = e.clientX - xOffset;
                initialY = e.clientY - yOffset;
            }

            if (e.target === chatbotHeader || chatbotHeader.contains(e.target)) {
                if (e.target !== chatbotClose && !chatbotClose.contains(e.target)) {
                    isDragging = true;
                }
            }
        }

        function drag(e) {
            if (isDragging) {
                e.preventDefault();
                
                if (e.type === 'touchmove') {
                    currentX = e.touches[0].clientX - initialX;
                    currentY = e.touches[0].clientY - initialY;
                } else {
                    currentX = e.clientX - initialX;
                    currentY = e.clientY - initialY;
                }

                xOffset = currentX;
                yOffset = currentY;

                setTranslate(currentX, currentY, chatbotWindow);
            }
        }

        function dragEnd(e) {
            initialX = currentX;
            initialY = currentY;
            isDragging = false;
        }

        function setTranslate(xPos, yPos, el) {
            el.style.transform = `translate(${xPos}px, ${yPos}px)`;
        }

        // buka chatbot
        chatbotTrigger.addEventListener('click', function() {
            renderQuickActions(); // Menampilkan button berdasarkan konteks halaman
            chatbotModal.classList.remove('opacity-0', 'pointer-events-none');
            chatbotModal.classList.add('opacity-100');
            document.body.style.overflow = 'hidden';
            
            // Reset posisi chatbot saat dibuka
            xOffset = 0;
            yOffset = 0;
            chatbotWindow.style.transform = 'translate(0px, 0px)';
            
            chatbotInput.focus();
        });

        // tutup chatbot
        function closeChatbot() {
            chatbotModal.classList.add('opacity-0', 'pointer-events-none');
            chatbotModal.classList.remove('opacity-100');
            document.body.style.overflow = '';
        }

        chatbotClose.addEventListener('click', closeChatbot);
        chatbotModal.addEventListener('click', function(e) {
            if (e.target === chatbotModal) {
                closeChatbot();
            }
        });

        // Tutup dengan tombol Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !chatbotModal.classList.contains('opacity-0')) {
                closeChatbot();
            }
        });

        // Tambah user message (Chat bubble style)
        function addUserMessage(text) {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'flex justify-end';
            messageDiv.innerHTML = `
                <div class="bg-accent text-white rounded-lg rounded-tr-none px-3 py-2 shadow-sm max-w-[80%]">
                    <p class="text-sm leading-relaxed">${text}</p>
                    <span class="text-[10px] text-white/70 mt-1 block text-right">${getCurrentTime()}</span>
                </div>
            `;
            chatbotMessages.appendChild(messageDiv);
            scrollToBottom();
        }

        // Tambah bot message (Chat bubble style with optional action)
        function addBotMessage(text, actionType = 'text', link = '') {
            const messageDiv = document.createElement('div');
            messageDiv.className = 'flex items-start gap-2';
            
            let actionButton = '';
            if (actionType === 'link' && link) {
                actionButton = `<a href="${link}" class="inline-flex items-center gap-1 mt-2 text-primary hover:text-accent font-medium text-xs transition-colors">
                    Lihat Selengkapnya →
                </a>`;
            }
            
            messageDiv.innerHTML = `
                <div class="w-8 h-8 flex-shrink-0">
                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="16" cy="16" r="16" fill="#E8EAF6"/>
                        <path d="M16 4C16.5523 4 17 4.44772 17 5V7H15V5C15 4.44772 15.4477 4 16 4Z" fill="#5C6BC0"/>
                        <rect x="10" y="10" width="12" height="10" rx="2" fill="#5C6BC0"/>
                        <circle cx="13" cy="14" r="1.5" fill="white"/>
                        <circle cx="19" cy="14" r="1.5" fill="white"/>
                        <path d="M13 17H19" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                        <rect x="8" y="21" width="3" height="5" rx="1" fill="#7986CB"/>
                        <rect x="21" y="21" width="3" height="5" rx="1" fill="#7986CB"/>
                    </svg>
                </div>
                <div class="bg-white rounded-lg rounded-tl-none px-3 py-2 shadow-sm max-w-[80%]">
                    <p class="text-sm text-gray-800 leading-relaxed whitespace-pre-line">${text}</p>
                    ${actionButton}
                    <span class="text-[10px] text-gray-500 mt-1 block">${getCurrentTime()}</span>
                </div>
            `;
            chatbotMessages.appendChild(messageDiv);
            scrollToBottom();
        }

        // Ambil waktu saat ini
        function getCurrentTime() {
            const now = new Date();
            return now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
        }

        // Scroll ke bawah
        function scrollToBottom() {
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        }

        // Damerau-Levenshtein Distance untuk fuzzy matching
        function damerauLevenshteinDistance(source, target) {
            if (!source) return target ? target.length : 0;
            if (!target) return source.length;

            const sourceLength = source.length;
            const targetLength = target.length;
            const maxDistance = sourceLength + targetLength;
            const H = {};
            H[-1] = [-1];

            for (let i = 0; i <= sourceLength; i++) {
                H[i] = [];
                H[i][-1] = maxDistance;
                H[i][0] = i;
            }

            for (let j = 0; j <= targetLength; j++) {
                H[0][j] = j;
            }

            for (let i = 1; i <= sourceLength; i++) {
                let DB = 0;
                for (let j = 1; j <= targetLength; j++) {
                    const k = H[source[i - 1]] ? H[source[i - 1]][0] || 0 : 0;
                    const l = DB;
                    const cost = source[i - 1] === target[j - 1] ? 0 : 1;
                    
                    if (source[i - 1] === target[j - 1]) DB = j;

                    H[i][j] = Math.min(
                        // Hapus
                        H[i - 1][j] + 1,
                        // Tambah
                        H[i][j - 1] + 1,
                        // Ganti
                        H[i - 1][j - 1] + cost, 
                        (k > 0 && l > 0) ? H[k - 1][l - 1] + (i - k - 1) + 1 + (j - l - 1) : maxDistance // Menukar posisi 2 huruf yang berdekatan
                    );
                }
                H[source[i - 1]] = H[source[i - 1]] || [];
                H[source[i - 1]][0] = i;
            }

            return H[sourceLength][targetLength];
        }

        // Fungsi untuk mencari keyword terdekat dengan threshold
        function findClosestKeyword(input, keywords, threshold = 2) {
            const inputLower = input.toLowerCase();
            let closestMatch = null;
            let minDistance = Infinity;

            keywords.forEach(keyword => {
                const keywordLower = keyword.toLowerCase();
                const distance = damerauLevenshteinDistance(inputLower, keywordLower);
                
                if (distance < minDistance && distance <= threshold) {
                    minDistance = distance;
                    closestMatch = keyword;
                }
            });

            return closestMatch;
        }

        // Database keywords untuk setiap kategori
        const keywordDatabase = {
            produk: ['produk', 'obat', 'alat', 'suplemen', 'barang', 'jual', 'beli', 'katalog', 'item', 'medicine'],
            kontak: ['kontak', 'hubungi', 'telepon', 'telp', 'call', 'phone', 'email', 'whatsapp', 'wa', 'cs'],
            tentang: ['tentang', 'profil', 'visi', 'misi', 'sejarah', 'company', 'perusahaan', 'about'],
            lokasi: ['lokasi', 'alamat', 'dimana', 'dmana', 'tempat', 'kantor', 'office', 'maps', 'peta', 'address'],
            jam: ['jam', 'buka', 'tutup', 'operasional', 'open', 'close', 'hours', 'kapan'],
            harga: ['harga', 'biaya', 'price', 'cost', 'pesan', 'order', 'beli', 'buy'],
            sapaan: ['hai', 'halo', 'hello', 'hi', 'hey', 'pagi', 'siang', 'sore', 'malam'],
            terimakasih: ['terima kasih', 'thanks', 'thank you', 'makasih', 'terimakasih']
        };

        // Fungsi untuk mencocokkan pesan dengan kategori (dengan fuzzy matching)
        function matchMessageToCategory(message) {
            const words = message.toLowerCase().split(/\s+/);
            
            for (const [category, keywords] of Object.entries(keywordDatabase)) {
                for (const word of words) {
                    // Exact match pertama
                    if (keywords.some(kw => word.includes(kw) || kw.includes(word))) {
                        return category;
                    }
                    
                    // Fuzzy match jika tidak ada exact match
                    const closestMatch = findClosestKeyword(word, keywords, 2);
                    if (closestMatch) {
                        return category;
                    }
                }
            }
            
            return null;
        }

        // Tangani pengiriman form
        // Session ID untuk tracking percakapan
        let chatbotSessionId = localStorage.getItem('chatbot_session_id');
        if (!chatbotSessionId) {
            chatbotSessionId = 'sess-' + Math.random().toString(36).substr(2, 12) + '-' + Date.now();
            localStorage.setItem('chatbot_session_id', chatbotSessionId);
        }

        // Kirim pesan ke backend
        function sendMessageToBackend(sender, message, intentId = null) {
            fetch('/api/chatbot/message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content || ''
                },
                body: JSON.stringify({
                    session_id: chatbotSessionId,
                    sender: sender,
                    message: message,
                    intent_id: intentId
                })
            });
        }

        chatbotForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const message = chatbotInput.value.trim();
            if (message) {
                addUserMessage(message);
                sendMessageToBackend('user', message, null);
                chatbotInput.value = '';
                setTimeout(() => {
                    let responded = false;
                    let matchedIntent = null;
                    // SHALLOW PARSING: regex pattern matching (hanya untuk pencocokan intent CRUD admin)
                    const shallowPatterns = [
                        // Contoh pola, admin bisa tambah keyword di CRUD FAQ
                        { pattern: /bagaimana( cara)? (order|beli|pesan|membeli)/i, intentKeyword: 'order' },
                        { pattern: /dimana( lokasi)?|alamat|letak/i, intentKeyword: 'lokasi' },
                        { pattern: /hubungi|kontak|nomor( telepon)?/i, intentKeyword: 'kontak' },
                        { pattern: /tentang( perusahaan)?|profil|siapa/i, intentKeyword: 'tentang' },
                        { pattern: /harga|biaya|ongkir/i, intentKeyword: 'harga' },
                        { pattern: /produk|barang|katalog/i, intentKeyword: 'produk' },
                        { pattern: /stok|tersedia|ketersediaan/i, intentKeyword: 'stok' },
                        { pattern: /spesifikasi|detail|fitur/i, intentKeyword: 'spesifikasi' },
                        { pattern: /pengiriman|kirim|delivery/i, intentKeyword: 'pengiriman' },
                    ];
                    // Cek pattern regex dulu
                    for (const pat of shallowPatterns) {
                        if (pat.pattern.test(message)) {
                            matchedIntent = chatbotFaqs.find(intent =>
                                intent.keywords && intent.keywords.some(kw => kw.keyword && kw.keyword.toLowerCase().includes(pat.intentKeyword))
                            );
                            if (matchedIntent) break;
                        }
                    }
                    // Jika tidak ketemu, fallback ke keyword matching biasa
                    if (!matchedIntent) {
                        const msgNoSpace = message.toLowerCase().replace(/\s+/g, '');
                        for (const intent of chatbotFaqs) {
                            if (!intent.keywords || !Array.isArray(intent.keywords)) continue;
                            for (const kw of intent.keywords) {
                                if (kw.keyword) {
                                    // Normal match
                                    if (message.toLowerCase().includes(kw.keyword.toLowerCase())) {
                                        matchedIntent = intent;
                                        break;
                                    }
                                    // Match tanpa spasi
                                    const kwNoSpace = kw.keyword.toLowerCase().replace(/\s+/g, '');
                                    if (msgNoSpace.includes(kwNoSpace) || kwNoSpace.includes(msgNoSpace)) {
                                        matchedIntent = intent;
                                        break;
                                    }
                                }
                            }
                            if (matchedIntent) break;
                        }
                    }
                    if (matchedIntent) {
                        if (matchedIntent.response_type === 'text') {
                            addBotMessage(matchedIntent.response_text, 'text');
                            sendMessageToBackend('bot', matchedIntent.response_text, matchedIntent.id);
                        } else if (matchedIntent.response_type === 'link') {
                            const html = `<a href="${matchedIntent.response_url}" class="text-primary underline" target="_blank">${matchedIntent.response_url}</a>`;
                            addBotMessage(html, 'html');
                            sendMessageToBackend('bot', matchedIntent.response_url, matchedIntent.id);
                        } else if (matchedIntent.response_type === 'json') {
                            const html = `<pre class='bg-slate-100 rounded p-2 text-xs'>${matchedIntent.response_json}</pre>`;
                            addBotMessage(html, 'html');
                            sendMessageToBackend('bot', matchedIntent.response_json, matchedIntent.id);
                        }
                        responded = true;
                    }
                    // Fallback default (tetap ada)
                    if (!responded) {
                        const fallback = 'Maaf, saya belum bisa menjawab pertanyaan itu. Silakan pilih menu di atas atau hubungi CS kami.';
                        addBotMessage(fallback, 'text');
                        sendMessageToBackend('bot', fallback, null);
                    }
                }, 400);
            }
        });
    })();
</script>
