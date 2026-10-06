<script setup>
// Project detail TEMPLATE — every project (/projects/{slug}) renders through
// this page. Data comes from ProjectController (resources/data/projects/*.php).
// Sections hide themselves when a project has no data for them.
import { computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import ProjectHero from './Components/ProjectHero.vue';
import ProjectSubnav from './Components/ProjectSubnav.vue';
import ProjectOverview from './Components/ProjectOverview.vue';
import ProjectConfigurations from './Components/ProjectConfigurations.vue';
import ProjectAmenities from './Components/ProjectAmenities.vue';
import ProjectGallery from './Components/ProjectGallery.vue';
import ProjectLocation from './Components/ProjectLocation.vue';
import ProjectEnquiry from './Components/ProjectEnquiry.vue';

const props = defineProps({
    project: { type: Object, required: true },
});

const sections = computed(() =>
    [
        { id: 'overview', label: 'Overview', show: props.project.overview?.length },
        { id: 'configurations', label: 'Floor Plans & Price', show: props.project.configurations?.length },
        { id: 'amenities', label: 'Amenities', show: props.project.amenities?.length },
        { id: 'gallery', label: 'Gallery', show: props.project.gallery?.length },
        { id: 'location', label: 'Location', show: true },
        { id: 'enquire', label: 'Enquire', show: true },
    ].filter((s) => s.show),
);
</script>

<template>
    <Head :title="`${project.name} — ${project.location}`">
        <meta name="description" :content="project.tagline" />
    </Head>
    <AppLayout>
        <ProjectHero :project="project" />
        <ProjectSubnav :sections="sections" :project="project" />
        <ProjectOverview v-if="project.overview?.length" :project="project" />
        <ProjectConfigurations v-if="project.configurations?.length" :project="project" />
        <ProjectAmenities v-if="project.amenities?.length" :amenities="project.amenities" />
        <ProjectGallery v-if="project.gallery?.length" :images="project.gallery" />
        <ProjectLocation :project="project" />
        <ProjectEnquiry :project="project" />
    </AppLayout>
</template>
