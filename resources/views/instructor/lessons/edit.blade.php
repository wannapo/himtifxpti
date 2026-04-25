<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Materi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
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

                <form action="{{ route('instructor.lessons.update', $lesson->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-bold mb-2">Judul Materi</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $lesson->title) }}" class="w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="order_index" class="block text-gray-700 font-bold mb-2">Urutan Materi</label>
                        <input type="number" name="order_index" id="order_index" value="{{ old('order_index', $lesson->order_index) }}" class="w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="content_type" class="block text-gray-700 font-bold mb-2">Tipe Konten Utama</label>
                        <select name="content_type" id="content_type" class="w-full border-gray-300 rounded-md" required>
                            <option value="text" {{ old('content_type', $lesson->content_type) === 'text' ? 'selected' : '' }}>Teks / Artikel (Dengan/Tanpa Embed Video Tambahan)</option>
                            <option value="video" {{ old('content_type', $lesson->content_type) === 'video' ? 'selected' : '' }}>Video Pendek</option>
                        </select>
                        <p class="text-sm text-gray-500 mt-1">Anda tetap dapat mengisi teks dan URL video bersamaan layaknya FreeCodeCamp.</p>
                    </div>

                    <div class="mb-6 space-y-4 border border-blue-200 p-4 rounded bg-blue-50">
                        <h4 class="font-bold text-blue-800">Media Video (Opsional)</h4>
                        @if($lesson->video_url && str_starts_with($lesson->video_url, '/storage'))
                            <div class="mb-2">
                                <label class="block text-sm text-gray-600 mb-1">Video saat ini:</label>
                                <video width="320" height="240" controls class="rounded border bg-black">
                                    <source src="{{ asset($lesson->video_url) }}" type="video/mp4">
                                    Browser tidak mensupport tag video.
                                </video>
                            </div>
                        @elseif($lesson->video_url)
                            <div class="mb-2">
                                <label class="block text-sm text-gray-600 mb-1">URL Video Eksternal saat ini:</label>
                                <a href="{{ $lesson->video_url }}" target="_blank" class="text-blue-600 underline break-all">{{ $lesson->video_url }}</a>
                            </div>
                        @endif

                        <div>
                            <label for="video_file" class="block text-gray-700 font-bold mb-2">Ganti File Video (Opsional)</label>
                            <input type="file" name="video_file" id="video_file" class="w-full border border-gray-300 p-2 rounded-md bg-white">
                        </div>
                        <div class="text-center text-sm font-bold text-gray-500">ATAU</div>
                        <div>
                            <label for="video_url" class="block text-gray-700 font-bold mb-2">Ubah URL Video Eksternal (contoh: YouTube Link)</label>
                            <input type="url" name="video_url" id="video_url" value="{{ old('video_url', str_starts_with($lesson->video_url ?? '', '/storage') ? '' : $lesson->video_url) }}" class="w-full border-gray-300 rounded-md" placeholder="https://www.youtube.com/...">
                        </div>
                    </div>

                    <div class="mb-6 border-t pt-4">
                        <label for="content" class="block text-gray-700 font-bold mb-2">Konten Teks & Instruksi</label>
                        <textarea name="content" id="content" rows="10" class="w-full border-gray-300 rounded-md">{{ old('content', $lesson->content) }}</textarea>
                    </div>

                    <div class="mt-8 pt-6 border-t-2 border-dashed border-gray-300 mb-6" x-data="{ hasWorkspace: {{ old('has_workspace', $lesson->has_workspace) ? 'true' : 'false' }} }">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Live Code Workspace (Opsional)</h3>
                                <p class="text-sm text-gray-500">Aktifkan untuk memberikan ruang latihan coding mandiri bagi siswa di sebelah kanan materi.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="has_workspace" value="1" class="sr-only peer" x-model="hasWorkspace">
                                <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>

                        <div x-show="hasWorkspace" class="space-y-4 border border-gray-300 p-5 rounded-lg bg-gray-50" x-transition style="display: none;" :style="{ display: hasWorkspace ? 'block' : 'none' }">
                            <p class="text-sm font-semibold text-gray-600 mb-4 bg-yellow-100 p-3 rounded border border-yellow-300">
                                Isi kotak di bawah ini dengan kode awal (boilerplate) yang akan muncul di editor siswa. Biarkan kosong jika ingin editor benar-benar bersih.
                            </p>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Boilerplate HTML</label>
                                <textarea name="code_html" rows="4" class="w-full border-gray-300 rounded-md font-mono text-sm bg-gray-900 text-green-400" placeholder="<!-- html -->">{{ old('code_html', $lesson->code_html) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Boilerplate CSS</label>
                                <textarea name="code_css" rows="4" class="w-full border-gray-300 rounded-md font-mono text-sm bg-gray-900 text-blue-300" placeholder="/* css */">{{ old('code_css', $lesson->code_css) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-bold mb-2">Boilerplate JavaScript</label>
                                <textarea name="code_js" rows="4" class="w-full border-gray-300 rounded-md font-mono text-sm bg-gray-900 text-yellow-300" placeholder="// javascript">{{ old('code_js', $lesson->code_js) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t-2 border-dashed border-gray-300 mb-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Ujian Materi (Opsional)</h3>
                        <p class="text-sm text-gray-500 mb-6">Jika diisi, mahasiswa harus mengklik "Check Answer" dan menjawab benar sebelum bisa menandai materi selesai.</p>
                        
                        <div class="mb-4">
                            <label for="quiz_question" class="block text-gray-700 font-bold mb-2">Pertanyaan Kuis</label>
                            <textarea name="quiz_question" id="quiz_question" rows="3" class="w-full border-gray-300 rounded-md" placeholder="Contoh: Apa output dari kode ini?">{{ old('quiz_question', $lesson->quiz_question) }}</textarea>
                        </div>
                        
                        <div class="mb-4 space-y-3">
                            <label class="block text-gray-700 font-bold">Opsi Jawaban</label>
                            <div class="flex items-center space-x-2">
                                <span class="font-bold text-gray-500 w-6 text-center">A</span>
                                <input type="text" name="quiz_options[]" value="{{ old('quiz_options.0', $lesson->quiz_options[0] ?? '') }}" class="w-full border-gray-300 rounded-md" placeholder="Opsi A">
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-bold text-gray-500 w-6 text-center">B</span>
                                <input type="text" name="quiz_options[]" value="{{ old('quiz_options.1', $lesson->quiz_options[1] ?? '') }}" class="w-full border-gray-300 rounded-md" placeholder="Opsi B">
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-bold text-gray-500 w-6 text-center">C</span>
                                <input type="text" name="quiz_options[]" value="{{ old('quiz_options.2', $lesson->quiz_options[2] ?? '') }}" class="w-full border-gray-300 rounded-md" placeholder="Opsi C">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="quiz_correct_index" class="block text-gray-700 font-bold mb-2">Jawaban Benar</label>
                            <select name="quiz_correct_index" id="quiz_correct_index" class="w-full border-gray-300 rounded-md">
                                <option value="">--- Pilih Jawaban ---</option>
                                <option value="0" {{ old('quiz_correct_index', $lesson->quiz_correct_index) === 0 || old('quiz_correct_index', $lesson->quiz_correct_index) === '0' ? 'selected' : '' }}>Opsi A</option>
                                <option value="1" {{ old('quiz_correct_index', $lesson->quiz_correct_index) === 1 || old('quiz_correct_index', $lesson->quiz_correct_index) === '1' ? 'selected' : '' }}>Opsi B</option>
                                <option value="2" {{ old('quiz_correct_index', $lesson->quiz_correct_index) === 2 || old('quiz_correct_index', $lesson->quiz_correct_index) === '2' ? 'selected' : '' }}>Opsi C</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="quiz_explanation" class="block text-gray-700 font-bold mb-2">Penjelasan (Opsional)</label>
                            <textarea name="quiz_explanation" id="quiz_explanation" rows="2" class="w-full border-gray-300 rounded-md" placeholder="Ditampilkan saat siswa menjawab dengan benar">{{ old('quiz_explanation', $lesson->quiz_explanation) }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 mt-6">
                        <a href="{{ route('instructor.courses.show', $lesson->module->course_id) }}" class="bg-gray-300 text-gray-800 px-6 py-2 rounded font-bold hover:bg-gray-400">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700">Perbarui Materi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
