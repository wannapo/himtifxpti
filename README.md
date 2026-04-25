# LMSColab

LMSColab adalah aplikasi Learning Management System (LMS) berbasis Laravel untuk pembelajaran materi teknis secara bertahap. Aplikasi ini mendukung alur belajar dari katalog kursus, pendaftaran kursus, penyelesaian lesson, kuis, diskusi, gamification, sampai klaim sertifikat PDF.

Dokumentasi ini ditujukan untuk:

- developer baru
- mahasiswa atau siswa
- dosen atau instruktur

## Ringkasan Project

Fungsi utama aplikasi:

- menampilkan katalog kursus yang sudah dipublikasikan
- memungkinkan user mendaftar ke kursus
- menampilkan lesson berbentuk teks atau video
- menyediakan kuis pada lesson tertentu
- menyediakan workspace coding HTML, CSS, dan JavaScript pada lesson tertentu
- mencatat progres penyelesaian lesson
- memberikan poin dan streak belajar
- menyediakan diskusi per lesson
- menghasilkan sertifikat PDF setelah kursus selesai
- menyediakan panel instruktur untuk mengelola kursus, modul, dan lesson
- menyediakan panel admin untuk mengelola akun pengguna

## Tech Stack

- PHP 8.3
- Laravel 13
- Blade
- Alpine.js
- Tailwind CSS
- Vite
- SQLite sebagai default local database
- MySQL dan MariaDB juga didukung dari konfigurasi Laravel
- barryvdh/laravel-dompdf untuk generate sertifikat PDF

## Struktur Dokumentasi

Dokumen detail tersedia di folder berikut:

- [System Architecture](/home/ubuntu/Documents/LMSCOLAB/docs/system-architecture.md)
- [Database Documentation](/home/ubuntu/Documents/LMSCOLAB/docs/database-documentation.md)
- [Developer Guide](/home/ubuntu/Documents/LMSCOLAB/docs/developer-guide.md)
- [User Guide](/home/ubuntu/Documents/LMSCOLAB/docs/user-guide.md)
- [Feature Documentation](/home/ubuntu/Documents/LMSCOLAB/docs/feature-documentation.md)

## Struktur Project Singkat

Folder penting yang paling sering dipakai:

- `app/Http/Controllers` untuk controller web, admin, dan instruktur
- `app/Models` untuk model Eloquent
- `app/Services` untuk logic enrollment, progress, dan gamification
- `database/migrations` untuk skema database
- `database/seeders` untuk data awal project
- `resources/views` untuk tampilan Blade
- `routes/web.php` untuk routing utama aplikasi

## Cara Install

### 1. Clone project

```bash
git clone <repository-url>
cd LMSCOLAB
```

### 2. Install dependency backend dan frontend

```bash
composer install
npm install
```

### 3. Siapkan file environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Atur koneksi database

Secara default project memakai SQLite.

Opsi SQLite:

```bash
touch database/database.sqlite
```

Lalu pastikan `.env` berisi:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/full/path/ke/project/database/database.sqlite
```

Opsi MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lmscolab
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migrasi dan seed database

```bash
php artisan migrate --seed
```

### 6. Buat symbolic link storage

```bash
php artisan storage:link
```

## Cara Menjalankan Project

### Opsi 1: mode development lengkap

Perintah ini menjalankan web server Laravel, queue listener, log viewer, dan Vite secara bersamaan.

```bash
composer run dev
```

### Opsi 2: jalankan manual

Terminal 1:

```bash
php artisan serve
```

Terminal 2:

```bash
npm run dev
```

Setelah itu buka browser ke:

```text
http://127.0.0.1:8000
```

## Akun Seed Default

Setelah menjalankan seed, akun berikut tersedia:

- Admin
	- email: `admin@example.com`
	- password: `password`
- Student
	- email: `student@example.com`
	- password: `password`

Catatan:

- Tidak ada akun instruktur default dari seeder bawaan.
- Admin dapat membuat akun instruktur dari panel admin.

## Flow Penggunaan Singkat

### Mahasiswa atau student

1. Registrasi atau login.
2. Buka katalog kursus.
3. Masuk ke detail kursus.
4. Klik daftar kursus.
5. Buka lesson satu per satu.
6. Jawab kuis jika tersedia.
7. Selesaikan lesson untuk menambah progres.
8. Lanjutkan sampai progres 100%.
9. Klaim sertifikat PDF.

### Dosen atau instruktur

1. Login dengan role `instructor` atau `admin`.
2. Buka menu pengelolaan kursus.
3. Buat course.
4. Tambahkan module.
5. Tambahkan lesson teks atau video.
6. Tambahkan kuis atau workspace coding jika diperlukan.
7. Publish course.

### Admin

1. Login sebagai admin.
2. Buka panel kelola akun.
3. Tambah, ubah, atau hapus user.
4. Tentukan role `admin`, `instructor`, atau `student`.

## Testing

Menjalankan test:

```bash
php artisan test
```

Catatan saat analisis repository:

- folder test masih sangat dasar
- belum terlihat test komprehensif untuk enrollment, progress, gamification, certificate, atau panel admin dan instruktur

## Catatan Implementasi Penting

Berikut hasil analisis yang perlu diketahui developer baru:

- dashboard dilindungi middleware `verified`, tetapi model `User` belum mengimplementasikan `MustVerifyEmail`
- course saat ini tidak memiliki relasi kepemilikan ke instruktur tertentu, sehingga panel instruktur bekerja pada semua course
- komentar lesson disimpan per lesson dan per user
- kuis diperiksa di sisi tampilan menggunakan Alpine.js sebelum tombol penyelesaian lesson ditampilkan
- sertifikat dibuat sebagai PDF melalui view Blade dan DomPDF
- deployment berbasis Nixpacks menjalankan migrate dan seed otomatis saat start

## Referensi File Inti

- [routes/web.php](/home/ubuntu/Documents/LMSCOLAB/routes/web.php)
- [app/Services/EnrollmentService.php](/home/ubuntu/Documents/LMSCOLAB/app/Services/EnrollmentService.php)
- [app/Services/ProgressService.php](/home/ubuntu/Documents/LMSCOLAB/app/Services/ProgressService.php)
- [app/Services/GamificationService.php](/home/ubuntu/Documents/LMSCOLAB/app/Services/GamificationService.php)
- [database/seeders/DatabaseSeeder.php](/home/ubuntu/Documents/LMSCOLAB/database/seeders/DatabaseSeeder.php)
- [database/seeders/CourseSeeder.php](/home/ubuntu/Documents/LMSCOLAB/database/seeders/CourseSeeder.php)

## Lisensi

Project ini mengikuti lisensi repository utama yang sedang digunakan.
