<script setup>
import { computed } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import FormField from '@/Components/FormField.vue';

// Used on Contact Us and on every project page. On a project page pass
// `project` (the project name) so the enquiry is tagged with it.
const props = defineProps({
    title: { type: String, default: 'Send us an enquiry' },
    project: { type: String, default: '' },
});

const interests = [
    { value: 'buy', label: 'Buying a property' },
    { value: 'invest', label: 'Investment' },
    { value: 'finance', label: 'Home loan / Finance' },
    { value: 'other', label: 'Something else' },
];

const form = useForm({
    name: '',
    phone: '',
    email: '',
    interest: props.project ? 'buy' : '',
    project: props.project,
    message: '',
});

const page = usePage();
const projects = computed(() => page.props.projects ?? []);
const success = computed(() => page.props.flash?.success);

const submit = () => {
    form.post('/contact-us', {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};

const base =
    'block w-full rounded-xl border bg-white px-4 py-3 text-sm text-brand-navy placeholder:text-slate-400 transition focus:border-brand-blue focus:outline-none focus:ring-4 focus:ring-brand-blue/10';
// Field classes: red border when the server returned an error for it.
const field = (name) => [base, form.errors[name] ? 'border-red-400' : 'border-slate-200'];
</script>

<template>
    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-xl shadow-slate-200/50 sm:p-10">
        <h2 class="text-2xl font-semibold">{{ title }}</h2>
        <p class="mt-2 text-sm">Fields marked <span class="text-brand-orange">*</span> are required.</p>

        <div
            v-if="success && !form.isDirty"
            class="mt-6 flex items-start gap-3 rounded-xl border border-brand-green/30 bg-brand-green/10 px-4 py-3 text-sm text-green-800"
            role="status"
        >
            <svg class="mt-0.5 h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12l5 5L20 7" />
            </svg>
            {{ success }}
        </div>

        <form class="mt-8 grid gap-6 sm:grid-cols-2" novalidate @submit.prevent="submit">
            <FormField label="Full name" id="name" :error="form.errors.name" required>
                <input id="name" v-model="form.name" type="text" autocomplete="name" placeholder="Your name"
                    :class="field('name')" />
            </FormField>

            <FormField label="Phone number" id="phone" :error="form.errors.phone" required>
                <input id="phone" v-model="form.phone" type="tel" autocomplete="tel" placeholder="+91"
                    :class="field('phone')" />
            </FormField>

            <FormField label="Email" id="email" :error="form.errors.email" class="sm:col-span-2">
                <input id="email" v-model="form.email" type="email" autocomplete="email" placeholder="you@example.com"
                    :class="field('email')" />
            </FormField>

            <FormField label="I'm interested in" :class="props.project && 'sm:col-span-2'" id="interest" :error="form.errors.interest" required>
                <select id="interest" v-model="form.interest" :class="field('interest')">
                    <option value="" disabled>Select an option</option>
                    <option v-for="i in interests" :key="i.value" :value="i.value">{{ i.label }}</option>
                </select>
            </FormField>

            <FormField v-if="!props.project" label="Project (optional)" id="project" :error="form.errors.project">
                <select id="project" v-model="form.project" :class="field('project')">
                    <option value="">Any / not sure yet</option>
                    <option v-for="p in projects" :key="p.slug" :value="p.name">{{ p.name }}</option>
                </select>
            </FormField>

            <FormField label="Message" id="message" :error="form.errors.message" class="sm:col-span-2">
                <textarea id="message" v-model="form.message" rows="5"
                    placeholder="Tell us about your budget, preferred location or any questions…"
                    :class="[field('message'), 'resize-none']" />
            </FormField>

            <div class="flex flex-col-reverse items-start gap-4 sm:col-span-2 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-xs text-slate-400">We respect your privacy and never share your details.</p>
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="rounded-full bg-brand-navy px-8 py-3 text-sm font-semibold text-white transition-colors hover:bg-brand-blue disabled:opacity-60"
                >
                    {{ form.processing ? 'Sending…' : 'Send Enquiry' }}
                </button>
            </div>
        </form>
    </div>
</template>
