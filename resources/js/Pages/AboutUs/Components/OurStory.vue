<script setup>
import SectionHeading from '@/Components/SectionHeading.vue';
import { site } from '@/config/site';

// TODO: replace with the client's real "About" content.
</script>

<template>
    <section class="py-24">
        <div class="container-page grid items-center gap-14 lg:grid-cols-2">
            <div>
                <SectionHeading eyebrow="Who We Are" title="Building value, creating wealth — together" />
                <div class="mt-6 space-y-4 leading-relaxed">
                    <p>
                        Sakha Consultancy is a real estate, investment and finance consultancy built on one simple idea:
                        buying property should feel like getting advice from a trusted friend. In Sanskrit,
                        <span class="font-medium text-brand-navy">“Sakha”</span> means friend — and that is the role we
                        play for every client.
                    </p>
                    <p>
                        Over the years we have helped hundreds of families find homes they love and guided investors toward
                        properties with strong long-term value. We work closely with reputed developers, verify every
                        project we recommend, and stay with our clients from the first site visit to the final handover.
                    </p>
                    <p>
                        Whether you are buying your first apartment, upgrading to a villa, or building an investment
                        portfolio, our team brings local market knowledge, honest advice and complete transparency.
                    </p>
                </div>

                <dl class="mt-10 grid grid-cols-3 gap-6 border-t border-slate-200 pt-8">
                    <div v-for="s in site.stats" :key="s.label" class="flex flex-col">
                        <dt class="order-2 text-xs sm:text-sm">{{ s.label }}</dt>
                        <dd class="text-2xl font-semibold text-brand-navy sm:text-3xl">{{ s.value }}</dd>
                    </div>
                </dl>
            </div>

            <div class="relative">
                <img
                    src="/images/pages/team.jpg"
                    alt="Sakha team celebrating with a client"
                    class="aspect-[4/3] w-full rounded-2xl object-cover"
                />
                <div class="absolute -bottom-6 left-6 hidden rounded-2xl bg-white px-6 py-5 shadow-lg shadow-slate-200/70 sm:block">
                    <p class="text-sm font-semibold text-brand-navy">{{ site.services.join(' · ') }}</p>
                    <p class="text-xs">All under one roof</p>
                </div>
            </div>
        </div>
    </section>
</template>
