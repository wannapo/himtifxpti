<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
<<<<<<< HEAD
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Perbarui informasi profil akun dan alamat email Anda.") }}
=======
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

<<<<<<< HEAD
    {{-- CRITICAL: Pastikan ada enctype="multipart/form-data" supaya file bisa terkirim --}}
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
=======
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
        @csrf
        @method('patch')

        <div>
<<<<<<< HEAD
            <x-input-label for="avatar" :value="__('Foto Profil')" />
            
            <div class="mt-2 mb-4 flex items-center gap-4">
                {{-- Preview Foto --}}
                <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center overflow-hidden border border-gray-200 shadow-sm">
                    @if($user->avatar)
                        {{-- Menampilkan foto dari storage --}}
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                    @else
                        {{-- Fallback ke inisial jika foto belum ada --}}
                        <span class="text-2xl font-bold text-gray-400">{{ strtoupper(substr($user->name ?? 'G', 0, 1)) }}</span>
                    @endif
                </div>
                
                {{-- Input File --}}
                <div class="flex-1">
                    <input id="avatar" name="avatar" type="file" class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100 transition" 
                        accept="image/*"
                    />
                    <p class="mt-1 text-xs text-gray-500 italic">Klik untuk memilih foto (Format: JPG, PNG, GIF)</p>
                </div>
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
=======
            <x-input-label for="name" :value="__('Name')" />
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
<<<<<<< HEAD
            <x-input-label for="email" :value="__('Alamat Email')" />
=======
            <x-input-label for="email" :value="__('Email')" />
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
<<<<<<< HEAD
                        {{ __('Email Anda belum diverifikasi.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
=======
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            {{ __('Click here to re-send the verification email.') }}
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent' || session('verificationLinkSent'))
                        <p class="mt-2 font-medium text-sm text-green-600">
<<<<<<< HEAD
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
=======
                            {{ __('A new verification link has been sent to your email address.') }}
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
<<<<<<< HEAD
            <x-primary-button>{{ __('Simpan Perubahan') }}</x-primary-button>
=======
            <x-primary-button>{{ __('Save') }}</x-primary-button>
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
<<<<<<< HEAD
                    class="text-sm text-gray-600 font-medium"
                >{{ __('Berhasil Disimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
=======
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
