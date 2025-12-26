<article
    class="group relative flex items-start gap-3 sm:gap-4 pb-4 border-b border-gray-200/80 last:border-b-0 last:pb-0 transition-all duration-300 hover:translate-x-1">

    <!-- 🔵 Nomor Urutan -->
    <div
        class="flex-shrink-0 size-7 sm:size-9 rounded-full bg-gradient-to-br from-indigo-500 to-purple-500 text-white font-bold text-xs sm:text-sm flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
        {{ $number }}
    </div>

    <!-- 📰 Konten Berita -->
    <div class="flex-1 min-w-0 relative z-10">
        <a href="{{ route('news.show', [$post->category->slug, $post->slug]) }}"
            class="stretched-link block text-sm sm:text-base font-semibold text-gray-800 leading-snug hover:text-indigo-600 transition-colors duration-300 line-clamp-2">
            {{ $post->title }}
        </a>

        <div class="text-xs sm:text-sm text-gray-500 mt-1">
            {{ \Illuminate\Support\Number::forHumans($post->views) }} pembaca •
            {{ $post->published_at->diffForHumans() }}
        </div>
    </div>

    <!-- ✨ Hover Accent (lebih lembut, tidak putih mencolok) -->
    <div
        class="absolute inset-0 opacity-0 group-hover:opacity-100 bg-gradient-to-r from-indigo-100/10 via-purple-100/10 to-transparent rounded-xl blur-md pointer-events-none transition-opacity duration-700">
    </div>
</article>
