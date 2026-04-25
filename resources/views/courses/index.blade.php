<style>
    body { font-family: 'Inter', sans-serif; }
    .custom-scrollbar::-webkit-scrollbar { height: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
</style>

<x-app-layout>
    <x-slot name="title">Katalog Kursus - Sinauin</x-slot>

    <div class="bg-slate-50 border-b border-slate-200 py-16 px-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5 pointer-events-none">
            <div class="absolute top-0 right-0 w-72 h-72 bg-blue-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-indigo-400 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-4xl mx-auto text-center relative z-10">
            <span class="inline-block bg-blue-600 text-white text-[10px] font-[900] px-5 py-1.5 rounded-full uppercase tracking-[0.2em] mb-6 shadow-lg shadow-blue-200">
                Eksplorasi Pengetahuan
            </span>
            <h1 class="text-4xl md:text-6xl font-[900] text-slate-800 leading-[1.1] tracking-tighter mb-6 italic uppercase">
                Tingkatkan Keahlian <br><span class="text-blue-600">Coding Anda.</span>
            </h1>
            <p class="text-lg text-slate-500 max-w-2xl mx-auto font-bold italic mb-10 leading-relaxed">
                Bangun portofolio profesional dan dapatkan sertifikat yang diakui industri. Mulai sekarang, gratis.
            </p>

            <div class="flex justify-center w-full max-w-lg mx-auto">
                <form action="{{ route('courses.index') }}" method="GET" class="flex w-full shadow-2xl rounded-[2rem] overflow-hidden border-4 border-white focus-within:ring-4 focus-within:ring-blue-100 transition-all bg-white">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari sertifikasi..." class="w-full border-none p-5 text-sm font-bold focus:ring-0 text-slate-700 placeholder-slate-300 uppercase tracking-wider">
                    <button type="submit" class="bg-slate-900 text-white px-8 font-[900] hover:bg-blue-600 transition-colors uppercase tracking-widest text-xs">Cari</button>
                </form>
            </div>
        </div>
    </div>

    <div class="py-20 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-12 px-4">
                <h3 class="text-2xl font-[900] text-slate-800 tracking-tighter uppercase flex items-center gap-3">
                    <span class="w-2 h-8 bg-blue-600 rounded-full"></span>
                    Sertifikasi Tersedia
                </h3>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse ($courses as $course)
                    <div class="bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 group flex flex-col h-full">
                        <div class="h-52 bg-slate-200 relative overflow-hidden">
                            @if($course->image)
                                <img src="{{ asset($course->image) }}" alt="{{ $course->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center text-6xl">🚀</div>
                            @endif
                            <div class="absolute top-5 right-5">
                                <span class="bg-white/90 backdrop-blur-md text-slate-900 text-[9px] font-black px-4 py-2 rounded-full uppercase tracking-widest shadow-sm">
                                    Free Access
                                </span>
                            </div>
                        </div>

                        <div class="p-8 flex flex-col flex-grow">
                            <h4 class="font-[900] text-2xl text-slate-800 mb-4 tracking-tighter group-hover:text-blue-600 transition-colors uppercase leading-none">
                                {{ $course->title }}
                            </h4>
                            <p class="text-slate-400 text-sm font-bold italic mb-8 leading-relaxed line-clamp-3">
                                {{ $course->description }}
                            </p>
                            
                            <div class="mt-auto">
                                <a href="{{ route('courses.show', $course->slug) }}" class="block w-full text-center py-4 bg-slate-900 text-white font-[900] rounded-[1.5rem] hover:bg-blue-600 transition duration-300 uppercase tracking-widest text-xs shadow-lg hover:shadow-blue-200">
                                    Buka Kelas &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white rounded-[2.5rem] p-20 text-center border-2 border-dashed border-slate-200">
                        <div class="text-6xl mb-6">🔍</div>
                        <h4 class="text-2xl font-[900] text-slate-800 tracking-tighter uppercase text-center">Kursus tidak ditemukan</h4>
                        <p class="text-slate-400 font-bold italic mt-2">Coba gunakan kata kunci pencarian lain.</p>
                        <a href="{{ route('courses.index') }}" class="inline-block mt-8 px-10 py-4 bg-slate-900 text-white font-[900] rounded-2xl hover:bg-blue-600 transition uppercase tracking-widest text-xs">
                            Reset Pencarian
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>