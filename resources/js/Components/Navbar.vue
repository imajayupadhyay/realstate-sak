<script setup>
import { computed, ref, watch } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import { site, navigation } from '@/config/site';

const page = usePage();
const projects = computed(() => page.props.projects ?? []);

const open = ref(false); // mobile menu
const megaOpen = ref(false); // desktop Projects dropdown
const mobileProjectsOpen = ref(false);
let closeTimer = null;

const showMega = () => {
    clearTimeout(closeTimer);
    megaOpen.value = true;
};
// Small delay so the menu doesn't flicker when moving the mouse into the panel.
const hideMega = () => {
    closeTimer = setTimeout(() => (megaOpen.value = false), 120);
};

// Close menus after every page visit.
watch(
    () => page.url,
    () => {
        open.value = false;
        megaOpen.value = false;
        mobileProjectsOpen.value = false;
    },
);

const path = computed(() => page.url.split('?')[0]);
const isActive = (item) =>
    item.dropdown === 'projects' ? path.value.startsWith('/projects/') : !item.href.includes('#') && path.value === item.href;
const isCurrentProject = (slug) => path.value === `/projects/${slug}`;
</script>

<template>
    <header class="sticky top-0 z-50 border-b border-slate-100 bg-white/95 backdrop-blur">
        <nav class="container-page flex h-20 items-center justify-between">
            <Link href="/" class="shrink-0" aria-label="Sakha Consultancy home">
                <img :src="site.logo" :alt="site.name" class="h-12 w-auto sm:h-14" />
            </Link>

            <ul class="hidden items-center gap-9 md:flex">
                <li
                    v-for="item in navigation"
                    :key="item.label"
                    class="relative"
                    @mouseenter="item.dropdown && showMega()"
                    @mouseleave="item.dropdown && hideMega()"
                >
                    <!-- Projects mega menu -->
                    <template v-if="item.dropdown === 'projects'">
                        <button
                            type="button"
                            class="relative flex items-center gap-1 py-2 text-sm font-medium transition-colors hover:text-brand-blue"
                            :class="isActive(item) || megaOpen ? 'text-brand-blue' : 'text-brand-navy'"
                            :aria-expanded="megaOpen"
                            aria-haspopup="true"
                            @click="megaOpen = !megaOpen"
                        >
                            {{ item.label }}
                            <svg class="h-4 w-4 transition-transform" :class="megaOpen && 'rotate-180'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                            </svg>
                            <span v-if="isActive(item)" class="brand-stripe absolute inset-x-0 -bottom-0.5 h-0.5 rounded-full" />
                        </button>

                        <transition
                            enter-from-class="opacity-0 translate-y-2"
                            enter-active-class="transition duration-200 ease-out"
                            leave-to-class="opacity-0 translate-y-2"
                            leave-active-class="transition duration-150 ease-in"
                        >
                            <div v-show="megaOpen" class="absolute left-1/2 top-full -translate-x-1/2 pt-4">
                                <div
                                    class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-2xl shadow-slate-300/40"
                                    :class="projects.length > 1 ? 'w-[680px]' : 'w-[400px]'"
                                >
                                    <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                                        <span class="text-xs font-semibold uppercase tracking-[0.2em] text-brand-blue">Our Projects</span>
                                        <span class="text-xs text-slate-400">{{ projects.length }} {{ projects.length === 1 ? 'project' : 'projects' }}</span>
                                    </div>

                                    <ul class="grid gap-1 p-3" :class="projects.length > 1 ? 'grid-cols-2' : 'grid-cols-1'">
                                        <li v-for="p in projects" :key="p.slug">
                                            <Link
                                                :href="`/projects/${p.slug}`"
                                                class="flex gap-4 rounded-xl p-3 transition-colors hover:bg-slate-50"
                                                :class="isCurrentProject(p.slug) && 'bg-slate-50'"
                                            >
                                                <img :src="p.image" :alt="p.name" class="h-16 w-20 shrink-0 rounded-lg object-cover" />
                                                <span class="min-w-0">
                                                    <span class="flex items-center gap-2">
                                                        <span class="truncate font-semibold text-brand-navy">{{ p.name }}</span>
                                                        <span class="shrink-0 rounded-full bg-brand-orange/10 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-brand-orange">
                                                            {{ p.status }}
                                                        </span>
                                                    </span>
                                                    <span class="mt-0.5 block truncate text-xs">{{ p.location }}</span>
                                                    <span class="mt-0.5 block truncate text-xs text-slate-400">{{ p.type }}</span>
                                                </span>
                                            </Link>
                                        </li>
                                    </ul>

                                    <Link
                                        href="/contact-us"
                                        class="flex items-center justify-between bg-slate-50 px-6 py-4 text-sm transition-colors hover:text-brand-blue"
                                    >
                                        <span>Looking for something specific? <span class="font-semibold text-brand-navy">Talk to our team</span></span>
                                        <span aria-hidden="true">→</span>
                                    </Link>
                                </div>
                            </div>
                        </transition>
                    </template>

                    <NavLink
                        v-else
                        :href="item.href"
                        class="relative py-2 text-sm font-medium transition-colors hover:text-brand-blue"
                        :class="isActive(item) ? 'text-brand-blue' : 'text-brand-navy'"
                    >
                        {{ item.label }}
                        <span v-if="isActive(item)" class="brand-stripe absolute inset-x-0 -bottom-0.5 h-0.5 rounded-full" />
                    </NavLink>
                </li>
            </ul>

            <Link
                href="/contact-us"
                class="hidden rounded-full bg-brand-navy px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-brand-blue md:inline-block"
            >
                Enquire Now
            </Link>

            <button
                type="button"
                class="p-2 text-brand-navy md:hidden"
                :aria-expanded="open"
                aria-label="Toggle menu"
                @click="open = !open"
            >
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path v-if="!open" stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16" />
                    <path v-else stroke-linecap="round" d="M6 6l12 12M18 6L6 18" />
                </svg>
            </button>
        </nav>

        <!-- Mobile menu -->
        <div v-show="open" class="max-h-[calc(100svh-5rem)] overflow-y-auto border-t border-slate-100 bg-white md:hidden">
            <ul class="container-page flex flex-col py-3">
                <li v-for="item in navigation" :key="item.label">
                    <template v-if="item.dropdown === 'projects'">
                        <button
                            type="button"
                            class="flex w-full items-center justify-between py-3 text-sm font-medium"
                            :class="isActive(item) ? 'text-brand-blue' : 'text-brand-navy'"
                            :aria-expanded="mobileProjectsOpen"
                            @click="mobileProjectsOpen = !mobileProjectsOpen"
                        >
                            {{ item.label }}
                            <svg class="h-4 w-4 transition-transform" :class="mobileProjectsOpen && 'rotate-180'" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                            </svg>
                        </button>
                        <ul v-show="mobileProjectsOpen" class="mb-2 space-y-1 border-l-2 border-slate-100 pl-4">
                            <li v-for="p in projects" :key="p.slug">
                                <Link :href="`/projects/${p.slug}`" class="flex items-center gap-3 py-2">
                                    <img :src="p.image" :alt="p.name" class="h-10 w-12 rounded-md object-cover" />
                                    <span>
                                        <span class="block text-sm font-medium text-brand-navy">{{ p.name }}</span>
                                        <span class="block text-xs">{{ p.location }}</span>
                                    </span>
                                </Link>
                            </li>
                        </ul>
                    </template>
                    <NavLink
                        v-else
                        :href="item.href"
                        class="block py-3 text-sm font-medium"
                        :class="isActive(item) ? 'text-brand-blue' : 'text-brand-navy'"
                        @click="open = false"
                    >
                        {{ item.label }}
                    </NavLink>
                </li>
            </ul>
        </div>
    </header>
</template>
