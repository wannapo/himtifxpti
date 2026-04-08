<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Profile & Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8 sm:py-12 bg-slate-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">
            
            <!-- Gamification Profile Header -->
            <div class="bg-white border border-slate-200 rounded-xl p-5 sm:p-8 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6 sm:gap-8">
                <div class="flex flex-col sm:flex-row items-center sm:items-center space-y-4 sm:space-y-0 sm:space-x-6 text-center sm:text-left">
                    <div class="w-16 h-16 sm:w-24 sm:h-24 bg-blue-50 border border-blue-100 rounded-full flex items-center justify-center text-2xl sm:text-4xl font-bold text-blue-600 overflow-hidden shadow-sm flex-shrink-0">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="text-xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">{{ $user->name }}</h3>
                        <div class="flex items-center justify-center sm:justify-start mt-2 space-x-2">
                            <span class="inline-block w-2.5 h-2.5 rounded-full bg-green-500"></span>
                            <p class="text-slate-500 font-medium font-mono text-xs sm:text-sm">Pelajar Sejak {{ $user->created_at->format('M Y') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-wrap justify-center sm:justify-end gap-3 sm:gap-4 md:gap-6">
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 sm:p-4 min-w-[90px] sm:min-w-[120px] shadow-sm relative overflow-hidden group text-center">
                        <div class="absolute inset-0 bg-yellow-400 opacity-0 group-hover:opacity-10 transition duration-300"></div>
                        <p class="text-xl sm:text-3xl font-black text-yellow-600">{{ $user->points }}</p>
                        <p class="text-[10px] sm:text-xs font-bold text-yellow-800 uppercase tracking-wider mt-1">Total Poin</p>
                    </div>
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 sm:p-4 min-w-[90px] sm:min-w-[120px] shadow-sm relative overflow-hidden group text-center">
                        <div class="absolute inset-0 bg-blue-400 opacity-0 group-hover:opacity-10 transition duration-300"></div>
                        <p class="text-xl sm:text-3xl font-black text-blue-600">🔥 {{ $user->current_streak }}</p>
                        <p class="text-[10px] sm:text-xs font-bold text-blue-800 uppercase tracking-wider mt-1">Streak Hari Ini</p>
                    </div>
                    <div class="bg-slate-50 border border-slate-200 rounded-lg p-3 sm:p-4 hidden sm:block min-w-[90px] sm:min-w-[120px] shadow-sm relative overflow-hidden group text-center">
                        <div class="absolute inset-0 bg-slate-300 opacity-0 group-hover:opacity-10 transition duration-300"></div>
                        <p class="text-xl sm:text-3xl font-black text-slate-700">👑 {{ $user->longest_streak }}</p>
                        <p class="text-[10px] sm:text-xs font-bold text-slate-600 uppercase tracking-wider mt-1">Longest Streak</p>
                    </div>
                </div>
            </div>

            <!-- Heatmap Section -->
            <div class="bg-white border border-slate-200 rounded-xl p-5 sm:p-8 shadow-sm">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 sm:mb-6 gap-2">
                    <h4 class="text-lg sm:text-xl font-bold text-slate-800">Aktivitas Belajar</h4>
                    <span class="text-xs sm:text-sm font-medium text-slate-500 bg-slate-100 px-3 py-1 rounded-full">6 Bulan Terakhir</span>
                </div>
                
                @php
                    function getDays() {
                        $days = [];
                        $start = now()->subMonths(6);
                        $end = now();
                        $current = clone $start;
                        while ($current <= $end) {
                            $days[$current->format('Y-m-d')] = [
                                'date' => $current->format('M j, Y'),
                                'level' => 0,
                                'points' => 0
                            ];
                            $current->addDay();
                        }
                        return $days;
                    }
                    $heatmapDays = getDays();
                    $activitiesData = $activities ?? [];
                    foreach($activitiesData as $date => $points) {
                        if(isset($heatmapDays[$date])) {
                            $heatmapDays[$date]['points'] = $points;
                            $heatmapDays[$date]['level'] = $points > 50 ? 4 : ($points > 20 ? 3 : ($points > 0 ? 2 : 1));
                        }
                    }
                @endphp
                
                <div class="overflow-x-auto -mx-2 px-2 pb-2">
                    <div class="flex flex-wrap gap-[3px] sm:gap-[5px] justify-start min-w-[600px]">
                        @foreach($heatmapDays as $day)
                            <div class="w-3 h-3 sm:w-4 sm:h-4 rounded-[3px] border border-slate-200/50 transform transition hover:scale-150 origin-bottom 
                                 @if($day['level'] == 0) bg-slate-100 
                                 @elseif($day['level'] == 1) bg-green-200 border-green-300
                                 @elseif($day['level'] == 2) bg-green-400 border-green-500
                                 @elseif($day['level'] == 3) bg-green-500 border-green-600
                                 @else bg-green-700 border-green-800 @endif"
                                 title="{{ $day['date'] }}: {{ $day['points'] }} Points"
                            ></div>
                        @endforeach
                    </div>
                </div>
                
                <div class="flex justify-end items-center mt-4 sm:mt-6 text-xs sm:text-sm font-medium text-slate-500 space-x-1.5 sm:space-x-2">
                    <span>Sedikit</span>
                    <div class="w-3 h-3 sm:w-4 sm:h-4 rounded-[3px] bg-slate-100 border border-slate-200/50"></div>
                    <div class="w-3 h-3 sm:w-4 sm:h-4 rounded-[3px] bg-green-200 border border-green-300"></div>
                    <div class="w-3 h-3 sm:w-4 sm:h-4 rounded-[3px] bg-green-400 border border-green-500"></div>
                    <div class="w-3 h-3 sm:w-4 sm:h-4 rounded-[3px] bg-green-500 border border-green-600"></div>
                    <div class="w-3 h-3 sm:w-4 sm:h-4 rounded-[3px] bg-green-700 border border-green-800"></div>
                    <span>Banyak</span>
                </div>
            </div>

            <!-- Enrolled Courses -->
            <div>
                <h3 class="text-xl sm:text-2xl font-extrabold text-slate-800 mb-4 sm:mb-6 mt-8 sm:mt-12 tracking-tight">Sertifikasi & Kursus Anda</h3>
                
                @if(isset($enrollments) && $enrollments->isEmpty())
                    <div class="bg-white border border-slate-200 rounded-xl p-8 sm:p-12 text-center flex flex-col items-center shadow-sm">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4 sm:mb-6 border border-slate-100">
                            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <p class="text-base sm:text-lg font-medium text-slate-600 mb-4 sm:mb-6">Anda belum memulai perjalanan belajar.</p>
                        <a href="{{ route('courses.index') }}" class="px-6 sm:px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 transition duration-200 text-sm sm:text-base">
                            Jelajahi Kurikulum Utama
                        </a>
                    </div>
                @elseif(isset($enrollments))
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-8">
                        @foreach($enrollments as $enrollment)
                            @if($enrollment->course)
                                <div class="bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col overflow-hidden group">
                                    <div class="p-4 sm:p-6 flex-grow flex flex-col justify-between">
                                        <div>
                                            <h4 class="text-lg sm:text-xl font-bold text-slate-800 line-clamp-2 leading-tight h-12 sm:h-14 group-hover:text-blue-600 transition-colors">{{ $enrollment->course->title }}</h4>
                                            
                                            <div class="mt-4 sm:mt-6 mb-4 sm:mb-6">
                                                <div class="flex justify-between text-sm mb-2">
                                                    <span class="font-semibold text-slate-600">Progres Belajar</span>
                                                    <span class="font-bold text-green-600">{{ $enrollment->progressPercent }}%</span>
                                                </div>
                                                <div class="w-full bg-slate-100 rounded-full h-2.5">
                                                    <div class="bg-green-500 h-2.5 rounded-full transition-all duration-1000 ease-out" style="width: {{ $enrollment->progressPercent }}%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2 text-center w-full">
                                            @if($enrollment->nextLesson)
                                                <a href="{{ route('lessons.show', [$enrollment->course->slug, $enrollment->nextLesson->id]) }}" class="block px-4 py-2.5 bg-white border border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition duration-200 text-sm sm:text-base">
                                                    Lanjutkan Materi
                                                </a>
                                            @else
                                                <a href="{{ route('certificates.show', $enrollment->course->slug) }}" target="_blank" class="block px-4 py-2.5 bg-yellow-500 text-yellow-950 font-bold rounded-lg shadow-sm hover:bg-yellow-400 hover:shadow transition duration-200 uppercase tracking-widest text-xs sm:text-sm">
                                                    Klaim Sertifikat 🏆
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>

</x-app-layout>
