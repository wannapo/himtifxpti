<x-public-layout>
    <x-slot name="title">LMSColab - Platform Belajar Coding Kolaboratif</x-slot>

    <!-- ==================== HERO ==================== -->
    <section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 overflow-hidden">
        <!-- Decorative shapes -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-72 h-72 bg-yellow-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-blue-400 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <span class="inline-block bg-yellow-400 text-blue-900 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6">Kolaborasi HIMTIF &amp; HIMA PTI</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    Belajar Coding<br>
                    <span class="text-yellow-300">Interaktif &amp; Kolaboratif</span>
                </h1>
                <p class="text-lg md:text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
                    LMSColab adalah platform pembelajaran coding yang dirancang khusus untuk Siswa. Belajar melalui video, praktik langsung, dan modul interaktif semuanya gratis.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="bg-yellow-400 text-blue-900 px-8 py-4 rounded-xl font-bold text-lg hover:bg-yellow-300 transition-colors shadow-lg">
                        Mulai Belajar Sekarang
                    </a>
                    <a href="#about" class="border-2 border-white/30 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white/10 transition-colors">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
                <!-- Stats row -->
                <div class="mt-14 flex flex-wrap gap-8 justify-center text-white/90">
                    <div class="text-center">
                        <div class="text-3xl font-extrabold">{{ $stats['students'] }}+</div>
                        <div class="text-sm text-blue-200">Mahasiswa Aktif</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-extrabold">{{ $stats['courses'] }}+</div>
                        <div class="text-sm text-blue-200">Kursus Tersedia</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-extrabold">{{ $stats['lessons'] }}+</div>
                        <div class="text-sm text-blue-200">Lesson Interaktif</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== ABOUT WEBSITE ==================== -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Tentang Platform</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mt-2 mb-6">Apa Itu LMSColab?</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-4">
                        LMSColab adalah <strong>Learning Management System</strong> yang dibangun sebagai proyek kolaborasi antara <strong>HIMTIF</strong> (Himpunan Mahasiswa Teknik Informatika) dan <strong>HIMA PTI</strong> (Himpunan Mahasiswa Pendidikan Teknik Informatika).
                    </p>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Platform ini menyediakan lingkungan belajar coding yang terstruktur dan interaktif, dilengkapi dengan editor kode langsung, kuis, serta sistem gamifikasi untuk menjaga motivasi belajar.
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="flex -space-x-2">
                            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm border-2 border-white">H</div>
                            <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center text-white font-bold text-sm border-2 border-white">P</div>
                        </div>
                        <span class="text-sm text-gray-500">Kolaborasi antar himpunan mahasiswa</span>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 md:p-12">
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white text-xl shrink-0">📚</div>
                            <div>
                                <h3 class="font-bold text-slate-800 text-lg">Kurikulum Terstruktur</h3>
                                <p class="text-gray-600 text-sm mt-1">Materi disusun dari dasar hingga mahir dalam modul-modul yang sistematis</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center text-white text-xl shrink-0">💻</div>
                            <div>
                                <h3 class="font-bold text-slate-800 text-lg">Live Code Editor</h3>
                                <p class="text-gray-600 text-sm mt-1">Tulis dan jalankan kode langsung di browser tanpa install apapun</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white text-xl shrink-0">🏆</div>
                            <div>
                                <h3 class="font-bold text-slate-800 text-lg">Gamifikasi</h3>
                                <p class="text-gray-600 text-sm mt-1">Sistem poin, streak, dan leaderboard untuk menjaga motivasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== BENEFITS ==================== -->
    <section id="benefits" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Keunggulan</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mt-2 mb-4">Mengapa Belajar di LMSColab?</h2>
                <p class="text-gray-600 text-lg">Platform yang dirancang khusus untuk kebutuhan belajar mahasiswa informatika.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center text-2xl mb-5">🎓</div>
                    <h3 class="font-bold text-xl text-slate-800 mb-2">100% Gratis</h3>
                    <p class="text-gray-600">Semua materi dan fitur dapat diakses tanpa biaya. Dibuat oleh mahasiswa, untuk Siswa.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center text-2xl mb-5">⚡</div>
                    <h3 class="font-bold text-xl text-slate-800 mb-2">Praktik Langsung</h3>
                    <p class="text-gray-600">Tidak hanya teori — setiap lesson dilengkapi code editor untuk langsung praktik coding.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center text-2xl mb-5">📊</div>
                    <h3 class="font-bold text-xl text-slate-800 mb-2">Tracking Progress</h3>
                    <p class="text-gray-600">Lihat kemajuan belajar melalui dashboard yang menampilkan heatmap aktivitas dan statistik.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center text-2xl mb-5">🔥</div>
                    <h3 class="font-bold text-xl text-slate-800 mb-2">Streak &amp; Poin</h3>
                    <p class="text-gray-600">Sistem gamifikasi memotivasi belajar konsisten melalui daily streak dan leaderboard.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center text-2xl mb-5">💬</div>
                    <h3 class="font-bold text-xl text-slate-800 mb-2">Komentar &amp; Diskusi</h3>
                    <p class="text-gray-600">Bertanya dan berdiskusi dengan sesama mahasiswa langsung di setiap lesson.</p>
                </div>
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center text-2xl mb-5">📱</div>
                    <h3 class="font-bold text-xl text-slate-800 mb-2">Responsif</h3>
                    <p class="text-gray-600">Akses platform dari perangkat apapun — desktop, tablet, maupun smartphone.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== HOW IT WORKS ==================== -->
    <section id="how-it-works" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Cara Mulai</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mt-2 mb-4">Mulai Belajar dalam 3 Langkah</h2>
                <p class="text-gray-600 text-lg">Prosesnya mudah dan cepat. Kamu bisa langsung belajar hari ini.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-600 rounded-2xl flex items-center justify-center text-white text-3xl font-extrabold mx-auto mb-5 shadow-lg shadow-blue-600/30">1</div>
                    <h3 class="font-bold text-xl text-slate-800 mb-2">Daftar Akun</h3>
                    <p class="text-gray-600">Buat akun gratis dengan email kampusmu. Proses registrasi hanya butuh 1 menit.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-yellow-400 rounded-2xl flex items-center justify-center text-blue-900 text-3xl font-extrabold mx-auto mb-5 shadow-lg shadow-yellow-400/30">2</div>
                    <h3 class="font-bold text-xl text-slate-800 mb-2">Pilih Kursus</h3>
                    <p class="text-gray-600">Jelajahi katalog kursus dan pilih topik yang ingin kamu pelajari — HTML, CSS, JavaScript, dan lainnya.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-600 rounded-2xl flex items-center justify-center text-white text-3xl font-extrabold mx-auto mb-5 shadow-lg shadow-blue-600/30">3</div>
                    <h3 class="font-bold text-xl text-slate-800 mb-2">Mulai Belajar!</h3>
                    <p class="text-gray-600">Ikuti materi, praktik coding langsung di browser, kerjakan kuis, dan kumpulkan poin.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== LEARNING METHODS ==================== -->
    <section class="py-20 bg-gradient-to-br from-blue-600 to-blue-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-yellow-300 font-semibold text-sm uppercase tracking-wider">Metode Belajar</span>
                <h2 class="text-3xl md:text-4xl font-extrabold mt-2 mb-4">Belajar dengan Berbagai Cara</h2>
                <p class="text-blue-100 text-lg">Setiap lesson menggabungkan berbagai metode untuk pengalaman belajar optimal.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20 hover:bg-white/15 transition-colors">
                    <div class="text-4xl mb-4">🎬</div>
                    <h3 class="font-bold text-xl mb-2">Video Pembelajaran</h3>
                    <p class="text-blue-100 text-sm">Materi disampaikan melalui video penjelasan yang singkat dan mudah dipahami.</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20 hover:bg-white/15 transition-colors">
                    <div class="text-4xl mb-4">💻</div>
                    <h3 class="font-bold text-xl mb-2">Praktik Koding</h3>
                    <p class="text-blue-100 text-sm">Tulis kode langsung di live editor dan lihat hasilnya secara real-time di browser.</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20 hover:bg-white/15 transition-colors">
                    <div class="text-4xl mb-4">📖</div>
                    <h3 class="font-bold text-xl mb-2">Modul Interaktif</h3>
                    <p class="text-blue-100 text-sm">Bacaan terstruktur dilengkapi kuis untuk menguji pemahaman pada setiap lesson.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== COURSE PREVIEW ==================== -->
    <section id="courses" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Kursus Populer</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mt-2 mb-4">Mulai dari Kursus Ini</h2>
                <p class="text-gray-600 text-lg">Kursus paling diminati oleh mahasiswa. Semua gratis dan bisa langsung dimulai.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($courses as $course)
                    <a href="{{ route('courses.show', $course->slug) }}" class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow border border-gray-100 group block">
                        <div class="h-44 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                            @if($course->image)
                                <img src="{{ asset($course->image) }}" alt="{{ $course->title }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-6xl">📚</span>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg text-slate-800 mb-2 group-hover:text-blue-600 transition-colors">{{ $course->title }}</h3>
                            <p class="text-gray-500 text-sm mb-4">{{ Str::limit($course->description, 80) }}</p>
                            <div class="flex items-center justify-between text-sm text-gray-400">
                                <span>{{ $course->modules_count ?? $course->modules->count() }} Modul</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3 text-center py-12 text-gray-500">
                        <p class="text-lg">Kursus akan segera tersedia.</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-10">
                <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-8 py-3.5 rounded-xl font-semibold text-lg hover:bg-blue-700 transition-colors shadow-sm">
                    Lihat Semua Kursus
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ==================== CTA ==================== -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl p-12 md:p-16 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-400 rounded-full blur-3xl opacity-20 -translate-y-1/2 translate-x-1/3"></div>
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Siap Mulai Belajar Coding?</h2>
                    <p class="text-blue-100 text-lg mb-8 max-w-xl mx-auto">Bergabung dengan ratusan mahasiswa yang sudah meningkatkan skill coding mereka di LMSColab. Gratis selamanya.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('register') }}" class="bg-yellow-400 text-blue-900 px-8 py-4 rounded-xl font-bold text-lg hover:bg-yellow-300 transition-colors shadow-lg">
                            Daftar Sekarang - Gratis!
                        </a>
                        <a href="{{ route('about') }}" class="border-2 border-white/30 text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white/10 transition-colors">
                            Tentang Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-public-layout>
