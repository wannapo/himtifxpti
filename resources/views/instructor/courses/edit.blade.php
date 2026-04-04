@php
    /** @var \App\Models\Course $course */
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kursus: ') }} {{ $course->title }}
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

                <form action="{{ route('instructor.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Judul Kursus</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $course->title) }}" class="w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Deskripsi</label>
                        <textarea name="description" id="description" rows="5" class="w-full border-gray-300 rounded-md" required>{{ old('description', $course->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
                        <select name="status" id="status" class="w-full border-gray-300 rounded-md" required>
                            <option value="draft" {{ old('status', $course->status) === 'draft' ? 'selected' : '' }}>Draft (Sembunyikan)</option>
                            <option value="published" {{ old('status', $course->status) === 'published' ? 'selected' : '' }}>Published (Tampilkan secara publik)</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Gambar Sampul (Biarkan kosong jika tidak diubah)</label>
                        @if($course->image)
                            <div class="mb-2">
                                <img src="{{ str_starts_with($course->image ?? '', 'http') ? $course->image : asset($course->image) }}" class="w-32 h-20 object-cover rounded border">
                            </div>
                        @endif
                        <input type="file" name="image" id="image" class="w-full border border-gray-300 p-2 rounded-md">
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('instructor.courses.index') }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded font-bold hover:bg-gray-400">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700">Perbarui Kursus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
