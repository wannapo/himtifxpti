<x-guest-layout>
<<<<<<< HEAD
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-blue-900">Selamat Datang!</h2>
        <p class="text-gray-500 text-sm mt-1">Silakan masuk ke akun Sinauin kamu</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-blue-900 font-semibold ml-1" />
            <x-text-input id="email" class="block mt-1.5 w-full bg-gray-50 border-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-2xl py-3 px-4 shadow-sm text-base transition-all" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" class="text-blue-900 font-semibold ml-1" />
            <x-text-input id="password" class="block mt-1.5 w-full bg-gray-50 border-gray-200 focus:border-blue-500 focus:ring-blue-500 rounded-2xl py-3 px-4 shadow-sm text-base transition-all" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between text-xs sm:text-sm px-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded-md border-gray-300 text-blue-600 focus:ring-blue-500" name="remember">
                <span class="ms-2 text-gray-600 font-medium italic">{{ __('Ingat saya') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-blue-600 hover:text-blue-800 font-semibold transition-colors" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full py-4 bg-[#facc15] hover:bg-[#eab308] text-blue-950 font-black text-sm uppercase tracking-widest rounded-2xl shadow-[0_4px_20px_rgba(250,204,21,0.4)] hover:shadow-none transform active:scale-95 transition-all duration-200">
                MASUK SEKARANG
            </button>
        </div>

        <div class="text-center pt-2">
            <p class="text-sm text-gray-500 font-medium">
                Belum bergabung? 
                <a href="{{ route('register') }}" class="text-blue-700 hover:text-blue-900 font-bold underline decoration-2 underline-offset-4 transition-all">
                    Daftar di sini
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
=======
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            <div class="text-sm text-gray-600">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-700 underline focus:outline-none">
                    Daftar di sini
                </a>
            </div>

            <div class="flex items-center">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif

                <x-primary-button class="ms-4 bg-blue-600 hover:bg-blue-700">
                    Masuk
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
