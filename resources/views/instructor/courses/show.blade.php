<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Materi: ') }} {{ $course->title }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('instructor.courses.edit', $course->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded font-bold hover:bg-yellow-600">Edit Info Kursus</a>
                <a href="{{ route('instructor.courses.modules.create', $course->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded font-bold hover:bg-blue-700">+ Tambah Modul</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                @forelse ($course->modules as $module)
                    <div class="mb-6 border rounded-lg overflow-hidden flex flex-col">
                        <div class="bg-gray-100 p-4 flex justify-between items-center border-b">
                            <h3 class="text-lg font-bold">Modul {{ $module->order_index }}: {{ $module->title }}</h3>
                            <div class="space-x-2 flex items-center">
                                <a href="{{ route('instructor.modules.lessons.create', $module->id) }}" class="text-sm bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 font-bold">+ Tambah Materi (Lesson)</a>
                                <a href="{{ route('instructor.modules.edit', $module->id) }}" class="text-sm bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 font-bold">Edit Modul (Bab)</a>
                                <form action="{{ route('instructor.modules.destroy', $module->id) }}" method="POST" class="inline-block m-0" onsubmit="return confirm('Hapus modul ini beserta semua materinya?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 font-bold">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <div class="p-0">
                            @if(count($module->lessons) > 0)
                                <ul class="divide-y text-gray-700">
                                    @foreach($module->lessons as $lesson)
                                        <li class="p-4 flex justify-between items-center hover:bg-gray-50">
                                            <div>
                                                <span class="font-semibold">Materi {{ $lesson->order_index }}:</span> {{ $lesson->title }} 
                                                <span class="text-xs ml-2 px-2 py-1 bg-gray-200 rounded uppercase">{{ $lesson->content_type }}</span>
                                            </div>
                                            <div class="space-x-2 text-sm">
                                                <a href="{{ route('instructor.lessons.edit', $lesson->id) }}" class="text-blue-600 hover:underline">Edit Materi</a>
                                                <form action="{{ route('instructor.lessons.destroy', $lesson->id) }}" method="POST" class="inline-block m-0" onsubmit="return confirm('Yakin ingin menghapus materi ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="p-4 text-gray-500 text-center italic">
                                    Belum ada isi materi di bab/modul ini.<br>
                                    Silakan klik tombol <b>"+ Tambah Materi (Lesson)"</b> di atas.
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-500">
                        <p class="mb-4">Kursus ini belum memiliki silabus sama sekali.</p>
                        <p>Silakan buat <b>Modul (Bab / Topik)</b> terlebih dahulu, baru kemudian tambahkan <b>Materi (Lesson)</b> di dalamnya.</p>
                    </div>
                @endforelse

                <div class="mt-8 pt-4 border-t">
                    <a href="{{ route('instructor.courses.modules.create', $course->id) }}" class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700 inline-block">+ Tambah Modul (Bab Baru)</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
