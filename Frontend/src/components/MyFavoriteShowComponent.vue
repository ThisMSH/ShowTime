<script setup>
import FavButton from './utilities/FavButton.vue';
import FavButtonLoading from './skeleton/FavButtonLoading.vue';
import { useFavoriteStore } from '../stores/favorite';
import { ref } from 'vue';

const favStore = useFavoriteStore();

const props = defineProps(["fav"]);
const isLoading = ref(false);

const deleteFav = async () => {
    isLoading.value = true;
    await favStore.addDeleteFav(props.fav.relationships.show.id);
    await favStore.fetchAllFavs();
    isLoading.value = false;
};
</script>

<template>
    <div
        class="p-2 h-min bg-slate-400 dark:bg-slate-700 rounded-xl">
        <div class="mb-2.5">
            <RouterLink :to="`/show/${fav.relationships.show.id}`">
                <picture class="">
                    <img class="w-full rounded" :src="fav.relationships.show.cover"
                        :alt="`${fav.relationships.show.title}${fav.relationships.show.season ? ' - ' + fav.relationships.show.season : ''} \'s cover`">
                </picture>
            </RouterLink>
        </div>
        <h3 class="mb-2.5 text-lg text-left font-medium line-clamp-2" :title="`${fav.relationships.show.title}${fav.relationships.show.season ? ' - ' + fav.relationships.show.season : ''}`">{{ fav.relationships.show.title }}{{
            fav.relationships.show.season ? ' - ' + fav.relationships.show.season : '' }}</h3>
        <div class="px-3 flex justify-center">
            <FavButton v-if="!isLoading" :fav="fav" @click="deleteFav" class="w-fit" />
            <FavButtonLoading v-else />
        </div>
    </div>
</template>
