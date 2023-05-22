<script setup>
const props = defineProps({
    name: String,
});
</script>

<template>
    <button class="group relative overflow-hidden px-10 md:px-12 py-2.5 md:py-3.5 border-2 border-slate-900 dark:border-slate-100 rounded-full text-xl transition-all duration-500 hover:drop-shadow-black-sm hover:dark:drop-shadow-white-sm before:absolute before:left-0 before:top-0 before:w-1/2 before:h-full before:bg-gradient-to-l before:from-slate-600 before:dark:from-slate-100 before:opacity-30 before:skew-x-[45deg] before:transition-all before:duration-500 hover:before:left-48" type="submit" name="submit">
        <p class="transition-all duration-500 ease-in-out group-hover:scale-125">{{ name }}</p>
    </button>
</template>
