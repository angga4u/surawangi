@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    {{-- Navbar --}}
    <x-navbar />

    {{-- Carousel --}}
    @if (!empty($carousel) && !request('search'))
        <x-carousel.carousel :carousel="$carousel" />
    @endif

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      {{-- Kategori Berita --}}
@if (!request('search'))
    <section class="py-16 bg-gradient-to-b from-white to-blue-50/30">
        <div data-aos="fade-up" class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3 tracking-tight">
                Telusuri <span class="text-blue-600">Topik Berita</span>
            </h2>
            <p class="text-gray-600 text-base max-w-2xl mx-auto leading-relaxed">
                Informasi terkini dan terlengkap seputar kegiatan DPRD Kabupaten Banyuwangi
            </p>
        </div>

        {{-- Carousel Layout --}}
        <div class="relative">
            <div class="overflow-hidden">
                <div id="categoryCarousel" class="flex transition-transform duration-500 ease-out">
                    @foreach ($categories as $category)
                        <div class="w-full sm:w-1/2 lg:w-1/4 flex-shrink-0 px-3">
                            <a href="{{ route('news.index', $category->slug) }}"
                                class="block h-full bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl border-2 border-transparent hover:border-blue-500 transition-all duration-300 transform hover:-translate-y-2 group">

                                {{-- Colored Top Bar --}}
                                <div class="h-1.5 w-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full mb-5 group-hover:w-full transition-all duration-500"></div>

                                {{-- Icon Circle --}}
                                <div class="mb-4">
                                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                        </svg>
                                    </div>
                                </div>

                                {{-- Title --}}
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">
                                    {{ $category->name }}
                                </h3>

                                {{-- Description --}}
                                <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-2">
                                    {{ $category->description }}
                                </p>

                                {{-- Read More Link --}}
                                <div class="flex items-center text-blue-600 font-semibold text-sm">
                                    <span class="mr-2">Lihat Berita</span>
                                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Navigation Buttons --}}
            <button id="categoryPrevBtn"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 bg-white hover:bg-blue-600 hover:text-white text-gray-800 rounded-full p-3 shadow-lg transition-all duration-300 z-10">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <button id="categoryNextBtn"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 bg-white hover:bg-blue-600 hover:text-white text-gray-800 rounded-full p-3 shadow-lg transition-all duration-300 z-10">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </section>
@endif

