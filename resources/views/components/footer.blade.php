<footer class="hidden lg:block relative bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 text-white overflow-hidden">
    {{-- Decorative elements --}}
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-12 gap-8">
            {{-- Brand Section --}}
            <div class="col-span-4">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl flex items-center justify-center">
                        <span class="text-xl font-bold">S</span>
                    </div>
                    <h3 class="text-xl font-bold">SURAWANGI</h3>
                </div>
                <p class="text-gray-300 text-sm leading-relaxed mb-4">
                    Portal berita terpercaya DPRD Kabupaten Banyuwangi. Dikelola oleh Siswa SMKN 1 Banyuwangi Jurusan PPLG.
                </p>

                @if (!empty($socialMedias) && !$socialMedias->isEmpty())
                    <div class="space-y-2">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Ikuti Kami</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($socialMedias as $social)
                                <x-social-media-icon :social="$social" />
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Categories Section --}}
            <div class="col-span-3">
                <h3 class="text-base font-bold mb-4 flex items-center gap-2">
                    <div class="w-1 h-5 bg-gradient-to-b from-blue-600 to-blue-400 rounded-full"></div>
                    Berita Rapat
                </h3>

                <div class="space-y-2" x-data="{ openAKD: false, openParipurna: false }">
                    {{-- AKD Dropdown --}}
                    <div class="border border-white/10 rounded-lg overflow-hidden bg-white/5 backdrop-blur-md">
                        <button @click="openAKD = !openAKD"
                            class="w-full flex justify-between items-center px-3 py-2 text-sm font-semibold text-white hover:bg-white/10 transition-all">
                            <span>AKD</span>
                            <svg :class="{'rotate-180': openAKD}" class="w-4 h-4 transform transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="openAKD" x-transition class="px-3 pb-2 space-y-1.5 text-gray-300">
                            <a href="{{ route('news.index', 'komisi-1') }}" class="block text-sm hover:text-white transition">Komisi 1</a>
                            <a href="{{ route('news.index', 'komisi-2') }}" class="block text-sm hover:text-white transition">Komisi 2</a>
                            <a href="{{ route('news.index', 'komisi-3') }}" class="block text-sm hover:text-white transition">Komisi 3</a>
                            <a href="{{ route('news.index', 'komisi-4') }}" class="block text-sm hover:text-white transition">Komisi 4</a>
                            <a href="{{ route('news.index', 'rapat-khusus') }}" class="block text-sm hover:text-white transition">Rapat Khusus</a>
                        </div>
                    </div>

                    {{-- Paripurna Dropdown --}}
                    <div class="border border-white/10 rounded-lg overflow-hidden bg-white/5 backdrop-blur-md">
                        <button @click="openParipurna = !openParipurna"
                            class="w-full flex justify-between items-center px-3 py-2 text-sm font-semibold text-white hover:bg-white/10 transition-all">
                            <span>Paripurna</span>
                            <svg :class="{'rotate-180': openParipurna}" class="w-4 h-4 transform transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="openParipurna" x-transition class="px-3 pb-2 space-y-1.5 text-gray-300">
                            <a href="{{ route('news.index', 'paripurna-eksternal') }}" class="block text-sm hover:text-white transition">Eksternal</a>
                            <a href="{{ route('news.index', 'paripurna-internal') }}" class="block text-sm hover:text-white transition">Internal</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navigation Section --}}
            <div class="col-span-2">
                <h3 class="text-base font-bold mb-4 flex items-center gap-2">
                    <div class="w-1 h-5 bg-gradient-to-b from-blue-600 to-blue-400 rounded-full"></div>
                    Navigasi
                </h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-sm text-gray-300 hover:text-white transition">Beranda</a></li>
                    <li><a href="{{ route('profile.index') }}" class="text-sm text-gray-300 hover:text-white transition">Profil</a></li>
                    <li><a href="{{ route('news.index', 'agenda') }}" class="text-sm text-gray-300 hover:text-white transition">Agenda</a></li>
                    <li><a href="{{ route('news.index', 'kunjungan-tamu') }}" class="text-sm text-gray-300 hover:text-white transition">Kunjungan Tamu</a></li>
                    <li><a href="{{ route('news.index', 'fraksi') }}" class="text-sm text-gray-300 hover:text-white transition">Fraksi</a></li>
                </ul>
            </div>

            {{-- Quick Links --}}
            <div class="col-span-3">
                <h3 class="text-base font-bold mb-4 flex items-center gap-2">
                    <div class="w-1 h-5 bg-gradient-to-b from-blue-600 to-blue-400 rounded-full"></div>
                    Informasi
                </h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('filament.admin.pages.dashboard') }}" class="text-sm text-gray-300 hover:text-white transition">Akun</a></li>
                    <li><a href="#" class="text-sm text-gray-300 hover:text-white transition">Kebijakan Privasi</a></li>
                    <li><a href="#" class="text-sm text-gray-300 hover:text-white transition">Syarat & Ketentuan</a></li>
                    <li><a href="#" class="text-sm text-gray-300 hover:text-white transition">Kontak</a></li>
                </ul>
            </div>
        </div>

        {{-- Bottom Section --}}
        <div class="mt-8 pt-6 border-t border-white/10">
            <div class="flex justify-between items-center">
                <p class="text-sm text-gray-400">
                    © {{ date('Y') }} <span class="font-semibold text-white">{{ env('APP_NAME') }}</span>. Hak cipta dilindungi.
                </p>
            </div>
        </div>
    </div>

    {{-- Wave decoration --}}
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-800 via-blue-600 to-blue-800"></div>
</footer>
