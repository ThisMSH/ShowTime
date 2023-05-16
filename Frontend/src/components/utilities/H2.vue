<script setup>
const props = defineProps({
    title: String,
});
</script>

<template>
    <h2 class="mt-40 relative font-coiny text-2xl sm:text-3xl lg:text-4xl text-center font-semibold before:absolute before:w-36 lg:before:w-48 before:h-0.5 lg:before:h-1 before:-bottom-2 before:left-1/2 before:-translate-x-1/2 before:bg-slate-950 before:dark:bg-slate-100">{{ title }}</h2>
</template>

<style>

</style>
