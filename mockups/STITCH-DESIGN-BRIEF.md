# LMSColab — Design Brief & Google Stitch Prompts
# ================================================
# Gunakan dokumen ini sebagai panduan saat menggunakan Google Stitch
# untuk improvisasi desain halaman-halaman LMS.
#
# CARA PAKAI:
# 1. Buka mockup HTML di browser → screenshot halaman
# 2. Buka Google Stitch (stitch.google.com)
# 3. Upload screenshot + copy-paste prompt dari dokumen ini
# 4. Stitch akan generate desain baru
# 5. Export hasilnya → share ke Copilot untuk diterapkan


# ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
# 🎨 IDENTITAS VISUAL SAAT INI
# ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
#
# Brand       : LMSColab
# Font        : Figtree (Google Fonts)
# Primary     : Red-600 (#dc2626) — tombol, aksen, logo
# Secondary   : Slate-800 (#1e293b) — teks heading
# Background  : Gray-100, Slate-50, White
# Accent      : Yellow-600 (streak/gamification), Green-500 (progress)
# Style       : Clean, minimal, freeCodeCamp-inspired
# Framework   : Tailwind CSS + Alpine.js
# Bahasa UI   : Indonesia


# ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
# 📄 HALAMAN & STITCH PROMPTS
# ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━


# ─────────────────────────────────────────────────
# 1. LOGIN (login.html)
# ─────────────────────────────────────────────────
# Screenshot: Buka login.html di browser → full-page screenshot
#
# Deskripsi:
#   Halaman login sederhana, centered card di atas background abu-abu.
#   Input email + password, tombol "Masuk" merah, link daftar.
#
# Pain Points:
#   - Terlalu polos/generic, tidak punya karakter brand
#   - Tidak ada ilustrasi atau visual yang menarik
#   - Kurang welcoming untuk user baru
#
# STITCH PROMPT:
# ┌──────────────────────────────────────────────┐

