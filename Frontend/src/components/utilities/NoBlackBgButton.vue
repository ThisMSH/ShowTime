<script setup>
import { Icon } from '@iconify/vue';

const props = defineProps({
    name: String,
    iconName: String,
    hide: { type: Boolean, default: false }
});
</script>

<template>
    <button class="relative flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-slate-950 rounded-l-full rounded-r-full group bg-gradient-to-br from-red-600 to-orange-300 hover:from-orange-500 hover:to-red-300 focus:ring-4 focus:outline-none focus:ring-red-800">
        <span class="relative px-3 py-1 md:px-4 md:py-2 lg:px-5 lg:py-2.5 transition-all ease-in duration-75 rounded-l-full rounded-r-full group-hover:bg-opacity-0 text-lg md:text-xl">
            <Icon :class="{ 'hidden': hide }" class="inline-block text-3xl md:text-4xl" :icon="iconName" /> {{ name }}
        </span>
    </button>
</template>

<style>

</style>
