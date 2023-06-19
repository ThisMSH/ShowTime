<script setup>
import DarkMode from '../components/utilities/DarkMode.vue';
import ShowCardSkeleton from '../components/skeleton/ShowCardSkeleton.vue';
import EpisodeSkeleton from '../components/skeleton/EpisodeSkeleton.vue';
import PageLoading from '../components/skeleton/PageLoading.vue';
import ShowSkeleton from '../components/skeleton/ShowSkeleton.vue';
import ShowsSliderSkeleton from '../components/skeleton/ShowsSliderSkeleton.vue';
</script>

<template>
    <DarkMode class="absolute top-2 right-2"/>
    <div class="flex justify-center flex-col mt-60 gap-x-20">
        <ShowCardSkeleton />
    </div>
</template>

<style>

</style>
