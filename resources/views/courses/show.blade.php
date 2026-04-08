<x-app-layout>
    <div class="bg-slate-900 text-white py-10 sm:py-16 px-4 sm:px-6 border-b border-slate-800">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-2xl sm:text-3xl md:text-5xl font-extrabold mb-3 sm:mb-4 tracking-tight">{{ $course->title }}</h1>
            <p class="text-base sm:text-xl text-slate-300 mb-6 sm:mb-8 max-w-3xl leading-relaxed">{{ $course->description }}</p>

            @auth
                @if($isEnrolled)
                    <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-8">
                        @if($nextLesson)
                            <a href="{{ route('lessons.show', [$course->slug, $nextLesson->id]) }}" class="inline-block text-center bg-blue-600 text-white px-6 sm:px-8 py-3 sm:py-3.5 font-semibold text-base sm:text-lg hover:bg-blue-700 transition-colors rounded-lg shadow-sm w-full md:w-auto border border-blue-500">Lanjut Belajar</a>
                        @else
                            <a href="{{ route('certificates.show', $course->slug) }}" target="_blank" class="inline-block text-center bg-yellow-500 border border-yellow-400 text-yellow-950 px-6 sm:px-8 py-3 sm:py-3.5 font-bold text-base sm:text-lg hover:bg-yellow-400 transition-colors w-full md:w-auto shadow-sm rounded-lg hover:shadow-md hover:-translate-y-0.5">Klaim Sertifikat 🏆</a>
                        @endif
                        <div class="flex items-center w-full md:w-72 bg-slate-800/50 p-3 rounded-xl border border-slate-700">
                            <div class="w-full bg-slate-700 h-2.5 rounded-full mr-4 overflow-hidden">
                                <div class="bg-green-500 h-full rounded-full transition-all duration-1000" style="width: {{ $progressPercent }}%"></div>
                            </div>
                            <span class="font-bold text-green-400 text-lg">{{ $progressPercent }}%</span>
                        </div>
                    </div>
                @else
                    <form action="{{ route('enrollments.store', $course->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="inline-block text-center bg-blue-600 text-white px-6 sm:px-8 py-3 sm:py-3.5 font-semibold text-base sm:text-lg hover:bg-blue-700 transition-colors rounded-lg shadow-sm w-full md:w-auto border border-blue-500">Daftar Sertifikasi</button>
                    </form>
                @endif
            @else
                <a href="{{ route('login') }}" class="inline-block text-center bg-white text-slate-900 px-6 sm:px-8 py-3 sm:py-3.5 font-semibold text-base sm:text-lg hover:bg-slate-100 transition-colors rounded-lg shadow-sm w-full md:w-auto">Login untuk Belajar</a>
            @endauth
        </div>
    </div>

    <div class="py-8 sm:py-12 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4 sm:space-y-6">
            <h2 class="text-xl sm:text-2xl font-bold text-slate-800 mb-2">Kurikulum Kursus</h2>
            
            @forelse($course->modules as $module)
                <div x-data="{ open: false }" class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden transition-all duration-200">
                    <button @click="open = !open" class="w-full flex items-center justify-between p-4 sm:p-6 bg-white hover:bg-slate-50 focus:outline-none transition-colors border-b border-transparent" :class="{ 'border-slate-100 bg-slate-50/50': open }">
                        <h2 class="text-base sm:text-xl md:text-2xl font-bold text-slate-800 text-left">
                            <span class="text-slate-400 font-medium mr-1 sm:mr-2">Bab {{ $module->order_index }}:</span> {{ $module->title }}
                        </h2>
                        <svg x-show="!open" class="w-5 h-5 sm:w-6 sm:h-6 text-slate-400 transition-transform flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        <svg x-show="open" x-cloak class="w-5 h-5 sm:w-6 sm:h-6 text-slate-600 transition-transform rotate-180 flex-shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    
                    <div x-show="open" x-collapse x-cloak class="bg-white p-4 sm:p-6 pt-2">
                        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2 sm:gap-4 mt-3 sm:mt-4">
                            @foreach($module->lessons as $lesson)
                                @php
                                    $isLessonComplete = auth()->check() && in_array($lesson->id, $completedLessonIds ?? []);
                                @endphp
                                
                                @auth
                                    @if($isEnrolled)
                                        <a href="{{ route('lessons.show', [$course->slug, $lesson->id]) }}" 
                                           class="flex flex-col items-center justify-center p-3 sm:p-4 border rounded-xl text-center transition-all duration-200 relative group {{ $isLessonComplete ? 'bg-green-50 border-green-200 hover:border-green-300' : 'bg-white border-slate-200 hover:border-blue-300 hover:shadow-sm' }}">
                                            @if($isLessonComplete)
                                                <div class="absolute -top-1.5 -right-1.5 sm:-top-2 sm:-right-2 bg-green-500 text-white rounded-full p-0.5 sm:p-1 shadow-sm">
                                                    <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                                </div>
                                                <svg class="w-6 h-6 sm:w-8 sm:h-8 text-green-600 mb-1 sm:mb-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                            @else
                                                <span class="text-2xl sm:text-3xl font-extrabold text-slate-300 group-hover:text-blue-400 mb-0.5 sm:mb-1 transition-colors">{{ $lesson->order_index }}</span>
                                            @endif
                                            <span class="text-[10px] sm:text-xs font-semibold leading-tight sm:leading-relaxed text-slate-700 mt-1 sm:mt-2 group-hover:text-slate-900">{{ Str::limit($lesson->title, 20) }}</span>
                                        </a>
                                    @else
                                        <div class="flex flex-col items-center justify-center p-3 sm:p-4 border border-slate-200 bg-slate-50 text-center rounded-xl opacity-70">
                                            <span class="text-2xl sm:text-3xl font-extrabold text-slate-300 mb-0.5 sm:mb-1">{{ $lesson->order_index }}</span>
                                            <span class="text-[10px] sm:text-xs font-medium leading-tight sm:leading-relaxed text-slate-500 mt-1 sm:mt-2">{{ Str::limit($lesson->title, 20) }}</span>
                                        </div>
                                    @endif
                                @else
                                    <div class="flex flex-col items-center justify-center p-3 sm:p-4 border border-slate-200 bg-slate-50 text-center rounded-xl opacity-70">
                                        <span class="text-2xl sm:text-3xl font-extrabold text-slate-300 mb-0.5 sm:mb-1">{{ $lesson->order_index }}</span>
                                        <span class="text-[10px] sm:text-xs font-medium leading-tight sm:leading-relaxed text-slate-500 mt-1 sm:mt-2">{{ Str::limit($lesson->title, 20) }}</span>
                                    </div>
                                @endauth
                            @endforeach
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white border border-slate-200 rounded-xl p-6 sm:p-8 text-center text-slate-500 font-medium text-base sm:text-lg shadow-sm">
                    Sertifikasi ini belum memiliki langkah-langkah praktikum.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
