<script setup>
import MyRatedShowComponent from '../../components/MyRatedShowComponent.vue';
import RatedShowSkeleton from '../../components/skeleton/RatedShowSkeleton.vue';
import MyFavoriteShowComponent from '../../components/MyFavoriteShowComponent.vue';
import FavoriteShowSkeleton from '../../components/skeleton/FavoriteShowSkeleton.vue';
import { onMounted, ref } from 'vue';
import { Icon } from '@iconify/vue';
import { useFavoriteStore } from '../../stores/favorite';
import { useRatingStore } from '../../stores/rating';

const favStore = useFavoriteStore();
const ratingStore = useRatingStore();

const btnBg = ref(null);
const ratingsSection = ref(null);
const favsSection = ref(null);
const episodeIcon = ref(null);
const trailerIcon = ref(null);

const showRatings = function () {
    btnBg.value.classList.remove("left-[256px]");
    btnBg.value.classList.add("left-6");
    episodeIcon.value.classList.add("-rotate-12", "scale-125");
    trailerIcon.value.classList.remove("-rotate-12", "scale-125");
    ratingsSection.value.classList.add("grid");
    ratingsSection.value.classList.remove("hidden");
    favsSection.value.classList.remove("grid");
    favsSection.value.classList.add("hidden");
};
const showFavs = function () {
    btnBg.value.classList.add("left-[256px]");
    btnBg.value.classList.remove("left-6");
    episodeIcon.value.classList.remove("-rotate-12", "scale-125");
    trailerIcon.value.classList.add("-rotate-12", "scale-125");
    ratingsSection.value.classList.remove("grid");
    ratingsSection.value.classList.add("hidden");
    favsSection.value.classList.add("grid");
    favsSection.value.classList.remove("hidden");
};

document.title = "Dashboard - My Space - ShowTime";

onMounted(async () => {
    await ratingStore.fetchAllRatings();
    await favStore.fetchAllFavs();
});
</script>

<template>
    <div class="mt-16">
        <div class="relative left-11">
            <div
                class="relative inline-flex gap-x-2 px-6 pt-1 bg-slate-200 dark:bg-slate-900 rounded-tl-3xl rounded-tr-3xl">
                <button @click="showRatings"
                    class="text-xl w-56 h-14 rounded-tl-3xl rounded-tr-3xl font-medium flex items-center justify-center gap-x-3 z-[1]">
                    <div ref="episodeIcon" class="text-sky-400 -rotate-12 scale-125 transition-all duration-300">
                        <Icon
                            icon="streamline:interface-favorite-star-reward-rating-rate-social-star-media-favorite-like-stars" />
                    </div>
                    <span> My Ratings</span>
                </button>
                <button @click="showFavs"
                    class="text-xl w-56 h-14 rounded-tl-3xl rounded-tr-3xl font-medium flex items-center justify-center gap-x-3 z-[1]">
                    <div ref="trailerIcon" class="text-red-500 transition-all duration-300">
                        <Icon
                            icon="streamline:interface-favorite-heart-reward-social-rating-media-heart-it-like-favorite-love" />
                    </div>
                    <span> My Favorites</span>
                </button>
                <div ref="btnBg"
                    class="absolute left-6 w-56 h-14 bg-slate-300 dark:bg-slate-800 rounded-tl-3xl rounded-tr-3xl transition-all duration-300">
                    <span
                        class="absolute w-6 h-6 bg-slate-300 dark:bg-slate-800 bottom-0 -left-6 before:absolute before:w-full before:h-full before:bg-slate-200 before:dark:bg-slate-900 before:rounded-br-full"></span>
                    <span
                        class="absolute w-6 h-6 bg-slate-300 dark:bg-slate-800 bottom-0 -right-6 before:absolute before:w-full before:h-full before:bg-slate-200 before:dark:bg-slate-900 before:rounded-bl-full"></span>
                </div>
                <span
                    class="absolute w-6 h-6 bg-slate-200 dark:bg-slate-900 bottom-0 -left-6 before:absolute before:w-full before:h-full before:bg-slate-100 before:dark:bg-slate-950 before:rounded-br-full"></span>
                <span
                    class="absolute w-6 h-6 bg-slate-200 dark:bg-slate-900 bottom-0 -right-6 before:absolute before:w-full before:h-full before:bg-slate-100 before:dark:bg-slate-950 before:rounded-bl-full"></span>
            </div>
        </div>
        <div class="px-4 pb-4 bg-slate-200 dark:bg-slate-900 rounded-3xl">
            <!-- Ratings section -->
            <section ref="ratingsSection"
                class="px-10 py-8 grid grid-cols-2 gap-4 bg-slate-300 dark:bg-slate-800 rounded-3xl">
                <template v-if="ratingStore.getAllRatings" v-for="rating in ratingStore.getAllRatings" :key="rating.id">
                    <MyRatedShowComponent :rate="rating" />
                </template>
                <template v-else>
                    <RatedShowSkeleton v-for="i in 6" :key="i" />
                </template>
            </section>
        <!-- Favorites section -->
        <section ref="favsSection" class="hidden px-10 py-8 grid-cols-4 gap-2 bg-slate-300 dark:bg-slate-800 rounded-3xl">
            <template v-if="favStore.getFavs" v-for="fav in favStore.getFavs" :key="fav.id">
                <MyFavoriteShowComponent :fav="fav" />
            </template>
            <template v-else>
                <FavoriteShowSkeleton v-for="i in 8" :key="i" />
            </template>
        </section>
    </div>
</div></template>
