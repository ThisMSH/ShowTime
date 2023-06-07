<script setup>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
import ScrollToTop from '../components/ScrollToTop.vue';
import PageLoading from '../components/skeleton/PageLoading.vue';
import { onMounted } from 'vue';
import { useAuthStore } from '../stores/auth';

const authStore = useAuthStore();
</script>

<template>
    <Header />
    <main class="mt-[70px] lg:mt-[105px]">
        <PageLoading v-if="authStore.isLoading" />
        <RouterView v-else />
    </main>
    <ScrollToTop />
    <Footer />
</template>
