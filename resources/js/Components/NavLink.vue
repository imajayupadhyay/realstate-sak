<script setup>
import { Link } from '@inertiajs/vue3';

// Section anchors ("/#projects") need a normal <a> so the browser scrolls;
// real pages go through Inertia's <Link> for SPA navigation.
const props = defineProps({
    href: { type: String, required: true },
});

const isAnchor = props.href.includes('#');
</script>

<template>
    <a v-if="isAnchor" :href="href"><slot /></a>
    <Link v-else :href="href"><slot /></Link>
</template>
