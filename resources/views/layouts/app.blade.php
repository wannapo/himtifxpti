<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
        <title>{{ config('app.name', 'Sinauin') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800,900&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="font-sans antialiased text-slate-900">
        {{-- 
            Ubah bg-gray-100 menjadi dinamis. 
            Jika di Landing Page atau About Hero, kita ingin warna putih/biru yang bersih.
        --}}
        <div class="min-h-screen bg-white">
            {{-- Navigasi Utama (Terpusat) --}}
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white border-b border-gray-100">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-black text-2xl text-slate-800 leading-tight tracking-tight">
                            {{ $header }}
                        </h2>
=======
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @auth
                @include('layouts.navigation')
            @else
                {{-- Public navbar for guest users --}}
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
                                <a href="{{ route('login') }}" class="text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors">Masuk</a>
                                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm">Daftar Gratis</a>
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
                            <a href="{{ route('login') }}" class="block px-3 py-2 text-sm font-medium text-blue-600">Masuk</a>
                            <a href="{{ route('register') }}" class="block px-3 py-2 bg-blue-600 text-white rounded-md text-sm font-semibold text-center">Daftar Gratis</a>
                        </div>
                    </div>
                </nav>
            @endauth

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
<<<<<<< HEAD

            {{-- Footer Sederhana untuk Keseragaman --}}
            <footer class="bg-slate-50 border-t border-gray-100 py-10">
                <div class="max-w-7xl mx-auto px-4 text-center">
                    <p class="text-slate-500 text-sm font-medium">
                        &copy; {{ date('Y') }} Sinau<span class="text-red-600">in</span> — Kolaborasi HIMTIF & HIMA PTI.
                    </p>
                </div>
            </footer>
        </div>

        {{-- Modal Gamifikasi (Tantangan Selesai) --}}
        @if(session('challenge_completed'))
            <div x-data="{ showModal: true }" 
                 x-show="showModal" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-cloak
                 class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-900/80 backdrop-blur-sm p-4">
                
                <div @click.away="showModal = false" 
                     class="bg-white border-4 border-slate-900 w-full max-w-md p-8 shadow-[8px_8px_0px_0px_rgba(15,23,42,1)] transform transition-all">
                    
                    <div class="text-center">
                        {{-- Icon Success dengan gaya Bold --}}
                        <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-2xl bg-green-100 mb-6 border-4 border-green-600 shadow-[4px_4px_0px_0px_rgba(22,101,52,1)]">
                            <svg class="h-12 w-12 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>

                        <h3 class="text-3xl leading-tight font-black text-slate-900 mb-4 tracking-tighter uppercase">
                            Tantangan Selesai!
                        </h3>

                        <div class="mt-4 space-y-3 bg-slate-50 p-4 rounded-xl border-2 border-slate-100">
                            <p class="text-lg font-bold text-slate-700">Poin Didapat: 
                                <span class="text-yellow-600 font-black tracking-wide">+{{ session('points_earned', 0) }} 🌟</span>
                            </p>
                            <p class="text-lg font-bold text-slate-700">Streak Saat Ini: 
                                <span class="text-orange-600 font-black tracking-wide">🔥 {{ session('current_streak', 0) }} Hari</span>
                            </p>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button @click="showModal = false" type="button" 
                                class="w-full inline-flex justify-center border-4 border-slate-900 px-6 py-4 bg-blue-600 text-lg font-black text-white hover:bg-blue-700 hover:shadow-[4px_4px_0px_0px_rgba(15,23,42,1)] transition-all uppercase tracking-widest active:scale-95">
                            Lanjutkan Belajar &rarr;
=======
        </div>

        @if(session('challenge_completed'))
            <div x-data="{ showModal: true }" 
                 x-show="showModal" 
                 x-cloak
                 class="fixed inset-0 z-[100] flex items-center justify-center bg-black bg-opacity-75 p-4 sm:p-0">
                <div @click.away="showModal = false" class="bg-white border-4 border-gray-900 w-full max-w-md p-8 shadow-[8px_8px_0px_0px_rgba(31,41,55,1)] transform transition-all">
                    <div class="text-center">
                        <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-100 mb-6 border-4 border-green-700">
                            <svg class="h-12 w-12 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <h3 class="text-3xl leading-tight font-black font-mono text-gray-900 mb-6">
                            Tantangan Selesai!
                        </h3>
                        <div class="mt-4 space-y-2">
                            <p class="text-xl text-gray-700">Poin Didapat: <span class="font-black text-yellow-600">+{{ session('points_earned', 0) }}🌟</span></p>
                            <p class="text-xl text-gray-700">Streak Saat Ini: <span class="font-black text-orange-600">🔥 {{ session('current_streak', 0) }} Hari</span></p>
                        </div>
                    </div>
                    <div class="mt-10">
                        <button @click="showModal = false" type="button" class="w-full inline-flex justify-center border-2 border-gray-900 px-6 py-4 bg-[#0a0a23] text-lg font-bold text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-400 transition-colors uppercase">
                            Pertahankan Prestasimu &rarr;
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
