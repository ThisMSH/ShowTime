<script setup>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
import ScrollToTop from '../components/ScrollToTop.vue'
import { onMounted } from 'vue';
import { useAuthStore } from '../stores/auth';
import { initFlowbite } from 'flowbite';

const authStore = useAuthStore();

onMounted(async () => {
    await authStore.fetchUser();
    initFlowbite();
});
</script>

<template>
    <Header />
    <main class="mt-[87px] lg:mt-[111px]">
        <RouterView />
    </main>
    <ScrollToTop />
    <Footer />
</template>
