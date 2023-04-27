<script setup>
const props = defineProps({
    toEpisode: String,
    image: String,
    title: String,
    number: String,
    customClass: String,
    clamp: String
});
</script>

<template>
    <RouterLink class="w-full flex" :to="toEpisode">
        <picture class="w-2/5 min-h-[68px]">
            <img class="w-full min-h-full" :src="image" :alt="`Thumbnail of ${title}`">
        </picture>
        <h6 :class="customClass" class="font-medium w-3/5"><span :class="clamp">{{ number }} - {{ title }}</span></h6>
    </RouterLink>
</template>

<style>

</style>
