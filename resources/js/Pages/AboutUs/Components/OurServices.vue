<script setup>
import SectionHeading from '@/Components/SectionHeading.vue';

const services = [
    {
        title: 'Real Estate',
        color: 'bg-brand-orange',
        points: ['Residential apartments & villas', 'Commercial spaces', 'Site visits & project comparison', 'Resale & rental assistance'],
    },
    {
        title: 'Investment',
        color: 'bg-brand-purple',
        points: ['Pre-launch & early-stage projects', 'Land and plotted developments', 'Market & location analysis', 'Portfolio guidance'],
    },
    {
        title: 'Finance',
        color: 'bg-brand-green',
        points: ['Home-loan assistance', 'Best rates from partner banks', 'Documentation support', 'Registration & legal checks'],
    },
];
</script>

<template>
    <section class="py-24">
        <div class="container-page">
            <SectionHeading eyebrow="What We Do" title="Everything you need, in one place" align="center">
                Three areas of expertise working together, so you never have to juggle multiple agents and advisors.
            </SectionHeading>

            <div class="mt-14 grid gap-8 md:grid-cols-3">
                <article
                    v-for="(s, i) in services"
                    :key="s.title"
                    class="rounded-2xl border border-slate-200 p-8 transition-shadow hover:shadow-lg hover:shadow-slate-200/60"
                >
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold">{{ s.title }}</h3>
                        <span class="text-sm font-semibold text-slate-300">0{{ i + 1 }}</span>
                    </div>
                    <span class="mt-4 block h-1 w-10 rounded-full" :class="s.color" />
                    <ul class="mt-6 space-y-3 text-sm">
                        <li v-for="p in s.points" :key="p" class="flex gap-3">
                            <svg class="mt-0.5 h-4 w-4 shrink-0 text-brand-blue" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12l5 5L20 7" />
                            </svg>
                            {{ p }}
                        </li>
                    </ul>
                </article>
            </div>
        </div>
    </section>
</template>
