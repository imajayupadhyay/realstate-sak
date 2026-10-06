<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    project: { type: Object, required: true },
});
</script>

<template>
    <section class="relative">
        <div class="relative h-[72svh] min-h-[520px] overflow-hidden bg-brand-navy-dark" data-hero>
            <img :src="project.hero_image || project.image" :alt="project.name" class="absolute inset-0 h-full w-full object-cover" />
            <div class="absolute inset-0 bg-linear-to-t from-brand-navy-dark/90 via-brand-navy-dark/30 to-brand-navy-dark/10" />
            <div class="absolute inset-0 bg-linear-to-r from-brand-navy-dark/60 to-transparent" />

            <div class="container-page relative flex h-full flex-col justify-end pb-32 sm:pb-36">
                <nav class="flex items-center gap-2 text-xs font-medium text-white/70" aria-label="Breadcrumb">
                    <Link href="/" class="hover:text-white">Home</Link>
                    <span>/</span>
                    <a href="/#projects" class="hover:text-white">Projects</a>
                    <span>/</span>
                    <span class="text-white">{{ project.name }}</span>
                </nav>

                <div class="mt-5 flex flex-wrap items-center gap-3">
                    <span class="rounded-full bg-brand-orange px-3 py-1 text-xs font-semibold text-white">{{ project.status }}</span>
                    <span class="text-sm text-white/80">by {{ project.developer }}</span>
                </div>
                <h1 class="mt-3 text-4xl font-semibold text-white sm:text-6xl">{{ project.name }}</h1>
                <p class="mt-3 max-w-2xl text-base text-white/80 sm:text-lg">{{ project.tagline }}</p>
                <p class="mt-4 flex items-center gap-2 text-sm text-white">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-7-6.2-7-11.5a7 7 0 1114 0C19 14.8 12 21 12 21z" /><circle cx="12" cy="9.5" r="2.5" /></svg>
                    {{ project.location }}
                </p>
            </div>
        </div>

        <!-- Key facts card overlapping the hero -->
        <div class="container-page relative -mt-20">
            <div class="grid grid-cols-2 gap-px overflow-hidden rounded-2xl border border-slate-100 bg-slate-100 shadow-xl shadow-slate-200/60 lg:grid-cols-[repeat(4,1fr)_auto]">
                <div class="bg-white px-6 py-5">
                    <p class="text-xs uppercase tracking-wider text-slate-400">Starting Price</p>
                    <p class="mt-1 text-xl font-semibold text-brand-navy">{{ project.price_from }}</p>
                </div>
                <div class="bg-white px-6 py-5">
                    <p class="text-xs uppercase tracking-wider text-slate-400">Configuration</p>
                    <p class="mt-1 font-semibold text-brand-navy">{{ project.type }}</p>
                </div>
                <div class="bg-white px-6 py-5">
                    <p class="text-xs uppercase tracking-wider text-slate-400">Possession</p>
                    <p class="mt-1 font-semibold text-brand-navy">{{ project.possession }}</p>
                </div>
                <div class="bg-white px-6 py-5">
                    <p class="text-xs uppercase tracking-wider text-slate-400">RERA No.</p>
                    <p class="mt-1 break-all text-sm font-semibold text-brand-navy">{{ project.rera }}</p>
                </div>
                <div class="col-span-2 flex items-center bg-white px-6 py-5 lg:col-span-1">
                    <a
                        href="#enquire"
                        class="w-full rounded-full bg-brand-navy px-7 py-3 text-center text-sm font-semibold whitespace-nowrap text-white transition-colors hover:bg-brand-blue"
                    >
                        Enquire Now
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
