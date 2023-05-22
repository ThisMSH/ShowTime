<script setup>
const props = defineProps({
    title: String,
});
</script>

<template>
    <h4 class="text-lg sm:text-xl xl:text-2xl font-semibold relative mb-5 before:absolute before:left-0 before:top-8 before:w-16 before:h-0.5 before:bg-slate-900 before:dark:bg-slate-100">{{ title }}</h4>
</template>
