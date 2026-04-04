<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        Anda perlu memverifikasi alamat email baru Anda. Kami telah mengirimkan link verifikasi ke email Anda.
        Silakan cek inbox atau folder spam.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            Link verifikasi baru telah dikirim ke email Anda.
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button class="bg-blue-600 hover:bg-blue-700">
                Kirim Ulang Email Verifikasi
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Logout
            </button>
        </form>
    </div>
</x-guest-layout>
