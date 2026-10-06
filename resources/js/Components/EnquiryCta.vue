<script setup>
import { site } from '@/config/site';
</script>

<template>
    <section class="py-24">
        <div class="container-page">
            <div class="flex flex-col items-start justify-between gap-8 rounded-3xl bg-brand-navy px-8 py-14 sm:px-14 lg:flex-row lg:items-center">
                <div>
                    <h2 class="text-2xl font-semibold text-white sm:text-3xl">Looking for the right property?</h2>
                    <p class="mt-3 text-white/70">Speak with our team for a free consultation.</p>
                </div>
                <div class="flex flex-wrap gap-4">
                    <a
                        :href="`tel:${site.contact.phone.replace(/\s/g, '')}`"
                        class="rounded-full bg-white px-7 py-3 text-sm font-semibold text-brand-navy transition-colors hover:bg-brand-blue hover:text-white"
                    >
                        Call {{ site.contact.phone }}
                    </a>
                    <a
                        :href="`mailto:${site.contact.email}`"
                        class="rounded-full border border-white/40 px-7 py-3 text-sm font-semibold text-white transition-colors hover:bg-white/10"
                    >
                        Email Us
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
