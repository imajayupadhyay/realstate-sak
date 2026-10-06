<script setup>
const items = [
    {
        title: 'Our Mission',
        text: 'To make property buying and investing simple, transparent and rewarding — by offering honest advice, verified projects and complete support at every step.',
        accent: 'bg-brand-blue',
        icon: 'M12 3l2.7 5.5 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.8 1-6.1L3.2 9.4l6.1-.9L12 3z',
    },
    {
        title: 'Our Vision',
        text: 'To be the most trusted property partner for families and investors — known not for how many deals we close, but for how many lasting relationships we build.',
        accent: 'bg-brand-green',
        icon: 'M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12zm10 3a3 3 0 100-6 3 3 0 000 6z',
    },
];
</script>

<template>
    <section class="bg-slate-50 py-24">
        <div class="container-page grid gap-8 md:grid-cols-2">
            <article
                v-for="item in items"
                :key="item.title"
                class="rounded-2xl border border-slate-100 bg-white p-10"
            >
                <span class="grid h-12 w-12 place-items-center rounded-xl text-white" :class="item.accent">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linejoin="round" :d="item.icon" />
                    </svg>
                </span>
                <h3 class="mt-6 text-2xl font-semibold">{{ item.title }}</h3>
                <p class="mt-4 leading-relaxed">{{ item.text }}</p>
            </article>
        </div>
    </section>
</template>
