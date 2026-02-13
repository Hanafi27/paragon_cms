/**
 * Contact Form Handler
 * Handle WhatsApp dan Email form submission
 */

(function() {
    function initContactForm() {
        const form = document.getElementById('contactForm');
        const sendWaBtn = document.getElementById('sendWhatsapp');
        const sendEmailBtn = document.getElementById('sendEmail');

        if (!form) return;

        /**
         * Send message via WhatsApp
         */
        if (sendWaBtn) {
            sendWaBtn.addEventListener('click', () => {
                const nama = form.querySelector('input[name="nama"]').value;
                const email = form.querySelector('input[name="email"]').value;
                const pesan = form.querySelector('textarea[name="pesan"]').value;

                if (!nama || !email || !pesan) {
                    alert('Semua field harus diisi');
                    return;
                }

                const message = `Nama: ${nama}\nEmail: ${email}\n\nPesan:\n${pesan}`;
                const whatsappUrl = `https://wa.me/6281234567890?text=${encodeURIComponent(message)}`;
                window.open(whatsappUrl, '_blank');
            });
        }

        /**
         * Send message via Email
         */
        if (sendEmailBtn) {
            sendEmailBtn.addEventListener('click', () => {
                const nama = form.querySelector('input[name="nama"]').value;
                const email = form.querySelector('input[name="email"]').value;
                const pesan = form.querySelector('textarea[name="pesan"]').value;

                if (!nama || !email || !pesan) {
                    alert('Semua field harus diisi');
                    return;
                }

                const subject = `Pesan Baru dari ${nama}`;
                const body = `Nama: ${nama}\nEmail Pengirim: ${email}\n\nPesan:\n${pesan}`;
                const mailtoUrl = `mailto:paragonmedikapharma2019@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
                window.location.href = mailtoUrl;
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initContactForm);
    } else {
        initContactForm();
    }
})();
