<x-guest-layout>
<<<<<<< HEAD
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-blue-900">Buat Akun Baru</h2>
        <p class="text-gray-500 text-sm mt-1">Gabung sekarang dan mulai belajar coding!</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        {{-- ═══════════════════════════════════════════════════════
             ANTI-BOT FIELDS — JANGAN DIHAPUS
            ═══════════════════════════════════════════════════════ --}}
=======
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{--
            ═══════════════════════════════════════════════════════
             ANTI-BOT FIELDS — JANGAN DIHAPUS
             Bidang-bidang ini tidak terlihat oleh pengguna normal
             dan digunakan untuk mendeteksi bot.
            ═══════════════════════════════════════════════════════
        --}}

        {{-- HONEYPOT: Disembunyikan via CSS. Bot biasanya mengisi semua field;
             manusia tidak akan melihat / mengisi field ini. --}}
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
        <div style="position:absolute; left:-9999px; top:-9999px;" aria-hidden="true" tabindex="-1">
            <label for="website">Leave this empty</label>
            <input type="text" id="website" name="website" value="" tabindex="-1" autocomplete="off">
        </div>
<<<<<<< HEAD
        <input type="hidden" name="form_start_time" id="form_start_time" value="">

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-blue-900 font-semibold ml-1" />
            <x-text-input id="name" class="block mt-1.5 w-full bg-gray-50 border-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-2xl py-3 px-4 shadow-sm text-base transition-all" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-blue-900 font-semibold ml-1" />
            <x-text-input id="email" class="block mt-1.5 w-full bg-gray-50 border-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-2xl py-3 px-4 shadow-sm text-base transition-all" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" class="text-blue-900 font-semibold ml-1" />
            <x-text-input id="password" class="block mt-1.5 w-full bg-gray-50 border-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-2xl py-3 px-4 shadow-sm text-base transition-all" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-blue-900 font-semibold ml-1" />
            <x-text-input id="password_confirmation" class="block mt-1.5 w-full bg-gray-50 border-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-2xl py-3 px-4 shadow-sm text-base transition-all" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full py-4 bg-[#facc15] hover:bg-[#eab308] text-blue-950 font-black text-sm uppercase tracking-widest rounded-2xl shadow-[0_4px_20px_rgba(250,204,21,0.4)] hover:shadow-none transform active:scale-95 transition-all duration-200">
                DAFTAR SEKARANG
            </button>
        </div>

        <div class="text-center pt-2">
            <p class="text-sm text-gray-500 font-medium">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-blue-700 hover:text-blue-900 font-bold underline decoration-2 underline-offset-4 transition-all">
                    Masuk di sini
                </a>
            </p>
        </div>
    </form>

    {{-- Script Anti-Bot --}}
    <script>
        document.getElementById('form_start_time').value = Math.floor(Date.now() / 1000);
    </script>
</x-guest-layout>
=======

        {{-- TIME-BASED: Diisi oleh JavaScript dengan waktu halaman dibuka.
             Controller akan memeriksa apakah submit terlalu cepat (< 3 detik). --}}
        <input type="hidden" name="form_start_time" id="form_start_time" value="">

        {{-- Name --}}
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        {{-- Email Address --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Password --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Confirm Password --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    {{-- Isi form_start_time dengan Unix timestamp saat halaman dimuat --}}
    <script>
        document.getElementById('form_start_time').value = Math.floor(Date.now() / 1000);
    </script>
</x-guest-layout>

>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
