<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import HeroCarousel from './Components/HeroCarousel.vue';
import FeaturedProjects from './Components/FeaturedProjects.vue';
import AboutSection from './Components/AboutSection.vue';
import EnquiryCta from '@/Components/EnquiryCta.vue';
</script>

<template>
    <Head title="Home" />
    <AppLayout>
        <HeroCarousel />
        <FeaturedProjects />
        <AboutSection />
        <EnquiryCta />
    </AppLayout>
</template>
