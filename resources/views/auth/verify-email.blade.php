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
<<<<<<< HEAD
            <x-primary-button class="bg-red-600 hover:bg-red-700">
=======
            <x-primary-button class="bg-blue-600 hover:bg-blue-700">
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
                Kirim Ulang Email Verifikasi
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
<<<<<<< HEAD
            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
=======
            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
                Logout
            </button>
        </form>
    </div>
</x-guest-layout>
