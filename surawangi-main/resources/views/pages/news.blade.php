@extends('layouts.app')

@section('title', $news->title)
@section('description', $news->excerpt)

@section('content')
    <x-navbar />

    <main class="bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <div class="grid lg:grid-cols-3 gap-8">

                <!-- Main Content Area -->
                <div class="lg:col-span-2">

                    <!-- Article Container -->
                    <article class="bg-white rounded-lg overflow-hidden">

                        <!-- Article Header -->
                        <div class="px-6 sm:px-10 pt-8 sm:pt-10 pb-6">

                            <!-- Breadcrumb -->
                            <nav class="text-sm text-gray-500 mb-5">
                                <a href="/" class="hover:text-gray-900">Beranda</a>
                                <span class="mx-2">/</span>
                                <a href="/berita" class="hover:text-gray-900">Berita</a>
                                <span class="mx-2">/</span>
                                <span class="text-gray-900">{{ $news->category->name }}</span>
                            </nav>

                            <!-- Category Badge -->
                            <div class="mb-5">
                                <span class="inline-block px-3 py-1 text-xs font-semibold uppercase tracking-wider bg-blue-600 text-white rounded">
                                    {{ $news->category->name }}
                                </span>
                            </div>

                            <!-- Title -->
                            <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 leading-tight mb-6">
                                {{ $news->title }}
                            </h1>

                            <!-- Meta Info -->
                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 pb-6 border-b border-gray-200">
                                <time class="flex items-center gap-1.5">
                                    @svg('heroicon-o-calendar', 'w-4 h-4')
                                    {{ $news->published_at->translatedFormat('d F Y') }}
                                </time>
                                <span class="text-gray-300">•</span>
                                <span class="flex items-center gap-1.5">
                                    @svg('heroicon-o-clock', 'w-4 h-4')
                                    {{ $news->reading_time }} menit
                                </span>
                                <span class="text-gray-300">•</span>
                                <span class="flex items-center gap-1.5">
                                    @svg('heroicon-o-eye', 'w-4 h-4')
                                    {{ number_format($news->views) }}
                                </span>
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <figure class="px-6 sm:px-10">
                            <div class="relative aspect-[16/9] w-full overflow-hidden rounded-lg bg-gray-100">
                                <img
                                    src="{{ asset("/storage/$news->thumbnail") }}"
                                    alt="{{ $news->title }}"
                                    class="w-full h-full object-cover"
                                >
                            </div>
                            @if (!is_null($news->thumbnail_information))
                                <figcaption class="mt-3 text-sm text-gray-600 italic">
                                    {{ $news->thumbnail_information }}
                                </figcaption>
                            @endif
                        </figure>

                        <!-- Article Content -->
                        <div class="px-6 sm:px-10 py-8">
                            <div class="prose prose-base max-w-none
                                prose-headings:font-bold prose-headings:text-gray-900
                                prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-4
                                prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-3
                                prose-h4:text-lg prose-h4:mt-6 prose-h4:mb-2
                                prose-p:text-gray-700 prose-p:leading-relaxed prose-p:mb-5
                                prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline
                                prose-strong:text-gray-900 prose-strong:font-semibold
                                prose-ul:my-6 prose-ol:my-6
                                prose-li:text-gray-700 prose-li:mb-2
                                prose-blockquote:border-l-4 prose-blockquote:border-blue-600 prose-blockquote:pl-4 prose-blockquote:py-1 prose-blockquote:my-6 prose-blockquote:italic prose-blockquote:text-gray-700
                                prose-img:rounded-lg prose-img:my-8
                                prose-code:text-blue-600 prose-code:bg-gray-100 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded prose-code:text-sm
                                prose-pre:bg-gray-900 prose-pre:rounded-lg prose-pre:my-6">
                                {!! str($news->content)->sanitizeHtml() !!}
                            </div>
                        </div>

                        <!-- Share Section -->
                        <div class="px-6 sm:px-10 pb-8 pt-6 border-t border-gray-200">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-semibold text-gray-700">Bagikan:</span>
                                <div class="flex items-center gap-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                        target="_blank"
                                        class="w-9 h-9 flex items-center justify-center rounded bg-gray-100 text-gray-600 hover:bg-blue-600 hover:text-white transition-colors">
                                        @svg('bi-facebook', 'w-4 h-4')
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($news->title) }}"
                                        target="_blank"
                                        class="w-9 h-9 flex items-center justify-center rounded bg-gray-100 text-gray-600 hover:bg-gray-900 hover:text-white transition-colors">
                                        @svg('bi-twitter-x', 'w-4 h-4')
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . request()->fullUrl()) }}"
                                        target="_blank"
                                        class="w-9 h-9 flex items-center justify-center rounded bg-gray-100 text-gray-600 hover:bg-green-600 hover:text-white transition-colors">
                                        @svg('bi-whatsapp', 'w-4 h-4')
                                    </a>
                                    <button onclick="copyUrl()"
                                        class="w-9 h-9 flex items-center justify-center rounded bg-gray-100 text-gray-600 hover:bg-gray-700 hover:text-white transition-colors">
                                        @svg('bi-link-45deg', 'w-5 h-5')
                                    </button>
                                </div>
                            </div>
                        </div>

                    </article>
                </div>

                <!-- Sidebar -->
                <aside class="lg:col-span-1">
                    <div class="sticky top-6 space-y-8">

                        <!-- Popular News -->
                        <section class="bg-white rounded-lg overflow-hidden">
                            <div class="bg-gray-900 px-5 py-3">
                                <h2 class="text-sm font-bold text-white uppercase tracking-wide flex items-center gap-2">
                                    @svg('bi-fire', 'w-4 h-4 text-orange-400')
                                    Terpopuler
                                </h2>
                            </div>
                            <div class="p-5 space-y-5">
                                @foreach ($popularNews as $popular)
                                    <div class="flex gap-3">
                                        <span class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded bg-gray-100 text-gray-700 text-xs font-bold">
                                            {{ $loop->iteration }}
                                        </span>
                                        <div class="flex-1 min-w-0">
                                            <x-card.news.popular-news-card :number="$loop->iteration" :post="$popular" />
                                        </div>
                                    </div>
                                    @if (!$loop->last)
                                        <div class="border-b border-gray-100"></div>
                                    @endif
                                @endforeach
                            </div>
                        </section>

                        <!-- Related News -->
                        <section class="bg-white rounded-lg overflow-hidden">
                            <div class="bg-blue-600 px-5 py-3">
                                <h2 class="text-sm font-bold text-white uppercase tracking-wide flex items-center gap-2">
                                    @svg('bi-newspaper', 'w-4 h-4')
                                    Berita Terkait
                                </h2>
                            </div>
                            <div class="p-5 space-y-5">
                                @foreach ($relatedNews as $related)
                                    <div>
                                        <x-card.news.related-news-card :post="$related" />
                                    </div>
                                    @if (!$loop->last)
                                        <div class="border-b border-gray-100"></div>
                                    @endif
                                @endforeach
                            </div>
                        </section>

                    </div>
                </aside>

            </div>
        </div>
    </main>

    <x-footer />
@endsection

@push('scripts')
    <script>
        async function copyUrl() {
            try {
                await navigator.clipboard.writeText(window.location.href);
                notyf.success("Link berhasil disalin");
            } catch (error) {
                console.error('Gagal menyalin:', error);
                notyf.error("Gagal menyalin link");
            }
        }
    </script>
@endpush
