<article
    class="news-card group relative bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden opacity-0 translate-y-6"
    data-id="{{ $post->id }}">

    {{-- Gambar --}}
    <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
        <img src="{{ asset("/storage/$post->thumbnail") }}"
             alt="Foto {{ $post->title }}"
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

        {{-- Overlay gradient --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/0 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

        {{-- Category badge --}}
        <div class="absolute top-3 left-3">
            <span class="inline-block px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full shadow-lg">
                {{ $post->category->name }}
            </span>
        </div>
    </div>

    {{-- Konten --}}
    <div class="p-6 relative">
        {{-- Tanggal --}}
        <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span>{{ $post->published_at->format('d F Y') }}</span>
            <span class="w-1 h-1 rounded-full bg-gray-300"></span>
            <span>{{ $post->published_at->format('H:i') }}</span>
        </div>

        {{-- Judul berita --}}
        <a href="{{ route('news.show', [$post->category->slug, $post->slug]) }}"
           class="block text-lg font-bold text-gray-900 leading-snug mb-3 group-hover:text-blue-600 transition-colors duration-300 line-clamp-2">
            {{ $post->title }}
        </a>

        {{-- Ringkasan berita --}}
        <p class="text-gray-600 text-sm line-clamp-3 leading-relaxed mb-4">
            {!! str($post->excerpt)->sanitizeHtml() !!}
        </p>

        {{-- Tombol baca selengkapnya --}}
        <a href="{{ route('news.show', [$post->category->slug, $post->slug]) }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-700 hover:gap-3 transition-all duration-300">
            <span>Baca Selengkapnya</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>

    {{-- Accent line bottom --}}
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-blue-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
</article>

{{-- ==== Animasi saat muncul ==== --}}
<style>
@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(24px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.news-card {
  animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
  animation-delay: calc(var(--card-index, 0) * 0.1s);
}

.news-card.animate {
  opacity: 1;
  transform: translateY(0);
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const cards = document.querySelectorAll(".news-card");
  cards.forEach((card, index) => {
    card.style.setProperty("--card-index", index);
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            card.classList.add("animate");
          }
        });
      },
      { threshold: 0.1 }
    );
    observer.observe(card);
  });
});
</script>
