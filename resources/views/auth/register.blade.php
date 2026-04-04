<x-guest-layout>
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
        <div style="position:absolute; left:-9999px; top:-9999px;" aria-hidden="true" tabindex="-1">
            <label for="website">Leave this empty</label>
            <input type="text" id="website" name="website" value="" tabindex="-1" autocomplete="off">
        </div>

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

