# Web Pernikahan

Selamat datang di proyek **Web Pernikahan**! Ini adalah aplikasi berbasis web yang dirancang untuk membantu pasangan dalam mengelola informasi pernikahan mereka, termasuk undangan digital, RSVP, galeri foto, dan lainnya.

## Fitur Utama
- **Undangan Digital**: Buat dan bagikan undangan pernikahan secara online.
- **RSVP Online**: Tamu dapat mengonfirmasi kehadiran mereka langsung melalui website.
- **Galeri Foto**: Tampilkan momen spesial dalam bentuk galeri interaktif.
- **Countdown Pernikahan**: Hitung mundur hari bahagia Anda dengan tampilan yang menarik.
- **Cerita Cinta**: Bagikan kisah perjalanan cinta Anda dan pasangan.
- **Lokasi Acara**: Integrasi dengan Google Maps untuk memudahkan tamu menemukan tempat acara.
- **Guestbook**: Biarkan tamu meninggalkan pesan dan ucapan selamat.

## Teknologi yang Digunakan
- **Frontend**: HTML, CSS (Tailwind/Bootstrap), JavaScript
- **Backend**: Laravel 11
- **Database**: MySQL
- **Deployment**: Hosting pilihan Anda (VPS/Shared Hosting)

## Cara Instalasi
1. Clone repositori ini:
   ```bash
   git clone https://github.com/username/web-pernikahan.git
   ```
2. Masuk ke direktori proyek:
   ```bash
   cd web-pernikahan
   ```
3. Install dependensi dengan Composer:
   ```bash
   composer install
   ```
4. Install dependensi frontend (jika menggunakan npm):
   ```bash
   npm install && npm run dev
   ```
5. Salin file environment:
   ```bash
   cp .env.example .env
   ```
6. Atur konfigurasi database di file `.env`, lalu jalankan migrasi:
   ```bash
   php artisan migrate --seed
   ```
7. Generate application key:
   ```bash
   php artisan key:generate
   ```
8. Jalankan server lokal:
   ```bash
   php artisan serve
   ```

## Kontribusi
Jika ingin berkontribusi dalam pengembangan proyek ini, silakan fork repositori ini dan buat pull request dengan perubahan yang diusulkan.

## Lisensi
Proyek ini menggunakan lisensi [MIT](LICENSE).

---
Dibuat dengan ❤️ untuk membantu pasangan dalam mengabadikan momen spesial mereka!
