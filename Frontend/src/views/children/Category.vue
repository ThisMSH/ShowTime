<script setup>
import { onMounted, watch } from 'vue';
import { useCategoryStore } from '../../stores/category';
import ShowComponent from '../../components/ShowComponent.vue';
import H2 from '../../components/utilities/H2.vue';
import ShowSkeleton from '../../components/skeleton/ShowSkeleton.vue';

const categoryStore = useCategoryStore();
const props = defineProps(["id"]);
const categoryTitles = {
  1: "Series",
  2: "Movies",
  3: "Anime Series",
  4: "Anime Movies"
};

let categoryTitle = categoryTitles[props.id];

onMounted(async () => {
    await categoryStore.fetchCategoryShows(props.id);
});

watch(() => props.id, async (categoryID) => {
    categoryTitle = categoryTitles[categoryID];
    await categoryStore.fetchCategoryShows(categoryID);
});
</script>

<template>
    <div class="container mx-auto">
        <H2 :title="categoryTitle" />
        <div class="my-40 grid gap-y-20 2xl:grid-cols-6 xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 grid-cols-2">
            <template v-if="categoryStore.catShowsLoading">
                <div v-for="i in 12" :key="i" class="flex justify-center items-center">
                    <ShowSkeleton />
                </div>
            </template>
            <template v-else>
                <div v-for="show in categoryStore.getShows.shows" :key="show.id" class="flex justify-center">
                    <ShowComponent :show="show" />
                </div>
            </template>
        </div>
    </div>
</template>

<style>

</style>
