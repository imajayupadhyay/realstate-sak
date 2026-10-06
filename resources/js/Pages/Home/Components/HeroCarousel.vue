<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, onMounted, onBeforeUnmount } from 'vue';

const slides = [
    {
        image: '/images/hero/hero-1.jpg',
        eyebrow: 'Real Estate',
        title: 'Find a home that grows with you',
        text: 'Handpicked residential projects in prime locations, with guidance at every step.',
    },
    {
        image: '/images/hero/hero-3.jpg',
        eyebrow: 'Investment',
        title: 'Property that builds lasting value',
        text: 'Smart investment opportunities chosen for long-term appreciation and steady returns.',
    },
    {
        image: '/images/projects/project-3.jpg',
        eyebrow: 'Finance',
        title: 'From first visit to final keys',
        text: 'Home-loan assistance and transparent paperwork, so buying feels simple.',
    },
];

const INTERVAL = 6000;
const current = ref(0);
let timer = null;

const go = (index) => {
    current.value = (index + slides.length) % slides.length;
    restart();
};
const next = () => go(current.value + 1);
const prev = () => go(current.value - 1);

const start = () => {
    stop();
    timer = setInterval(() => (current.value = (current.value + 1) % slides.length), INTERVAL);
};
const stop = () => clearInterval(timer);
const restart = () => start();

onMounted(start);
onBeforeUnmount(stop);
</script>

<template>
    <section
        class="relative h-[calc(100svh-5rem)] min-h-[520px] overflow-hidden bg-brand-navy-dark"
        aria-roledescription="carousel"
        data-hero
        @mouseenter="stop"
        @mouseleave="start"
    >
        <div
            v-for="(slide, i) in slides"
            :key="slide.image"
            class="absolute inset-0 transition-opacity duration-1000 ease-out"
            :class="i === current ? 'opacity-100' : 'pointer-events-none opacity-0'"
            :aria-hidden="i !== current"
        >
            <img
                :src="slide.image"
                alt=""
                class="absolute inset-0 h-full w-full object-cover transition-transform ease-out [transition-duration:7000ms] motion-reduce:transition-none"
                :class="i === current ? 'scale-105' : 'scale-100'"
                :loading="i === 0 ? 'eager' : 'lazy'"
            />
            <div class="absolute inset-0 bg-linear-to-r from-brand-navy-dark/85 via-brand-navy-dark/40 to-transparent" />

            <div class="container-page relative flex h-full items-center">
                <div
                    class="max-w-xl transition-all delay-300 duration-700"
                    :class="i === current ? 'translate-y-0 opacity-100' : 'translate-y-6 opacity-0'"
                >
                    <span class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.25em] text-white/80">
                        <span class="brand-stripe h-0.5 w-8" />
                        {{ slide.eyebrow }}
                    </span>
                    <h1 class="mt-5 text-4xl font-semibold leading-tight text-white sm:text-5xl lg:text-6xl">
                        {{ slide.title }}
                    </h1>
                    <p class="mt-5 text-base leading-relaxed text-white/80 sm:text-lg">{{ slide.text }}</p>
                    <div class="mt-9 flex flex-wrap gap-4">
                        <a
                            href="#projects"
                            class="rounded-full bg-white px-7 py-3 text-sm font-semibold text-brand-navy transition-colors hover:bg-brand-blue hover:text-white"
                        >
                            Explore Projects
                        </a>
                        <Link
                            href="/contact-us"
                            class="rounded-full border border-white/60 px-7 py-3 text-sm font-semibold text-white transition-colors hover:bg-white/10"
                        >
                            Talk to Us
                        </Link>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <div class="container-page absolute inset-x-0 bottom-8 flex items-center justify-between">
            <div class="flex gap-2">
                <button
                    v-for="(slide, i) in slides"
                    :key="`dot-${i}`"
                    type="button"
                    class="h-1 rounded-full transition-all duration-500"
                    :class="i === current ? 'w-10 bg-white' : 'w-5 bg-white/40 hover:bg-white/70'"
                    :aria-label="`Go to slide ${i + 1}`"
                    @click="go(i)"
                />
            </div>
            <div class="flex gap-2">
                <button
                    type="button"
                    class="grid h-11 w-11 place-items-center rounded-full border border-white/40 text-white transition-colors hover:bg-white hover:text-brand-navy"
                    aria-label="Previous slide"
                    @click="prev"
                >
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6" /></svg>
                </button>
                <button
                    type="button"
                    class="grid h-11 w-11 place-items-center rounded-full border border-white/40 text-white transition-colors hover:bg-white hover:text-brand-navy"
                    aria-label="Next slide"
                    @click="next"
                >
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 6l6 6-6 6" /></svg>
                </button>
            </div>
        </div>
    </section>
</template>
