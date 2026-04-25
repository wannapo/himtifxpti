-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2026 pada 05.57
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.5.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `lesson_id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Materi pendahuluan yang sangat informatif! Silakan berdiskusi di sini jika ada pertanyaan.', '2026-03-28 14:07:09', '2026-03-28 14:07:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`id`, `title`, `slug`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Github', 'github-69d2279059dbb', 'GitHub is a provider of Internet hosting for software development and version control using Git. It offers the distributed version control and source code management functionality of Git, plus its own features.', '/storage/courses/mxSqqG21XzWIxBikNUZMQluL2QOHjjgAg2JKZarM.png', 'published', '2026-03-28 14:07:09', '2026-04-18 22:07:36'),
(2, 'Git', 'git-69d227fa45535', 'Git is a free and open source distributed version control system designed to handle everything from small to very large projects with speed and efficiency.', '/storage/courses/nIKTC9wSU7Y7UVuyWr7QJIJU1N9K2CeNeQP6brwk.png', 'published', '2026-04-05 02:14:34', '2026-04-05 02:24:05'),
(4, 'JavaScript', 'javascript-69d22d1ce621a', 'bahasa pemrograman tingkat tinggi, dinamis, dan bertipe skrip yang menjadi teknologi inti internet bersama HTML (struktur) dan CSS (tampilan). JavaScript memberikan \"kehidupan\" pada website dengan memungkinkan adanya elemen interaktif dan fungsionalitas kompleks', '/storage/courses/RDNC5FB6sP0pDwtkRTqHvBD5SBxM12cELB3NxjeC.png', 'published', '2026-04-05 02:36:28', '2026-04-18 21:51:18'),
(5, 'Cascading Style Sheets (CSS)', 'cascading-style-sheets-css-69d22d66a7790', 'bahasa yang digunakan untuk mengatur tampilan dan desain sebuah halaman website', '/storage/courses/8F5u9t2SrnSO8SaCbIYoCK87gWAZ5nFrWkv4k0mb.png', 'published', '2026-04-05 02:37:42', '2026-04-18 21:50:46'),
(6, 'HyperText Markup Language (HTML)', 'hypertext-markup-language-html-69d22da962373', 'HTML stands for HyperText Markup Language. It is used on the frontend and gives the structure to the webpage which you can style using CSS and make interactive using JavaScript.', '/storage/courses/VEqoXncMKsZ2uScRPh9p6pc716h9OYOLx8kwLaFx.png', 'published', '2026-04-05 02:38:49', '2026-04-18 21:40:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `enrolled_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `enrollments`
--

