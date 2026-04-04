# Feature Documentation

## Ringkasan Fitur

Project LMSColab saat ini memiliki fitur utama berikut:

- autentikasi user
- role management
- katalog course
- enrollment course
- struktur course bertingkat
- lesson teks dan video
- kuis per lesson
- workspace coding langsung di halaman lesson
- progress tracking
- dashboard belajar
- gamification
- diskusi lesson
- sertifikat PDF
- panel instruktur
- panel admin

## Detail Fitur

### 1. Autentikasi User

Fitur:

- register
- login
- logout
- lupa password
- reset password

Implementasi:

- menggunakan Laravel Breeze
- route auth ada di [routes/auth.php](/home/ubuntu/Documents/LMSCOLAB/routes/auth.php)

### 2. Role Management

Role yang tersedia:

- `student`
- `instructor`
- `admin`

Implementasi:

- disimpan di kolom `users.role`
- pembatasan akses memakai middleware custom

Referensi:

- [app/Http/Middleware/IsInstructor.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Middleware/IsInstructor.php)
- [app/Http/Middleware/IsAdmin.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Middleware/IsAdmin.php)

### 3. Katalog Course

Fitur:

- menampilkan course publik
- pencarian course berdasarkan judul atau deskripsi

Implementasi:

- hanya course dengan status `published` yang tampil di halaman katalog
- pencarian dilakukan dengan query `like`

Referensi:

- [app/Http/Controllers/CourseController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/CourseController.php)

### 4. Detail Course dan Kurikulum

Fitur:

- menampilkan deskripsi course
- menampilkan module dan lesson
- menampilkan progres user jika sudah enroll
- menampilkan tombol lanjut belajar atau klaim sertifikat

Implementasi:

- data module dan lesson dimuat berurutan memakai `order_index`

### 5. Enrollment Course

Fitur:

- user bisa mendaftar course
- sistem mengecek apakah user sudah terdaftar

Implementasi:

- logic ada di `EnrollmentService`
- data disimpan di tabel `enrollments`

Referensi:

- [app/Services/EnrollmentService.php](/home/ubuntu/Documents/LMSCOLAB/app/Services/EnrollmentService.php)

### 6. Lesson Teks dan Video

Fitur:

- lesson dapat berupa materi teks
- lesson dapat berupa video embed atau video file upload

Implementasi:

- tipe lesson disimpan di `lessons.content_type`
- URL video disimpan di `lessons.video_url`

### 7. Quiz per Lesson

Fitur:

- instructor bisa menambahkan kuis ke lesson
- student harus menjawab benar sebelum bisa menyelesaikan lesson

Implementasi:

- pertanyaan dan opsi disimpan langsung di tabel `lessons`
- validasi jawaban dilakukan di sisi tampilan dengan Alpine.js
- belum ada tabel hasil kuis terpisah

### 8. Workspace Coding

Fitur:

- lesson dapat memiliki editor HTML, CSS, dan JavaScript
- hasil kode tampil live di iframe preview

Implementasi:

- starter code disimpan langsung di field lesson
- preview dirender di browser

Kegunaan:

- cocok untuk latihan front-end dasar
- cocok untuk pembelajaran praktik langsung

### 9. Progress Tracking

Fitur:

- sistem menandai lesson yang sudah selesai
- sistem menghitung progress per course
- sistem mencari lesson berikutnya yang belum selesai

Implementasi:

- progress disimpan di tabel `user_progress`
- logic ada di `ProgressService`

Referensi:

- [app/Services/ProgressService.php](/home/ubuntu/Documents/LMSCOLAB/app/Services/ProgressService.php)

### 10. Gamification

Fitur:

- poin belajar
- streak harian
- longest streak
- heatmap aktivitas 6 bulan terakhir

Implementasi:

- penyelesaian lesson menambah poin
- total poin dan streak disimpan di tabel `users`
- aktivitas harian disimpan di `user_activities`

Referensi:

- [app/Services/GamificationService.php](/home/ubuntu/Documents/LMSCOLAB/app/Services/GamificationService.php)

### 11. Dashboard Student

Fitur:

- melihat profil belajar
- melihat total poin dan streak
- melihat heatmap aktivitas
- melihat daftar course yang diikuti
- melanjutkan lesson berikutnya
- klaim sertifikat jika course selesai

### 12. Diskusi Lesson

Fitur:

- student dapat menulis komentar pada lesson
- komentar ditampilkan secara kronologis terbaru lebih dulu

Implementasi:

- komentar disimpan di tabel `comments`
- setiap komentar terkait ke lesson dan user

### 13. Sertifikat PDF

Fitur:

- sertifikat bisa diklaim saat progress 100%
- file dibuka sebagai PDF

Implementasi:

- generate memakai DomPDF
- template sertifikat ada di Blade view

Referensi:

- [app/Http/Controllers/CertificateController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/CertificateController.php)
- [resources/views/certificate/pdf.blade.php](/home/ubuntu/Documents/LMSCOLAB/resources/views/certificate/pdf.blade.php)

### 14. Panel Instruktur

Fitur:

- CRUD course
- CRUD module
- CRUD lesson
- upload gambar course
- upload video lesson
- tambah kuis
- tambah workspace coding

Catatan:

- panel instruktur saat ini belum membatasi course per pemilik instruktur

### 15. Panel Admin

Fitur:

- CRUD user
- set role user
- mencegah admin menghapus akun sendiri

## Fitur Berdasarkan Peran

| Fitur | Student | Instructor | Admin |
|---|---|---|---|
| Register dan login | Ya | Ya | Ya |
| Melihat katalog course | Ya | Ya | Ya |
| Enroll course | Ya | Ya | Ya |
| Mengikuti lesson | Ya | Ya | Ya |
| Menulis komentar | Ya | Ya | Ya |
| Melihat dashboard belajar | Ya | Ya | Ya |
| Klaim sertifikat | Ya | Ya | Ya |
| Kelola course | Tidak | Ya | Ya |
| Kelola module dan lesson | Tidak | Ya | Ya |
| Kelola user | Tidak | Tidak | Ya |

## Fitur yang Sudah Terlihat Stabil

- katalog course publik
- enrollment
- progress tracking dasar
- panel instruktur dasar
- panel admin dasar
- komentar lesson
- gamification dasar
- generate sertifikat

## Fitur yang Masih Perlu Diperhatikan Jika Project Dikembangkan Lagi

- ownership course oleh instructor
- implementasi penuh email verification
- penyimpanan hasil kuis secara terpisah
- test otomatis untuk flow penting
- audit otorisasi komentar dan akses resource yang lebih detail

## Referensi File Utama

- [app/Http/Controllers/CourseController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/CourseController.php)
- [app/Http/Controllers/LessonController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/LessonController.php)
- [app/Http/Controllers/CommentController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/CommentController.php)
- [app/Http/Controllers/CertificateController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/CertificateController.php)
- [app/Http/Controllers/Instructor/LessonController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/Instructor/LessonController.php)
- [app/Http/Controllers/Admin/UserController.php](/home/ubuntu/Documents/LMSCOLAB/app/Http/Controllers/Admin/UserController.php)