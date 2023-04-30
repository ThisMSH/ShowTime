<script setup>
const props = defineProps(["show"]);
</script>

<template>
    <div class="max-w-[46vw] w-36 md:w-40 lg:w-48">
        <RouterLink :to="`/show/${show.id}`">
            <img class="mb-3" :src="show.attributes.cover" :alt="`${show.attributes.title} - ${show.attributes.season}'s Cover`">
        </RouterLink>
        <RouterLink :to="`/show/${show.id}`">
            <h6 :title="`${show.attributes.title} - ${show.attributes.season}`" class="text-slate-950 dark:text-slate-100 mb-3 line-clamp-2">{{ show.attributes.title }} - {{ show.attributes.season }}</h6>
        </RouterLink>
        <div class="flex justify-between items-center">
            <p class="text-orange-500 dark:text-orange-400">{{ show.relationships.category.name }}</p>
            <!-- <p class="text-neutral-500 dark:text-neutral-400">{{ show.attributes.rating }}</p> -->
        </div>
    </div>
</template>