<x-app-layout>
    <!-- Top Bar -->
    <div class="bg-white text-slate-800 px-6 py-4 border-b border-slate-200 flex justify-between items-center shadow-sm sticky top-0 z-40">
        <div class="text-sm md:text-base truncate flex items-center w-full max-w-7xl mx-auto">
            <span class="text-slate-500 hidden sm:inline font-medium">{{ $course->title }}</span> 
            <span class="mx-3 text-slate-300 hidden sm:inline">/</span> 
            <span class="font-bold tracking-tight text-slate-800">{{ $lesson->title }}</span>
            <div class="ml-auto">
                <a href="{{ route('courses.show', $course->slug) }}" class="text-sm bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-lg font-semibold transition-colors flex items-center">
                    &larr; <span class="hidden sm:inline ml-2">Kurikulum</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Workspace -->
    <div class="flex flex-col @if($lesson->has_workspace) lg:flex-row @else md:flex-row @endif min-h-[calc(100vh-73px)] bg-slate-50 w-full @if(!$lesson->has_workspace) max-w-[1600px] mx-auto @endif"
         @if($lesson->has_workspace) x-data="workspaceEditor()" @endif>
        
        <!-- Panel 1: Content / Reading -->
        <div class="w-full @if($lesson->has_workspace) lg:w-3/12 @else md:w-7/12 @endif p-6 md:p-8 md:overflow-y-auto border-b md:border-b-0 md:border-r border-slate-200 bg-white" style="max-height: calc(100vh - 73px);">
            <h1 class="text-2xl md:text-3xl font-extrabold mb-6 text-slate-900 leading-tight tracking-tight">{{ $lesson->title }}</h1>
            
            @if($lesson->content_type === 'video')
                <div class="aspect-video mb-8 rounded-xl overflow-hidden border border-slate-200 bg-slate-900 shadow-sm relative z-10">
                    @if(str_starts_with($lesson->video_url ?? '', '/storage'))
                        <video controls class="w-full h-full object-contain">
                            <source src="{{ asset($lesson->video_url) }}" type="video/mp4">
                        </video>
                    @else
                        <iframe src="{{ $embed_url ?? $lesson->video_url }}" class="w-full h-full border-none" allowfullscreen></iframe>
                    @endif
                </div>
            @endif

            <div class="prose prose-md max-w-none prose-slate leading-relaxed font-sans mb-12">
                {!! nl2br(e($lesson->content)) !!}
            </div>
        </div>

        @if($lesson->has_workspace)
        <!-- Panel 2: Code Editor (Only if has_workspace) -->
        <div class="w-full lg:w-5/12 bg-slate-900 border-b md:border-b-0 md:border-r border-slate-700 flex flex-col pt-2 h-screen lg:h-[calc(100vh-73px)]">
            <!-- Editor Tabs -->
            <div class="flex px-4 gap-1 mb-2">
                <button @click="activeTab = 'html'" :class="{'bg-[#1e1e1e] text-green-400': activeTab === 'html', 'bg-slate-800 text-slate-400 hover:bg-slate-700': activeTab !== 'html'}" class="px-4 py-2 rounded-t-lg font-mono text-sm font-bold transition-colors">index.html</button>
                <button @click="activeTab = 'css'" :class="{'bg-[#1e1e1e] text-blue-400': activeTab === 'css', 'bg-slate-800 text-slate-400 hover:bg-slate-700': activeTab !== 'css'}" class="px-4 py-2 rounded-t-lg font-mono text-sm font-bold transition-colors">styles.css</button>
                <button @click="activeTab = 'js'" :class="{'bg-[#1e1e1e] text-yellow-400': activeTab === 'js', 'bg-slate-800 text-slate-400 hover:bg-slate-700': activeTab !== 'js'}" class="px-4 py-2 rounded-t-lg font-mono text-sm font-bold transition-colors">script.js</button>
            </div>
            
            <!-- Editor Textareas -->
            <div class="flex-grow bg-[#1e1e1e] p-4 relative">
                <!-- HTML Editor -->
                <textarea x-show="activeTab === 'html'" x-model="htmlCode" class="w-full h-full bg-transparent border-none text-green-300 font-mono text-sm focus:ring-0 resize-none" spellcheck="false" placeholder="<!-- Tulis HTML di sini -->"></textarea>
                <!-- CSS Editor -->
                <textarea x-show="activeTab === 'css'" x-model="cssCode" class="w-full h-full bg-transparent border-none text-blue-300 font-mono text-sm focus:ring-0 resize-none" style="display: none;" spellcheck="false" placeholder="/* Tulis CSS di sini */"></textarea>
                <!-- JS Editor -->
                <textarea x-show="activeTab === 'js'" x-model="jsCode" class="w-full h-full bg-transparent border-none text-yellow-300 font-mono text-sm focus:ring-0 resize-none" style="display: none;" spellcheck="false" placeholder="// Tulis JS di sini"></textarea>
            </div>
        </div>
        @endif

        <!-- Panel 3: Right Panel (Preview & Interaction) -->
        <div class="w-full @if($lesson->has_workspace) lg:w-4/12 @else md:w-5/12 @endif bg-slate-50 flex flex-col md:overflow-y-auto" style="max-height: calc(100vh - 73px);">
            
            @if($lesson->has_workspace)
            <!-- Output Preview -->
            <div class="h-[40vh] lg:h-1/2 bg-white border-b border-slate-200">
                <div class="bg-slate-100 border-b border-slate-200 px-4 py-2 text-xs font-bold text-slate-500 tracking-wider uppercase flex items-center">
                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    Live Preview
                </div>
                <iframe x-ref="previewFrame" class="w-full h-[calc(100%-33px)] border-none bg-white"></iframe>
            </div>
            @endif

            <div class="p-6 flex-grow @if($lesson->has_workspace) lg:h-1/2 overflow-y-auto @endif">
                <h3 class="font-bold @if($lesson->has_workspace) text-xl @else text-2xl @endif mb-6 text-slate-800">Evaluasi & Kelulusan</h3>
                
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm"
                     x-data="{
                        hasQuiz: {{ !empty($lesson->quiz_question) && !empty($lesson->quiz_options) ? 'true' : 'false' }},
                        selectedOption: null,
                        showError: false,
                        isCorrect: false,
                        correctIndex: {{ $lesson->quiz_correct_index ?? 'null' }},
                        checkAnswer() {
                            if(this.selectedOption === null) return;
                            if(this.selectedOption === this.correctIndex) {
                                this.isCorrect = true;
                                this.showError = false;
                            } else {
                                this.showError = true;
                                setTimeout(() => this.showError = false, 2000);
                            }
                        }
                     }"
                >
                    @if(session('success'))
                        <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg px-4 py-3 font-medium mb-4 flex text-sm items-center">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(!$isCompleted)
                        <!-- State 1: Ada Kuis tapi belum dijawab benar -->
                        <div x-show="hasQuiz && !isCorrect">
                            <div class="inline-flex items-center px-3 py-1 rounded-full bg-blue-50 text-blue-700 font-semibold text-xs mb-3 border border-blue-100">Knowledge Check</div>
                            <p class="text-slate-800 font-medium text-base md:text-lg mb-5">{{ $lesson->quiz_question }}</p>
                            
                            <div class="space-y-2 mb-6">
                                @if(!empty($lesson->quiz_options) && is_array($lesson->quiz_options))
                                    @foreach($lesson->quiz_options as $idx => $opt)
                                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-slate-50 transition-all text-sm md:text-base"
                                               :class="{'border-red-400 bg-red-50 ring-1 ring-red-400': selectedOption === {{ $idx }}, 'border-slate-200': selectedOption !== {{ $idx }}}">
                                            <input type="radio" name="quiz_answer" value="{{ $idx }}" x-model.number="selectedOption" class="w-4 h-4 text-red-600 border-slate-300 focus:ring-red-500">
                                            <span class="ml-3 font-medium text-slate-700" :class="{'text-red-900 font-bold': selectedOption === {{ $idx }}}">{{ $opt }}</span>
                                        </label>
                                    @endforeach
                                @endif
                            </div>

                            <div x-show="showError" x-transition class="bg-red-50 border border-red-200 text-red-800 rounded-lg px-3 py-2 font-medium mb-4 flex text-xs items-center">
                                <svg class="w-4 h-4 mr-2 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Jawaban salah atau belum dipilih. Coba lagi!
                            </div>

                            <button @click="checkAnswer()" :disabled="selectedOption === null" class="w-full flex justify-center py-3 bg-red-600 text-white rounded-lg font-bold hover:bg-red-700 disabled:opacity-50 disabled:cursor-not-allowed">
                                Periksa Jawaban
                            </button>
                        </div>

                        <!-- State 2: Tanpa kuis ATAU Kuis terjawab benar -->
                        <div x-show="!hasQuiz || isCorrect" style="display: none;" :style="{ display: (!hasQuiz || isCorrect) ? 'block' : 'none' }">
                            <div x-show="hasQuiz && isCorrect" class="bg-green-50 border border-green-200 text-green-800 rounded-lg p-5 mb-6 text-center shadow-sm">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                </div>
                                <p class="font-bold text-base mb-1">Jawaban Benar!</p>
                                @if($lesson->quiz_explanation)
                                    <p class="text-xs font-medium text-green-700">{{ $lesson->quiz_explanation }}</p>
                                @endif
                            </div>

                            <div class="text-center" x-show="!hasQuiz">
                                <div class="w-12 h-12 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                </div>
                                <p class="text-slate-600 mb-6 font-medium text-sm md:text-base leading-relaxed">
                                    Apakah Anda sudah menyelesaikan materi dan tantangan di atas?
                                </p>
                            </div>
                            
                            <form action="{{ route('lessons.complete', [$course->slug, $lesson->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex justify-center py-3 bg-green-600 text-white rounded-lg font-bold hover:bg-green-700 transition-[background-color]">
                                    <span x-text="hasQuiz ? 'Selesaikan Materi' : 'Selesai (Lanjut Materi)'"></span>
                                </button>
                            </form>
                        </div>

                    @else
                        <!-- Selesai (Completed State) -->
                        <div class="text-center bg-green-50 border border-green-200 rounded-lg p-6 mb-4 shadow-sm">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <h4 class="font-bold text-lg text-green-900 mb-1">Tantangan Selesai!</h4>
                            <p class="text-green-700 text-xs font-medium">Anda telah menguasai materi ini.</p>
                        </div>
                        <a href="{{ route('courses.show', $course->slug) }}" class="w-full flex justify-center py-3 bg-white border border-slate-300 text-slate-700 rounded-lg font-bold hover:bg-slate-50 transition-colors">
                            Kembali ke Silabus
                        </a>
                    @endif
                </div>

                <!-- Community Comments Section (Moved inside Right Panel for 3-col fit) -->
                <div class="mt-8">
                    <h4 class="font-bold text-lg text-slate-800 mb-4 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                        Diskusi
                    </h4>
                    
                    <form action="{{ route('comments.store', $lesson->id) }}" method="POST" class="mb-6">
                        @csrf
                        <textarea name="body" rows="2" class="w-full border border-slate-300 rounded-lg p-3 mb-2 focus:border-red-500 focus:ring focus:ring-red-100 shadow-sm text-sm text-slate-700" placeholder="Tanyakan atau bagikan sesuatu..." required></textarea>
                        @error('body')
                            <p class="text-red-500 text-xs mb-2 font-semibold">{{ $message }}</p>
                        @enderror
                        <div class="flex justify-end">
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-sm font-semibold py-1.5 px-4 rounded-md">Kirim</button>
                        </div>
                    </form>

                    <div class="space-y-3">
                        @forelse($lesson->comments()->latest()->get() as $comment)
                            <div class="border border-slate-100 p-4 bg-white rounded-lg flex gap-3 shadow-sm">
                                <div class="w-8 h-8 bg-red-50 rounded-full flex-shrink-0 flex items-center justify-center text-xs font-bold text-red-600 border border-red-100">
                                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                </div>
                                <div class="flex-grow">
                                    <div class="flex justify-between items-baseline mb-1">
                                        <span class="font-bold text-sm text-slate-800">{{ $comment->user->name }}</span>
                                        <span class="text-[10px] text-slate-400 font-medium">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-slate-600 leading-relaxed text-xs break-words">{{ $comment->body }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="border border-dashed border-slate-200 rounded-lg p-5 text-center bg-slate-50">
                                <p class="text-xs font-semibold text-slate-500">Belum ada diskusi.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
        
    </div>

    @if($lesson->has_workspace)
    <script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('workspaceEditor', () => ({
            htmlCode: @json($lesson->code_html ?? ''),
            cssCode: @json($lesson->code_css ?? ''),
            jsCode: @json($lesson->code_js ?? ''),
            activeTab: 'html',
            debounceTimeout: null,
            init() {
                this.updatePreview();
                this.$watch('htmlCode', () => this.debouncedUpdate());
                this.$watch('cssCode', () => this.debouncedUpdate());
                this.$watch('jsCode', () => this.debouncedUpdate());
            },
            debouncedUpdate() {
                clearTimeout(this.debounceTimeout);
                this.debounceTimeout = setTimeout(() => {
                    this.updatePreview();
                }, 500); // 500ms debounce
            },
            updatePreview() {
                let iframe = this.$refs.previewFrame;
                if(!iframe) return;
                
                let doc = iframe.contentDocument || iframe.contentWindow.document;
                
                let content = `
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset="utf-8">
                        <style>${this.cssCode}</style>
                    </head>
                    <body>
                        ${this.htmlCode}
                        <script>${this.jsCode}<\/script>
                    </body>
                    </html>
                `;
                
                doc.open();
                doc.write(content);
                doc.close();
            }
        }));
    });
    </script>
    @endif
</x-app-layout>
