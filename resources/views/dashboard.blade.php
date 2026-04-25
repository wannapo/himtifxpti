<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Profile & Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8 sm:py-12 bg-slate-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 sm:space-y-8">
            
            {{-- Profile Section dengan Proteksi Null --}}
            <div class="bg-gradient-to-r from-blue-700 to-blue-500 rounded-3xl p-6 sm:p-10 text-white shadow-xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full -ml-10 -mb-10"></div>

                <div class="flex flex-col md:flex-row items-center justify-between gap-8 relative z-10">
                    <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-8 text-center sm:text-left">
                        {{-- PHOTO PROFILE LOGIC START --}}
                        <div class="w-20 h-20 sm:w-28 sm:h-28 bg-white rounded-2xl flex items-center justify-center text-blue-600 text-3xl sm:text-5xl font-black shadow-2xl transform rotate-3 hover:rotate-0 transition duration-300 overflow-hidden">
                            @if($user && $user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" 
                                     alt="{{ $user->name }}" 
                                     class="w-full h-full object-cover transform -rotate-3 group-hover:rotate-0 transition duration-300">
                            @else
                                {{ strtoupper(substr($user->name ?? 'G', 0, 1)) }}
                            @endif
                        </div>
                        {{-- PHOTO PROFILE LOGIC END --}}

                        <div>
                            <h3 class="text-2xl sm:text-4xl font-extrabold tracking-tight">{{ $user->name ?? 'Tamu' }}</h3>
                            <div class="flex items-center justify-center sm:justify-start mt-2 space-x-2">
                                <span class="inline-block w-2.5 h-2.5 rounded-full {{ $user ? 'bg-green-400' : 'bg-gray-400' }} animate-pulse"></span>
                                <p class="text-blue-100 font-medium text-sm sm:text-base opacity-90">
                                    {{ $user ? 'Pelajar Sejak ' . $user->created_at->format('M Y') : 'Silakan login untuk melihat progres' }}
                                </p>
                            </div>
                            <span class="inline-block mt-3 bg-yellow-400 text-blue-900 text-[10px] font-black px-4 py-1 rounded-full uppercase tracking-wider">
                                {{ $user ? 'Student Member' : 'Guest Access' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap justify-center sm:justify-end gap-4">
                        <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 min-w-[110px] sm:min-w-[130px] shadow-lg text-center group hover:bg-white/20 transition">
                            <p class="text-2xl sm:text-4xl font-black text-yellow-400">{{ $user->points ?? 0 }}</p>
                            <p class="text-[10px] font-bold uppercase tracking-widest mt-1 opacity-80">Total Poin</p>
                        </div>
                        <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 min-w-[110px] sm:min-w-[130px] shadow-lg text-center group hover:bg-white/20 transition">
                            <p class="text-2xl sm:text-4xl font-black text-orange-400">🔥 {{ $user->current_streak ?? 0 }}</p>
                            <p class="text-[10px] font-bold uppercase tracking-widest mt-1 opacity-80">Streak</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Heatmap Aktivitas --}}
            <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-2 border-b border-slate-50 pb-4">
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-slate-800">Aktivitas Belajar</h4>
                        <p class="text-xs text-slate-400">Kontribusi belajar dalam 6 bulan terakhir</p>
                    </div>
                    <span class="text-xs font-bold text-slate-500 bg-slate-100 px-4 py-1.5 rounded-full uppercase tracking-tighter">6 Bulan Terakhir</span>
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
                
                <div class="overflow-x-auto -mx-2 px-2 pb-2 {{ !$user ? 'opacity-30 grayscale' : '' }}">
                    <div class="flex flex-wrap gap-[4px] sm:gap-[6px] justify-start min-w-[600px]">
                        @foreach($heatmapDays as $day)
                            <div class="w-3.5 h-3.5 sm:w-4 sm:h-4 rounded-[3px] border border-slate-200/30 transform transition hover:scale-150 hover:z-20 origin-center cursor-help
                                 @if($day['level'] == 0) bg-slate-100 
                                 @elseif($day['level'] == 1) bg-green-200
                                 @elseif($day['level'] == 2) bg-green-400
                                 @elseif($day['level'] == 3) bg-green-500
                                 @else bg-green-700 @endif"
                                 title="{{ $day['date'] }}: {{ $day['points'] }} Points"
                            ></div>
                        @endforeach
                    </div>
                </div>
                
                <div class="flex justify-end items-center mt-6 text-[10px] sm:text-xs font-bold text-slate-400 space-x-2 uppercase tracking-widest">
                    <span>Sedikit</span>
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 rounded-[2px] bg-slate-100"></div>
                        <div class="w-3 h-3 rounded-[2px] bg-green-200"></div>
                        <div class="w-3 h-3 rounded-[2px] bg-green-400"></div>
                        <div class="w-3 h-3 rounded-[2px] bg-green-700"></div>
                    </div>
                    <span>Banyak</span>
                </div>
            </div>

            {{-- Daftar Kursus --}}
            <div>
                <h3 class="text-xl sm:text-2xl font-extrabold text-slate-800 mb-6 mt-12 tracking-tight flex items-center gap-3">
                    <span class="bg-blue-600 w-2 h-8 rounded-full"></span>
                    Sertifikasi & Kursus Anda
                </h3>
                
                @if(!isset($enrollments) || $enrollments->isEmpty())
                    <div class="bg-white border border-slate-200 rounded-3xl p-12 text-center flex flex-col items-center shadow-sm">
                        <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mb-6 text-blue-300">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <p class="text-lg font-bold text-slate-700 mb-2">Belum ada kursus yang diikuti</p>
                        <p class="text-slate-500 mb-8 max-w-sm">Ayo mulai perjalanan belajarmu hari ini!</p>
                        <a href="{{ route('courses.index') }}" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 transition duration-300">
                            Jelajahi Kurikulum Utama
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                        @foreach($enrollments as $enrollment)
                            @if($enrollment->course)
                                <div class="bg-white border border-slate-100 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden group">
                                    <div class="p-6 flex-grow flex flex-col justify-between">
                                        <div>
                                            <div class="flex justify-between items-start mb-4">
                                                <div class="p-3 bg-blue-50 rounded-2xl text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition duration-300">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                                </div>
                                                <span class="text-[10px] font-black {{ ($enrollment->progressPercent ?? 0) == 100 ? 'text-green-500 bg-green-50' : 'text-blue-500 bg-blue-50' }} px-3 py-1 rounded-full uppercase tracking-tighter">
                                                    {{ ($enrollment->progressPercent ?? 0) == 100 ? 'Selesai' : 'Aktif' }}
                                                </span>
                                            </div>
                                            
                                            <h4 class="text-xl font-extrabold text-slate-800 line-clamp-2 leading-tight h-14 mb-4">{{ $enrollment->course->title }}</h4>
                                            
                                            <div class="mb-8">
                                                <div class="flex justify-between text-xs font-bold mb-2">
                                                    <span class="text-slate-400 uppercase tracking-widest">Progres</span>
                                                    <span class="text-blue-600">{{ $enrollment->progressPercent ?? 0 }}%</span>
                                                </div>
                                                <div class="w-full bg-slate-100 rounded-full h-2">
                                                    <div class="bg-blue-600 h-2 rounded-full transition-all duration-1000 ease-out" style="width: {{ $enrollment->progressPercent ?? 0 }}%"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-auto">
                                            @if(!$user)
                                                <a href="{{ route('login') }}" class="block w-full text-center px-4 py-3.5 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition duration-300 text-sm">
                                                    Login untuk Belajar
                                                </a>
                                            @elseif($enrollment->nextLesson)
                                                <a href="{{ route('lessons.show', [$enrollment->course->slug, $enrollment->nextLesson->id]) }}" class="block w-full text-center px-4 py-3.5 bg-slate-50 border border-slate-200 text-slate-700 font-bold rounded-2xl hover:bg-blue-600 hover:text-white hover:border-blue-600 transition duration-300 text-sm">
                                                    Lanjutkan Materi
                                                </a>
                                            @else
                                                <a href="{{ route('certificates.show', $enrollment->course->slug) }}" target="_blank" class="block w-full text-center px-4 py-3.5 bg-yellow-400 text-blue-900 font-black rounded-2xl shadow-md hover:bg-yellow-500 transition duration-300 uppercase tracking-widest text-xs">
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