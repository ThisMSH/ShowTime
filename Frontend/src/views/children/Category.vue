<script setup>
import { onMounted, onUpdated, ref } from 'vue';
import { useCategoryStore } from '../../stores/category';
import ShowComponent from '../../components/ShowComponent.vue';
import H2 from '../../components/utilities/H2.vue';
import ShowSkeleton from '../../components/skeleton/ShowSkeleton.vue';

const categoryStore = useCategoryStore();
const props = defineProps(["id"]);

onMounted(async () => {
    await categoryStore.fetchCategoryShows(props.id);
    // console.log(categoryStore.getShows.shows);
});

onUpdated(async () => {
    await categoryStore.fetchCategoryShows(props.id);
});
</script>

<template>
    <div class="container mx-auto">
        <H2 title="Category" />
        <div class="my-40 grid gap-y-20 2xl:grid-cols-6 xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 grid-cols-2">
            <template v-if="!categoryStore.getShows">
                <div class="flex justify-center items-center">
                    <ShowSkeleton />
                </div>
                <div class="flex justify-center items-center">
                    <ShowSkeleton />
                </div>
                <div class="flex justify-center items-center">
                    <ShowSkeleton />
                </div>
                <div class="flex justify-center items-center">
                    <ShowSkeleton />
                </div>
                <div class="flex justify-center items-center">
                    <ShowSkeleton />
                </div>
                <div class="flex justify-center items-center">
                    <ShowSkeleton />
                </div>
                <div class="flex justify-center items-center">
                    <ShowSkeleton />
                </div>
                <div class="flex justify-center items-center">
                    <ShowSkeleton />
                </div>
                <div class="flex justify-center items-center">
                    <ShowSkeleton />
                </div>
                <div class="flex justify-center items-center">
                    <ShowSkeleton />
                </div>
            </template>
            <template v-else>
                <div v-for="show in categoryStore.getShows.shows" :key="show.id" class="flex justify-center items-center">
                    <ShowComponent :show="show" />
                </div>
            </template>
        </div>
    </div>
</template>

<style>

</style>
