@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<x-navbar />

@if (!empty($carousel))
    <x-carousel.carousel :carousel="$carousel" />
@endif

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- ===== ABOUT SECTION ===== -->
    <section class="mb-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 mb-6 border-l-8 border-primary pl-4">
                Visi & Misi SURAWANGI
            </h2>

            <div class="space-y-6">
                <div class="bg-white/95 border border-gray-100 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h3 class="flex items-center gap-2 text-xl font-semibold text-primary mb-2">
                        @svg('heroicon-o-eye', 'w-6 h-6') <span>Visi</span>
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Menjadi portal berita digital inovatif dan terpercaya yang menginspirasi generasi muda melalui informasi yang aktual, edukatif, dan berimbang.
                    </p>
                </div>

                <div class="bg-white/95 border border-gray-100 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h3 class="flex items-center gap-2 text-xl font-semibold text-primary mb-2">
                        @svg('heroicon-o-light-bulb', 'w-6 h-6') <span>Misi</span>
                    </h3>
                    <div class="text-gray-700 leading-relaxed space-y-2">
                        {!! str($profile->mission)->sanitizeHtml() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <!-- Hero Image dengan Overlay Gradient -->
            <div class="relative group overflow-hidden rounded-3xl shadow-2xl">
                <img src="{{ asset('assets/img/angga.JPG') }}" alt="Tim SURAWANGI"
                    class="w-full h-96 object-cover transition-all duration-700 group-hover:scale-110">

                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/20 to-transparent opacity-60 group-hover:opacity-40 transition-opacity duration-500"></div>

                <!-- Floating Badge -->
                <div class="absolute top-6 right-6 bg-white/95 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg">
                    <p class="text-xs font-semibold text-primary">Sejak 2025</p>
                </div>

                <!-- Bottom Text Overlay -->
                <div class="absolute bottom-6 left-6 right-6">
                    <h3 class="text-white text-2xl font-bold mb-1 drop-shadow-lg">Tim Profesional Kami</h3>
                    <p class="text-white/90 text-sm drop-shadow-md">Dedikasi untuk Jurnalisme Berkualitas</p>
                </div>
            </div>

            <!-- Stats Grid dengan Animasi Modern -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Stat Card 1 -->
                <div class="group relative bg-gradient-to-br from-primary via-primary to-accent text-white rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden">
                    <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                                @svg('heroicon-o-calendar', 'w-5 h-5')
                            </div>
                            <div class="w-2 h-2 bg-white/60 rounded-full animate-pulse"></div>
                        </div>
                        <div class="text-4xl font-bold mb-1">5+</div>
                        <div class="text-sm opacity-90 font-medium">Bulan Pengalaman</div>
                    </div>
                </div>

                <!-- Stat Card 2 -->
                <div class="group relative bg-white border border-gray-200 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 hover:border-primary/30 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-accent/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center group-hover:bg-primary/20 transition-colors">
                                @svg('heroicon-o-document-text', 'w-5 h-5 text-primary')
                            </div>
                            <div class="w-2 h-2 bg-primary/40 rounded-full"></div>
                        </div>
                        <div class="text-4xl font-bold text-primary mb-1">1K+</div>
                        <div class="text-sm text-gray-600 font-medium">Artikel Dipublikasi</div>
                    </div>
                </div>

                <!-- Stat Card 3 -->
                <div class="group relative bg-white border border-gray-200 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 hover:border-primary/30 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-accent/5 to-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center group-hover:bg-accent/20 transition-colors">
                                @svg('heroicon-o-users', 'w-5 h-5 text-accent')
                            </div>
                            <div class="w-2 h-2 bg-accent/40 rounded-full"></div>
                        </div>
                        <div class="text-4xl font-bold text-accent mb-1">5K+</div>
                        <div class="text-sm text-gray-600 font-medium">Pembaca Aktif</div>
                    </div>
                </div>

                <!-- Stat Card 4 -->
                <div class="group relative bg-white border border-gray-200 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 hover:border-primary/30 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-accent/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center group-hover:bg-primary/20 transition-colors">
                                @svg('heroicon-o-square-3-stack-3d', 'w-5 h-5 text-primary')
                            </div>
                            <div class="w-2 h-2 bg-primary/40 rounded-full"></div>
                        </div>
                        <div class="text-4xl font-bold text-primary mb-1">12</div>
                        <div class="text-sm text-gray-600 font-medium">Kategori Berita</div>
                    </div>
                </div>
            </div>

            <!-- Progress Bar atau Trust Indicator -->
            <div class="bg-gradient-to-r from-gray-50 to-white border border-gray-100 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-3">
                        @svg('heroicon-o-chart-bar', 'w-6 h-6 text-primary')
                        <span class="font-semibold text-gray-900">Pertumbuhan Pembaca</span>
                    </div>
                    <span class="text-sm font-bold text-green-600">+24% bulan ini</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                    <div class="bg-gradient-to-r from-primary to-accent h-full rounded-full shadow-inner" style="width: 76%"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== TEAM SECTION ===== -->
    @if (!$staffs->isEmpty())
    <section class="mb-24">
        <h2 class="text-3xl font-extrabold text-gray-900 border-l-8 border-primary pl-4 mb-10">
            SURAWANGI Creative Editorial Team
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($staffs as $staff)
            <div
                class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group flex flex-col items-center text-center p-5 hover:-translate-y-1.5">

                <div class="relative w-full h-56 rounded-xl overflow-hidden shadow-md mb-4 group-hover:scale-[1.03] transition-transform duration-300">
                    <img src="{{ asset("storage/$staff->photo") }}" alt="{{ $staff->position }}"
                        class="w-full h-full object-cover">
                </div>

                <div class="flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">{{ $staff->name }}</h3>
                        <p class="text-primary text-xs font-medium mb-2 uppercase tracking-wide">{{ $staff->position }}</p>
                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                            {{ $staff->bio }}
                        </p>
                    </div>
                </div>

                <div class="mt-4 h-1 w-10 bg-primary rounded-full group-hover:w-16 transition-all duration-300"></div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- ===== VALUES SECTION ===== -->
    <section class="mb-20">
        <h2 class="text-3xl font-extrabold text-gray-900 border-l-8 border-primary pl-4 mb-10">
            Nilai & Prinsip Kerja
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $values = [
                    ['Integritas', 'Menjunjung tinggi kejujuran dan transparansi dalam setiap pemberitaan.', 'heroicon-o-shield-check'],
                    ['Akurasi', 'Memastikan setiap informasi melalui proses verifikasi yang ketat.', 'heroicon-o-magnifying-glass'],
                    ['Berimbang', 'Menyajikan berbagai sudut pandang secara objektif dan adil.', 'heroicon-o-scale'],
                    ['Aktual', 'Mengutamakan kecepatan tanpa mengorbankan kualitas.', 'heroicon-o-clock'],
                    ['Humanis', 'Mengutamakan nilai kemanusiaan dalam setiap berita.', 'heroicon-o-heart'],
                    ['Inovatif', 'Terus berinovasi dengan teknologi terkini.', 'heroicon-o-bolt'],
                ];
            @endphp

            @foreach ($values as [$title, $desc, $icon])
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition-all transform hover:-translate-y-2 text-center">
                <div class="w-14 h-14 mx-auto mb-4 flex items-center justify-center bg-primary text-white rounded-xl shadow-md">
                    @svg($icon, 'w-7 h-7')
                </div>
                <h3 class="font-bold text-navy text-lg mb-2">{{ $title }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- ===== CONTACT SECTION ===== -->
    @if (!$contacts->isEmpty())
    <section class="mb-20">
        <h2 class="text-3xl font-extrabold text-gray-900 border-l-8 border-primary pl-4 mb-10">
            Hubungi Kami
        </h2>

        <div class="bg-white rounded-2xl shadow-lg p-8 flex flex-wrap justify-center gap-8">
            @foreach ($contacts as $contact)
            <div class="flex items-center gap-4 bg-gray-50 px-5 py-3 rounded-xl shadow-sm hover:shadow-md transition">
                <x-icon.contact-icon :contact="$contact" />
                <div>
                    <p class="font-semibold text-gray-700 text-sm">{{ ucwords($contact->platform) }}</p>
                    <p class="text-gray-500 text-xs">{{ $contact->contact }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- ===== ACHIEVEMENTS SECTION (Modern Card with Wide Image) ===== -->
    @if (!$achievements->isEmpty())
    <section class="relative py-20 bg-gradient-to-br from-white via-gray-50 to-gray-100 rounded-3xl shadow-inner overflow-hidden">
        <div class="absolute inset-0 bg-[url('/assets/img/pattern.svg')] opacity-10"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6">
            <div class="text-center mb-14">
                <h2 class="text-4xl font-extrabold text-gray-900 mb-4 tracking-tight">
                    🏆 Pencapaian & Penghargaan
                </h2>
                <p class="text-gray-600 text-base max-w-2xl mx-auto">
                    Beberapa penghargaan dan pencapaian yang telah diraih tim kami dalam perjalanan mengembangkan SURAWANGI.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($achievements as $achievement)
                <div class="group relative bg-white/90 backdrop-blur-sm border border-gray-100 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:bg-white overflow-hidden">

                    <!-- Gambar lebar di atas card -->
                    @if ($achievement->image)
                        <img src="{{ asset("storage/$achievement->image") }}"
                             alt="{{ $achievement->title }}"
                             class="w-full h-48 object-cover rounded-t-2xl transition-transform duration-500 group-hover:scale-105">
                    @else
                        <div class="w-full h-48 flex items-center justify-center bg-gradient-to-r from-primary to-accent text-white text-3xl font-bold rounded-t-2xl">
                            <span>{{ Str::substr($achievement->title, 0, 1) }}</span>
                        </div>
                    @endif

                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-900 mb-1 group-hover:text-primary transition-colors">
                            {{ $achievement->title }}
                        </h3>
                        <p class="text-sm text-gray-500 font-medium mb-3">
                            {{ $achievement->organizer }}
                        </p>
                        <p class="text-gray-700 text-sm leading-relaxed line-clamp-4">
                            {{ $achievement->description }}
                        </p>
                        <div class="mt-5 w-12 h-1 bg-gradient-to-r from-primary to-accent rounded-full opacity-80 group-hover:w-16 transition-all duration-300 mx-auto"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

</main>

<x-footer />
@endsection
