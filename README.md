
# Paragon Web Application

## Deskripsi
Paragon adalah aplikasi web berbasis Laravel yang menyediakan dua role utama: Visitor (pengunjung) dan Admin. Aplikasi ini dirancang untuk menampilkan informasi produk, galeri, visi-misi, dan fitur lain untuk pengunjung, serta menyediakan dashboard admin yang aman untuk mengelola konten dan pengaturan akun admin.

## Fitur Utama
- Halaman publik untuk visitor: home, galeri, produk, review, visi-misi, dsb.
- Sistem autentikasi admin berbasis JWT (JSON Web Token), login hanya dengan username & password.
- Dashboard admin: kelola konten, ubah username, password, dan foto profil admin.
- Semua route admin dilindungi middleware JWT.
- Upload foto profil admin dengan validasi.
- Logout dan proteksi CSRF.
- UI responsif dengan Tailwind CSS.

## Cara Clone & Setup Project

1. **Clone repository**
	```bash
	git clone https://github.com/username/paragon.git
	cd paragon
	```

2. **Install dependency**
	```bash
	composer install
	npm install
	```

3. **Copy file environment**
	```bash
	cp .env.example .env
	```

4. **Generate app key & JWT secret**
	```bash
	php artisan key:generate
	php artisan jwt:secret
	```

5. **Set konfigurasi database di file .env**

6. **Jalankan migration & seeder**
	```bash
	php artisan migrate --seed
	```

7. **Build asset frontend**
	```bash
	npm run build
	```

8. **Jalankan server lokal**
	```bash
	php artisan serve
	```

## Penjelasan Role

### Visitor
- Dapat mengakses semua halaman publik tanpa login.
- Tidak bisa mengakses dashboard admin atau fitur manajemen konten.
- URL visitor: `/`, `/gallery`, `/products`, dll.

### Admin
- Harus login melalui halaman `/admin/login` dengan username & password.
- Setelah login, mendapatkan JWT yang digunakan untuk mengakses dashboard admin.
- Semua route admin (misal: `/admin/dashboard`, `/admin/settings`) dilindungi middleware JWT.
- Admin dapat mengubah username, password, dan foto profil di menu pengaturan.
- Logout akan menghapus token dan mengakhiri sesi admin.

---

Untuk pertanyaan lebih lanjut, silakan hubungi developer.
