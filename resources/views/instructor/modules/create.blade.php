<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Modul untuk Kursus: ') }} {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('instructor.courses.modules.store', $course->id) }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Judul Modul</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-6">
                        <label for="order_index" class="block text-gray-700 font-bold mb-2">Urutan (No. Modul)</label>
                        <input type="number" name="order_index" id="order_index" value="{{ old('order_index', $course->modules->count() + 1) }}" class="w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('instructor.courses.show', $course->id) }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded font-bold hover:bg-gray-400">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700">Simpan Modul</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
