@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <x-navbar :category="$category" />

    @if (!empty($carousel))
        <x-carousel.carousel :carousel="$carousel" />
    @endif

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- KONTEN UTAMA -->
            <div class="lg:col-span-2 space-y-10">
                <!-- BERITA UTAMA -->
                <section class="featured-section">
                    <h2 class="text-2xl font-extrabold text-navy mb-5 pb-2 border-b-4 border-primary">Berita Utama</h2>
                    @if (is_null($featuredPosts))
                        <div class="bg-gray-50 rounded-2xl border border-gray-200 py-16 text-center">
                            <h3 class="text-lg font-semibold text-gray-700">Tidak ada berita utama</h3>
                        </div>
                    @else
                        <x-card.news.news-card :post="$featuredPosts" />
                    @endif
                </section>

                <!-- BERITA TERBARU -->
                <section class="news-section">
                    <h2 class="text-2xl font-extrabold text-navy mb-5 pb-2 border-b-4 border-primary">Berita Terkini</h2>
                    @if (!$posts->isEmpty())
                        <div class="space-y-6">
                            @foreach ($posts as $post)
                                <article class="flex gap-4 pb-6 border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200 rounded-lg p-4">
                                    <!-- Gambar -->
                                    <div class="flex-shrink-0 w-32 h-24 sm:w-40 sm:h-28">
                                        @if($post->thumbnail)
                                            <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                                 alt="{{ $post->title }}"
                                                 class="w-full h-full object-cover rounded-lg"
                                                 onerror="this.onerror=null; this.src='{{ asset('images/no-image.jpg') }}';">
                                        @elseif($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}"
                                                 alt="{{ $post->title }}"
                                                 class="w-full h-full object-cover rounded-lg"
                                                 onerror="this.onerror=null; this.src='{{ asset('images/no-image.jpg') }}';">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 rounded-lg flex items-center justify-center">
                                                <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Konten -->
                                    <div class="flex-1 min-w-0">
                                        <!-- Badge Kategori -->
                                        <span class="inline-block bg-primary text-white text-xs font-semibold px-3 py-1 rounded-full mb-2">
                                            {{ $post->category->name ?? 'Nasional' }}
                                        </span>

                                        <!-- Judul -->
                                        <h3 class="font-bold text-gray-900 text-base sm:text-lg mb-2 line-clamp-2 hover:text-primary transition-colors">
                                            <a href="{{ route('news.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h3>

                                        <!-- Tanggal -->
                                        <time class="text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($post->published_at)->format('d F Y, H:i') }} WIB
                                        </time>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-gray-50 rounded-2xl border border-gray-200 py-16 text-center">
                            <h3 class="text-lg font-semibold text-gray-700">Tidak ada berita baru</h3>
                        </div>
                    @endif

                    <div class="mt-8 flex justify-center">
                        {{ $posts->links() }}
                    </div>
                </section>
            </div>

            <!-- SIDEBAR -->
            <aside class="space-y-8">
                <!-- Berita Terpopuler -->
                <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-6">
                    <h3 class="text-xl font-bold text-navy mb-4 pb-2 border-b-2 border-primary">Terpopuler</h3>
                    <div class="space-y-5">
                        @foreach ($popularPosts as $post)
                            <x-card.news.popular-news-card :number="$loop->iteration" :post="$post" />
                        @endforeach
                    </div>
                </div>

            <!-- Kategori Lainnya -->