INSERT INTO `enrollments` (`id`, `user_id`, `course_id`, `enrolled_at`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2026-03-31 22:02:06', 'active', '2026-03-31 22:02:06', '2026-03-31 22:02:06'),
(2, 1, 1, '2026-03-31 22:44:49', 'active', '2026-03-31 22:44:49', '2026-03-31 22:44:49'),
(3, 2, 6, '2026-04-05 22:21:40', 'active', '2026-04-05 22:21:40', '2026-04-05 22:21:40'),
(4, 1, 6, '2026-04-15 06:24:03', 'active', '2026-04-15 06:24:03', '2026-04-15 06:24:03'),
(5, 1, 5, '2026-04-17 01:28:41', 'active', '2026-04-17 01:28:41', '2026-04-17 01:28:41'),
(6, 2, 5, '2026-04-20 00:35:10', 'active', '2026-04-20 00:35:10', '2026-04-20 00:35:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `content_type` varchar(255) NOT NULL DEFAULT 'text',
  `video_url` text DEFAULT NULL,
  `order_index` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quiz_question` text DEFAULT NULL,
  `quiz_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`quiz_options`)),
  `quiz_correct_index` int(11) DEFAULT NULL,
  `quiz_explanation` text DEFAULT NULL,
  `has_workspace` tinyint(1) NOT NULL DEFAULT 0,
  `code_html` text DEFAULT NULL,
  `code_css` text DEFAULT NULL,
  `code_js` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lessons`
--

INSERT INTO `lessons` (`id`, `module_id`, `title`, `content`, `content_type`, `video_url`, `order_index`, `created_at`, `updated_at`, `quiz_question`, `quiz_options`, `quiz_correct_index`, `quiz_explanation`, `has_workspace`, `code_html`, `code_css`, `code_js`) VALUES
(1, 1, 'Apa itu Programming?', 'Programming adalah proses menulis, menguji, dan memperbaiki (mende-bug) kode yang membangun program komputer. Tujuan dari programming adalah untuk memuat suatu kalkulasi atau alur kerja menjadi otomatis.', 'video', 'https://youtu.be/NBZ9Ro6UKV8?si=aG7c9sHyCoJRr9fW', 1, '2026-03-28 14:07:09', '2026-04-02 03:43:51', 'Apa tujuan utama dari programming?', '[\"Membuat komputer menjadi lambat\", \"Membuat suatu alur kerja otomatis\", \"Hanya untuk bermain game\"]', 1, 'Programming bertujuan untuk mengotomasi tugas-tugas sehingga komputer dapat bekerja lebih efisien.', 0, NULL, NULL, NULL),
(2, 1, 'Instalasi Tools', NULL, 'video', 'https://youtu.be/-VTiqivKOB8?si=_bCUuQwn0dhk_ICN', 2, '2026-03-28 14:07:09', '2026-03-31 22:44:40', 'Video di atas menggunakan platform apa?', '[\"YouTube\", \"Vimeo\", \"Dailymotion\"]', 0, 'URL yang digunakan adalah embed dari platform YouTube.', 0, NULL, NULL, NULL),
(3, 2, 'Apa Itu HTML?', NULL, 'video', 'https://youtu.be/wriGST3vp5M?si=YursHmw3nNxIgraa', 1, '2026-04-05 02:42:59', '2026-04-05 04:25:29', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(4, 2, 'Instansi dan Persiapan (Software & Tools)', NULL, 'video', 'https://youtu.be/GAd6FTsGSY8?si=2Uq_Y9RRl9MbmOXK', 2, '2026-04-05 02:43:22', '2026-04-05 04:26:34', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(5, 2, 'Memahami Struktur Dasar HTML', NULL, 'video', 'https://youtu.be/TM12RA6cmOQ?si=syShYWLyTVocqu3v', 3, '2026-04-05 04:27:07', '2026-04-05 04:27:07', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(6, 5, 'Membuat Heading dan Paragraph', NULL, 'video', 'https://youtu.be/bd03BfqfOSk?si=JJ6tWRtwl9c7xUAY', 1, '2026-04-05 04:27:41', '2026-04-05 04:27:41', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(7, 5, 'Format Teks: Underline, Superscript, dan Subscript', NULL, 'video', 'https://youtu.be/F9Joj-lm4T0?si=pzo8kJZtTRW9kYHq', 2, '2026-04-05 04:28:18', '2026-04-05 04:28:18', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(8, 5, ': Mengatur Jarak: Line Break dan Horizontal Rule', NULL, 'video', 'https://youtu.be/C3g0-M5Raws?si=rOklVOhbvFwI5nnr', 3, '2026-04-05 04:29:00', '2026-04-05 04:29:00', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(9, 5, 'Penekanan Teks: Strong, Emphasis, Blockquote, dan Quote', NULL, 'video', 'https://youtu.be/LkyYbxjFkeQ?si=nr7Kz7qQ1M7bIKUE', 4, '2026-04-05 04:30:23', '2026-04-05 04:30:23', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(10, 5, 'Materi 08: Mengenal Extra Tag lainnya', NULL, 'video', 'https://youtu.be/kVNJKVBAN-s?si=xaS49J6enxUETNcW', 5, '2026-04-05 04:30:57', '2026-04-05 04:30:57', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(11, 5, 'Latihan HTML 1: Mengolah Teks', NULL, 'video', 'https://youtu.be/nzCmGkOkVUQ?si=880bdPClv6R__1xu', 6, '2026-04-05 04:31:45', '2026-04-05 04:31:45', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(12, 11, 'Apa itu CSS?', NULL, 'video', 'https://youtu.be/AQOBN9XByf0?si=AG4aZpYyXJuESOl2', 1, '2026-04-05 22:39:26', '2026-04-06 23:24:11', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(13, 11, 'Inline CSS', NULL, 'text', 'https://youtu.be/NuJxNI0GltM?si=8KHYbieIwsJ-9-vU', 2, '2026-04-05 22:39:43', '2026-04-06 23:25:49', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(14, 6, 'Membuat Daftar dengan List (Ordered & Unordered)', NULL, 'video', 'https://youtu.be/ahukMeW11gg?si=G-z4iMoZcBfUv1BR', 1, '2026-04-06 23:08:57', '2026-04-06 23:08:57', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(15, 6, 'Navigasi: Membuat Link dan Website Multi Page', NULL, 'video', 'https://youtu.be/fOGbw_mFovA?si=_svJ4yi2YOT_ssRq', 2, '2026-04-06 23:10:08', '2026-04-06 23:10:08', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(16, 6, 'Memahami Pentingnya HTML Attributes', NULL, 'video', 'https://youtu.be/AxP8NPhCctA?si=hZOFYlDvTClCSTvQ', 3, '2026-04-06 23:10:48', '2026-04-06 23:10:48', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(17, 7, 'Menyajikan Data dengan Tabel', NULL, 'video', 'https://youtu.be/UK5CPO7Q9uI?si=QagNx-z4nXxmmLQt', 1, '2026-04-06 23:11:49', '2026-04-06 23:11:49', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(18, 7, 'Interaksi: Membuat Form (Input, Button, dll)', NULL, 'video', 'https://youtu.be/CBuFc2nGEDo?si=wIFX4TGAO-lmobAC', 2, '2026-04-06 23:12:58', '2026-04-06 23:12:58', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(19, 7, 'Latihan HTML 2: Membuat Form dan Tabel', NULL, 'video', 'https://youtu.be/O6wjRNlkHUU?si=oQjx9RILUFnEsfOZ', 3, '2026-04-06 23:13:57', '2026-04-06 23:13:57', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(20, 8, 'Memasukkan Gambar ke dalam Web', NULL, 'text', 'https://youtu.be/M_ZlrjV0chU?si=t7Fm0UGBhhZ89Sh2', 1, '2026-04-06 23:14:43', '2026-04-06 23:19:38', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(21, 8, 'Menampilkan Video', NULL, 'text', 'https://youtu.be/UbXUnaQ9hpc?si=yAnhfH6nDhnQgNI1', 2, '2026-04-06 23:20:18', '2026-04-06 23:20:18', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(22, 8, 'Menambahkan Audio (Suara dan Musik)', NULL, 'text', 'https://youtu.be/AYfI3EVsrSc?si=4lkn-YLh-zcSP-aK', 3, '2026-04-06 23:21:01', '2026-04-06 23:21:01', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(23, 9, 'Latihan HTML 3: Integrasi Multimedia', NULL, 'text', 'https://youtu.be/s_v0DaCXfMQ?si=g3gIkkSeuZKhlZUG', 1, '2026-04-06 23:21:49', '2026-04-06 23:21:49', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(24, 9, 'Membangun Struktur Web Utuh', NULL, 'text', 'https://youtu.be/iFw-AB4iAnQ?si=KCWEqlTUx83st4nP', 2, '2026-04-06 23:22:32', '2026-04-06 23:22:32', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(25, 11, 'Internal CSS', NULL, 'video', 'https://youtu.be/K_B2g1t0jVA?si=9lSStJjKscGWT156', 3, '2026-04-06 23:27:46', '2026-04-06 23:27:46', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(26, 11, 'External CSS', NULL, 'text', 'https://youtu.be/zYTdfOERybo?si=pkv-Cym3vEzYmfDL', 4, '2026-04-06 23:28:30', '2026-04-07 01:16:58', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(27, 11, 'CSS Selector', NULL, 'text', 'https://youtu.be/MiIo71YFvPg?si=P57_SX8p61TOIPV7', 5, '2026-04-06 23:29:12', '2026-04-06 23:29:12', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_26_175911_create_courses_table', 1),
(5, '2026_03_26_175912_create_modules_table', 1),
(6, '2026_03_26_175913_create_lessons_table', 1),
(7, '2026_03_26_175914_create_enrollments_table', 1),
(8, '2026_03_26_175915_create_user_progress_table', 1),
(9, '2026_03_26_181719_add_role_to_users_table', 1),
(10, '2026_03_26_193803_add_gamification_to_users_table', 1),
(11, '2026_03_26_193805_create_user_activities_table', 1),
(12, '2026_03_26_194716_add_quiz_to_lessons_table', 1),
(13, '2026_03_26_194951_create_comments_table', 1),
(14, '2026_03_26_233801_add_workspace_to_lessons_table', 1),
(15, '2026_03_29_000000_seed_default_users', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `order_index` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `modules`
--

INSERT INTO `modules` (`id`, `course_id`, `title`, `order_index`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pendahuluan', 1, '2026-03-28 14:07:09', '2026-03-28 14:07:09'),
(2, 6, 'Pengenalan & Persiapan Lingkungan Kerja', 1, '2026-04-05 02:42:14', '2026-04-05 04:20:01'),
(5, 6, 'Dasar-Dasar Teks & Tipografi', 2, '2026-04-05 02:56:38', '2026-04-05 04:21:30'),
(6, 6, 'Struktur Navigasi & Informasi', 3, '2026-04-05 02:57:42', '2026-04-05 04:22:08'),
(7, 6, 'Data & Interaksi Pengguna', 4, '2026-04-05 02:57:53', '2026-04-05 04:23:02'),
(8, 6, 'Multimedia dalam Web', 5, '2026-04-05 02:58:18', '2026-04-05 04:23:29'),
(9, 6, 'Projek Akhir & Pemantapan', 6, '2026-04-05 02:58:26', '2026-04-05 04:23:48'),
(11, 5, 'Pengenalan CSS', 1, '2026-04-05 02:59:31', '2026-04-05 02:59:31'),
(13, 5, 'Selector', 2, '2026-04-05 03:00:16', '2026-04-05 03:00:16'),
(14, 5, 'Warna dan Font', 3, '2026-04-05 03:00:33', '2026-04-05 03:00:33'),
(15, 5, 'Box Model', 4, '2026-04-05 03:00:44', '2026-04-05 03:00:44'),
(16, 5, 'Layout', 5, '2026-04-05 03:00:54', '2026-04-05 03:00:54'),
(17, 5, 'Responsive', 6, '2026-04-05 03:01:02', '2026-04-05 03:01:02'),
(18, 4, 'Pengenalan JavaScript', 1, '2026-04-05 03:01:42', '2026-04-05 03:01:42'),
(19, 4, 'Variabel', 2, '2026-04-05 03:01:53', '2026-04-05 03:01:53'),
(20, 4, 'Tipe Data', 3, '2026-04-05 03:02:17', '2026-04-05 03:02:17'),
(21, 4, 'Operator dan Kondisi', 4, '2026-04-05 03:02:38', '2026-04-05 03:02:38'),
(22, 4, 'Function', 5, '2026-04-05 03:02:56', '2026-04-05 03:02:56'),
(23, 4, 'DOM', 6, '2026-04-05 03:03:07', '2026-04-05 03:03:07'),
(24, 4, 'Event', 7, '2026-04-05 03:03:15', '2026-04-05 03:03:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AWKxl0GYcXWddiqSq50TwjUs5G7NiUpx2SzSRxR8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJJc3hjZng1cTd3eTVsblo1WFdLNFFsQVV4c2hyaUVmYUpubmdhZUx1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJsYW5kaW5nIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776905179),
('bvFuYsXD7LbfA4KFctph2IfSWVtm9Vne4bXZzBLC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJlQWJYRE91VlM1cjNna1NhYnZ2QXY3VlN6Vlpia2xKY2M1VDVEdENZIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJsYW5kaW5nIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776817620),
('NtJkfSU5cMGQrb8p9jh0U1HpHEVn4w3OgAggvk52', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJqYktoOTYyU0tQQmdKdWZHcUdYVFFQUWRYWGF5dHlzMHR4d1Bld25PIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NvdXJzZXNcL2dpdGh1Yi02OWQyMjc5MDU5ZGJiXC9jZXJ0aWZpY2F0ZSIsInJvdXRlIjoiY2VydGlmaWNhdGVzLnNob3cifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9', 1776675793),
('x1NLJcy5KKPHqxbIMZnoBxJctXieLVBUsELX31Dk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJNbmZVSGZiaHhHSGRUWHQxTFBQVzFHTHJRNDFDQmRWREluSlJweHhwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9jb3Vyc2VzIiwicm91dGUiOiJjb3Vyc2VzLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1776920537);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','instructor','student') NOT NULL DEFAULT 'student',
  `points` int(11) NOT NULL DEFAULT 0,
  `current_streak` int(11) NOT NULL DEFAULT 0,
  `longest_streak` int(11) NOT NULL DEFAULT 0,
  `last_activity_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`, `role`, `points`, `current_streak`, `longest_streak`, `last_activity_date`) VALUES
(1, 'Admin System', 'admin@example.com', '2026-03-28 14:15:06', '$2y$12$ukx8qoWJmM4rNQ6HNMlmmeySXubsifUc/1xrwdd79C2m8EEqNkKS2', NULL, NULL, '2026-03-28 14:07:09', '2026-04-20 01:43:47', 'admin', 20, 2, 3, '2026-04-20 01:43:47'),
(2, 'Student Test', 'student@example.com', '2026-03-28 14:15:06', '$2y$12$gfkue8QkH9.Pcc7rZsyw1eatq0nY60AnaobSno/PxSwq/5D5b/K3y', 'avatars/1nKKLQnLh2rVHEI1yP3nydLmyDk07lEpozLcmIkr.jpg', NULL, '2026-03-28 14:07:09', '2026-04-20 01:20:14', 'student', 0, 2, 2, '2026-04-20 01:20:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_activities`
--

