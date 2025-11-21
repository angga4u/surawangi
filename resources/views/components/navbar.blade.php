<div x-data="{ isOpen: false, searchOpen: false }" class="relative">
    <!-- HEADER -->
    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-3">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <img src="{{ asset('assets/img/surawangi.png') }}" alt="SURAWANGI"
                        class="h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                    <img src="{{ asset('assets/img/smea.png') }}" alt="SMEA"
                        class="h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                    <img src="{{ asset('assets/img/sekre.png') }}" alt="SEKRE"
                        class="h-11 w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                </a>

                <!-- Desktop Search -->
                <form action="{{ route('home') }}" method="GET"
                    class="hidden md:flex items-center bg-gray-50 rounded-lg overflow-hidden border border-gray-200 focus-within:border-blue-500 focus-within:bg-white focus-within:shadow-sm transition-all duration-200 w-full max-w-lg mx-6">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari berita atau informasi..."
                        class="flex-1 bg-transparent px-4 py-2 text-gray-700 text-sm outline-none placeholder:text-gray-400">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 hover:bg-blue-700 transition-colors duration-200">
                        @svg('bi-search', 'w-4 h-4')
                    </button>
                </form>

                <!-- Mobile Buttons -->
                <div class="flex items-center space-x-2 md:hidden">
                    <button @click="searchOpen = !searchOpen"
                        class="p-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-gray-100 transition-all">
                        @svg('bi-search', 'w-5 h-5')
                    </button>
                    <button @click="isOpen = !isOpen"
                        class="p-2 rounded-lg text-gray-600 hover:text-blue-600 hover:bg-gray-100 transition-all">
                        <template x-if="!isOpen">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </template>
                        <template x-if="isOpen">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </template>
                    </button>
                </div>
            </div>

            <!-- Mobile Search -->
            <div x-show="searchOpen" x-transition x-cloak
                class="md:hidden border-t border-gray-100 pt-3 pb-3">
                <form action="{{ route('home') }}" method="GET" class="flex bg-gray-50 rounded-lg overflow-hidden border border-gray-200">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari berita..."
                        class="flex-1 bg-transparent px-4 py-2 text-gray-700 text-sm outline-none placeholder:text-gray-400">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 hover:bg-blue-700 transition-colors">
                        @svg('bi-search', 'w-5 h-5')
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- NAV MENU - CLEAN WHITE -->
    <nav class="bg-white sticky top-[68px] z-40 shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ul class="hidden md:flex items-center justify-center space-x-1">
                <!-- Beranda -->
                <li>
                    <a href="{{ route('home') }}"
                        class="relative group flex items-center px-5 py-3.5 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                        <span>Beranda</span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                </li>

                <!-- Profil -->
                <li>
                    <a href="{{ route('profile.index') }}"
                        class="relative group flex items-center px-5 py-3.5 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                        <span>Profil</span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                </li>

                <!-- Agenda -->
                <li>
                    <a href="{{ route('news.index', 'agenda') }}"
                        class="relative group flex items-center px-5 py-3.5 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                        <span>Agenda</span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                </li>

                <!-- Dropdown AKD -->
                <li x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="relative group flex items-center gap-1 px-5 py-3.5 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                        <span>AKD</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                    </button>

                    <div x-show="open" @click.away="open = false" x-cloak
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        class="absolute left-0 mt-1 w-52 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden z-50">
                        <div class="py-2">
                            @foreach (['komisi-1','komisi-2','komisi-3','komisi-4','rapat-khusus'] as $item)
                                <a href="{{ route('news.index', $item) }}"
                                    class="group flex items-center px-4 py-2.5 text-sm text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition-colors duration-150">
                                    <svg class="w-3.5 h-3.5 mr-2.5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    <span>{{ Str::of($item)->replace('-', ' ')->upper() }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <!-- Kunjungan Tamu -->
                <li>
                    <a href="{{ route('news.index', 'kunjungan-tamu') }}"
                        class="relative group flex items-center px-5 py-3.5 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                        <span>Kunjungan Tamu</span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                </li>

                <!-- Fraksi -->
                <li>
                    <a href="{{ route('news.index', 'fraksi') }}"
                        class="relative group flex items-center px-5 py-3.5 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                        <span>Fraksi</span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                </li>

                <!-- Aspirasi -->
                <li>
                    <a href="{{ route('aspirasi.index') }}"
                        class="relative group flex items-center px-5 py-3.5 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                        <span>Aspirasi</span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                </li>

                <!-- Dropdown Paripurna -->
                <li x-data="{ openParipurna: false }" class="relative">
                    <button @click="openParipurna = !openParipurna"
                        class="relative group flex items-center gap-1 px-5 py-3.5 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                        <span>Paripurna</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': openParipurna }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                    </button>

                    <div x-show="openParipurna" @click.away="openParipurna = false" x-cloak
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                        class="absolute left-0 mt-1 w-52 bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden z-50">
                        <div class="py-2">
                            @foreach (['paripurna-eksternal','paripurna-internal'] as $item)
                                <a href="{{ route('news.index', $item) }}"
                                    class="group flex items-center px-4 py-2.5 text-sm text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition-colors duration-150">
                                    <svg class="w-3.5 h-3.5 mr-2.5 text-gray-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    <span>{{ Str::of($item)->replace('paripurna-', '')->title() }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <!-- Akun -->
                <li>
                    <a href="{{ route('filament.admin.pages.dashboard') }}"
                        class="relative group flex items-center px-5 py-3.5 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                        <span>Akun</span>
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- MOBILE MENU - CLEAN & MODERN -->
    <!-- Overlay -->
    <div
        x-show="isOpen"
        x-transition.opacity.duration.300ms
        x-cloak
        class="fixed inset-0 bg-black/40 z-40 md:hidden"
        @click="isOpen = false">
    </div>

    <!-- Sidebar Menu -->
    <div
        x-show="isOpen"
        x-transition:enter="transition transform duration-300 ease-out"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform duration-250 ease-in"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        x-cloak
        class="fixed right-0 top-0 h-full w-72 bg-white shadow-2xl z-50 overflow-y-auto md:hidden"
    >
        <!-- Header Sidebar -->
        <div class="sticky top-0 bg-white border-b border-gray-200 px-5 py-4 z-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('assets/img/surawangi.png') }}" alt="SURAWANGI" class="h-8 w-auto object-contain">
                </div>
                <button @click="isOpen = false" class="text-gray-400 hover:text-gray-600 p-1.5 hover:bg-gray-100 rounded-lg transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Menu Items -->
        <nav class="px-3 py-4">
            <ul class="space-y-0.5">
                <!-- Beranda -->
                <li>
                    <a href="{{ route('home') }}"
                        class="flex items-center px-3 py-2.5 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-150 font-medium text-sm">
                        Beranda
                    </a>
                </li>

                <!-- Profil -->
                <li>
                    <a href="{{ route('profile.index') }}"
                        class="flex items-center px-3 py-2.5 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-150 font-medium text-sm">
                        Profil
                    </a>
                </li>

                <!-- Agenda -->
                <li>
                    <a href="{{ route('news.index', 'agenda') }}"
                        class="flex items-center px-3 py-2.5 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-150 font-medium text-sm">
                        Agenda
                    </a>
                </li>

                <!-- Divider -->
                <li class="py-2">
                    <div class="border-t border-gray-100"></div>
                </li>

                <!-- AKD Dropdown -->
                <li x-data="{ openAKD: false }">
                    <button @click="openAKD = !openAKD"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-150 font-medium text-sm">
                        <span>AKD</span>
                        <svg class="w-4 h-4 transition-transform duration-200"
                            :class="{ 'rotate-180': openAKD }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="openAKD" x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="mt-1 ml-3 space-y-0.5">
                        @foreach (['komisi-1','komisi-2','komisi-3','komisi-4','rapat-khusus'] as $item)
                            <a href="{{ route('news.index', $item) }}"
                                class="flex items-center px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-150">
                                <svg class="w-3 h-3 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                {{ Str::of($item)->replace('-', ' ')->title() }}
                            </a>
                        @endforeach
                    </div>
                </li>

                <!-- Kunjungan Tamu -->
                <li>
                    <a href="{{ route('news.index', 'kunjungan-tamu') }}"
                        class="flex items-center px-3 py-2.5 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-150 font-medium text-sm">
                        Kunjungan Tamu
                    </a>
                </li>

                <!-- Fraksi -->
                <li>
                    <a href="{{ route('news.index', 'fraksi') }}"
                        class="flex items-center px-3 py-2.5 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-150 font-medium text-sm">
                        Fraksi
                    </a>
                </li>

                <!-- Aspirasi -->
                <li>
                    <a href="{{ route('aspirasi.index') }}"
                        class="flex items-center px-3 py-2.5 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-150 font-medium text-sm">
                        Aspirasi
                    </a>
                </li>

                <!-- Paripurna Dropdown -->
                <li x-data="{ openParipurna: false }">
                    <button @click="openParipurna = !openParipurna"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-150 font-medium text-sm">
                        <span>Paripurna</span>
                        <svg class="w-4 h-4 transition-transform duration-200"
                            :class="{ 'rotate-180': openParipurna }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="openParipurna" x-cloak
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="mt-1 ml-3 space-y-0.5">
                        @foreach (['paripurna-eksternal','paripurna-internal'] as $item)
                            <a href="{{ route('news.index', $item) }}"
                                class="flex items-center px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-150">
                                <svg class="w-3 h-3 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                                {{ Str::of($item)->replace('paripurna-', '')->title() }}
                            </a>
                        @endforeach
                    </div>
                </li>

                <!-- Divider -->
                <li class="py-2">
                    <div class="border-t border-gray-100"></div>
                </li>

                <!-- Akun -->
                <li>
                    <a href="{{ route('filament.admin.pages.dashboard') }}"
                        class="flex items-center px-3 py-2.5 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-lg transition-all duration-150 font-medium text-sm">
                        Akun
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
