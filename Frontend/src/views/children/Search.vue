<script setup>
import H2 from '../../components/utilities/H2.vue';
import ShowComponent from '../../components/ShowComponent.vue';
import ShowSkeleton from '../../components/skeleton/ShowSkeleton.vue';
import { useShowStore } from '../../stores/show';
import { ref } from 'vue';
import { debounce } from '../../utilities/debounce';

const showStore = useShowStore();

const searchingFor = ref("");
const loading = ref(false);
const debouncedSearch = debounce(async () => {
    await showStore.searchForShow(searchingFor.value)
    loading.value = false;
}, 500);

const searching = () => {
    loading.value = true;
    debouncedSearch();
};

document.title = 'Search - ShowTime';
</script>

<template>
    <section class="container mx-auto">
        <H2 title="Search" class="mb-20" />
        <input v-model="searchingFor" @input="searching" type="text" class="relative w-5/6 p-4 text-lg font-medium -translate-x-1/2 border-0 border-b-2 rounded-t-lg left-1/2 bg-slate-200 dark:bg-slate-900 border-slate-500 focus:outline-none focus:ring-0 focus:border-slate-900 focus:dark:border-slate-200 focus:bg-slate-300 focus:dark:bg-slate-800" placeholder="" autofocus>
        <div class="grid grid-cols-2 my-40 gap-y-20 2xl:grid-cols-6 lg:grid-cols-4 md:grid-cols-3">
            <template v-if="loading && searchingFor.length > 0">
            <!-- <template v-if="showStore.searchLoading && searchingFor.length > 0"> -->
                <div v-for="i in 12" :key="i" class="flex items-center justify-center">
                    <ShowSkeleton />
                </div>
            </template>
            <template v-else-if="searchingFor.length > 0 && showStore.getSearchShows?.length > 0">
                <div v-for="show in showStore.getSearchShows" :key="show.id" class="flex justify-center">
                    <ShowComponent :show="show" />
                </div>
            </template>
            <template v-else-if="searchingFor.length > 0 && showStore.getSearchShows?.length === 0">
                <h3 class="col-span-2 md:col-span-3 lg:col-span-4 2xl:col-span-6 text-xl sm:text-2xl lg:text-3xl text-center font-semibold tracking-wide">No results found 😵</h3>
            </template>
        </div>
    </section>
</template>

<style>

</style>
