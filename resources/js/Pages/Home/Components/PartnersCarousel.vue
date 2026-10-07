<script setup>
import SectionHeading from '@/Components/SectionHeading.vue';
import { site } from '@/config/site';

// The list is rendered twice so the marquee can loop seamlessly
// (the track scrolls by exactly half its width, see `animate-marquee` in app.css).
const loop = [...site.partners, ...site.partners];
</script>

<template>
    <section id="partners" class="scroll-mt-20 pb-24">
        <div class="container-page">
            <SectionHeading eyebrow="Our Partners" title="Trusted by leading developers" align="center">
                We work with some of the most respected names in real estate.
            </SectionHeading>
        </div>

        <!-- Logo marquee: pauses on hover, edges fade into the background -->
        <div
            class="group relative mt-14 overflow-hidden [mask-image:linear-gradient(to_right,transparent,black_12%,black_88%,transparent)]"
        >
            <ul class="animate-marquee flex w-max items-center group-hover:[animation-play-state:paused]">
                <li
                    v-for="(partner, i) in loop"
                    :key="i"
                    :aria-hidden="i >= site.partners.length"
                    :class="partner.dark ? 'border-brand-navy bg-brand-navy' : 'border-slate-200 bg-white'"
                    class="mx-3 flex h-24 w-44 shrink-0 items-center justify-center rounded-2xl border px-6 sm:mx-4 sm:h-28 sm:w-52"
                >
                    <img
                        :src="partner.logo"
                        :alt="partner.name"
                        :title="partner.name"
                        loading="lazy"
                        class="max-h-12 max-w-full object-contain sm:max-h-14"
                    />
                </li>
            </ul>
        </div>
    </section>
</template>
