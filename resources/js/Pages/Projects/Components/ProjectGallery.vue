<script setup>
import { onBeforeUnmount, ref, watch } from 'vue';
import SectionHeading from '@/Components/SectionHeading.vue';

const props = defineProps({
    images: { type: Array, required: true },
});

const INITIAL = 9; // big tile + 8 small = two full rows on desktop
const showAll = ref(false);
const lightbox = ref(null); // index of open image

const open = (i) => (lightbox.value = i);
const close = () => (lightbox.value = null);
const step = (d) => (lightbox.value = (lightbox.value + d + props.images.length) % props.images.length);

const onKey = (e) => {
    if (lightbox.value === null) return;
    if (e.key === 'Escape') close();
    if (e.key === 'ArrowRight') step(1);
    if (e.key === 'ArrowLeft') step(-1);
};
watch(lightbox, (v) => {
    document.body.style.overflow = v === null ? '' : 'hidden';
    v === null ? window.removeEventListener('keydown', onKey) : window.addEventListener('keydown', onKey);
});
onBeforeUnmount(() => {
    window.removeEventListener('keydown', onKey);
    document.body.style.overflow = '';
});
</script>

<template>
    <section id="gallery" class="scroll-mt-36 bg-slate-50 py-20">
        <div class="container-page">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <SectionHeading eyebrow="Gallery" title="A closer look" />
                <span class="text-sm text-slate-500">{{ images.length }} images · artist’s impressions</span>
            </div>

            <div class="mt-10 grid auto-rows-[180px] grid-cols-2 gap-4 md:auto-rows-[220px] md:grid-cols-4">
                <button
                    v-for="(img, i) in showAll ? images : images.slice(0, INITIAL)"
                    :key="img.src"
                    type="button"
                    class="group relative overflow-hidden rounded-2xl bg-slate-200"
                    :class="i === 0 ? 'col-span-2 row-span-2' : ''"
                    @click="open(i)"
                >
                    <img :src="img.src" :alt="img.caption" loading="lazy" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                    <span class="absolute inset-x-0 bottom-0 bg-linear-to-t from-black/60 to-transparent px-4 pt-8 pb-3 text-left text-xs font-medium text-white opacity-0 transition-opacity group-hover:opacity-100">
                        {{ img.caption }}
                    </span>
                </button>
            </div>

            <div v-if="images.length > INITIAL" class="mt-8 text-center">
                <button
                    type="button"
                    class="rounded-full border border-brand-navy px-7 py-3 text-sm font-semibold text-brand-navy transition-colors hover:bg-brand-navy hover:text-white"
                    @click="showAll = !showAll"
                >
                    {{ showAll ? 'Show less' : `View all ${images.length} images` }}
                </button>
            </div>
        </div>

        <!-- Lightbox -->
        <Teleport to="body">
            <div
                v-if="lightbox !== null"
                class="fixed inset-0 z-[100] flex items-center justify-center bg-brand-navy-dark/95 p-4"
                role="dialog"
                aria-modal="true"
                @click.self="close"
            >
                <button type="button" class="absolute top-5 right-5 p-2 text-white/80 hover:text-white" aria-label="Close" @click="close">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M6 6l12 12M18 6L6 18" /></svg>
                </button>
                <button type="button" class="absolute left-3 grid h-11 w-11 place-items-center rounded-full border border-white/30 text-white hover:bg-white/10 sm:left-6" aria-label="Previous image" @click="step(-1)">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 18l-6-6 6-6" /></svg>
                </button>
                <figure class="max-w-5xl">
                    <img :src="images[lightbox].src" :alt="images[lightbox].caption" class="max-h-[80vh] w-auto rounded-xl" />
                    <figcaption class="mt-3 text-center text-sm text-white/80">
                        {{ images[lightbox].caption }} <span class="text-white/40">· {{ lightbox + 1 }} / {{ images.length }}</span>
                    </figcaption>
                </figure>
                <button type="button" class="absolute right-3 grid h-11 w-11 place-items-center rounded-full border border-white/30 text-white hover:bg-white/10 sm:right-6" aria-label="Next image" @click="step(1)">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 6l6 6-6 6" /></svg>
                </button>
            </div>
        </Teleport>
    </section>
</template>
