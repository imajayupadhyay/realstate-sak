import '../css/app.css';
import './bootstrap';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';

const appName = import.meta.env.VITE_APP_NAME || 'Sakha Consultancy';

createInertiaApp({
    title: (title) => (title ? `${title} | ${appName}` : appName),
    resolve: (name) => {
        // Pages live at Pages/<Page>/Index.vue; page-private components
        // in Pages/<Page>/Components are not routable pages.
        const pages = import.meta.glob(['./Pages/**/*.vue', '!./Pages/**/Components/**'], { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
    progress: {
        color: '#13206b',
    },
});
