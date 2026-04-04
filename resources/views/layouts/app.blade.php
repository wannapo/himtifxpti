<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
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
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </body>
</html>
