# User Guide

## Tujuan Dokumen

Panduan ini menjelaskan cara memakai LMSColab dari sisi pengguna. Fokus utamanya adalah langkah nyata yang dilakukan mahasiswa, dosen, dan admin saat menggunakan aplikasi.

## Jenis Pengguna

- mahasiswa atau student
- dosen atau instructor
- admin

## 1. Panduan Mahasiswa atau Student

### Login atau registrasi

1. Buka halaman utama aplikasi.
2. Klik `Daftar` jika belum punya akun.
3. Isi nama, email, dan password.
4. Jika sudah punya akun, klik `Log in`.

### Melihat daftar course

1. Buka menu katalog course.
2. Gunakan kolom pencarian jika ingin mencari course tertentu.
3. Klik salah satu course untuk melihat detail.

### Mendaftar ke course

1. Masuk ke halaman detail course.
2. Klik tombol `Daftar Sertifikasi`.
3. Setelah berhasil, tombol akan berubah menjadi `Lanjut Belajar` jika masih ada lesson yang belum selesai.

### Belajar per lesson

1. Di halaman course, buka module yang diinginkan.
2. Klik lesson yang tersedia.
3. Baca materi atau tonton video.
4. Jika lesson memiliki workspace coding, gunakan editor di tengah halaman untuk mencoba kode.
5. Lihat hasilnya di panel preview.

### Menjawab kuis

1. Jika lesson memiliki kuis, pilih salah satu jawaban.
2. Klik `Periksa Jawaban`.
3. Jika jawaban salah, perbaiki lalu coba lagi.
4. Jika jawaban benar, tombol penyelesaian lesson akan muncul.

### Menyelesaikan lesson

1. Setelah materi selesai dipelajari, klik tombol penyelesaian lesson.
2. Sistem akan menyimpan progress.
3. Anda akan diarahkan ke lesson berikutnya jika masih ada.
4. Jika semua lesson selesai, Anda kembali ke halaman course.

### Melihat dashboard

Di dashboard student Anda dapat melihat:

- profil singkat
- total poin
- streak belajar
- longest streak
- heatmap aktivitas belajar 6 bulan terakhir
- daftar course yang sedang atau sudah diikuti

### Diskusi pada lesson

1. Di halaman lesson, buka bagian `Diskusi`.
2. Tulis pertanyaan atau komentar.
3. Klik `Kirim`.
4. Komentar akan muncul di bawah form diskusi.

### Klaim sertifikat

1. Selesaikan semua lesson pada course.
2. Buka kembali halaman detail course atau dashboard.
3. Klik `Klaim Sertifikat`.
4. Sistem akan membuka PDF sertifikat.

## 2. Panduan Dosen atau Instructor

Role dosen pada sistem ini menggunakan role `instructor`.

### Login sebagai instructor

1. Login dengan akun yang memiliki role instructor.
2. Buka menu `Kelola Kursus (Instruktur)`.

### Membuat course

1. Masuk ke panel instruktur.
2. Klik tambah course.
3. Isi judul, deskripsi, status, dan gambar jika ada.
4. Simpan course.

### Menambah module

1. Buka detail course di panel instruktur.
2. Tambahkan module baru.
3. Isi judul module dan urutan tampil.
4. Simpan.

### Menambah lesson

1. Pilih module yang ingin diisi.
2. Tambahkan lesson.
3. Isi judul, tipe konten, isi materi atau video, dan urutan.
4. Jika perlu, isi bagian kuis.
5. Jika perlu latihan coding, aktifkan workspace lalu isi starter code HTML, CSS, dan JavaScript.
6. Simpan lesson.

### Mengedit course, module, dan lesson

1. Buka panel instruktur.
2. Pilih data yang ingin diubah.
3. Edit informasi.
4. Simpan perubahan.

### Mempublikasikan course

1. Saat membuat atau mengubah course, set `status` menjadi `published`.
2. Course published akan muncul di katalog publik.

## 3. Panduan Admin

### Login sebagai admin

1. Login menggunakan akun admin.
2. Buka menu `Kelola Akun (Admin)`.

### Menambah user baru

1. Klik tambah akun.
2. Isi nama, email, password, dan role.
3. Simpan.

Role yang tersedia:

- `admin`
- `instructor`
- `student`

### Mengubah user

1. Pilih user dari daftar akun.
2. Ubah data yang dibutuhkan.
3. Simpan perubahan.

### Menghapus user

1. Pilih user dari daftar.
2. Hapus akun.
3. Sistem akan menolak jika admin mencoba menghapus akun dirinya sendiri.

## Alur Penggunaan yang Paling Umum

### Alur mahasiswa

1. Registrasi atau login.
2. Cari course.
3. Daftar course.
4. Belajar per lesson.
5. Jawab kuis.
6. Selesaikan lesson.
7. Dapat poin dan streak.
8. Selesaikan semua lesson.
9. Klaim sertifikat.

### Alur dosen

1. Login sebagai instructor.
2. Buat course.
3. Tambah module.
4. Tambah lesson.
5. Tambahkan kuis atau workspace jika perlu.
6. Publish course.

### Alur admin

1. Login sebagai admin.
2. Kelola akun.
3. Tetapkan role user.
4. Pastikan dosen dan mahasiswa memiliki akses sesuai kebutuhan.

## Tips Penggunaan

- pastikan course sudah `published` agar terlihat di katalog publik
- jika tombol sertifikat belum muncul, cek apakah semua lesson sudah selesai
- jika lesson punya kuis, jawaban harus benar sebelum lesson dapat diselesaikan
- jika lesson punya workspace coding, hasil kode terlihat langsung di preview

## Batasan yang Perlu Dipahami Pengguna

- sertifikat hanya bisa diakses setelah progress course mencapai 100%
- akses panel instruktur hanya untuk role `instructor` dan `admin`
- akses panel admin hanya untuk role `admin`
- beberapa flow verifikasi email masih mengikuti struktur Breeze, tetapi implementasi final verifikasi email belum terlihat lengkap di level model

## Halaman Penting

- halaman katalog course
- halaman detail course
- halaman lesson
- dashboard student
- panel instruktur
- panel admin

Referensi implementasi:

- [resources/views/courses/index.blade.php](/home/ubuntu/Documents/LMSCOLAB/resources/views/courses/index.blade.php)
- [resources/views/courses/show.blade.php](/home/ubuntu/Documents/LMSCOLAB/resources/views/courses/show.blade.php)
- [resources/views/lessons/show.blade.php](/home/ubuntu/Documents/LMSCOLAB/resources/views/lessons/show.blade.php)
- [resources/views/dashboard.blade.php](/home/ubuntu/Documents/LMSCOLAB/resources/views/dashboard.blade.php)