{{-- Ajakan Aspirasi --}}
        @if (!request('search'))
        <section class="py-12">
            <div data-aos="fade-up" class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl shadow-xl overflow-hidden">
                <div class="grid md:grid-cols-2 gap-8 items-center p-8 md:p-12">
                    {{-- Konten Kiri --}}
                    <div class="text-white">
                        <h3 class="text-2xl lg:text-3xl font-bold mb-4">
                            Suara Anda, Masa Depan Banyuwangi
                        </h3>
                        <p class="text-blue-50 leading-relaxed mb-6">
                            Kami mengundang seluruh masyarakat Banyuwangi untuk menyampaikan aspirasi, keluhan, dan harapan Anda.
                            DPRD Kabupaten Banyuwangi siap mendengar dan memperjuangkan kepentingan masyarakat demi kemajuan daerah kita bersama.
                        </p>
                        <ul class="space-y-3 text-blue-50">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 mr-3 flex-shrink-0 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Penyampaian aspirasi mudah dan transparan</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 mr-3 flex-shrink-0 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Respon cepat dari wakil rakyat</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 mr-3 flex-shrink-0 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Kontribusi nyata untuk pembangunan daerah</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Konten Kanan --}}
                    <div class="text-center md:text-right">
                        <div class="relative bg-white/10 backdrop-blur-sm rounded-xl p-8 border border-white/20 overflow-hidden">
                            {{-- Background Image dengan Overlay --}}
                            <div class="absolute inset-0 z-0">
                                <img src="{{ asset('assets/img/aspirasi.png') }}"
                                     alt="Aspirasi Masyarakat"
                                     class="w-full h-full object-cover opacity-40">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-600/60 to-blue-800/60"></div>
                            </div>

                            {{-- Konten --}}
                            <div class="relative z-10">
                                <div class="bg-white/20 backdrop-blur-sm rounded-full w-20 h-20 flex items-center justify-center mx-auto md:ml-auto md:mr-0 mb-6">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                    </svg>
                                </div>
                                <h4 class="text-white text-xl font-bold mb-4 drop-shadow-lg">
                                    Isi Form Aspirasi Anda
                                </h4>
                                <p class="text-white text-sm mb-6 drop-shadow">
                                    Sampaikan ide, saran, dan keluhan untuk kemajuan Banyuwangi
                                </p>
                                <a href="{{ route('aspirasi.index') }}"
                                   class="inline-flex items-center px-8 py-3.5 bg-white text-blue-600 font-bold rounded-lg hover:bg-blue-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125"/>
                                    </svg>
                                    <span>Isi Form Sekarang</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        {{-- Berita Terbaru / Hasil Pencarian --}}
        <section class="py-24 -mx-4 sm:-mx-6 lg:-mx-8 px-4 sm:px-6 lg:px-8">
            <div data-aos="fade-up" class="text-center mb-20">
                @if (request('search'))
                    <span class="inline-block px-4 py-1.5 bg-blue-50 text-blue-700 text-sm font-medium rounded-full mb-4">
                        Pencarian
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 tracking-tight">
                        Hasil untuk "{{ request('search') }}"
                    </h2>
                @else
                    <h2 class="text-4xl lg:text-5xl font-bold text-blue-600 mb-6 tracking-tight">
                        Berita Terbaru
                    </h2>
                    <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                        Update informasi dan agenda penting dari DPRD Kabupaten Banyuwangi
                    </p>
                @endif
            </div>

            @if (!$posts->isEmpty())
                @if (!request('search'))
                    {{-- Carousel untuk Berita Terbaru --}}
                    <div data-aos="fade-up" data-aos-delay="100" class="relative">
                        <div class="overflow-hidden">
                            <div id="newsCarousel" class="flex transition-transform duration-500 ease-out">
                                @foreach ($posts as $post)
                                    <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-4">
                                        <x-card.news.news-card :post="$post" />
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Navigation Buttons --}}
                        <button id="prevBtn"
                            class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 bg-white hover:bg-blue-600 hover:text-white text-gray-800 rounded-full p-3 shadow-lg transition-all duration-300 z-10 group">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>

                        <button id="nextBtn"
                            class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 bg-white hover:bg-blue-600 hover:text-white text-gray-800 rounded-full p-3 shadow-lg transition-all duration-300 z-10 group">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>

                    {{-- Carousel Scripts --}}
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Category Carousel
                            const categoryCarousel = document.getElementById('categoryCarousel');
                            const categoryPrevBtn = document.getElementById('categoryPrevBtn');
                            const categoryNextBtn = document.getElementById('categoryNextBtn');

                            let categoryIndex = 0;
                            const totalCategories = {{ $categories->count() }};

                            function getCategoryItemsPerView() {
                                if (window.innerWidth >= 1024) return 4; // lg
                                if (window.innerWidth >= 640) return 2;  // sm
                                return 1; // mobile
                            }

                            let categoryItemsPerView = getCategoryItemsPerView();
                            let categoryMaxIndex = Math.max(0, totalCategories - categoryItemsPerView);

                            window.addEventListener('resize', function() {
                                categoryItemsPerView = getCategoryItemsPerView();
                                categoryIndex = Math.min(categoryIndex, Math.max(0, totalCategories - categoryItemsPerView));
                                categoryMaxIndex = Math.max(0, totalCategories - categoryItemsPerView);
                                updateCategoryCarousel();
                            });

                            function updateCategoryCarousel() {
                                const percentage = -(categoryIndex * (100 / categoryItemsPerView));
                                categoryCarousel.style.transform = `translateX(${percentage}%)`;

                                categoryPrevBtn.style.opacity = categoryIndex === 0 ? '0.5' : '1';
                                categoryPrevBtn.style.pointerEvents = categoryIndex === 0 ? 'none' : 'auto';
                                categoryNextBtn.style.opacity = categoryIndex >= categoryMaxIndex ? '0.5' : '1';
                                categoryNextBtn.style.pointerEvents = categoryIndex >= categoryMaxIndex ? 'none' : 'auto';
                            }

                            categoryPrevBtn.addEventListener('click', function() {
                                if (categoryIndex > 0) {
                                    categoryIndex--;
                                    updateCategoryCarousel();
                                }
                            });

                            categoryNextBtn.addEventListener('click', function() {
                                if (categoryIndex < categoryMaxIndex) {
                                    categoryIndex++;
                                    updateCategoryCarousel();
                                }
                            });

                            updateCategoryCarousel();

                            // News Carousel
                            const carousel = document.getElementById('newsCarousel');
                            const prevBtn = document.getElementById('prevBtn');
                            const nextBtn = document.getElementById('nextBtn');

                            let currentIndex = 0;
                            const totalItems = {{ $posts->count() }};

                            function getItemsPerView() {
                                if (window.innerWidth >= 1024) return 3; // lg
                                if (window.innerWidth >= 640) return 2;  // sm
                                return 1; // mobile
                            }

                            let itemsPerView = getItemsPerView();
                            const maxIndex = Math.max(0, totalItems - itemsPerView);

                            window.addEventListener('resize', function() {
                                itemsPerView = getItemsPerView();
                                currentIndex = Math.min(currentIndex, Math.max(0, totalItems - itemsPerView));
                                updateCarousel();
                            });

                            function updateCarousel() {
                                const percentage = -(currentIndex * (100 / itemsPerView));
                                carousel.style.transform = `translateX(${percentage}%)`;

                                prevBtn.style.opacity = currentIndex === 0 ? '0.5' : '1';
                                prevBtn.style.pointerEvents = currentIndex === 0 ? 'none' : 'auto';
                                nextBtn.style.opacity = currentIndex >= maxIndex ? '0.5' : '1';
                                nextBtn.style.pointerEvents = currentIndex >= maxIndex ? 'none' : 'auto';
                            }

                            prevBtn.addEventListener('click', function() {
                                if (currentIndex > 0) {
                                    currentIndex--;
                                    updateCarousel();
                                }
                            });

                            nextBtn.addEventListener('click', function() {
                                if (currentIndex < maxIndex) {
                                    currentIndex++;
                                    updateCarousel();
                                }
                            });

                            updateCarousel();
                        });
                    </script>
                @else
                    {{-- Grid untuk Hasil Pencarian --}}
                    <div data-aos="fade-up" data-aos-delay="100"
                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($posts as $post)
                            <x-card.news.news-card :post="$post" />
                        @endforeach
                    </div>
                @endif
            @else
                <div data-aos="zoom-in"
                    class="bg-white rounded-3xl shadow-sm px-12 py-16 text-center max-w-lg mx-auto border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-9 h-9 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if (request('search'))
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            @endif
                        </svg>
                    </div>
                    @if (request('search'))
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Tidak Ada Hasil</h3>
                        <p class="text-gray-500 leading-relaxed">Coba kata kunci lain untuk pencarian yang lebih spesifik</p>
                    @else
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Belum Ada Berita</h3>
                        <p class="text-gray-500 leading-relaxed">Pantau terus untuk informasi terbaru dari kami</p>
                    @endif
                </div>
            @endif

            @if (request('search'))
                <div class="mt-16 flex justify-center">
                    {{ $posts->links() }}
                </div>
            @endif
        </section>
    </main>

    {{-- Footer --}}
    <x-footer />
@endsection
