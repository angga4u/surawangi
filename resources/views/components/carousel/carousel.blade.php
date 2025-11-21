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
}" class="relative w-full overflow-hidden"
   x-on:mouseenter="stopAutoplay()"
   x-on:mouseleave="startAutoplay()">

    <!-- slides wrapper -->
    <div class="relative bg-gradient-to-r from-primary via-red-600 to-primary text-white h-96 w-full overflow-hidden">
        <!-- slides container -->
        <div class="flex transition-transform duration-700 ease-in-out h-full"
             :style="`transform: translateX(-${(currentSlideIndex - 1) * 100}%)`">
            <template x-for="(slide, index) in slides" :key="index">
                <div class="min-w-full h-full relative flex-shrink-0">
                    <!-- Background Image -->
                    <img class="absolute w-full h-full inset-0 object-cover"
                        x-bind:src="slide.imgSrc"
                        x-bind:alt="slide.imgAlt" />

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-neutral-950/85 via-neutral-950/40 to-transparent"></div>

                    <!-- Content -->
                    <div class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-center gap-2 px-16 py-12 text-center">
                        <h1 class="w-full lg:w-[80%] text-2xl md:text-4xl lg:text-6xl font-bold mb-4 animate-fade-in-up"
                            x-text="slide.title"
                            x-bind:aria-describedby="'slide' + (index + 1) + 'Description'"
                            x-show="currentSlideIndex == index + 1"
                            x-transition:enter="transition ease-out duration-700 delay-200 transform"
                            x-transition:enter-start="opacity-0 translate-y-8"
                            x-transition:enter-end="opacity-100 translate-y-0"></h1>

                        <p class="w-full text-pretty text-neutral-300 text-sm md:text-lg lg:text-xl opacity-90 max-w-3xl mx-auto"
                            x-text="slide.description"
                            x-bind:id="'slide' + (index + 1) + 'Description'"
                            x-show="currentSlideIndex == index + 1"
                            x-transition:enter="transition ease-out duration-700 delay-400 transform"
                            x-transition:enter-start="opacity-0 translate-y-8"
                            x-transition:enter-end="opacity-100 translate-y-0"></p>

                        <button type="button"
                            x-cloak
                            x-show="slide.ctaUrl !== null && currentSlideIndex == index + 1"
                            class="mt-2 whitespace-nowrap rounded-sm border border-white bg-transparent px-4 py-2 text-center text-xs font-medium tracking-wide text-white transition-all duration-300 hover:bg-white hover:text-primary hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-onSurfaceDarkStrong active:opacity-100 active:outline-offset-0 md:text-sm"
                            x-text="slide.ctaText"
                            x-transition:enter="transition ease-out duration-700 delay-600 transform"
                            x-transition:enter-start="opacity-0 translate-y-8"
                            x-transition:enter-end="opacity-100 translate-y-0"></button>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- indicators -->
    <div class="absolute rounded-sm bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 px-1.5 py-1 md:px-2 bg-black/20 backdrop-blur-sm"
        role="group" aria-label="slides">
        <template x-for="(slide, index) in slides">
            <button class="size-2 rounded-full transition-all duration-300 hover:scale-125"
                x-on:click="stopAutoplay(); currentSlideIndex = index + 1; $nextTick(() => startAutoplay())"
                x-bind:class="[currentSlideIndex === index + 1 ? 'bg-white scale-110' : 'bg-white/50']"
                x-bind:aria-label="'slide ' + (index + 1)"></button>
        </template>
    </div>
</div>
