<script setup>
import SectionHeading from '@/Components/SectionHeading.vue';
import { site } from '@/config/site';

const { contact } = site;

const items = [
    {
        label: 'Call Us',
        value: contact.phone,
        href: `tel:${contact.phone.replace(/\s/g, '')}`,
        icon: 'M3 5a2 2 0 012-2h2.3a1 1 0 01.95.68l1.2 3.6a1 1 0 01-.25 1.02L7.6 9.9a14 14 0 006.5 6.5l1.6-1.6a1 1 0 011.02-.25l3.6 1.2a1 1 0 01.68.95V19a2 2 0 01-2 2C10.4 21 3 13.6 3 5z',
    },
    {
        label: 'Email Us',
        value: contact.email,
        href: `mailto:${contact.email}`,
        icon: 'M3 7l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z',
    },
    {
        label: 'Visit Our Office',
        value: contact.address,
        icon: 'M12 21s-7-6.2-7-11.5a7 7 0 1114 0C19 14.8 12 21 12 21zm0-9a2.5 2.5 0 100-5 2.5 2.5 0 000 5z',
    },
    {
        label: 'Working Hours',
        value: contact.hours,
        icon: 'M12 7v5l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z',
    },
];
</script>

<template>
    <div>
        <SectionHeading eyebrow="Get In Touch" title="We'd love to hear from you">
            Call, email or drop by our office. Or fill in the form and our team will call you back.
        </SectionHeading>

        <ul class="mt-10 space-y-4">
            <li v-for="item in items" :key="item.label">
                <component
                    :is="item.href ? 'a' : 'div'"
                    :href="item.href"
                    class="flex items-start gap-4 rounded-2xl border border-slate-200 p-5 transition-colors"
                    :class="item.href ? 'hover:border-brand-blue/40 hover:bg-slate-50' : ''"
                >
                    <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-navy/5 text-brand-navy">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" :d="item.icon" />
                        </svg>
                    </span>
                    <span>
                        <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">{{ item.label }}</span>
                        <span class="mt-1 block font-medium text-brand-navy">{{ item.value }}</span>
                    </span>
                </component>
            </li>
        </ul>
    </div>
</template>
