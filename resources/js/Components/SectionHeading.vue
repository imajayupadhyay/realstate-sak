<script setup>
defineProps({
    eyebrow: { type: String, required: true },
    title: { type: String, required: true },
    align: { type: String, default: 'left' },
});
</script>

<template>
    <div :class="align === 'center' ? 'mx-auto text-center' : ''" class="max-w-2xl">
        <span
            class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.25em] text-brand-blue"
        >
            <span class="brand-stripe h-0.5 w-8" />
            {{ eyebrow }}
        </span>
        <h2 class="mt-4 text-3xl font-semibold leading-tight sm:text-4xl">{{ title }}</h2>
        <p v-if="$slots.default" class="mt-4 leading-relaxed"><slot /></p>
    </div>
</template>
