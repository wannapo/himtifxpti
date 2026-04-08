<x-app-layout>
    <div class="bg-slate-50 border-b border-slate-200 py-10 sm:py-16 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold text-slate-800 tracking-tight mb-3 sm:mb-4">
                Tingkatkan Keahlian Coding Anda.
            </h1>
            <p class="text-base sm:text-lg text-slate-600 max-w-2xl mx-auto font-medium mb-6 sm:mb-8">
                Bangun portofolio profesional dan dapatkan sertifikat yang diakui industri. Mulai sekarang, gratis.
            </p>
            <div class="mt-6 sm:mt-8 flex justify-center w-full max-w-lg mx-auto">
                <form action="{{ route('courses.index') }}" method="GET" class="flex flex-col sm:flex-row w-full shadow-sm rounded-lg overflow-hidden border border-slate-300 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 transition-all">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari sertifikasi atau kursus..." class="w-full border-none p-3 sm:p-4 text-base focus:ring-0 text-slate-700">
                    <button type="submit" class="bg-blue-600 text-white px-6 sm:px-8 py-3 sm:py-0 font-semibold hover:bg-blue-700 transition-colors">Cari</button>
                </form>
            </div>
        </div>
    </div>

    <div class="py-8 sm:py-12 bg-white min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-xl sm:text-2xl font-bold mb-6 sm:mb-8 text-slate-800">Sertifikasi yang Tersedia</h2>
            
            <div class="grid gap-4 sm:gap-6">
                @forelse ($courses as $course)
                    <a href="{{ route('courses.show', $course->slug) }}" class="block bg-white border border-slate-200 rounded-xl p-4 sm:p-6 shadow-sm hover:shadow-md hover:border-blue-200 transition-all duration-300 group">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-6">
                            <div class="flex items-center space-x-4 sm:space-x-6 flex-grow w-full sm:w-auto">
                                <div class="w-16 h-16 sm:w-24 sm:h-24 rounded-lg overflow-hidden border border-slate-100 flex-shrink-0 shadow-sm">
                                    <img src="{{ $course->image ? asset($course->image) : 'https://via.placeholder.com/150' }}" alt="{{ $course->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center space-x-3 mb-1">
                                        <h3 class="text-lg sm:text-2xl font-bold text-slate-800 group-hover:text-blue-600 transition-colors truncate">
                                            {{ $course->title }}
                                        </h3>
                                    </div>
                                    <p class="text-slate-500 text-xs sm:text-sm leading-relaxed line-clamp-2">{{ Str::limit($course->description, 140) }}</p>
                                </div>
                            </div>
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity hidden md:flex items-center flex-shrink-0">
                                <span class="bg-blue-50 text-blue-600 px-5 py-2 rounded-lg font-semibold text-sm border border-blue-100">Buka Kelas &rarr;</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="bg-slate-50 border border-slate-200 rounded-xl p-8 sm:p-12 text-center text-slate-500 shadow-sm">
                        <svg class="w-10 h-10 sm:w-12 sm:h-12 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <p class="font-medium text-base sm:text-lg">Belum ada kursus yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