CREATE TABLE `user_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `points_earned` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_activities`
--

INSERT INTO `user_activities` (`id`, `user_id`, `date`, `points_earned`, `created_at`, `updated_at`) VALUES
(1, 1, '2026-04-01', 20, '2026-03-31 22:45:47', '2026-03-31 22:45:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_progress`
--

CREATE TABLE `user_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_progress`
--

INSERT INTO `user_progress` (`id`, `user_id`, `lesson_id`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-03-31 22:45:47', '2026-03-31 22:45:47', '2026-03-31 22:45:47'),
(2, 1, 2, '2026-03-31 22:45:54', '2026-03-31 22:45:54', '2026-03-31 22:45:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_lesson_id_foreign` (`lesson_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_slug_unique` (`slug`);

--
-- Indeks untuk tabel `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollments_user_id_foreign` (`user_id`),
  ADD KEY `enrollments_course_id_foreign` (`course_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_module_id_foreign` (`module_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modules_course_id_foreign` (`course_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_activities_user_id_date_unique` (`user_id`,`date`);

--
-- Indeks untuk tabel `user_progress`
--
ALTER TABLE `user_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_progress_user_id_foreign` (`user_id`),
  ADD KEY `user_progress_lesson_id_foreign` (`lesson_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_progress`
--
ALTER TABLE `user_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_activities`
--
ALTER TABLE `user_activities`
  ADD CONSTRAINT `user_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_progress`
--
ALTER TABLE `user_progress`
  ADD CONSTRAINT `user_progress_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
