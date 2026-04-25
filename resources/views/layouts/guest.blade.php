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
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8 bg-gradient-to-br from-[#1e40af] via-[#1d4ed8] to-[#2563eb]">
            
            <div class="mb-6 transform transition hover:scale-105 duration-300">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" class="w-28 sm:w-36 h-auto drop-shadow-lg" alt="Logo Sinauin">
                </a>
            </div>

            <div class="w-full sm:max-w-md bg-white/95 backdrop-blur-sm px-6 py-10 sm:px-10 shadow-2xl rounded-3xl border border-white/20">
                {{ $slot }}
            </div>
            
            <p class="mt-8 text-blue-100 text-xs sm:text-sm font-medium opacity-80">
                &copy; {{ date('Y') }} Sinauin - Belajar Coding Interaktif
            </p>
        </div>
    </body>
</html>
=======
        <title>{{ config('app.name', 'LMSColab') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-50 to-slate-100">
            <div>
                <a href="{{ route('landing') }}" class="flex items-center space-x-2 group">
                    <div class="w-10 h-10 bg-blue-600 rounded-md flex items-center justify-center text-white font-bold text-lg group-hover:bg-blue-700 transition-colors">L</div>
                    <span class="font-bold text-2xl text-slate-800 tracking-tight">LMS<span class="text-blue-600">Colab</span></span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
