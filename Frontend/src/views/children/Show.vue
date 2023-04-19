<script setup>
import { Icon } from '@iconify/vue';
import { onMounted, ref } from 'vue';
import EpisodeComponent from '../../components/EpisodeComponent.vue';
import ToggleBtn from '../../components/utilities/ToggleBtn.vue';
import Trailer from '../../components/modals/Trailer.vue';

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
    btnBg.value.classList.remove("left-[220px]");
    btnBg.value.classList.add("left-5");
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
    btnBg.value.classList.add("left-[220px]");
    btnBg.value.classList.remove("left-5");
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

const episodes = [
    {
        "title": "Episode 1 - Ryomen Sukuna",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE.png",
        "link": "episode",
    },
    {
        "title": "Episode 2 - Someone with something that is something with something",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-1.png",
        "link": "episode",
    },
    {
        "title": "JJK S2",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-2.png",
        "link": "episode",
    },
    {
        "title": "Fate/Zero",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-3.png",
        "link": "episode",
    },
    {
        "title": "JJK S1",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-4.png",
        "link": "episode",
    },
    {
        "title": "Naruto",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-5.png",
        "link": "episode",
    },
    {
        "title": "One Piece",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-6.png",
        "link": "episode",
    },
    {
        "title": "OPM",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-7.png",
        "link": "episode",
    },
    {
        "title": "Kimetsu no Yaiba",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-8.png",
        "link": "episode",
    },
    {
        "title": "Kimetsu no Yaiba",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-9.png",
        "link": "episode",
    },
    {
        "title": "Kimetsu no Yaiba",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-10.png",
        "link": "episode",
    },
    {
        "title": "Kimetsu no Yaiba",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-11.png",
        "link": "episode",
    },
];

onMounted(async () => {

});
</script>

