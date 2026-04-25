<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-blue-900">Buat Akun Baru</h2>
        <p class="text-gray-500 text-sm mt-1">Gabung sekarang dan mulai belajar coding!</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        {{-- ═══════════════════════════════════════════════════════
             ANTI-BOT FIELDS — JANGAN DIHAPUS
            ═══════════════════════════════════════════════════════ --}}
        <div style="position:absolute; left:-9999px; top:-9999px;" aria-hidden="true" tabindex="-1">
            <label for="website">Leave this empty</label>
            <input type="text" id="website" name="website" value="" tabindex="-1" autocomplete="off">
        </div>
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