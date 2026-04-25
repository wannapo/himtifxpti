# Developer Guide

## Tujuan Dokumen

Panduan ini membantu developer baru untuk:

- setup project dari awal
- menghubungkan database
- menjalankan aplikasi lokal
- memahami file penting
- mulai mengembangkan fitur tanpa banyak trial and error

## Stack yang Dipakai

- Laravel 13
- PHP 8.3
- Blade
- Alpine.js
- Tailwind CSS
- Vite
- SQLite default untuk local development

## Kebutuhan Minimum

Pastikan environment lokal memiliki:

- PHP 8.3 atau lebih baru sesuai `composer.json`
- Composer
- Node.js 20 atau setara
- npm
- SQLite atau MySQL

## Setup Project dari Nol

### 1. Clone repository

```bash
git clone <repository-url>
cd LMSCOLAB
```

### 2. Install package backend

```bash
composer install
```

### 3. Install package frontend

```bash
npm install
```

### 4. Buat file environment

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Konfigurasi database

#### Opsi A: SQLite

Ini opsi paling cepat untuk onboarding local.

```bash
touch database/database.sqlite
```

Set `.env` menjadi:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/full/path/ke/project/database/database.sqlite
```

#### Opsi B: MySQL

Set `.env` menjadi:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lmscolab
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Jalankan migration dan seeder

```bash
php artisan migrate --seed
```

### 7. Aktifkan public storage

```bash
php artisan storage:link
```

## Cara Menjalankan Project

### Mode lengkap untuk development

```bash
composer run dev
```

Perintah ini menjalankan:

- `php artisan serve`
- `php artisan queue:listen`
- `php artisan pail`
- `npm run dev`

### Mode manual

Terminal 1:

```bash
php artisan serve
```

Terminal 2:

```bash
npm run dev
```

## Koneksi Database

Konfigurasi database utama ada di:

- [config/database.php](/home/ubuntu/Documents/LMSCOLAB/config/database.php)

Hal yang perlu dipahami:

- default connection adalah `sqlite`
- Laravel juga sudah menyiapkan koneksi `mysql`, `mariadb`, `pgsql`, dan `sqlsrv`
- local setup paling sederhana memakai SQLite

## Seeder Default

Seeder utama ada di:

- [database/seeders/DatabaseSeeder.php](/home/ubuntu/Documents/LMSCOLAB/database/seeders/DatabaseSeeder.php)
- [database/seeders/CourseSeeder.php](/home/ubuntu/Documents/LMSCOLAB/database/seeders/CourseSeeder.php)

Data yang dibuat:

- admin default
- student default
- satu course contoh
- module contoh
- lesson contoh
- komentar contoh

## Akun untuk Login Awal

### Admin

- email: `admin@example.com`
- password: `password`

### Student

- email: `student@example.com`
- password: `password`

## Struktur Kerja yang Perlu Dipahami

### Routing

File utama:

- [routes/web.php](/home/ubuntu/Documents/LMSCOLAB/routes/web.php)

Group route utama:

- route publik course
- route student yang butuh auth
- route instruktur dengan middleware `IsInstructor`
- route admin dengan middleware `IsAdmin`

### Controller

Controller penting:

- [app/Http/Controllers/CourseController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/CourseController.php)
- [app/Http/Controllers/EnrollmentController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/EnrollmentController.php)
- [app/Http/Controllers/LessonController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/LessonController.php)
- [app/Http/Controllers/DashboardController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/DashboardController.php)
- [app/Http/Controllers/Instructor/CourseController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/Instructor/CourseController.php)
- [app/Http/Controllers/Admin/UserController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/Admin/UserController.php)

### Service Layer

Service penting:

- [app/Services/EnrollmentService.php](/home/ubuntu/Documents/LMSCOLAB/app/Services/EnrollmentService.php)
- [app/Services/ProgressService.php](/home/ubuntu/Documents/LMSCOLAB/app/Services/ProgressService.php)
- [app/Services/GamificationService.php](/home/ubuntu/Documents/LMSCOLAB/app/Services/GamificationService.php)

Gunakan service ini jika mengembangkan fitur yang berhubungan dengan enrollment, progress, atau poin. Jangan menduplikasi logic yang sama di controller baru.

## Alur Data Penting untuk Developer

### Menampilkan detail course

1. route menerima slug course
2. controller memuat module dan lesson
3. jika user login, sistem cek enrollment dan progress
4. view menampilkan tombol daftar, lanjut belajar, atau klaim sertifikat

### Menyelesaikan lesson

1. user membuka halaman lesson
2. sistem validasi lesson milik course yang benar
3. sistem validasi user sudah enroll
4. jika lesson diselesaikan, `user_progress` dibuat
5. gamification menambah poin dan update streak
6. user diarahkan ke lesson berikutnya atau kembali ke detail course

### Menambah lesson oleh instruktur

1. instruktur membuka panel course
2. instruktur menambah module
3. instruktur menambah lesson dalam module
4. lesson bisa berupa teks atau video
5. instruktur bisa menambahkan kuis
6. instruktur bisa mengaktifkan workspace coding

## File View yang Sering Diedit

- [resources/views/courses/index.blade.php](/home/ubuntu/Documents/LMSCOLAB/resources/views/courses/index.blade.php)
- [resources/views/courses/show.blade.php](/home/ubuntu/Documents/LMSCOLAB/resources/views/courses/show.blade.php)
- [resources/views/lessons/show.blade.php](/home/ubuntu/Documents/LMSCOLAB/resources/views/lessons/show.blade.php)
- [resources/views/dashboard.blade.php](/home/ubuntu/Documents/LMSCOLAB/resources/views/dashboard.blade.php)
- [resources/views/instructor/courses/index.blade.php](/home/ubuntu/Documents/LMSCOLAB/resources/views/instructor/courses/index.blade.php)
- [resources/views/admin/users/index.blade.php](/home/ubuntu/Documents/LMSCOLAB/resources/views/admin/users/index.blade.php)

## Middleware Akses

Middleware custom:

- [app/Http/Middleware/IsInstructor.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Middleware/IsInstructor.php)
- [app/Http/Middleware/IsAdmin.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Middleware/IsAdmin.php)

Aturan akses saat ini:

- `admin` bisa mengakses area admin dan instruktur
- `instructor` bisa mengakses area instruktur
- `student` hanya mengakses area belajar biasa

## Perintah yang Sering Dipakai

```bash
php artisan migrate
php artisan migrate:fresh --seed
php artisan db:seed
php artisan serve
php artisan test
npm run dev
npm run build
```

## Testing dan Quality Check

Menjalankan test:

```bash
php artisan test
```

Catatan penting:

- test bawaan repository masih sangat minimal
- saat menambah fitur baru, sebaiknya tambahkan Feature Test untuk flow penting

Contoh target test yang layak ditambah:

- enrollment course
- proteksi akses lesson tanpa enrollment
- kalkulasi progress
- generate sertifikat setelah selesai
- pembatasan route admin dan instruktur

## Catatan Implementasi yang Perlu Diketahui

### 1. Dashboard dan verifikasi email

Dashboard memakai middleware `verified`, tetapi model `User` belum mengimplementasikan `MustVerifyEmail`. Jika ingin benar-benar memaksa verifikasi email, bagian ini perlu dirapikan.

### 2. Ownership course

Course belum punya relasi pemilik instruktur. Jadi panel instruktur saat ini bersifat global.

### 3. Kuis disimpan di tabel lesson

Tidak ada tabel hasil kuis terpisah. Kuis digunakan sebagai gerbang UI sebelum user menekan tombol penyelesaian lesson.

### 4. Workspace coding tersimpan di lesson

Starter code HTML, CSS, dan JavaScript disimpan langsung di field lesson.

## Deployment Note Singkat

File deployment yang terlihat:

- [nixpacks.toml](/home/ubuntu/Documents/LMSCOLAB/nixpacks.toml)

Saat start, Nixpacks menjalankan:

- `php artisan storage:link`
- `php artisan clear-compiled`
- `php artisan optimize`
- `php artisan migrate --force`
- `php artisan db:seed --force`

Artinya environment deployment saat ini diasumsikan aman untuk menjalankan migration dan seed otomatis saat aplikasi start.