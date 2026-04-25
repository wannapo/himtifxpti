<x-app-layout>
    <x-slot name="title">Sponsorship - Sinauin</x-slot>

    <div class="bg-slate-50 border-b border-slate-200 py-16 px-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5 pointer-events-none">
            <div class="absolute top-0 left-0 w-72 h-72 bg-blue-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-400 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-4xl mx-auto text-center relative z-10">
            <span class="inline-block bg-yellow-400 text-blue-900 text-[10px] font-[900] px-5 py-1.5 rounded-full uppercase tracking-[0.2em] mb-6 shadow-lg">
                Official Partnership
            </span>
            <h1 class="text-4xl md:text-6xl font-[900] text-slate-800 leading-[1.1] tracking-tighter mb-6 italic uppercase">
                Terima Kasih Kepada <br><span class="text-blue-600 underline decoration-blue-100">Sponsor Kami.</span>
            </h1>
            <p class="text-lg text-slate-500 max-w-2xl mx-auto font-bold italic leading-relaxed">
                Dukungan luar biasa dari para mitra kami membantu mewujudkan ekosistem belajar coding yang inklusif dan kolaboratif.
            </p>
        </div>
    </div>

    <div class="py-20 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                
                <div class="bg-white rounded-[2.5rem] p-10 shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 flex flex-col items-center text-center group">
                    <div class="w-32 h-32 p-4 bg-slate-50 rounded-[2rem] border border-slate-100 flex items-center justify-center mb-8 group-hover:scale-110 transition duration-500 shadow-inner">
                        <img src="{{ asset('images/Sponsor1.jpg') }}" alt="Ferrari" class="max-h-full object-contain">
                    </div>
                    
                    <h4 class="font-[900] text-2xl text-slate-800 mb-4 tracking-tighter uppercase italic">
                        Ferrari
                    </h4>
                    
                    <div class="w-12 h-1 bg-blue-600 rounded-full mb-6"></div>
                    
                    <p class="text-slate-500 text-sm font-bold italic leading-relaxed text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem cumque minus eaque amet doloribus voluptate, temporibus rerum repellat libero nisi reiciendis vel voluptatibus itaque quasi sit eius alias tenetur assumenda?
                    </p>
                </div>

                <div class="bg-white rounded-[2.5rem] p-10 shadow-sm hover:shadow-2xl transition-all duration-500 border border-slate-100 flex flex-col items-center text-center group">
                    <div class="w-32 h-32 p-4 bg-slate-50 rounded-[2rem] border border-slate-100 flex items-center justify-center mb-8 group-hover:scale-110 transition duration-500 shadow-inner">
                        <img src="{{ asset('images/sp') }}" alt="Nama Sponsor B" class="max-h-full object-contain">
                    </div>
                    
                    <h4 class="font-[900] text-2xl text-slate-800 mb-4 tracking-tighter uppercase italic">
                        Nama Sponsor B
                    </h4>

                    <div class="w-12 h-1 bg-blue-600 rounded-full mb-6"></div>

                    <p class="text-slate-400 text-sm font-bold italic leading-relaxed">
                        Menjadi mitra strategis dalam pengembangan infrastruktur digital dan penyediaan modul pembelajaran eksklusif bagi mahasiswa.
                    </p>
                </div>

                <div class="bg-white/50 border-4 border-dashed border-slate-200 rounded-[2.5rem] p-10 flex flex-col items-center justify-center text-center opacity-60">
                    <div class="text-5xl mb-4">🤝</div>
                    <h4 class="font-[900] text-slate-400 uppercase tracking-widest text-sm">Become a Sponsor</h4>
                    <p class="text-slate-400 text-[10px] font-bold italic mt-2">Hubungi organisasi kami untuk kolaborasi.</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>