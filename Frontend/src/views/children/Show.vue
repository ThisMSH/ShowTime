<script setup>
import { Icon } from '@iconify/vue';
import { onMounted, ref, watch } from 'vue';
import EpisodeComponent from '../../components/EpisodeComponent.vue';
import ToggleBtn from '../../components/utilities/ToggleBtn.vue';
import Trailer from '../../components/modals/Trailer.vue';
import { useShowStore } from '../../stores/show';

const showStore = useShowStore();

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

onMounted(async () => {
    await showStore.fetchShow(props.id);
});

watch(() => props.id, async (showID) => {
    await showStore.fetchShow(showID);
});
</script>

<template>
    <template v-if="showStore.showLoading || !showStore.getSingleShow">
        <div class="h-home-tablet lg:h-home-desktop min-h-[100px] flex justify-center items-center">
            <div role="status">
                <svg aria-hidden="true" class="inline w-10 h-10 mr-2 text-slate-200 animate-spin dark:text-slate-600 fill-orange-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </template>
    <template v-else>
        <!-- Top section -->
        <section>
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
            <div class="my-20 mx-auto container px-3 sm:px-5 grid grid-cols-[repeat(2,_minmax(0,_auto))] lg:gap-10 xl:gap-20">
                <!-- Side information -->
                <div ref="toggleSideShowInfoBtn"  @click="toggleSideShowInfo" class="fixed top-24 -left-9 z-[31] transition-all duration-300 lg:hidden">
                    <ToggleBtn ref="toggleBtn" />
                </div>
                <div ref="sideShowInfo" id="side-show-info" class="lg:block max-lg:fixed max-lg:top-0 max-lg:-left-[400px] max-lg:z-30 max-lg:overflow-y-auto max-lg:h-full max-lg:transition-all max-lg:duration-300">
                    <div class="relative w-96 px-2 py-12 flex flex-col items-center gap-y-5 bg-slate-300 dark:bg-slate-700 rounded-2xl max-lg:rounded-none  max-lg:pt-28">
                        <h3 class="text-xl sm:text-2xl lg:text-3xl text-center text-amber-500 font-medium sm:font-semibold">{{ showStore.getSingleShow.show.attributes.title }} - {{ showStore.getSingleShow.show.attributes.season }}</h3>
                        <div class="w-48 h-1 bg-gradient-to-r from-transparent via-orange-500 dark:via-orange-400 to-transparent"></div>
                        <div class="grid grid-cols-2 gap-x-5 gap-y-2 max-sm:text-sm">
                            <h6>Average score:</h6>
                            <p>8.8/10 <span>(3 users)</span></p>
                            <h6>Category:</h6>
                            <p>{{ showStore.getSingleShow.show.relationships.category.name }}</p>
                            <h6>Episodes:</h6>
                            <p>{{ showStore.getSingleShow.show.relationships.episodes.count }}</p>
                        </div>
                        <div class="w-48 h-1 bg-gradient-to-r from-transparent via-orange-500 dark:via-orange-400 to-transparent"></div>
                        <div class="relative z-0 my-2">
                            <label for="underline_select" class="absolute text-slate-600 dark:text-slate-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">My Rating</label>
                            <select id="underline_select" class="block py-2.5 px-2 w-full max-md:text-sm bg-transparent border-0 border-b-2 border-slate-600 appearance-none child:bg-slate-100 child:dark:bg-slate-950 dark:border-slate-400 dark:focus:border-slate-400 focus:outline-none focus:ring-0 focus:border-slate-600 peer">
                                <option disabled selected>Select</option>
                                <option value="10">10 - Masterpiece</option>
                                <option value="9">9 - Great</option>
                                <option value="8">8 - Very good</option>
                                <option value="7">7 - Good</option>
                                <option value="6">6 - Fine</option>
                                <option value="5">5 - Average</option>
                                <option value="4">4 - Bad</option>
                                <option value="3">3 - Very bad</option>
                                <option value="2">2 - Horrible</option>
                                <option value="1">1 - Appalling</option>
                            </select>
                        </div>
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
                                    <p class="text-xl font-medium">{{ showStore.getSingleShow.show.relationships.prequel.title }} - {{ showStore.getSingleShow.show.relationships.prequel.season }}</p>
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
                                    <p class="text-xl font-medium">{{ showStore.getSingleShow.show.relationships.sequel.title }} - {{ showStore.getSingleShow.show.relationships.sequel.season }}</p>
                                </RouterLink>
                            </div>
                        </template>
                    </div>
                </div>
                <!-- Main content -->
                <div class="flex flex-col justify-start gap-y-12">
                    <div class="">
                        <h3 class="mb-6 text-xl sm:text-2xl lg:text-3xl text-center font-medium sm:font-semibold">{{ showStore.getSingleShow.show.attributes.title }} - {{ showStore.getSingleShow.show.attributes.season }}</h3>
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
                        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-x-5 gap-y-8 justify-center items-start">
                            <div class="max-sm:w-[80vw] flex items-center justify-center" v-for="episode in showStore.getSingleShow.episodes" :key="episode.id">
                                <EpisodeComponent :number="episode.attributes.number" :title="episode.attributes.title" :image="episode.attributes.thumbnail" :toEpisode="episode.id" customClass="w-full sm:w-60 mt-3" imageClass="w-full sm:w-60" />
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
