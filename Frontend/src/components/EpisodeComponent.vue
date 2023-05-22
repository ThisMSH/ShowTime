<script setup>
const props = defineProps({
    toEpisode: String,
    image: String,
    title: String,
    number: String,
    customClass: String,
    clamp: String,
    imageClass: String,
});
</script>

<template>
    <RouterLink class="max-sm:w-full" :to="`../episode/${toEpisode}`">
        <picture class="">
            <img :class="imageClass" class="" :src="image" :alt="`Thumbnail of ${title}`">
        </picture>
        <h6 :class="customClass" :title="`${number} - ${title}`" class="font-medium"><span :class="clamp">{{ number }} - {{ title }}</span></h6>
    </RouterLink>
</template>
