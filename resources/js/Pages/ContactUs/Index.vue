<script setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import PageHeader from '@/Components/PageHeader.vue';
import ContactInfo from './Components/ContactInfo.vue';
import EnquiryForm from '@/Components/EnquiryForm.vue';
import LocationMap from './Components/LocationMap.vue';
</script>

<template>
    <Head title="Contact Us" />
    <AppLayout>
        <PageHeader
            title="Contact Us"
            subtitle="Have a question or looking for the right property? Send us a message — we usually reply within a few hours."
            image="/images/pages/office.jpg"
        />

        <section class="py-24">
            <div class="container-page grid gap-14 lg:grid-cols-[1fr_1.5fr]">
                <ContactInfo />
                <EnquiryForm />
            </div>
        </section>

        <LocationMap />
    </AppLayout>
</template>
