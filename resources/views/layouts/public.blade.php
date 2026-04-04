<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'LMSColab - Platform Belajar Coding Kolaboratif' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-slate-800">

        <!-- ==================== NAVBAR ==================== -->
        <nav x-data="{ mobileOpen: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <a href="{{ route('landing') }}" class="flex items-center space-x-2 group">
                        <div class="w-8 h-8 bg-blue-600 rounded-md flex items-center justify-center text-white font-bold group-hover:bg-blue-700 transition-colors">L</div>
                        <span class="font-bold text-xl text-slate-800 tracking-tight">LMS<span class="text-blue-600">Colab</span></span>
                    </a>
                    <div class="hidden sm:flex items-center space-x-6">
                        <a href="{{ route('landing') }}" class="text-sm font-medium {{ request()->routeIs('landing') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' }} transition-colors">Beranda</a>
                        <a href="{{ route('courses.index') }}" class="text-sm font-medium {{ request()->routeIs('courses.*') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' }} transition-colors">Kursus</a>
                        <a href="{{ route('about') }}" class="text-sm font-medium {{ request()->routeIs('about') ? 'text-blue-600' : 'text-gray-500 hover:text-blue-600' }} transition-colors">Tentang</a>
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-500 hover:text-blue-600 transition-colors">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors">Masuk</a>
                            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm">Daftar Gratis</a>
                        @endauth
                    </div>
                    <!-- Mobile Burger -->
                    <button @click="mobileOpen = !mobileOpen" class="sm:hidden p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
                <!-- Mobile Menu -->
                <div x-show="mobileOpen" x-cloak class="sm:hidden pb-4 space-y-2">
                    <a href="{{ route('landing') }}" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:bg-blue-50 rounded-md">Beranda</a>
                    <a href="{{ route('courses.index') }}" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:bg-blue-50 rounded-md">Kursus</a>
                    <a href="{{ route('about') }}" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:bg-blue-50 rounded-md">Tentang</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-sm font-medium text-blue-600">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 text-sm font-medium text-blue-600">Masuk</a>
                        <a href="{{ route('register') }}" class="block px-3 py-2 bg-blue-600 text-white rounded-md text-sm font-semibold text-center">Daftar Gratis</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- ==================== FOOTER ==================== -->
        <footer class="bg-slate-900 text-gray-400 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <div class="md:col-span-2">
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-8 h-8 bg-blue-600 rounded-md flex items-center justify-center text-white font-bold">L</div>
                            <span class="font-bold text-xl text-white tracking-tight">LMS<span class="text-blue-400">Colab</span></span>
                        </div>
                        <p class="text-sm leading-relaxed max-w-sm">
                            Platform pembelajaran coding kolaboratif yang dibangun oleh mahasiswa untuk mahasiswa. Proyek kolaborasi HIMTIF &amp; HIMA PTI.
                        </p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white text-sm mb-3">Platform</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('courses.index') }}" class="hover:text-white transition-colors">Katalog Kursus</a></li>
                            @auth
                                <li><a href="{{ route('dashboard') }}" class="hover:text-white transition-colors">Dashboard</a></li>
                            @else
                                <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">Masuk</a></li>
                                <li><a href="{{ route('register') }}" class="hover:text-white transition-colors">Daftar</a></li>
                            @endauth
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white text-sm mb-3">Tentang</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">Tentang Kami</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">HIMTIF</a></li>
                            <li><a href="#" class="hover:text-white transition-colors">HIMA PTI</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm">
                    <p>&copy; {{ date('Y') }} LMSColab. Kolaborasi HIMTIF &amp; HIMA PTI. Seluruh hak cipta dilindungi.</p>
                </div>
            </div>
        </footer>

    </body>
</html>
