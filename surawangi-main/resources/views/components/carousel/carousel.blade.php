<div x-data="{
    slides: {{ Js::from($carousel) }},
    currentSlideIndex: 1,
    autoplayInterval: null,
    init() {
        this.startAutoplay();
    },
    startAutoplay() {
        this.autoplayInterval = setInterval(() => {
            this.next();
        }, 5000);
    },
    stopAutoplay() {
        clearInterval(this.autoplayInterval);
    },
    next() {
        if (this.currentSlideIndex < this.slides.length) {
            this.currentSlideIndex = this.currentSlideIndex + 1
        } else {
            this.currentSlideIndex = 1
        }
    },
}" class="relative w-full overflow-hidden shadow-2xl"
   x-on:mouseenter="stopAutoplay()"
   x-on:mouseleave="startAutoplay()">

    <!-- slides wrapper -->
    <div class="relative bg-gradient-to-r from-blue-600 via-cyan-500 to-blue-600 text-white h-96 w-full overflow-hidden">
        <!-- slides container -->
        <div class="flex transition-transform duration-700 ease-in-out h-full"
             :style="`transform: translateX(-${(currentSlideIndex - 1) * 100}%)`">
            <template x-for="(slide, index) in slides" :key="index">
                <div class="min-w-full h-full relative flex-shrink-0">
                    <!-- Background Image -->
                    <img class="absolute w-full h-full inset-0 object-cover"
                        x-bind:src="slide.imgSrc"
                        x-bind:alt="slide.imgAlt" />

                    <!-- Blue Overlay with multiple layers -->
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-800/60 to-blue-600/30"></div>
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/20 via-transparent to-blue-600/20"></div>

                    <!-- Decorative elements -->
                    <div class="absolute top-0 left-0 w-64 h-64 bg-blue-400/10 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 right-0 w-80 h-80 bg-cyan-400/10 rounded-full blur-3xl"></div>

                    <!-- Content -->
                    <div class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-center gap-2 px-16 py-12 text-center">
                        <h1 class="w-full lg:w-[80%] text-2xl md:text-4xl lg:text-6xl font-bold mb-4 animate-fade-in-up drop-shadow-2xl"
                            x-text="slide.title"
                            x-bind:aria-describedby="'slide' + (index + 1) + 'Description'"
                            x-show="currentSlideIndex == index + 1"
                            x-transition:enter="transition ease-out duration-700 delay-200 transform"
                            x-transition:enter-start="opacity-0 translate-y-8"
                            x-transition:enter-end="opacity-100 translate-y-0"></h1>

                        <p class="w-full text-pretty text-white/95 text-sm md:text-lg lg:text-xl font-medium max-w-3xl mx-auto drop-shadow-lg"
                            x-text="slide.description"
                            x-bind:id="'slide' + (index + 1) + 'Description'"
                            x-show="currentSlideIndex == index + 1"
                            x-transition:enter="transition ease-out duration-700 delay-400 transform"
                            x-transition:enter-start="opacity-0 translate-y-8"
                            x-transition:enter-end="opacity-100 translate-y-0"></p>

                        <button type="button"
                            x-cloak
                            x-show="slide.ctaUrl !== null && currentSlideIndex == index + 1"
                            class="mt-4 whitespace-nowrap rounded-full bg-white text-blue-600 border-2 border-white px-6 py-3 text-center text-sm font-bold tracking-wide transition-all duration-300 hover:bg-blue-600 hover:text-white hover:scale-110 hover:-translate-y-1 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white active:opacity-100 active:outline-offset-0 shadow-xl hover:shadow-2xl"
                            x-text="slide.ctaText"
                            x-transition:enter="transition ease-out duration-700 delay-600 transform"
                            x-transition:enter-start="opacity-0 translate-y-8"
                            x-transition:enter-end="opacity-100 translate-y-0"></button>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- Navigation Arrows -->
    <button type="button"
        x-on:click="stopAutoplay(); currentSlideIndex = currentSlideIndex === 1 ? slides.length : currentSlideIndex - 1; $nextTick(() => startAutoplay())"
        class="absolute left-4 top-1/2 -translate-y-1/2 z-20 bg-white/20 backdrop-blur-md hover:bg-blue-500 text-white rounded-full p-3 transition-all duration-300 hover:scale-110 shadow-lg"
        aria-label="Previous slide">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>

    <button type="button"
        x-on:click="stopAutoplay(); currentSlideIndex = currentSlideIndex === slides.length ? 1 : currentSlideIndex + 1; $nextTick(() => startAutoplay())"
        class="absolute right-4 top-1/2 -translate-y-1/2 z-20 bg-white/20 backdrop-blur-md hover:bg-blue-500 text-white rounded-full p-3 transition-all duration-300 hover:scale-110 shadow-lg"
        aria-label="Next slide">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    <!-- indicators - Blue style -->
    <div class="absolute bottom-5 md:bottom-6 left-1/2 z-20 flex -translate-x-1/2 gap-2 px-4 py-2 bg-white/10 backdrop-blur-md border border-white/20 shadow-xl"
        role="group" aria-label="slides">
        <template x-for="(slide, index) in slides">
            <button class="size-2.5 rounded-full transition-all duration-300 hover:scale-125"
                x-on:click="stopAutoplay(); currentSlideIndex = index + 1; $nextTick(() => startAutoplay())"
                x-bind:class="[currentSlideIndex === index + 1 ? 'bg-white w-8 shadow-lg' : 'bg-white/50 hover:bg-white/80']"
                x-bind:aria-label="'slide ' + (index + 1)"></button>
        </template>
    </div>

    <!-- Decorative corner accents -->
    <div class="absolute top-0 left-0 w-20 h-20 bg-gradient-to-br from-blue-400/30 to-transparent pointer-events-none"></div>
    <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-bl from-cyan-400/30 to-transparent pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-20 h-20 bg-gradient-to-tr from-blue-400/30 to-transparent pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-20 h-20 bg-gradient-to-tl from-cyan-400/30 to-transparent pointer-events-none"></div>
</div>

<style>
    /* Custom animation for fade in up */
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(2rem);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.7s ease-out;
    }
</style>
