@php
    /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses */
@endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Kursus (Instruktur)') }}
            </h2>
            <a href="{{ route('instructor.courses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700">+ Buat Kursus Baru</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b p-3">Gambar</th>
                            <th class="border-b p-3">Judul Kursus</th>
                            <th class="border-b p-3">Status</th>
                            <th class="border-b p-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)
                            <tr class="hover:bg-gray-50">
                                <td class="border-b p-3">
                                    <img src="{{ empty($course->image) ? 'https://via.placeholder.com/150x100.png?text=Course' : (str_starts_with($course->image, 'http') ? $course->image : asset($course->image)) }}" class="w-20 h-12 object-cover rounded">
                                </td>
                                <td class="border-b p-3 font-semibold">{{ $course->title }}</td>
                                <td class="border-b p-3">
                                    <span class="px-2 py-1 rounded text-xs font-bold {{ $course->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($course->status) }}
                                    </span>
                                </td>
                                <td class="border-b p-3 text-right">
                                    <a href="{{ route('instructor.courses.show', $course->id) }}" class="text-blue-600 hover:text-blue-900 mx-1 font-semibold">Kelola Materi</a>
                                    <a href="{{ route('instructor.courses.edit', $course->id) }}" class="text-yellow-600 hover:text-yellow-900 mx-1 font-semibold">Edit</a>
                                    <form action="{{ route('instructor.courses.destroy', $course->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus kursus ini? Semua entitas (modul, lesson, progress) tidak akan cascade delete otomatis di MVP ini jika database tidak dikonfigurasi demikian.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 mx-1 font-semibold">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-6 text-gray-500">Belum ada kursus yang dibuat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