<div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-md border border-blue-200 p-6">
    <h3 class="text-xl font-bold text-navy mb-4 pb-2 border-b-2 border-primary">Kategori Lainnya</h3>
    <div class="space-y-2">
        @php
            $categories = \App\Models\Category::with(['children' => function($query) {
                $query->withCount('posts');
            }])
            ->withCount('posts')
            ->whereNull('parent_id')
            ->get();
        @endphp
        @foreach ($categories as $cat)
            <div class="bg-white rounded-lg overflow-hidden shadow-sm">
                <!-- Parent Category -->
                <div class="flex items-center p-3 hover:bg-blue-50 transition-colors duration-200 group">
                    @if($cat->children->count() > 0)
                        <!-- Jika ada children, klik akan toggle dropdown -->
                        <button type="button"
                                onclick="toggleSubmenu('submenu-{{ $cat->id }}')"
                                class="flex-1 flex items-center justify-between text-left w-full">
                            <span class="font-semibold text-gray-800 group-hover:text-primary">{{ $cat->name }}</span>
                            <div class="flex items-center gap-3">
                                <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full min-w-[2.5rem] text-center tabular-nums">{{ $cat->posts_count }}</span>
                                <svg class="w-4 h-4 text-gray-600 transform transition-transform duration-200 flex-shrink-0"
                                     id="icon-{{ $cat->id }}"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24"
                                     stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </button>
                    @else
                        <!-- Jika tidak ada children, klik akan redirect -->
                        <a href="{{ route('news.index', $cat->slug) }}"
                           class="flex-1 flex items-center justify-between">
                            <span class="font-semibold text-gray-800 group-hover:text-primary">{{ $cat->name }}</span>
                            <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full min-w-[2.5rem] text-center tabular-nums">{{ $cat->posts_count }}</span>
                        </a>
                    @endif
                </div>

                <!-- Sub Categories -->
                @if($cat->children->count() > 0)
                    <div id="submenu-{{ $cat->id }}" class="hidden bg-blue-50">
                        @foreach($cat->children as $subCat)
                            <a href="{{ route('news.index', $subCat->slug) }}"
                               class="flex items-center justify-between p-3 pl-8 hover:bg-blue-100 transition-colors duration-200 group border-t border-blue-100">
                                <span class="text-sm font-medium text-gray-700 group-hover:text-primary flex items-center">
                                    <span class="w-1.5 h-1.5 rounded-full bg-primary mr-2 flex-shrink-0"></span>
                                    {{ $subCat->name }}
                                </span>
                                <span class="text-xs text-gray-500 bg-white px-3 py-1 rounded-full min-w-[2.5rem] text-center flex-shrink-0 tabular-nums">{{ $subCat->posts_count }}</span>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>

<script>
function toggleSubmenu(submenuId) {
    const submenu = document.getElementById(submenuId);
    const icon = document.getElementById('icon-' + submenuId.replace('submenu-', ''));

    if (submenu && icon) {
        submenu.classList.toggle('hidden');
        icon.classList.toggle('rotate-90');
    }
}
</script>

                <!-- Link Cepat Surawangi -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl shadow-md border border-purple-200 p-6">
                    <h3 class="text-xl font-bold text-navy mb-4 pb-2 border-b-2 border-primary">Berita Mengenai Rapat</h3>
                    <div class="flex flex-wrap gap-2">
                        @php
                            $quickLinks = [
                                ['name' => 'Komisi 1', 'url' => url('/berita/komisi-1')],
                                ['name' => 'Komisi 2', 'url' => url('/berita/komisi-2')],
                                ['name' => 'Komisi 3', 'url' => url('/berita/komisi-3')],
                                ['name' => 'Komisi 4', 'url' => url('/berita/komisi-4')],
                                ['name' => 'Rapat Khusus', 'url' => url('/berita/rapat-khusus')],
                                ['name' => 'Paripurna Internal', 'url' => url('/berita/paripurna-internal')],
                                ['name' => 'Paripurna Eksternal', 'url' => url('/berita/paripurna-eksternal')],
                            ];
                        @endphp
                        @foreach ($quickLinks as $link)
                            <a href="{{ $link['url'] }}" class="inline-block bg-white hover:bg-purple-500 hover:text-white text-gray-700 text-sm font-medium px-4 py-2 rounded-full border border-purple-200 transition-all duration-200 shadow-sm hover:shadow-md">
                                {{ $link['name'] }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Aspirasi Masyarakat -->
                    <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg p-6 text-white">
                <div class="text-center">
                    <svg class="w-12 h-12 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                    <h3 class="text-xl font-bold mb-2">Sampaikan Aspirasi Anda</h3>
                    <p class="text-sm mb-4 opacity-90">Suara Anda adalah prioritas kami. Mari bersama membangun Surawangi yang lebih baik!</p>
                    <a href="{{ url('/aspirasi') }}"
                    class="inline-block w-full bg-white text-blue-600 font-semibold px-4 py-3 rounded-lg hover:bg-gray-100 transition-all duration-200 shadow-md hover:shadow-xl transform hover:-translate-y-0.5">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                            </svg>
                            Kirim Aspirasi
                        </span>
                    </a>
                    <p class="text-xs mt-3 opacity-75">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Privasi Anda terjamin
                    </p>
                </div>
            </div>
            </aside>
        </div>
    </main>

    <x-footer />
@endsection
