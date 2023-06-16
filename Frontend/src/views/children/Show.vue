<script setup>
import { Icon } from '@iconify/vue';
import { onMounted, ref, watch } from 'vue';
import EpisodeComponent from '../../components/EpisodeComponent.vue';
import ToggleBtn from '../../components/utilities/ToggleBtn.vue';
import Trailer from '../../components/modals/Trailer.vue';
import PageLoading from '../../components/skeleton/PageLoading.vue';
import RatingComponent from '../../components/RatingComponent.vue';
import { useShowStore } from '../../stores/show';
import { useAuthStore } from '../../stores/auth';

const showStore = useShowStore();
const authStore = useAuthStore();

const props = defineProps(["id"]);

const episodeBtn = ref(null);
const trailerBtn = ref(null);
const btnBg = ref(null);
const episodesContainer = ref(null);
const trailersContainer = ref(null);
const episodeIcon = ref(null);
const trailerIcon = ref(null);
const toggleBtn = ref(null);
const sideShowInfo = ref(null);
const toggleSideShowInfoBtn = ref(null);

const showEpisodes = function () {
    btnBg.value.classList.remove("sm:left-[252px]");
    btnBg.value.classList.add("sm:left-5");
    btnBg.value.classList.remove("left-[236px]");
    btnBg.value.classList.add("left-1");
    episodeIcon.value.classList.add("-rotate-12", "scale-125");
    trailerIcon.value.classList.remove("-rotate-12", "scale-125");
    episodesContainer.value.classList.add("block");
    episodesContainer.value.classList.remove("hidden");
    trailersContainer.value.classList.remove("flex");
    trailersContainer.value.classList.add("hidden");
    episodeBtn.value.classList.add("dark:text-slate-950");
    trailerBtn.value.classList.remove("dark:text-slate-950");
};
const showTrailers = function () {
    btnBg.value.classList.add("sm:left-[252px]");
    btnBg.value.classList.remove("sm:left-5");
    btnBg.value.classList.add("left-[236px]");
    btnBg.value.classList.remove("left-1");
    episodeIcon.value.classList.remove("-rotate-12", "scale-125");
    trailerIcon.value.classList.add("-rotate-12", "scale-125");
    episodesContainer.value.classList.remove("block");
    episodesContainer.value.classList.add("hidden");
    trailersContainer.value.classList.add("flex");
    trailersContainer.value.classList.remove("hidden");
    episodeBtn.value.classList.remove("dark:text-slate-950");
    trailerBtn.value.classList.add("dark:text-slate-950");
};
const toggleSideShowInfo = function () {
    const switchingArrows = toggleBtn.value.$el.querySelector("#icon-arrow");
    switchingArrows.classList.toggle("rotate-z-180");
    sideShowInfo.value.classList.toggle("max-lg:left-0");
    sideShowInfo.value.classList.toggle("max-lg:-left-[400px]");
    toggleSideShowInfoBtn.value.classList.toggle("-left-9");
    toggleSideShowInfoBtn.value.classList.toggle("left-2");
    toggleSideShowInfoBtn.value.classList.toggle("top-24");
    toggleSideShowInfoBtn.value.classList.toggle("top-2");
};
const avgRatingRounded = ref("N/A");
const avgRating = ref(null);

onMounted(async () => {
    await showStore.fetchShow(props.id);

    avgRating.value = +showStore.getSingleShow.show.relationships.ratings.average;
    avgRatingRounded.value = avgRating.value > 0 ? avgRating.value.toFixed(2) : "N/A";

    document.title = `
    ${showStore.getSingleShow?.show.attributes.title}${showStore.getSingleShow?.show.attributes.season ?
        ' - ' + showStore.getSingleShow.show.attributes.season :
        ''} - ShowTime`;
});

watch(() => props.id, async (showID) => {
    await showStore.fetchShow(showID);

    avgRating.value = parseInt(showStore.getSingleShow.show.relationships.ratings.average);
    avgRatingRounded.value = avgRating.value > 0 ? avgRating.value.toFixed(2) : "N/A";

    document.title = `
    ${showStore.getSingleShow.show.attributes.title}${showStore.getSingleShow.show.attributes.season ?
        ' - ' + showStore.getSingleShow.show.attributes.season :
        ''} - ShowTime`;
});
</script>

