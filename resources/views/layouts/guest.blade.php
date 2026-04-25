<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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