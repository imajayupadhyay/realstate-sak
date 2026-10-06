<script setup>
import { Link } from '@inertiajs/vue3';

// Banner shown at the top of every inner page (About, Contact, …).
defineProps({
    title: { type: String, required: true },
    subtitle: { type: String, default: '' },
    image: { type: String, required: true },
});
</script>

<template>
    <section class="relative overflow-hidden bg-brand-navy-dark">
        <img :src="image" alt="" class="absolute inset-0 h-full w-full object-cover" />
        <div class="absolute inset-0 bg-linear-to-r from-brand-navy-dark/90 via-brand-navy-dark/70 to-brand-navy-dark/30" />

        <div class="container-page relative py-24 sm:py-28">
            <nav class="flex items-center gap-2 text-xs font-medium text-white/70" aria-label="Breadcrumb">
                <Link href="/" class="hover:text-white">Home</Link>
                <span>/</span>
                <span class="text-white">{{ title }}</span>
            </nav>
            <h1 class="mt-4 text-4xl font-semibold text-white sm:text-5xl">{{ title }}</h1>
            <p v-if="subtitle" class="mt-4 max-w-xl text-base leading-relaxed text-white/80 sm:text-lg">
                {{ subtitle }}
            </p>
        </div>
        <div class="brand-stripe relative h-1" />
    </section>
</template>
