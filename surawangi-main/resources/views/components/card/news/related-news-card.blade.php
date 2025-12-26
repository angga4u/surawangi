<article class="group cursor-pointer relative bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-300">
    <a href="{{ route('news.show', [$post->category->slug, $post->slug]) }}" class="block">
        <!-- Thumbnail -->
        <div class="relative w-full h-24 sm:h-28 overflow-hidden">
            <img src="{{ asset("storage/$post->thumbnail") }}"
                 alt="Foto {{ $post->title }}"
                 class="w-full h-full object-cover rounded-t-lg group-hover:scale-105 transition-transform duration-300">
            <!-- Overlay halus saat hover -->
            <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors duration-300"></div>
        </div>

        <!-- Konten -->
        <div class="p-3 sm:p-4">
            <h4 class="text-sm sm:text-base font-semibold text-gray-800 group-hover:text-primary transition-colors line-clamp-2 mb-1">
                {{ $post->title }}
            </h4>
            <p class="text-xs text-gray-500">
                {{ $post->published_at->format('d F Y') }} • {{ $post->published_at->format('H:i') }}
            </p>
        </div>
    </a>
</article>
