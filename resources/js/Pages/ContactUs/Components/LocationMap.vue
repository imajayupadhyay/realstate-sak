<script setup>
import { site } from '@/config/site';
</script>

<template>
    <section class="pb-24">
        <div class="container-page">
            <div class="overflow-hidden rounded-3xl border border-slate-200">
                <iframe
                    :src="site.contact.mapEmbedUrl"
                    title="Sakha Consultancy office location"
                    class="block h-[420px] w-full grayscale-[30%]"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen
                />
            </div>
        </div>
    </section>
</template>
