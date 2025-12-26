<div x-data="{
    slides: [{
            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-1.webp',
            imgAlt: 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.',
            title: 'Front end developers',
            description: 'The architects of the digital world, constantly battling against their mortal enemy – browser compatibility.',
            ctaUrl: 'https://example.com',
            ctaText: 'Become a Developer',
        },
        {
            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-2.webp',
            imgAlt: 'Vibrant abstract painting with swirling red, yellow, and pink hues on a canvas.',
            title: 'Back end developers',
            description: 'Because not all superheroes wear capes, some wear headphones and stare at terminal screens',
            ctaUrl: 'https://example.com',
            ctaText: 'Become a Developer',
        },
        {
            imgSrc: 'https://penguinui.s3.amazonaws.com/component-assets/carousel/default-slide-3.webp',
            imgAlt: 'Vibrant abstract painting with swirling blue and purple hues on a canvas.',
            title: 'Full stack developers',
            description: 'Where &quot;burnout&quot; is just a fancy term for &quot;Tuesday&quot;.',
            ctaUrl: 'https://example.com',
            ctaText: 'Become a Developer',
        },
    ],
    currentSlideIndex: 1,
    previous() {
        if (this.currentSlideIndex > 1) {
            this.currentSlideIndex = this.currentSlideIndex - 1
        } else {
            // If it's the first slide, go to the last slide           
            this.currentSlideIndex = this.slides.length
        }
    },
    next() {
        if (this.currentSlideIndex < this.slides.length) {
            this.currentSlideIndex = this.currentSlideIndex + 1
        } else {
            // If it's the last slide, go to the first slide    
            this.currentSlideIndex = 1
        }
    },
}" class="relative w-full overflow-hidden">

    <!-- previous button -->
    <button type="button"
        class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
        aria-label="previous slide" x-on:click="previous()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
            class="size-5 md:size-6 pr-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </button>

    <!-- next button -->
    <button type="button"
        class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
        aria-label="next slide" x-on:click="next()">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
            stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </button>

    <!-- slides -->
    <!-- Change min-h-[50svh] to your preferred height size -->
    <div class="relative min-h-[50svh] w-full">
        <template x-for="(slide, index) in slides">
            <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                x-transition.opacity.duration.1000ms>

                <!-- Title and description -->
                <div
                    class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-linear-to-t from-neutral-950/85 to-transparent px-16 py-12 text-center">
                    <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white"
                        x-text="slide.title" x-bind:aria-describedby="'slide' + (index + 1) + 'Description'"></h3>
                    <p class="lg:w-1/2 w-full text-pretty text-sm text-neutral-300" x-text="slide.description"
                        x-bind:id="'slide' + (index + 1) + 'Description'"></p>
                    <button type="button" x-cloak x-show="slide.ctaUrl !== null"
                        class="mt-2 whitespace-nowrap rounded-sm border border-white bg-transparent px-4 py-2 text-center text-xs font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-onSurfaceDarkStrong active:opacity-100 active:outline-offset-0 md:text-sm"
                        x-text="slide.ctaText"></button>
                </div>

                <img class="absolute w-full h-full inset-0 object-cover text-neutral-600 dark:text-neutral-300"
                    x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
            </div>
        </template>
    </div>

    <!-- indicators -->
    <div class="absolute rounded-sm bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2 gap-4 md:gap-3 px-1.5 py-1 md:px-2"
        role="group" aria-label="slides">
        <template x-for="(slide, index) in slides">
            <button class="size-2 rounded-full transition" x-on:click="currentSlideIndex = index + 1"
                x-bind:class="[currentSlideIndex === index + 1 ? 'bg-neutral-300' : 'bg-neutral-300/50']"
                x-bind:aria-label="'slide ' + (index + 1)"></button>
        </template>
    </div>
</div>
{{-- <div id="hero-carousel" class="relative w-full" data-carousel="slide">
        <div class="relative overflow-hidden h-screen lg:h-[90vh]">
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <div class="absolute inset-0 bg-gradient-to-b from-black/30 to-black/60"></div>
                <div class="absolute inset-0 flex items-center justify-center text-center text-white px-4">
                    <div class="max-w-4xl">
                        <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold mb-6 text-shadow-lg leading-tight">
                            Portal Berita Terpercaya Indonesia
                        </h1>
                        <p class="text-lg sm:text-xl lg:text-2xl mb-8 text-shadow max-w-3xl mx-auto">
                            Dapatkan informasi terkini dan terpercaya dari berbagai daerah di Indonesia.
                        </p>
                        <a href="#latest-news"
                            class="inline-block bg-primary hover:bg-primary-dark px-8 py-4 text-lg font-semibold rounded-full uppercase tracking-wide transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            Baca Berita Terbaru
                        </a>
                    </div>
                </div>
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://images.unsplash.com/photo-1585776245991-cf89dd7fc73a?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <div class="absolute inset-0 bg-gradient-to-b from-black/30 to-black/60"></div>
                <div class="hero-content absolute inset-0 flex items-center justify-center text-center text-white px-4">
                    <div class="max-w-4xl">
                        <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold mb-6 text-shadow-lg leading-tight">
                            Berita Terkini 24 Jam
                        </h1>
                        <p class="text-lg sm:text-xl lg:text-2xl mb-8 text-shadow max-w-3xl mx-auto">
                            Ikuti perkembangan terbaru dari seluruh Indonesia dengan update real-time.
                        </p>
                        <a href="#latest-news"
                            class="inline-block bg-primary hover:bg-primary-dark px-8 py-4 text-lg font-semibold rounded-full uppercase tracking-wide transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            Lihat Berita Hari Ini
                        </a>
                    </div>
                </div>
            </div>
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                <div class="absolute inset-0 bg-gradient-to-b from-black/30 to-black/60"></div>
                <div class="absolute inset-0 flex items-center justify-center text-center text-white px-4">
                    <div class="max-w-4xl">
                        <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold mb-6 text-shadow-lg leading-tight">
                            Laporan Investigasi Mendalam
                        </h1>
                        <p class="text-lg sm:text-xl lg:text-2xl mb-8 text-shadow max-w-3xl mx-auto">
                            Jurnalisme berkualitas dengan analisis mendalam dan fact-checking akurat.
                        </p>
                        <a href="#latest-news"
                            class="inline-block bg-primary hover:bg-primary-dark px-8 py-4 text-lg font-semibold rounded-full uppercase tracking-wide transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            Baca Laporan Khusus
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
        </div>

        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div> --}}