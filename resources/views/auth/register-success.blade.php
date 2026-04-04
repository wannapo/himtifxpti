<x-guest-layout>
    <div class="text-center">
        <div class="mb-4">
            <svg class="mx-auto h-16 w-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
            </svg>
        </div>

        <h2 class="text-xl font-bold text-gray-800 mb-2">Pendaftaran Berhasil!</h2>

        <p class="text-sm text-gray-600 mb-6">
            Kami telah mengirimkan link verifikasi ke email Anda.
            Silakan cek inbox (atau folder spam) dan klik link tersebut untuk mengaktifkan akun Anda.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                Link verifikasi baru telah dikirim ke email Anda.
            </div>
        @endif

        <div class="bg-gray-50 rounded-lg p-4 mb-6">
            <p class="text-xs text-gray-500 mb-3">Tidak menerima email? Masukkan alamat email Anda untuk kirim ulang:</p>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="flex gap-2">
                    <x-text-input type="email" name="email" placeholder="email@contoh.com" class="flex-1 text-sm" required />
                    <x-primary-button class="text-xs bg-blue-600 hover:bg-blue-700 whitespace-nowrap">
                        Kirim Ulang
                    </x-primary-button>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </form>
        </div>

        <a href="{{ route('login') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-700 underline">
            Kembali ke halaman Login
        </a>
    </div>
</x-guest-layout>
