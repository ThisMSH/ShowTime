<script setup>
import { RouterLink, RouterView } from 'vue-router';
import { onMounted } from 'vue';
import { useAuthStore } from './stores/auth';

const authStore = useAuthStore();

onMounted(async () => {
    await authStore.fetchUser();
});
</script>

<template>
    <RouterView />
</template>
