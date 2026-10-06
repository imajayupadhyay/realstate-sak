<script setup>
import { computed } from 'vue';
import SectionHeading from '@/Components/SectionHeading.vue';

const props = defineProps({
    project: { type: Object, required: true },
});

const mapUrl = computed(
    () => `https://maps.google.com/maps?q=${encodeURIComponent(props.project.map_query || props.project.address)}&z=14&output=embed`,
);
</script>

<template>
    <section id="location" class="scroll-mt-36 py-20">
        <div class="container-page grid gap-12 lg:grid-cols-[1fr_1.4fr]">
            <div>
                <SectionHeading eyebrow="Location" title="Well connected, beautifully placed">
                    {{ project.address }}
                </SectionHeading>

                <ul v-if="project.location_advantages?.length" class="mt-8 divide-y divide-slate-100 border-y border-slate-100">
                    <li v-for="l in project.location_advantages" :key="l.place" class="flex items-center justify-between gap-4 py-3.5 text-sm">
                        <span>{{ l.place }}</span>
                        <span class="shrink-0 rounded-full bg-brand-navy/5 px-3 py-1 text-xs font-semibold text-brand-navy">{{ l.time }}</span>
                    </li>
                </ul>
            </div>

            <div class="min-h-[360px] overflow-hidden rounded-3xl border border-slate-200">
                <iframe
                    :src="mapUrl"
                    :title="`${project.name} location map`"
                    class="block h-full min-h-[360px] w-full"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen
                />
            </div>
        </div>
    </section>
</template>
