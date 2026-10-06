<script setup>
import Navbar from '@/Components/Navbar.vue';
import SiteFooter from '@/Components/SiteFooter.vue';
</script>

<template>
    <div class="flex min-h-screen flex-col">
        <Navbar />
        <main class="flex-1">
            <slot />
        </main>
        <SiteFooter />
    </div>
</template>
