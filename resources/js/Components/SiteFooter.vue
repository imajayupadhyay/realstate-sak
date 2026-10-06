<script setup>
import NavLink from '@/Components/NavLink.vue';
import { site, navigation } from '@/config/site';

const year = new Date().getFullYear();
</script>

<template>
    <footer class="border-t border-slate-100 bg-slate-50">
        <div class="brand-stripe h-1" />
        <div class="container-page grid gap-12 py-16 md:grid-cols-3">
            <div>
                <img :src="site.logo" :alt="site.name" class="h-14 w-auto" />
                <p class="mt-5 max-w-xs text-sm leading-relaxed">
                    {{ site.services.join(' · ') }}. Helping families and investors find the right property with
                    honest, end-to-end guidance.
                </p>
            </div>

            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider">Quick Links</h4>
                <ul class="mt-5 space-y-3 text-sm">
                    <li v-for="item in navigation" :key="item.label">
                        <NavLink :href="item.href" class="transition-colors hover:text-brand-blue">{{ item.label }}</NavLink>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider">Contact Us</h4>
                <ul class="mt-5 space-y-3 text-sm">
                    <li>
                        <a :href="`tel:${site.contact.phone.replace(/\s/g, '')}`" class="hover:text-brand-blue">
                            {{ site.contact.phone }}
                        </a>
                    </li>
                    <li>
                        <a :href="`mailto:${site.contact.email}`" class="hover:text-brand-blue">
                            {{ site.contact.email }}
                        </a>
                    </li>
                    <li>{{ site.contact.address }}</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-slate-200">
            <p class="container-page py-6 text-xs text-slate-500">
                © {{ year }} {{ site.name }}. All rights reserved.
            </p>
        </div>
    </footer>
</template>
