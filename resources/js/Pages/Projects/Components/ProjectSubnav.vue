<script setup>
import { onBeforeUnmount, onMounted, ref } from 'vue';

// Sticky in-page navigation; highlights the section currently in view.
const props = defineProps({
    sections: { type: Array, required: true },
    project: { type: Object, required: true },
});

const active = ref(props.sections[0]?.id);
let observer;

onMounted(() => {
    observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((e) => e.isIntersecting && (active.value = e.target.id));
        },
        { rootMargin: '-45% 0px -50% 0px' },
    );
    props.sections.forEach((s) => {
        const el = document.getElementById(s.id);
        el && observer.observe(el);
    });
});
onBeforeUnmount(() => observer?.disconnect());
</script>

<template>
    <div class="sticky top-20 z-40 mt-10 border-y border-slate-100 bg-white/95 backdrop-blur">
        <div class="container-page flex items-center justify-between gap-6">
            <nav class="-mb-px flex gap-7 overflow-x-auto [scrollbar-width:none]">
                <a
                    v-for="s in sections"
                    :key="s.id"
                    :href="`#${s.id}`"
                    class="border-b-2 py-4 text-sm font-medium whitespace-nowrap transition-colors"
                    :class="active === s.id ? 'border-brand-blue text-brand-blue' : 'border-transparent text-brand-navy hover:text-brand-blue'"
                >
                    {{ s.label }}
                </a>
            </nav>
            <span class="hidden shrink-0 text-sm lg:block">
                <span class="font-semibold text-brand-navy">{{ project.name }}</span> · {{ project.price_from }} onwards
            </span>
        </div>
    </div>
</template>
