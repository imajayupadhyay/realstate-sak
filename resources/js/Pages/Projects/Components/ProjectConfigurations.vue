<script setup>
import SectionHeading from '@/Components/SectionHeading.vue';

defineProps({
    project: { type: Object, required: true },
});
</script>

<template>
    <section id="configurations" class="scroll-mt-36 bg-slate-50 py-20">
        <div class="container-page">
            <SectionHeading eyebrow="Floor Plans & Price" title="Choose your residence" />

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <article
                    v-for="c in project.configurations"
                    :key="c.type"
                    class="flex flex-col rounded-2xl border border-slate-200 bg-white p-7"
                >
                    <h3 class="text-xl font-semibold">{{ c.type }}</h3>
                    <span class="brand-stripe mt-3 h-0.5 w-10 rounded-full" />
                    <dl class="mt-6 space-y-3 text-sm">
                        <div class="flex justify-between gap-4">
                            <dt>Super area</dt>
                            <dd class="font-semibold text-brand-navy">{{ c.area }}</dd>
                        </div>
                        <div class="flex justify-between gap-4">
                            <dt>Starting price</dt>
                            <dd class="font-semibold text-brand-navy">{{ c.price }}</dd>
                        </div>
                    </dl>
                    <a
                        href="#enquire"
                        class="mt-7 rounded-full border border-brand-navy px-5 py-2.5 text-center text-sm font-semibold text-brand-navy transition-colors hover:bg-brand-navy hover:text-white"
                    >
                        Request Floor Plan
                    </a>
                </article>
            </div>

            <p v-if="project.price_note" class="mt-6 text-xs text-slate-500">{{ project.price_note }}</p>
        </div>
    </section>
</template>
