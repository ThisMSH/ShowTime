import { createApp, markRaw } from 'vue';
import { createPinia } from 'pinia';
import Vue3Toasity from 'vue3-toastify';
import App from './App.vue';
import router from './router';
import './axios';
import './assets/css/main.css';
import 'vue3-toastify/dist/index.css';

const app = createApp(App);
const pinia = createPinia();

pinia.use(({ store }) => {
    store.router = markRaw(router);
});

app.use(pinia);
app.use(router);
app.use(Vue3Toasity, {
    theme: "auto"
});

app.mount('#app');