<template>
    <!-- Top section -->
    <section>
        <div class="relative hidden md:flex justify-center items-center">
            <div class="absolute w-full h-full overflow-hidden blur-md">
                <img class="w-full relative top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" src="../../assets/images/testing/jjk.png" alt="">
                <div class="absolute w-full h-full top-0 bg-black/20"></div>
            </div>
            <div class="relative px-10">
                <picture>
                    <img class="max-h-[500px]" src="../../assets/images/testing/jjk.png" alt="">
                </picture>
            </div>
        </div>
        <div class="relative flex md:hidden justify-center items-center">
            <div class="absolute w-full h-full overflow-hidden blur-md">
                <img class="w-full relative top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" src="../../assets/images/testing/117645l.jpg" alt="">
                <div class="absolute w-full h-full top-0 bg-black/20"></div>
            </div>
            <div class="relative px-10">
                <picture>
                    <img class="max-h-[600px]" src="../../assets/images/testing/117645l.jpg" alt="">
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
                    <h3 class="text-xl sm:text-2xl lg:text-3xl text-amber-500 font-medium sm:font-semibold">JUJUTSU KAISEN S1</h3>
                    <div class="w-48 h-1 bg-gradient-to-r from-transparent via-orange-500 dark:via-orange-400 to-transparent"></div>
                    <div class="grid grid-cols-2 gap-x-5 gap-y-2 max-sm:text-sm">
                        <h6>Average score:</h6>
                        <p>2.3/10 <span>(111 users)</span></p>
                        <h6>Type:</h6>
                        <p>1</p>
                        <h6>Episodes:</h6>
                        <p>13</p>
                    </div>
                    <div class="w-48 h-1 bg-gradient-to-r from-transparent via-orange-500 dark:via-orange-400 to-transparent"></div>
                    <div class="flex w-full">
                        <RouterLink class="inline-flex items-center gap-x-2" to="">
                            <Icon class="text-5xl" icon="ic:round-keyboard-double-arrow-left" />
                            <p class="text-lg font-semibold text-orange-500 dark:text-orange-400">Prequel</p>
                        </RouterLink>
                    </div>
                    <div class="flex justify-center items-center">
                        <RouterLink class="max-w-[200px] inline-flex flex-col justify-center items-center gap-y-5" to="">
                            <picture>
                                <img class="w-40" src="../../assets/images/testing/113810l.jpg" alt="">
                            </picture>
                            <p class="text-xl font-medium">JUJUTSU KAISEN 0</p>
                        </RouterLink>
                    </div>
                    <div class="w-48 h-1 bg-gradient-to-r from-transparent via-orange-500 dark:via-orange-400 to-transparent"></div>
                    <div class="flex justify-end w-full">
                        <RouterLink class="inline-flex items-center gap-x-2" to="">
                            <p class="text-lg font-semibold text-orange-500 dark:text-orange-400">Sequel</p>
                            <Icon class="text-5xl" icon="ic:round-keyboard-double-arrow-right" />
                        </RouterLink>
                    </div>
                    <div class="flex justify-center items-center">
                        <RouterLink class="max-w-[200px] inline-flex flex-col justify-center items-center gap-y-5" to="">
                            <picture>
                                <img class="w-40" src="../../assets/images/testing/113810l.jpg" alt="">
                            </picture>
                            <p class="text-xl font-medium">JUJUTSU KAISEN S2</p>
                        </RouterLink>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <div class="flex flex-col justify-start gap-y-12">
                <div class="">
                    <h3 class="mb-6 text-xl sm:text-2xl lg:text-3xl text-center font-medium sm:font-semibold">JUJUTSU KAISEN S1</h3>
                    <p>
                        Yuji Itadori is a boy with tremendous physical strength, though he lives a completely ordinary high school life. One day, to save a classmate who has been attacked by curses, he eats the finger of Ryomen Sukuna, taking the curse into his own soul. From then on, he shares one body with Ryomen Sukuna. Guided by the most powerful of sorcerers, Satoru Gojo, Itadori is admitted to Tokyo Jujutsu High School, an organization that fights the curses... and thus begins the heroic tale of a boy who became a curse to exorcise a curse, a life from which he could never turn back.
                    </p>
                </div>
                <div class="relative max-md:scale-75 max-md:-left-10">
                    <div class="relative inline-flex gap-x-2 px-5 py-1 bg-slate-200 dark:bg-slate-800 rounded-l-full rounded-r-full">
                        <button ref="episodeBtn" @click="showEpisodes" class="dark:text-slate-950 text-xl w-48 h-14 rounded-l-full rounded-r-full font-medium flex items-center justify-center gap-x-3 z-[1]">
                            <div ref="episodeIcon" class="-rotate-12 scale-125 transition-all duration-300">
                                <Icon class="text-3xl" icon="ic:round-live-tv" />
                            </div>
                            <span> Episodes</span>
                        </button>
                        <button ref="trailerBtn" @click="showTrailers" class="text-xl w-48 h-14 rounded-l-full rounded-r-full font-medium flex items-center justify-center gap-x-3 z-[1]">
                            <div ref="trailerIcon" class="transition-all duration-300">
                                <Icon class="text-3xl" icon="ic:round-pause-presentation" />
                            </div>
                            <span> Trailers</span>
                        </button>
                        <div ref="btnBg" class="absolute left-5 w-48 h-14 bg-orange-400 rounded-l-full rounded-r-full transition-all duration-300"></div>
                    </div>
                </div>
                <!-- Episodes tab -->
                <div ref="episodesContainer">
                    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-x-5 gap-y-8 justify-center items-start">
                        <div class="max-sm:w-[80vw] flex items-center justify-center" v-for="episode in episodes" :key="episode.title">
                            <EpisodeComponent :title="episode.title" :image="episode.image" :toEpisode="episode.link" customClass="w-full sm:w-60 mt-3" imageClass="w-full sm:w-60" />
                        </div>
                    </div>
                </div>
                <!-- Trailers tab -->
                <div ref="trailersContainer" class="hidden gap-10">         
                    <Trailer watchID="78WIYzX_m98" />
                    <Trailer watchID="PjPUAf4wJGI" />
                    <Trailer watchID="-1wcilQ58hI" />
                </div>
            </div>
        </div>
    </section>
</template>
