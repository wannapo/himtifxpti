<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Akun Baru') }}
        </h2>
    </x-slot>

<<<<<<< HEAD
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
=======
    <div class="py-6 sm:py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 sm:p-6">
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border-gray-300 rounded-md shadow-sm" required autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 font-bold mb-2">Role Akses</label>
                        <select name="role" id="role" class="w-full border-gray-300 rounded-md shadow-sm" required>
                            <option value="student" {{ old('role') === 'student' ? 'selected' : '' }}>Student (Siswa)</option>
                            <option value="instructor" {{ old('role') === 'instructor' ? 'selected' : '' }}>Instructor (Pengajar)</option>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin (Administrator)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                        <input type="password" name="password" id="password" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

<<<<<<< HEAD
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('admin.users.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded font-bold hover:bg-gray-400">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700">Simpan Akun</button>
=======
                    <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 sm:gap-4">
                        <a href="{{ route('admin.users.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2.5 rounded-lg font-bold hover:bg-gray-400 text-center">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2.5 rounded-lg font-bold hover:bg-blue-700">Simpan Akun</button>
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
