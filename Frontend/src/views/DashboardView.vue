<script setup>
import DashboardSideMenu from '../components/DashboardSideMenu.vue';
</script>

<template>
    <main class="container mx-auto mt-4 grid grid-cols-[auto_1fr] gap-x-16">
        <DashboardSideMenu />
        <RouterView />
    </main>
</template>

<style>

</style>
