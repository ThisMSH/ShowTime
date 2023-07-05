<script setup>
import DarkMode from '../components/utilities/DarkMode.vue';
import { toast } from 'vue3-toastify';

const notif = () => {
    toast.info("hello plebs");
};
</script>

<template>
    <DarkMode class="absolute top-2 right-2"/>
    <div class="flex justify-center items-center flex-col mt-60">
        <button @click="notif" class="px-6 py-1 rounded-md bg-slate-400 w-fit">click</button>
    </div>
</template>

<style>

</style>
