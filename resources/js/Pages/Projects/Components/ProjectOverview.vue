<script setup>
import SectionHeading from '@/Components/SectionHeading.vue';

defineProps({
    project: { type: Object, required: true },
});
</script>

<template>
    <section id="overview" class="scroll-mt-36 py-20">
        <div class="container-page grid gap-14 lg:grid-cols-[1.3fr_1fr]">
            <div>
                <SectionHeading eyebrow="Overview" :title="`About ${project.name}`" />
                <div class="mt-6 space-y-4 leading-relaxed">
                    <p v-for="(para, i) in project.overview" :key="i">{{ para }}</p>
                </div>
                <p class="mt-6 text-sm"><span class="font-medium text-brand-navy">Address:</span> {{ project.address }}</p>
            </div>

            <dl v-if="project.highlights?.length" class="grid grid-cols-2 content-start gap-4">
                <div
                    v-for="h in project.highlights"
                    :key="h.label"
                    class="rounded-2xl border border-slate-200 p-5"
                >
                    <dt class="text-xs uppercase tracking-wider text-slate-400">{{ h.label }}</dt>
                    <dd class="mt-1 text-lg font-semibold text-brand-navy">{{ h.value }}</dd>
                </div>
            </dl>
        </div>
    </section>
</template>
