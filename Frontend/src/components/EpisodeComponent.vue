<script setup>
const props = defineProps({
    toEpisode: String,
    image: String,
    title: String,
    number: String,
    customClass: String,
    clamp: String,
    imageClass: String,
    epiType: String
});
</script>

<template>
    <RouterLink class="max-sm:w-full overflow-hidden" :to="`../episode/${toEpisode}`">
        <picture :class="epiType == 1 ? 'premium' : ''">
            <img :class="[imageClass, epiType == 1 ? 'premium-border' : '']" :src="image" :alt="`Thumbnail of ${title}`">
        </picture>
        <h6 :class="customClass" :title="`${number} - ${title}`" class="font-medium"><span :class="clamp">{{ number }} - {{ title }}</span></h6>
    </RouterLink>
</template>

<style>
.premium {
    @apply relative after:absolute after:content-[url('https://api.iconify.design/mdi/crown.svg')] after:text-[30%] after:pt-1 after:flex after:justify-center after:items-center after:top-[20%] after:right-[12%] after:translate-x-1/2 after:-translate-y-1/2 after:w-1/2 after:h-6 after:bg-amber-500 after:dark:bg-amber-400 after:rotate-45;
}
.premium-border {
    @apply border-2 border-amber-500 dark:border-amber-400;
}
</style>
