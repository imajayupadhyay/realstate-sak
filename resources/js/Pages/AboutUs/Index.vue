<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PageHeader from '@/Components/PageHeader.vue';
import EnquiryCta from '@/Components/EnquiryCta.vue';
import OurStory from './Components/OurStory.vue';
import MissionVision from './Components/MissionVision.vue';
import OurServices from './Components/OurServices.vue';
import WhyChooseUs from './Components/WhyChooseUs.vue';
</script>

<template>
    <Head title="About Us" />
    <AppLayout>
        <PageHeader
            title="About Us"
            subtitle="A friend you can trust for every property decision — from your first home to your next investment."
            image="/images/pages/skyline.jpg"
        />
        <OurStory />
        <MissionVision />
        <OurServices />
        <WhyChooseUs />
        <EnquiryCta />
    </AppLayout>
</template>
