<script setup>
const props = defineProps({
    toEpisode: String,
    image: String,
    title: String
});
</script>

<template>
    <RouterLink class="max-sm:w-full" :to="toEpisode">
        <picture class="">
            <img class="w-full sm:w-60" :src="image" :alt="`Thumbnail of ${title}`">
        </picture>
        <h6 class="font-medium mt-3">{{ title }}</h6>
    </RouterLink>
</template>

<style>

</style>
