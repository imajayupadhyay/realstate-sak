<script setup>
import SectionHeading from '@/Components/SectionHeading.vue';

defineProps({
    amenities: { type: Array, required: true },
});

const accents = ['bg-brand-blue', 'bg-brand-orange', 'bg-brand-purple', 'bg-brand-green'];
</script>

<template>
    <section id="amenities" class="scroll-mt-36 py-20">
        <div class="container-page">
            <SectionHeading eyebrow="Amenities" title="Everything for a life well lived" />

            <div class="mt-10 grid gap-x-10 gap-y-10 sm:grid-cols-2 lg:grid-cols-4">
                <div v-for="(group, i) in amenities" :key="group.group">
                    <div class="flex items-center gap-3">
                        <span class="h-2.5 w-2.5 rounded-full" :class="accents[i % accents.length]" />
                        <h3 class="font-semibold">{{ group.group }}</h3>
                    </div>
                    <ul class="mt-5 space-y-3 border-l border-slate-200 pl-5 text-sm">
                        <li v-for="item in group.items" :key="item">{{ item }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>
