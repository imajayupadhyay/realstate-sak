<script setup>
import { Link } from '@inertiajs/vue3';
import SectionHeading from '@/Components/SectionHeading.vue';
import { site } from '@/config/site';

const { stats } = site;

const pillars = [
    { title: 'Real Estate', text: 'Verified residential and commercial properties.', color: 'bg-brand-orange' },
    { title: 'Investment', text: 'Opportunities chosen for long-term growth.', color: 'bg-brand-purple' },
    { title: 'Finance', text: 'Loan assistance and clear documentation.', color: 'bg-brand-green' },
];
</script>

<template>
    <section id="about" class="scroll-mt-20 bg-slate-50 py-24">
        <div class="container-page grid items-center gap-14 lg:grid-cols-2">
            <div class="relative">
                <img
                    src="/images/about.jpg"
                    alt="House keys with a model home"
                    loading="lazy"
                    class="aspect-[4/3] w-full rounded-2xl object-cover"
                />
                <div class="absolute -bottom-6 right-6 rounded-2xl bg-white px-6 py-5 shadow-lg shadow-slate-200/70">
                    <p class="text-3xl font-semibold text-brand-navy">10+</p>
                    <p class="text-xs">Years building trust</p>
                </div>
            </div>

            <div>
                <SectionHeading eyebrow="About Sakha" title="Your trusted partner in property">
                    Sakha means “friend”, and that is how we work. We guide buyers and investors through every step
                    — finding the right property, securing finance and completing paperwork — with honesty and care.
                </SectionHeading>

                <ul class="mt-8 space-y-4">
                    <li v-for="p in pillars" :key="p.title" class="flex gap-4">
                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full" :class="p.color" />
                        <div>
                            <p class="font-semibold text-brand-navy">{{ p.title }}</p>
                            <p class="text-sm">{{ p.text }}</p>
                        </div>
                    </li>
                </ul>

                <dl class="mt-10 grid grid-cols-3 gap-6 border-t border-slate-200 pt-8">
                    <div v-for="s in stats" :key="s.label" class="flex flex-col">
                        <dt class="order-2 text-xs sm:text-sm">{{ s.label }}</dt>
                        <dd class="text-2xl font-semibold text-brand-navy sm:text-3xl">{{ s.value }}</dd>
                    </div>
                </dl>

                <Link
                    href="/about-us"
                    class="mt-10 inline-block rounded-full bg-brand-navy px-7 py-3 text-sm font-semibold text-white transition-colors hover:bg-brand-blue"
                >
                    More About Us
                </Link>
            </div>
        </div>
    </section>
</template>
