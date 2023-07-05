<script setup>
import RatingComponent from './RatingComponent.vue';

const props = defineProps(["rate"]);
</script>

<template>
    <div class="px-4 py-3 bg-slate-400 dark:bg-slate-700 rounded-xl grid grid-cols-[auto,_1fr] gap-x-4">
        <RouterLink :to="`/show/${rate.relationships.show.id}`">
            <picture class="">
                <img class="w-32 rounded" :src="rate.relationships.show.cover" :alt="`${rate.relationships.show.title}${rate.relationships.show.season ? ' - ' + rate.relationships.show.season : ''} \'s cover`">
            </picture>
        </RouterLink>
        <div class="flex flex-col justify-between">
            <h3 class="text-lg text-left font-medium line-clamp-2" :title="`${rate.relationships.show.title}${rate.relationships.show.season ? ' - ' + rate.relationships.show.season : ''}`">{{ rate.relationships.show.title }}{{ rate.relationships.show.season ? ' - ' + rate.relationships.show.season : '' }}</h3>
            <p class="text-sm text-slate-600 dark:text-slate-400">Average score: <span class="text-lg text-slate-950 dark:text-slate-50  font-bold">{{ (+rate.relationships.show.avg_rating).toFixed(2) }}</span></p>
            <RatingComponent :showID="rate.relationships.show.id" />
        </div>
    </div>
</template>
