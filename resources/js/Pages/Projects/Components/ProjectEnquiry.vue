<script setup>
import EnquiryForm from '@/Components/EnquiryForm.vue';
import { site } from '@/config/site';

defineProps({
    project: { type: Object, required: true },
});
</script>

<template>
    <section id="enquire" class="scroll-mt-36 bg-slate-50 py-20">
        <div class="container-page grid gap-10 lg:grid-cols-[1fr_1.5fr]">
            <div class="flex flex-col justify-between gap-8 rounded-3xl bg-brand-navy p-8 text-white sm:p-10">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.25em] text-white/60">Interested in</p>
                    <h2 class="mt-3 text-3xl font-semibold text-white">{{ project.name }}</h2>
                    <p class="mt-2 text-white/70">{{ project.location }}</p>

                    <dl class="mt-8 space-y-4 text-sm">
                        <div class="flex justify-between gap-4 border-b border-white/10 pb-4">
                            <dt class="text-white/60">Starting price</dt>
                            <dd class="font-semibold">{{ project.price_from }}</dd>
                        </div>
                        <div class="flex justify-between gap-4 border-b border-white/10 pb-4">
                            <dt class="text-white/60">Configuration</dt>
                            <dd class="text-right font-semibold">{{ project.type }}</dd>
                        </div>
                        <div class="flex justify-between gap-4">
                            <dt class="text-white/60">Possession</dt>
                            <dd class="font-semibold">{{ project.possession }}</dd>
                        </div>
                    </dl>
                </div>

                <div>
                    <p class="text-sm text-white/70">Prefer to talk? Call our property advisor</p>
                    <a
                        :href="`tel:${site.contact.phone.replace(/\s/g, '')}`"
                        class="mt-3 inline-block rounded-full bg-white px-7 py-3 text-sm font-semibold text-brand-navy transition-colors hover:bg-brand-blue hover:text-white"
                    >
                        {{ site.contact.phone }}
                    </a>
                </div>
            </div>

            <EnquiryForm :title="`Enquire about ${project.name}`" :project="project.name" />
        </div>

        <p v-if="project.disclaimer" class="container-page mt-10 text-xs leading-relaxed text-slate-400">
            <span class="font-semibold">Disclaimer:</span> {{ project.disclaimer }}
        </p>
    </section>
</template>
