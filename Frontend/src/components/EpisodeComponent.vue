<script setup>
const props = defineProps({
    toEpisode: String,
    image: String,
    title: String,
    customClass: String,
    clamp: String,
    imageClass: String,
});
</script>

<template>
    <RouterLink class="max-sm:w-full" :to="toEpisode">
        <picture class="">
            <img :class="imageClass" class="" :src="image" :alt="`Thumbnail of ${title}`">
        </picture>
        <h6 :class="customClass" class="font-medium"><span :class="clamp">{{ title }}</span></h6>
    </RouterLink>
</template>

<style>

</style>
