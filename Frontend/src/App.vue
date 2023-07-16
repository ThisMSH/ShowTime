<script setup>
import { RouterLink, RouterView } from 'vue-router';
import { onMounted } from 'vue';
import { initFlowbite } from 'flowbite';
import { useAuthStore } from './stores/auth';

const authStore = useAuthStore();

onMounted(async () => {
    if (!authStore.getUser) {
        await authStore.fetchUser();
    }
    initFlowbite();
});
</script>

<template>
    <RouterView />
</template>
