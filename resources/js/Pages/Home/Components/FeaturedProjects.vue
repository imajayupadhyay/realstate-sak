<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import SectionHeading from '@/Components/SectionHeading.vue';

// Projects come from the shared `projects` prop (HandleInertiaRequests).
const page = usePage();
const projects = computed(() => page.props.projects ?? []);
</script>

<template>
    <section id="projects" class="scroll-mt-20 py-24">
        <div class="container-page">
            <SectionHeading eyebrow="Our Projects" title="Featured properties">
                Handpicked homes and investments from trusted developers.
            </SectionHeading>

            <!-- One project: large featured card -->
            <Link
                v-if="projects.length === 1"
                :href="`/projects/${projects[0].slug}`"
                class="group mt-14 grid overflow-hidden rounded-3xl border border-slate-200 transition-shadow hover:shadow-xl hover:shadow-slate-200/60 lg:grid-cols-[1.4fr_1fr]"
            >
                <div class="relative aspect-[16/10] overflow-hidden bg-slate-100 lg:aspect-auto lg:min-h-[420px]">
                    <img
                        :src="projects[0].image"
                        :alt="projects[0].name"
                        loading="lazy"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                    />
                    <span class="absolute top-5 left-5 rounded-full bg-brand-orange px-3 py-1 text-xs font-semibold text-white">
                        {{ projects[0].status }}
                    </span>
                </div>
                <div class="flex flex-col justify-center p-8 sm:p-12">
                    <p class="text-sm text-slate-500">by {{ projects[0].developer }}</p>
                    <h3 class="mt-2 text-3xl font-semibold">{{ projects[0].name }}</h3>
                    <p class="mt-3 flex items-center gap-1.5 text-sm">
                        <svg class="h-4 w-4 text-brand-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-7-6.2-7-11.5a7 7 0 1114 0C19 14.8 12 21 12 21z" /><circle cx="12" cy="9.5" r="2.5" /></svg>
                        {{ projects[0].location }}
                    </p>
                    <dl class="mt-8 grid grid-cols-2 gap-6 border-t border-slate-200 pt-6 text-sm">
                        <div>
                            <dt class="text-xs uppercase tracking-wider text-slate-400">Configuration</dt>
                            <dd class="mt-1 font-medium text-brand-navy">{{ projects[0].type }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs uppercase tracking-wider text-slate-400">Starting from</dt>
                            <dd class="mt-1 text-xl font-semibold text-brand-navy">{{ projects[0].price_from }}</dd>
                        </div>
                    </dl>
                    <span class="mt-8 inline-flex items-center gap-2 text-sm font-semibold text-brand-navy group-hover:text-brand-blue">
                        View project details <span aria-hidden="true" class="transition-transform group-hover:translate-x-1">→</span>
                    </span>
                </div>
            </Link>

            <!-- Several projects: card grid -->
            <div v-else class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <Link v-for="project in projects" :key="project.slug" :href="`/projects/${project.slug}`" class="group">
                    <div class="relative aspect-[4/3] overflow-hidden rounded-2xl bg-slate-100">
                        <img
                            :src="project.image"
                            :alt="project.name"
                            loading="lazy"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                        />
                        <span class="absolute top-4 left-4 rounded-full bg-brand-orange px-3 py-1 text-xs font-medium text-white">
                            {{ project.status }}
                        </span>
                    </div>
                    <div class="mt-5">
                        <h3 class="text-lg font-semibold group-hover:text-brand-blue">{{ project.name }}</h3>
                        <p class="mt-1 text-sm">{{ project.type }}</p>
                        <div class="mt-3 flex items-center justify-between text-sm">
                            <span class="flex items-center gap-1.5 text-slate-500">
                                <svg class="h-4 w-4 text-brand-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-7-6.2-7-11.5a7 7 0 1114 0C19 14.8 12 21 12 21z" /><circle cx="12" cy="9.5" r="2.5" /></svg>
                                {{ project.location }}
                            </span>
                            <span class="font-semibold text-brand-navy">{{ project.price_from }}</span>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    </section>
</template>
