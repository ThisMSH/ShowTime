<script setup>
const props = defineProps(["show"]);
</script>

<template>
    <div class="max-w-[46vw] w-36 md:w-40 lg:w-48">
        <RouterLink to="/show">
            <img class="mb-3" :src="show.cover" alt="Show Cover">
        </RouterLink>
        <RouterLink to="/show">
            <h6 class="text-slate-950 dark:text-slate-100 mb-3">{{ show.title }}</h6>
        </RouterLink>
        <div class="flex justify-between items-center">
            <p class="text-orange-500 dark:text-orange-400">{{ show.show_type }}</p>
            <p class="text-neutral-500 dark:text-neutral-400">{{ show.rating }}</p>
        </div>
    </div>
</template>