<template>
    <PageLoading v-if="showStore.showLoading || !showStore.getSingleShow" />
    <template v-else>
        <!-- Top section -->
        <section class="overflow-y-hidden">
            <div class="relative hidden md:flex justify-center items-center">
                <div class="absolute w-full h-full overflow-hidden blur-md">
                    <img class="w-full relative top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" :src="showStore.getSingleShow.show.attributes.wide_cover" :alt="`${showStore.getSingleShow.show.attributes.title} wide cover`">
                    <div class="absolute w-full h-full top-0 bg-black/20"></div>
                </div>
                <div class="relative px-10">
                    <picture>
                        <img class="max-h-[500px]" :src="showStore.getSingleShow.show.attributes.wide_cover" :alt="`${showStore.getSingleShow.show.attributes.title} wide cover`">
                    </picture>
                </div>
            </div>
            <div class="relative flex md:hidden justify-center items-center">
                <div class="absolute w-full h-full overflow-hidden blur-md">
                    <img class="w-full relative top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" :src="showStore.getSingleShow.show.attributes.cover" :alt="`${showStore.getSingleShow.show.attributes.title} cover`">
                    <div class="absolute w-full h-full top-0 bg-black/20"></div>
                </div>
                <div class="relative px-10">
                    <picture>
                        <img class="max-h-[600px]" :src="showStore.getSingleShow.show.attributes.cover" :alt="`${showStore.getSingleShow.show.attributes.title} cover`">
                    </picture>
                </div>
            </div>
        </section>
        <!-- Episodes section -->
        <section>
            <div class="my-20 mx-auto container px-3 sm:px-5 grid grid-cols-1 lg:grid-cols-[auto,_1fr] lg:gap-10 xl:gap-20">
                <!-- Side information -->
                <div ref="toggleSideShowInfoBtn" @click="toggleSideShowInfo" class="fixed top-24 -left-9 z-[31] transition-all duration-300 lg:hidden">
                    <ToggleBtn ref="toggleBtn" />
                </div>
                <div ref="sideShowInfo" id="side-show-info" class="lg:block max-lg:fixed max-lg:top-0 max-lg:-left-[400px] max-lg:z-30 max-lg:overflow-y-auto max-lg:h-full max-lg:transition-all max-lg:duration-300">
                    <div class="relative w-96 px-2 py-12 flex flex-col items-center gap-y-5 bg-slate-300 dark:bg-slate-700 rounded-2xl max-lg:rounded-none max-lg:rounded-r-lg  max-lg:pt-28">
                        <h3 class="text-xl sm:text-2xl lg:text-3xl text-center text-amber-500 font-medium sm:font-semibold">{{ showStore.getSingleShow.show.attributes.title }}{{ showStore.getSingleShow.show.attributes.season ? ' - ' + showStore.getSingleShow.show.attributes.season : '' }}</h3>
                        <div class="w-48 h-1 bg-gradient-to-r from-transparent via-orange-500 dark:via-orange-400 to-transparent"></div>
                        <div class="grid grid-cols-2 gap-x-5 gap-y-2 max-sm:text-sm">
                            <h6>Average score:</h6>
                            <p>{{ avgRatingRounded }} / 10 <span>({{ showStore.getSingleShow.show.relationships.ratings.count == 1 || 0 ? showStore.getSingleShow.show.relationships.ratings.count + " user" : showStore.getSingleShow.show.relationships.ratings.count + " users" }})</span></p>
                            <h6>Category:</h6>
                            <p>{{ showStore.getSingleShow.show.relationships.category.name }}</p>
                            <h6>Episodes:</h6>
                            <p>{{ showStore.getSingleShow.show.relationships.episodes.count }}</p>
                        </div>
                        <template v-if="authStore.getUser">
                            <div class="w-48 h-1 bg-gradient-to-r from-transparent via-orange-500 dark:via-orange-400 to-transparent"></div>
                            <RatingComponent :showID="showStore.getSingleShow.show.id" />
                        </template>
                        <template v-if="showStore.getSingleShow.show.relationships.prequel">
                            <div class="w-48 h-1 bg-gradient-to-r from-transparent via-orange-500 dark:via-orange-400 to-transparent"></div>
                            <div class="flex w-full">
                                <RouterLink class="inline-flex items-center gap-x-2" :to="showStore.getSingleShow.show.relationships.prequel.id">
                                    <Icon class="text-5xl" icon="ic:round-keyboard-double-arrow-left" />
                                    <p class="text-lg font-semibold text-orange-500 dark:text-orange-400">Prequel</p>
                                </RouterLink>
                            </div>
                            <div class="flex justify-center items-center">
                                <RouterLink class="max-w-[200px] inline-flex flex-col justify-center items-center gap-y-5" :to="showStore.getSingleShow.show.relationships.prequel.id">
                                    <picture>
                                        <img class="w-40" :src="showStore.getSingleShow.show.relationships.prequel.cover" :alt="`${showStore.getSingleShow.show.relationships.prequel.title} cover`">
                                    </picture>
                                    <p class="text-xl font-medium">{{ showStore.getSingleShow.show.relationships.prequel.title }}{{ showStore.getSingleShow.show.relationships.prequel.season ? ' - ' + showStore.getSingleShow.show.relationships.prequel.season : '' }}</p>
                                </RouterLink>
                            </div>
                        </template>
                        <template v-if="showStore.getSingleShow.show.relationships.sequel">
                            <div class="w-48 h-1 bg-gradient-to-r from-transparent via-orange-500 dark:via-orange-400 to-transparent"></div>
                            <div class="flex justify-end w-full">
                                <RouterLink class="inline-flex items-center gap-x-2" :to="showStore.getSingleShow.show.relationships.sequel.id">
                                    <p class="text-lg font-semibold text-orange-500 dark:text-orange-400">Sequel</p>
                                    <Icon class="text-5xl" icon="ic:round-keyboard-double-arrow-right" />
                                </RouterLink>
                            </div>
                            <div class="flex justify-center items-center">
                                <RouterLink class="max-w-[200px] inline-flex flex-col justify-center items-center gap-y-5" :to="showStore.getSingleShow.show.relationships.sequel.id">
                                    <picture>
                                        <img class="w-40" :src="showStore.getSingleShow.show.relationships.sequel.cover" :alt="`${showStore.getSingleShow.show.relationships.sequel.title} cover`">
                                    </picture>
                                    <p class="text-xl font-medium">{{ showStore.getSingleShow.show.relationships.sequel.title }}{{ showStore.getSingleShow.show.relationships.sequel.season ? ' - ' + showStore.getSingleShow.show.relationships.sequel.season : '' }}</p>
                                </RouterLink>
                            </div>
                        </template>
                    </div>
                </div>
                <!-- Main content -->
                <div class="flex flex-col justify-start gap-y-12">
                    <div class="">
                        <h3 class="mb-6 text-xl sm:text-2xl lg:text-3xl text-center font-medium sm:font-semibold">{{ showStore.getSingleShow.show.attributes.title }}{{ showStore.getSingleShow.show.attributes.season ? ' - ' + showStore.getSingleShow.show.attributes.season : '' }}</h3>
                        <p>{{ showStore.getSingleShow.show.attributes.description }}</p>
                    </div>
                    <div class="relative max-sm:-left-12 max-sm:scale-[0.7] max-md:scale-75 max-md:-left-10">
                        <div class="relative inline-flex gap-x-2 px-1 py-0.5 sm:px-5 sm:py-1 bg-slate-200 dark:bg-slate-800 rounded-l-full rounded-r-full">
                            <button ref="episodeBtn" @click="showEpisodes" class="dark:text-slate-950 text-xl w-56 h-14 rounded-l-full rounded-r-full font-medium flex items-center justify-center gap-x-3 z-[1]">
                                <div ref="episodeIcon" class="-rotate-12 scale-125 transition-all duration-300">
                                    <Icon class="text-3xl" icon="ic:round-live-tv" />
                                </div>
                                <span> Episodes</span>
                            </button>
                            <button ref="trailerBtn" @click="showTrailers" class="text-xl w-56 h-14 rounded-l-full rounded-r-full font-medium flex items-center justify-center gap-x-3 z-[1]">
                                <div ref="trailerIcon" class="transition-all duration-300">
                                    <Icon class="text-3xl" icon="ic:round-pause-presentation" />
                                </div>
                                <span> Promotionals</span>
                            </button>
                            <div ref="btnBg" class="absolute left-1 sm:left-5 w-56 h-14 bg-orange-400 rounded-l-full rounded-r-full transition-all duration-300"></div>
                        </div>
                    </div>
                    <!-- Episodes tab -->
                    <div ref="episodesContainer">
                        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 sm:gap-x-5 gap-y-8 justify-center items-start">
                            <div class="max-sm:w-[80vw] flex items-center justify-center" v-for="episode in showStore.getSingleShow.episodes" :key="episode.id">
                                <EpisodeComponent :number="episode.attributes.number" :title="episode.attributes.title" :image="episode.attributes.thumbnail" :toEpisode="episode.id" customClass="w-full sm:w-60 mt-3" imageClass="w-full sm:w-60" :epiType="episode.attributes.premium" />
                            </div>
                        </div>
                    </div>
                    <!-- Trailers tab -->
                    <div ref="trailersContainer" class="hidden gap-10 flex-wrap">
                        <div v-if="showStore.getSingleShow.trailers" v-for="trailer in showStore.getSingleShow.trailers" :key="trailer.id">
                            <Trailer :title="trailer.attributes.title" :watchID="trailer.attributes.trailer" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </template>
</template>
