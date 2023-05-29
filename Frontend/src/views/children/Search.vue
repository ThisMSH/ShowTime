<script setup>
import H2 from '../../components/utilities/H2.vue';
import ShowComponent from '../../components/ShowComponent.vue';
import ShowSkeleton from '../../components/skeleton/ShowSkeleton.vue';
import { useShowStore } from '../../stores/show';
import { ref } from 'vue';

const showStore = useShowStore();

const searchingFor = ref("");

document.title = 'Search - ShowTime';
</script>

<template>
    <section class="container mx-auto">
        <H2 title="Search" class="mb-20" />
        <input v-model="searchingFor" @keyup="showStore.searchForShow(searchingFor)" type="text" class="relative p-4 left-1/2 text-lg font-medium w-5/6 bg-transparent border-0 border-b-2 border-slate-500 rounded-t-lg -translate-x-1/2 focus:outline-none focus:ring-0 focus:border-slate-900 focus:dark:border-slate-200 focus:bg-slate-300 focus:dark:bg-slate-800" autofocus>
        <div class="my-40 grid gap-y-20 2xl:grid-cols-6 lg:grid-cols-4 md:grid-cols-3 grid-cols-2">
            <template v-if="showStore.searchLoading">
                <div v-for="i in 12" :key="i" class="flex justify-center items-center">
                    <ShowSkeleton />
                </div>
            </template>
            <!-- <template v-else> -->
            <template v-else-if="searchingFor.length > 0">
                <div v-for="show in showStore.getSearchShows" :key="show.id" class="flex justify-center">
                    <ShowComponent :show="show" />
                </div>
            </template>
        </div>
    </section>
</template>

<style>

</style>
