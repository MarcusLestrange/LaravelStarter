import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from "./Shared/Layout.vue";


// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import '@mdi/font/css/materialdesignicons.css'
import { aliases as alMdi, mdi } from 'vuetify/iconsets/mdi'

const vuetify = createVuetify({
    components,
    directives,
    theme: {
        defaultTheme: 'dark'
    },
    icons: {
        defaultSet: 'mdi',
        alMdi,
        sets: { mdi },
    },
})

import Toast, { POSITION } from "vue-toastification";
import "vue-toastification/dist/index.css";
import {createPinia} from "pinia";
// Import the CSS or use your own!
const ToastificationOptions = {
    position: POSITION.TOP_RIGHT,
    maxToasts: 5,
    icon: true,
}

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({methods: {route: window.route}})
            .use(vuetify)
            .use(Toast, ToastificationOptions)
            .use( createPinia() )
            .mount(el)
    },
})
