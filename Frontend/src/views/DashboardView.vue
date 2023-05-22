<script setup>
import DashboardSideMenu from '../components/DashboardSideMenu.vue';
import ScrollToTop from '../components/ScrollToTop.vue';
import DashboardHeader from '../components/DashboardHeader.vue';
import FooterRights from '../components/utilities/FooterRights.vue';
import PageLoading from '../components/skeleton/PageLoading.vue';
import { onMounted } from 'vue';
import { initFlowbite } from 'flowbite';
import { useAuthStore } from '../stores/auth';

const authStore = useAuthStore();

onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <ScrollToTop />
    <main v-if="!authStore.isLoading" class="container mx-auto mt-4 grid grid-cols-[auto_1fr] gap-x-16">
        <DashboardSideMenu />
        <div>
            <DashboardHeader />
            <RouterView />
            <FooterRights />
        </div>
    </main>
    <PageLoading v-else />
</template>
