<x-button size="icon" class="text-white {{ $className }}" :asChild="true">
    <a href="{{ $social->url }}">
        @svg($icon)
    </a>
</x-button>