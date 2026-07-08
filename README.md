# Web Company Profile Konveksi Marchetti

Website company profile untuk Konveksi Marchetti yang dibangun menggunakan framework Laravel dengan admin panel Filament.

## Fitur
- Admin panel dengan autentikasi login
- CRUD Berita & Informasi
- CRUD Galeri foto produk
- CRUD Struktur Organisasi
- Pemesanan via WhatsApp

## Teknologi
- PHP 8.5
- Laravel 13
- Filament v3 (Admin Panel)
- MySQL
- XAMPP

## Cara Instalasi

### 1. Clone repository
git clone https://github.com/Fannan10/web_konveksi.git
cd web_konveksi

### 2. Install dependency
composer install

### 3. Copy file .env
cp .env.example .env
php artisan key:generate

### 4. Setup database
Buat database baru bernama web_konveksi di MySQL, lalu sesuaikan file .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_konveksi
DB_USERNAME=root
DB_PASSWORD=

### 5. Jalankan migration
php artisan migrate

### 6. Storage link
php artisan storage:link

### 7. Buat user admin
php artisan make:filament-user

### 8. Jalankan server
php artisan serve

### 9. Akses admin panel
http://127.0.0.1:8000/admin

## Struktur Database
- users: Data admin login
- posts: Data berita dan informasi
- galleries: Data foto galeri produk
- organizations: Data struktur organisasi

## Developer
- Nama: 1. MUHAMMAD YASIR SHIDDIQ (24030001), 2. MUHAMMAD FANNAN PRATAMA (24030020), 3. LUQMAN WIJAYA (24030027)
- Mata Kuliah: Rekayasa Web
