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
    <main v-if="authStore.getUser" class="container mx-auto mt-4 grid grid-cols-[auto_1fr] gap-x-16">
        <DashboardSideMenu />
        <div>
            <DashboardHeader />
            <RouterView v-slot="{ Component }">
                <Transition name="dashboard" mode="out-in">
                    <component :is="Component" />
                </Transition>
            </RouterView>
            <FooterRights />
        </div>
    </main>
    <PageLoading v-else />
</template>

<style>
.dashboard-enter-from {
    transform: translateY(-50px);
    opacity: 0;
}
.dashboard-leave-to {
    transform: translateY(50px);
    opacity: 0;
}
.dashboard-enter-active,
.dashboard-leave-active {
    transition: all 0.5s ease-out;
}
</style>
