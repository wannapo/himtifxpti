<<<<<<< HEAD
{{-- Navbar Modern dengan Efek Glassmorphism --}}
<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            
            {{-- Bagian Kiri: Logo & Links --}}
            <div class="flex">
                {{-- Logo --}}
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                        <img src="{{ asset('images/logo.png') }}" 
                             alt="Logo" 
                             class="h-10 w-auto transition-all group-hover:scale-105">
                        {{-- Teks Brand: Muncul di Mobile & Desktop --}}
                        <span class="font-black text-xl sm:text-2xl text-slate-900 tracking-tighter uppercase">
                            Sinau<span class="text-blue-600">in</span>
                        </span>
                    </a>
                </div>

                {{-- Desktop Menu --}}
                <div class="hidden space-x-6 sm:-my-px sm:ms-12 sm:flex">
                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="font-bold text-xs uppercase tracking-widest">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="url('/')" :active="request()->is('/')" class="font-bold text-xs uppercase tracking-widest">
                            {{ __('Beranda') }}
                        </x-nav-link>
                    @endauth
                    
                    <x-nav-link :href="route('courses.index')" :active="request()->routeIs('courses.*')" class="font-bold text-xs uppercase tracking-widest">
                        {{ __('Kursus') }}
                    </x-nav-link>

                    <x-nav-link :href="route('about')" :active="request()->routeIs('about')" class="font-bold text-xs uppercase tracking-widest">
                         {{ __('About Us') }}
                    </x-nav-link>

                    <x-nav-link :href="route('sponsorship')" :active="request()->routeIs('sponsorship')" class="font-bold text-xs uppercase tracking-widest">
                        {{ __('Sponsorship') }}
                    </x-nav-link>
                </div>
            </div>

            {{-- Bagian Kanan: User Actions (Desktop) --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    {{-- Gamifikasi: Streak Desktop --}}
                    <div class="flex items-center bg-blue-50 px-4 py-2 rounded-2xl border border-blue-100 shadow-sm me-6 hover:bg-blue-100 transition-colors cursor-help group" title="Learning Streak">
                        <span class="text-blue-600 font-black text-xs uppercase tracking-tight">🔥 {{ Auth::user()->current_streak ?? 0 }} Hari Streak</span>
                    </div>

                    {{-- User Dropdown --}}
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border-2 border-slate-100 text-sm font-black rounded-2xl text-slate-700 bg-white hover:border-blue-600 transition-all focus:outline-none shadow-sm">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-2">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="p-2">
                                <x-dropdown-link :href="route('profile.edit')" class="rounded-lg font-bold">
                                    {{ __('My Profile') }}
                                </x-dropdown-link>

                                @if(Auth::user()->role === 'instructor' || Auth::user()->role === 'admin')
                                    <x-dropdown-link :href="route('instructor.dashboard')" class="text-blue-600 font-bold rounded-lg bg-blue-50">
                                        {{ __('Materi Manager') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-slate-100 my-1"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();" 
                                            class="text-red-600 font-bold rounded-lg hover:bg-red-50">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                @else
                    {{-- Guest Buttons --}}
                    <div class="space-x-3 flex items-center">
                        <a href="{{ route('login') }}" class="text-xs font-black text-slate-600 hover:text-blue-600 transition-colors uppercase tracking-widest px-4">Log in</a>
                        <a href="{{ route('register') }}" class="text-xs font-black bg-blue-600 text-white hover:bg-blue-700 px-6 py-3 rounded-2xl shadow-lg shadow-blue-200 transition-all active:scale-95 uppercase tracking-widest">
                            Daftar Gratis
                        </a>
                    </div>
                @endauth
            </div>

            {{-- Hamburger Menu & Mobile Streak --}}
            <div class="-me-2 flex items-center space-x-3 sm:hidden">
                {{-- Streak Mobile: Muncul jika login --}}
                @auth
                    <div class="flex items-center bg-blue-50 px-3 py-1.5 rounded-xl border border-blue-100 shadow-sm">
                        <span class="text-blue-600 font-black text-[10px] uppercase tracking-tight">🔥 {{ Auth::user()->current_streak ?? 0 }}</span>
                    </div>
                @endauth

                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-500 hover:text-blue-600 hover:bg-blue-50 focus:outline-none transition duration-150">
=======
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('landing') }}" class="flex items-center space-x-2 group">
                        <div class="w-8 h-8 bg-blue-600 rounded-md flex items-center justify-center text-white font-bold group-hover:bg-blue-700 transition-colors">L</div>
                        <span class="font-bold text-xl text-slate-800 tracking-tight hidden sm:block">LMS<span class="text-blue-600">Colab</span></span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('courses.index')" :active="request()->routeIs('courses.index')">
                        Katalog Kursus
                    </x-nav-link>

                    @auth
                        @if(auth()->user()->role === 'instructor' || auth()->user()->role === 'admin')
                            <x-nav-link :href="route('instructor.dashboard')" :active="request()->routeIs('instructor.*')">
                                {{ __('Kelola Kursus (Instruktur)') }}
                            </x-nav-link>
                        @endif

                        @if(auth()->user()->role === 'admin')
                            <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                                {{ __('Kelola Akun (Admin)') }}
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Gamification & Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                <!-- User Streak -->
                <div class="flex items-center bg-yellow-50 px-3 py-1.5 rounded-full border border-yellow-200 shadow-sm me-4">
                    <span class="text-yellow-600 font-bold text-sm">🔥 {{ Auth::user()->current_streak ?? 0 }} Hari</span>
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <div class="space-x-4 flex items-center">
                    <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="text-sm font-semibold bg-blue-600 text-white hover:bg-blue-700 px-4 py-2 rounded-lg shadow-sm transition-all duration-200">Daftar</a>
                </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

<<<<<<< HEAD
    {{-- Mobile Menu --}}
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="sm:hidden border-t border-slate-100 bg-white shadow-xl">
        
        <div class="pt-2 pb-3 space-y-1 px-4">
            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="rounded-xl font-bold">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="url('/')" :active="request()->is('/')" class="rounded-xl font-bold">
                    {{ __('Beranda') }}
                </x-responsive-nav-link>
            @endauth

            <x-responsive-nav-link :href="route('courses.index')" :active="request()->routeIs('courses.*')" class="rounded-xl font-bold">
                {{ __('Katalog Kursus') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')" class="rounded-xl font-bold">
                {{ __('About Us') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('sponsorship')" :active="request()->routeIs('sponsorship')" class="rounded-xl font-bold">
                {{ __('Sponsorship') }}
            </x-responsive-nav-link>
        </div>

        @auth
            <div class="pt-4 pb-1 border-t border-slate-100 px-4 mb-4">
                {{-- User Info Box --}}
                <div class="flex items-center p-4 bg-slate-50 rounded-2xl mb-4">
                    <div class="flex-shrink-0 bg-blue-600 w-10 h-10 rounded-xl flex items-center justify-center text-white font-black">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="ms-3">
                        <div class="font-black text-slate-900">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-xs text-slate-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="rounded-xl font-bold">
                        {{ __('My Profile') }}
                    </x-responsive-nav-link>

                    @if(Auth::user()->role === 'instructor' || Auth::user()->role === 'admin')
                        <x-responsive-nav-link :href="route('instructor.dashboard')" class="text-blue-600 font-bold rounded-xl bg-blue-50 border-l-4 border-blue-600">
                            {{ __('Materi Manager (Admin)') }}
                        </x-responsive-nav-link>
                    @endif
                </div>

                <div class="mt-4 border-t border-slate-100 pt-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center px-4 py-3 text-red-600 font-bold rounded-xl hover:bg-red-50 transition">
                            <svg class="w-5 h-5 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                            {{ __('Keluar Aplikasi') }}
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-4 pb-6 border-t border-slate-100 px-4 space-y-2">
                <a href="{{ route('login') }}" class="block w-full text-center py-3 font-bold text-slate-600 bg-slate-50 rounded-xl">Log In</a>
                <a href="{{ route('register') }}" class="block w-full text-center py-3 font-bold text-white bg-blue-600 rounded-xl shadow-lg shadow-blue-100">Daftar Sekarang</a>
            </div>
        @endauth
    </div>
</nav>
=======
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('courses.index')" :active="request()->routeIs('courses.index')">
                Katalog Kursus
            </x-responsive-nav-link>
            @auth
                @if(auth()->user()->role === 'instructor' || auth()->user()->role === 'admin')
                    <x-responsive-nav-link :href="route('instructor.dashboard')" :active="request()->routeIs('instructor.*')">
                        {{ __('Kelola Kursus') }}
                    </x-responsive-nav-link>
                @endif
                @if(auth()->user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                        {{ __('Kelola Akun') }}
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @else
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('Log in') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            </div>
            @endauth
        </div>
    </div>
</nav>
>>>>>>> 16daf2ab4b3ba50f6b77b31ce427a4794e96c73c