Redesign this login page for a coding education platform called "LMSColab".
Keep the form fields (email, password, remember me, login button).
Add a visually engaging left panel or background illustration related to coding/learning.
Use a modern split-screen layout: left side = branding/illustration, right side = login form.
Color scheme: primary red (#dc2626), dark slate (#1e293b), white backgrounds.
Font: Figtree. Make it feel professional, motivating, and modern.
Include the LMSColab logo (red square with "L" + text "LMSColab").
Mobile responsive — on mobile the illustration collapses above the form.

# └──────────────────────────────────────────────┘


# ─────────────────────────────────────────────────
# 2. DASHBOARD (dashboard.html)
# ─────────────────────────────────────────────────
# Screenshot: Buka dashboard.html di browser → full-page screenshot
#
# Deskripsi:
#   Student dashboard dengan: profil user (nama, avatar initial, join date),
#   3 stat cards (Total Poin, Streak, Longest Streak),
#   activity heatmap (GitHub-style), dan enrolled courses grid.
#
# Pain Points:
#   - Heatmap kurang informatif (tidak ada label bulan/hari)
#   - Stat cards bisa lebih visual (icon, micro-animation)
#   - Course cards tidak menunjukkan thumbnail/gambar
#   - Tidak ada motivational element (daily goal, next lesson suggestion)
#
# STITCH PROMPT:
# ┌──────────────────────────────────────────────┐

Redesign this student dashboard for a coding LMS platform.
Current layout: profile header with avatar + stats, GitHub-style heatmap, enrolled courses grid.

Improvements needed:
1. Add a "Welcome back" hero section with a motivational message and quick-action button "Continue Learning"
2. Make stat cards (Points, Streak, Longest Streak) more visual with icons and subtle gradients
3. Improve the heatmap: add month labels on top, day labels on left (Mon/Wed/Fri)
4. Course cards should show a small colored icon/thumbnail, progress bar, and "Continue" button
5. Add a sidebar or section for "Today's Goal" or "Daily Challenge"

Color scheme: red (#dc2626) primary, yellow (#ca8a04) for gamification, green (#22c55e) for progress, slate for text.
Font: Figtree. Style: clean, data-rich but not cluttered. Inspired by GitHub profile + freeCodeCamp dashboard.
Keep the navbar with LMSColab logo at top.

# └──────────────────────────────────────────────┘


# ─────────────────────────────────────────────────
# 3. KATALOG KURSUS (courses.html)
# ─────────────────────────────────────────────────
# Screenshot: Buka courses.html di browser → full-page screenshot
#
# Deskripsi:
#   Hero section dengan judul + search bar, lalu daftar kursus
#   dalam format list (bukan grid). Setiap item: thumbnail, judul,
#   deskripsi singkat, hover "Buka Kelas →".
#
# Pain Points:
#   - List layout monoton untuk 5+ kursus
#   - Tidak ada filter/kategori
#   - Tidak menunjukkan jumlah modul/lesson per kursus
#   - Tidak ada badge "Popular" atau "New"
#
# STITCH PROMPT:
# ┌──────────────────────────────────────────────┐

Redesign this course catalog page for a coding education platform.
Current layout: hero with search bar + vertical list of courses.

Improvements needed:
1. Keep the hero section but make it more dynamic (add subtle pattern or gradient background)
2. Add filter chips/tabs below search: "Semua", "Web Development", "Backend", "Database"
3. Switch from list to responsive card grid (2-3 columns on desktop, 1 on mobile)
4. Each course card should have: colored header/banner area, course icon, title, short description, module count badge (e.g. "5 Modul"), and difficulty level tag
5. Add "Popular" or "Baru" badges on some cards
6. Keep the "Buka Kelas →" CTA on hover

Color scheme: red (#dc2626) primary, slate text, white cards with subtle shadows.
Font: Figtree. Modern, browsable feel like Coursera or freeCodeCamp catalog.

# └──────────────────────────────────────────────┘


# ─────────────────────────────────────────────────
# 4. DETAIL KURSUS (course-detail.html)
# ─────────────────────────────────────────────────
# Screenshot: Buka course-detail.html di browser → full-page screenshot
#
# Deskripsi:
#   Dark hero header (judul, deskripsi, tombol "Lanjut Belajar", progress bar),
#   lalu accordion per modul, tiap modul berisi grid lesson tiles.
#   Completed lesson = green checkmark, belum = angka abu-abu.
#
# Pain Points:
#   - Hero section terlalu gelap/berat
#   - Lesson tiles terlalu kecil, sulit dibaca di mobile
#   - Tidak ada overview (total lessons, estimated time)
#   - Accordion collapsed by default — user harus klik satu-satu
#
# STITCH PROMPT:
# ┌──────────────────────────────────────────────┐

Redesign this course detail/curriculum page for a coding LMS.
Current layout: dark hero header + accordion modules with lesson tile grids.

Improvements needed:
1. Lighten the hero section — use a gradient (slate-800 to slate-900) with course icon/illustration
2. Add course stats below title: "15 Lessons • 3 Modules • ~4 jam belajar"
3. Show overall progress more prominently (circular progress or large progress bar)
4. Module sections should be open by default (or at least the current module)
5. Lesson tiles: make them larger with better readability, show lesson type icon (📖 text, 💻 coding, 🎥 video)
6. Add a sticky sidebar on desktop showing course outline / quick navigation
7. Completed lessons should feel more rewarding (checkmark + green glow/border)

Color scheme: slate-900 hero, red (#dc2626) CTA, green (#22c55e) completed, white content area.
Font: Figtree. Feel: structured, progressive, like a certification roadmap.

# └──────────────────────────────────────────────┘


# ─────────────────────────────────────────────────
# 5. HALAMAN LESSON (lesson.html)
# ─────────────────────────────────────────────────
# Screenshot: Buka lesson.html di browser → full-page screenshot
#
# Deskripsi:
#   3-column layout: (1) materi bacaan, (2) code editor dengan tabs
#   HTML/CSS/JS, (3) live preview + quiz + komentar.
#   Breadcrumb sticky di atas.
#
# Pain Points:
#   - Panel bacaan terlalu sempit (3/12) untuk konten panjang
#   - Code editor terlalu basic (plain textarea, no line numbers)
#   - Quiz section dan komentar terlalu cramped di panel kanan
#   - Tidak ada navigasi prev/next lesson
#
# STITCH PROMPT:
# ┌──────────────────────────────────────────────┐

Redesign this coding lesson page with a 3-panel layout for an LMS platform.
Current: left=reading content, center=code editor (HTML/CSS/JS tabs), right=live preview + quiz + comments.

Improvements needed:
1. Top bar: add prev/next lesson navigation arrows alongside the breadcrumb
2. Left panel (content): slightly wider, better typography, collapsible on mobile
3. Center panel (code editor): add line numbers gutter, better tab design, add a "Reset Code" button
4. Right panel top (preview): add a refresh button and "Open in new tab" option
5. Right panel bottom (quiz): cleaner card design, bigger radio buttons, more celebration on correct answer (confetti or animation hint)
6. Comments section: more compact, show reply button
7. Add a bottom action bar with "Mark Complete" button that's always visible
8. Make panels resizable or add collapse/expand toggles

Color scheme: dark editor (#1e1e1e), white content panel, slate-50 quiz area, red (#dc2626) accents.
Font: Figtree for UI, monospace for code. Feel: IDE-like, focused, productive. Inspired by freeCodeCamp lesson + CodePen layout.

# └──────────────────────────────────────────────┘


# ─────────────────────────────────────────────────
# 6. KELOLA KURSUS — INSTRUKTUR (instructor.html)
# ─────────────────────────────────────────────────
# Screenshot: Buka instructor.html di browser → full-page screenshot
#
# Deskripsi:
#   Tabel CRUD kursus: kolom Gambar, Judul, Status (Published/Draft),
#   Aksi (Kelola Materi, Edit, Hapus). Tombol "+ Buat Kursus Baru".
#
# Pain Points:
#   - Tabel terlalu plain, tidak ada visual hierarchy
#   - Status badge terlalu kecil
#   - Tidak ada statistik ringkas (jumlah enrolled, total lessons)
#   - Tidak ada search/filter
#
# STITCH PROMPT:
# ┌──────────────────────────────────────────────┐

Redesign this instructor course management dashboard for an LMS admin panel.
Current layout: simple table with columns for image, title, status, and action buttons.

Improvements needed:
1. Add summary stat cards at top: "Total Kursus: 5", "Published: 3", "Draft: 2", "Total Siswa Enrolled: 128"
2. Add a search bar and filter dropdown (by status: All/Published/Draft)
3. Improve table design: zebra striping, larger thumbnail, bold title, status as colored pill badge
4. Add columns: "Jumlah Modul", "Enrolled" (student count)
5. Action buttons as icon buttons with tooltips instead of plain text links
6. Consider card-based layout as an alternative view toggle (table/grid switch)
7. "Buat Kursus Baru" button should be more prominent (larger, with plus icon)

Color scheme: white bg, blue (#2563eb) for primary actions, red for delete, green/yellow for status badges.
Font: Figtree. Feel: clean admin panel, like Laravel Nova or Filament dashboard.

# └──────────────────────────────────────────────┘


# ─────────────────────────────────────────────────
# 7. KELOLA AKUN — ADMIN (admin-users.html)
# ─────────────────────────────────────────────────
# Screenshot: Buka admin-users.html di browser → full-page screenshot
#
# Deskripsi:
#   Tabel user management: Nama, Email, Role (admin/instructor/student),
#   Tanggal Daftar, Aksi (Edit, Hapus). Tombol "+ Tambah Akun".
#
# Pain Points:
#   - Tabel generic, tidak ada avatar/initial
#   - Tidak ada search atau role filter
#   - Tidak ada pagination untuk banyak user
#   - Role badge bisa lebih menonjol
#
# STITCH PROMPT:
# ┌──────────────────────────────────────────────┐

Redesign this user management page for an LMS admin panel.
Current layout: plain table with name, email, role badge, registration date, edit/delete actions.

Improvements needed:
1. Add summary cards at top: "Total Users: 7", "Admin: 1", "Instructors: 2", "Students: 4"
2. Add search bar + role filter tabs (All / Admin / Instructor / Student)
3. Each row should have a user avatar (circle with initial letter, colored by role)
4. Role badges should be larger and more distinct (red=admin, purple=instructor, green=student)
5. Add "Last Active" column or indicator (green dot = online)
6. Action buttons as clean icon buttons (pencil for edit, trash for delete)
7. Add pagination bar at bottom
8. Add bulk selection checkboxes for batch actions

Color scheme: white bg, subtle gray rows, role colors (red/purple/green), blue for actions.
Font: Figtree. Feel: modern admin panel, clean data table. Inspired by Tailwind UI admin templates.

# └──────────────────────────────────────────────┘


# ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
# 🔄 WORKFLOW SETELAH STITCH
# ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
#
# 1. Screenshot mockup HTML → upload ke Stitch + paste prompt di atas
# 2. Stitch generate desain baru
# 3. Export dari Stitch (HTML/CSS atau screenshot)
# 4. Share ke Copilot dengan pesan:
#    "Terapkan desain Stitch ini ke [nama halaman].html"
#    atau
#    "Terapkan desain Stitch ini ke Blade template asli"
# 5. Copilot akan:
#    - Jika kode HTML → langsung update file mockup/Blade
#    - Jika screenshot → replika visual ke kode
#    - Menjaga konsistensi antar halaman (navbar, footer, warna)
#
# TIPS:
# - Proses satu halaman pada satu waktu agar hasilnya fokus
# - Mulai dari halaman yang paling sering dilihat user (courses → lesson → dashboard)
# - Setelah semua mockup disetujui, baru terapkan ke Blade template asli
