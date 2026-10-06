<script setup>
import SectionHeading from '@/Components/SectionHeading.vue';

const reasons = [
    { title: 'Verified projects', text: 'Every property we recommend is checked for approvals, title and builder track record.' },
    { title: 'Honest advice', text: 'We recommend what fits your needs and budget — never what earns us the most.' },
    { title: 'End-to-end support', text: 'From shortlisting and site visits to loans, paperwork and handover.' },
    { title: 'Local expertise', text: 'Deep knowledge of locations, pricing trends and upcoming developments.' },
];
</script>

<template>
    <section class="bg-slate-50 py-24">
        <div class="container-page grid gap-14 lg:grid-cols-[1fr_1.4fr]">
            <SectionHeading eyebrow="Why Choose Us" title="A partner, not just an agent">
                Our clients come back — and send their friends and family — because we put their interests first.
            </SectionHeading>

            <div class="grid gap-x-10 gap-y-10 sm:grid-cols-2">
                <div v-for="(r, i) in reasons" :key="r.title" class="border-t border-slate-200 pt-6">
                    <span class="text-sm font-semibold text-brand-blue">0{{ i + 1 }}</span>
                    <h3 class="mt-2 text-lg font-semibold">{{ r.title }}</h3>
                    <p class="mt-2 text-sm leading-relaxed">{{ r.text }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
