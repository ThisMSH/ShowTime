<script setup>
import DashboardSideMenu from '../components/DashboardSideMenu.vue';
</script>

<template>
    <main class="grid grid-cols-2">
        <DashboardSideMenu />
        <div class="">
            <RouterView />
        </div>
    </main>
</template>

<style>

</style>
