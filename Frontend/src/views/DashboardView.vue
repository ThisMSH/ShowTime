<script setup>
import DashboardSideMenu from '../components/DashboardSideMenu.vue';
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
    <main class="container mx-auto mt-4 grid grid-cols-[auto_1fr] gap-x-16">
        <DashboardSideMenu />
        <RouterView />
    </main>
</template>

<style>

</style>
