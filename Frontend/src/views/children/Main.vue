<script setup>
import ScrollDown from '../../components/utilities/ScrollDown.vue';
import ShowCard from '../../components/ShowCard.vue';
import ShowsSlider from '../../components/ShowsSlider.vue';
import H2 from '../../components/utilities/H2.vue';
import ShowsSliderSkeleton from '../../components/skeleton/ShowsSliderSkeleton.vue';
import { Icon } from '@iconify/vue';
import { initFlowbite } from 'flowbite';
import { onMounted } from 'vue';
import { useShowStore } from '../../stores/show';
import { useAuthStore } from '../../stores/auth';
import { useRecommendationStore } from '../../stores/recommendation';
import ShowCardSkeleton from '../../components/skeleton/ShowCardSkeleton.vue';

const showStore = useShowStore();
const authStore = useAuthStore();
const recStore = useRecommendationStore();

const animeShowCardContents = [
    {
    "title": "Kimetsu No Yaiba",
    "desc": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quam maxime harum cumque iure omnis corrupti, eaque voluptates voluptas architecto eum eveniet explicabo voluptatibus autem debitis temporibus quibusdam, expedita facilis.",
    "logo": "https://cdn.discordapp.com/attachments/1093229006402375680/1093510933873164351/Demon_Slayer_Logo.png",
    "character": "https://cdn.discordapp.com/attachments/1093229006402375680/1093510934254862336/Kyojuro_Rengoku.png",
    "color": "red",
    },
    {
    "title": "Shingeki No Kyojin",
    "desc": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quam maxime harum cumque iure omnis corrupti, eaque voluptates voluptas architecto eum eveniet explicabo voluptatibus autem debitis temporibus quibusdam, expedita facilis.",
    "logo": "https://cdn.discordapp.com/attachments/1093229006402375680/1093511735132041288/Shingeki_no_Kyojin_anime_Logo.png",
    "character": "https://cdn.discordapp.com/attachments/1093229006402375680/1093511734687436810/Eren-Jaeger-PNG-Image.png",
    "color": "blue",
    },
];
const liveShowCardContents = [
    {
    "title": "Game Of Thrones",
    "desc": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quam maxime harum cumque iure omnis corrupti, eaque voluptates voluptas architecto eum eveniet explicabo voluptatibus autem debitis temporibus quibusdam, expedita facilis.",
    "logo": "https://cdn.discordapp.com/attachments/1093229006402375680/1093558008153395210/game_of_thrones.png",
    "character": "https://cdn.discordapp.com/attachments/1093229006402375680/1093558008413438082/character.png",
    "color": "yellow",
    },
    {
    "title": "Avengers",
    "desc": "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quam maxime harum cumque iure omnis corrupti, eaque voluptates voluptas architecto eum eveniet explicabo voluptatibus autem debitis temporibus quibusdam, expedita facilis.",
    "logo": "https://cdn.discordapp.com/attachments/1093229006402375680/1093558067439874068/logo.png",
    "character": "https://cdn.discordapp.com/attachments/1093229006402375680/1093558067184025620/char1.png",
    "color": "gray",
    },
];

document.title = "Home - ShowTime";

onMounted(async () => {
    initFlowbite();
    await showStore.latestShows();
    await recStore.fetchRecommendations();
});
</script>

<template>
    <!-- Top section -->
    <section>
        <div class="relative h-home-tablet lg:h-home-desktop min-h-[600px]">
            <video class="w-full h-full object-cover" autoplay loop muted poster="../../assets/images/other/covers.jpg">
                <source src="../../assets/videos/index.mp4" type="video/mp4">
            </video>
            <div class="absolute top-0 left-0 w-full h-full opacity-90 bg-gradient-to-l from-black from-0% via-black via-100% md:via-60% to-transparent to-100%"></div>
            <div class="p-10 absolute top-0 right-0 w-full md:w-3/5 h-full flex flex-col items-center justify-evenly text-3xl lg:text-4xl 2xl:text-5xl text-center text-slate-100 font-medium">
                <p v-if="!authStore.getUser">Welcome to</p>
                <p v-else>Welcome back {{ authStore.getUser.name }} to</p>
                <!-- <h1 class="bg-gradient-to-l from-red-500 to-orange-500 bg-clip-text text-transparent font-logo text-7xl lg:text-8xl 2xl:text-9xl">ShowTime</h1> -->
                <h1 class="bg-orange-500 bg-clip-text text-transparent text-shadow-slate-950-10 lg:text-shadow-slate-950-15 2xl:text-shadow-slate-950-20 text-stroke-orange-500-1 2xl:text-stroke-orange-500-2 font-logo text-6xl sm:text-7xl lg:text-8xl 2xl:text-9xl">ShowTime</h1>
                <p v-if="!authStore.getUser">Join today and discover our library of Series, Movies and Anime.</p>
                <p v-else>Explore and discover our library of Series, Movies and Anime.</p>
                <RouterLink v-if="!authStore.getUser" to="/register" class="relative flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-slate-100 rounded-l-full rounded-r-full group bg-gradient-to-br from-red-500 to-orange-400 group-hover:from-red-500 group-hover:to-orange-400 hover:text-slate-950 focus:ring-4 focus:outline-none focus:ring-red-800">
                    <span class="relative px-4 py-2 lg:px-5 lg:py-2.5 transition-all ease-in duration-75 bg-slate-950 rounded-l-full rounded-r-full group-hover:bg-opacity-0 text-xl">
                        <Icon class="inline-block text-3xl md:text-4xl" icon="line-md:play" /> Join Today
                    </span>
                </RouterLink>
            </div>
            <ScrollDown class="bottom-12 left-1/2 -translate-x-1/2" />
        </div>
    </section>
    <!-- Resposive design showcase -->
    <section class="container mx-auto mt-40">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-10">
            <div class="relative">
                <video class="absolute top-0.5 left-px w-[94%] h-[85%] md:h-[86%] lg:h-[84%] xl:h-[85%] object-cover" autoplay loop muted poster="../../assets/images/other/covers.jpg">
                    <source src="../../assets/videos/index.mp4" type="video/mp4">
                </video>
                <img class="relative" src="../../assets/images/other/TV.png" alt="TV">
            </div>
            <div class="order-first md:order-none">
                <p class="h-full text-2xl lg:text-4xl 2xl:text-5xl text-center px-24 flex justify-center items-center">
                    Watch our shows on your favorite device, whether you’re on TV, Desktop 
                </p>
            </div>
            <div>
                <p class="h-full text-2xl lg:text-4xl 2xl:text-5xl text-center px-24 flex justify-center items-center">
                    On your Tablet or your Phone! 
                </p>
            </div>
            <div class="relative">
                <video class="absolute top-14 left-1/2 -translate-x-1/2 aspect-video w-64 object-cover" autoplay loop muted poster="../../assets/images/other/covers.jpg">
                    <source src="../../assets/videos/index.mp4" type="video/mp4">
                </video>
                <img class="relative left-1/2 -translate-x-1/2" src="../../assets/images/other/Phone.png" alt="TV">
            </div>
        </div>
    </section>
    <!-- Anime showcase -->
    <section class="container mx-auto mt-40">
        <H2 title="Our Anime Recommendation" />
        <div v-if="!recStore.recIsLoading" class="flex max-md:flex-col max-md:gap-y-32 items-center justify-around my-52">
            <ShowCard v-for="showCardContent in recStore.getAnime" :key="showCardContent.id" :showCardContent="showCardContent" class="max-lg:scale-90" />
        </div>
        <div v-else class="flex max-md:flex-col max-md:gap-y-32 items-center justify-around my-52">
            <ShowCardSkeleton v-for="i in 2" :key="i" />
        </div>
    </section>
    <section>
        <H2 title="Our Latest Anime" />
        <div class="my-40">
            <ShowsSlider v-if="!showStore.latestLoading" :shows="showStore.getLatestAnime" />
            <ShowsSliderSkeleton v-else />
        </div>
    </section>
    <section>
        <div class="h-[600px] bg-[url('../../assets/images/other/Animes-low.png')] bg-no-repeat bg-cover bg-fixed bg-center"></div>
    </section>
    <!-- Live action showcase -->
    <section class="container mx-auto mt-40">
        <H2 title="Our Shows Recommendation" />
        <div v-if="!recStore.recIsLoading" class="flex max-md:flex-col max-md:gap-y-32 items-center justify-around my-52">
            <ShowCard v-for="showCardContent in recStore.getLiveAction" :key="showCardContent.id" :showCardContent="showCardContent" class="max-lg:scale-90" />
        </div>
        <div v-else class="flex max-md:flex-col max-md:gap-y-32 items-center justify-around my-52">
            <ShowCardSkeleton v-for="i in 2" :key="i" />
        </div>
    </section>
    <section>
        <H2 title="Our Latest Shows" />
        <div class="my-40">
            <ShowsSlider v-if="!showStore.latestLoading" :shows="showStore.getLatestLiveAction" />
            <ShowsSliderSkeleton v-else />
        </div>
    </section>
    <section>
        <div class="h-[600px] bg-[url('../../assets/images/other/Shows-low.png')] bg-no-repeat bg-cover bg-fixed bg-center"></div>
    </section>
    <!-- Q & A -->
    <section class="container mx-auto mt-40">
        <H2 title="Frequently Asked Questions" />
        <div class=" sm:w-3/4 md:w-2/3 lg:w-1/2 my-40 mx-3 sm:mx-auto rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700">
            <div id="accordion-color" data-accordion="collapse" data-inactive-classes="bg-slate-300 dark:bg-slate-800" data-active-classes="bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-200">
                <h4 class="text-xl" id="accordion-color-heading-1">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-slate-500 border border-b-0 border-slate-200 dark:border-slate-700 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-600" data-accordion-target="#accordion-color-body-1" aria-expanded="true" aria-controls="accordion-color-body-1">
                    <span>What is ShowTime?</span>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </h4>
                <div id="accordion-color-body-1" class="hidden transition-all" aria-labelledby="accordion-color-heading-1">
                    <div class="p-5 border border-b-0 border-slate-200 dark:border-slate-700 dark:bg-slate-900 transition-all">
                        <p class="text-slate-500 dark:text-slate-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione aliquam voluptates alias iure odio necessitatibus quis quisquam, consequuntur enim. Culpa debitis necessitatibus suscipit voluptatem, ipsam eaque impedit totam deserunt voluptate!</p>
                    </div>
                </div>
                <h4 class="text-xl" id="accordion-color-heading-2">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-slate-500 border border-b-0 border-slate-200 dark:border-slate-700 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-600" data-accordion-target="#accordion-color-body-2" aria-expanded="false" aria-controls="accordion-color-body-2">
                        <span>How can I watch a show?</span>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </h4>
                <div id="accordion-color-body-2" class="hidden transition-all" aria-labelledby="accordion-color-heading-2">
                    <div class="p-5 border border-b-0 border-slate-200 dark:border-slate-700 dark:bg-slate-900 transition-all">
                        <p class="text-slate-500 dark:text-slate-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat corporis nam, quam dicta ipsa eos minus veritatis, quae tenetur laudantium mollitia id distinctio sequi beatae ducimus tempora illum ipsam odio.</p>
                    </div>
                </div>
                <h4 class="text-xl" id="accordion-color-heading-3">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-slate-500 border border-slate-200 dark:border-slate-700 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-600" data-accordion-target="#accordion-color-body-3" aria-expanded="false" aria-controls="accordion-color-body-3">
                        <span>Can I watch all the shows?</span>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </h4>
                <div id="accordion-color-body-3" class="hidden transition-all" aria-labelledby="accordion-color-heading-3">
                    <div class="p-5 border border-b-0 border-slate-200 dark:border-slate-700 dark:bg-slate-900 transition-all">
                        <p class="text-slate-500 dark:text-slate-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat corporis nam, quam dicta ipsa eos minus veritatis, quae tenetur laudantium mollitia id distinctio sequi beatae ducimus tempora illum ipsam odio.</p>
                    </div>
                </div>
                <h4 class="text-xl" id="accordion-color-heading-4">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-slate-500 border border-slate-200 dark:border-slate-700 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-600" data-accordion-target="#accordion-color-body-4" aria-expanded="false" aria-controls="accordion-color-body-4">
                        <span>How can I become a premium user?</span>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </h4>
                <div id="accordion-color-body-4" class="hidden transition-all" aria-labelledby="accordion-color-heading-3">
                    <div class="p-5 border border-b-0 border-slate-200 dark:border-slate-700 dark:bg-slate-900 transition-all">
                        <p class="text-slate-500 dark:text-slate-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat corporis nam, quam dicta ipsa eos minus veritatis, quae tenetur laudantium mollitia id distinctio sequi beatae ducimus tempora illum ipsam odio.</p>
                    </div>
                </div>
                <h4 class="text-xl" id="accordion-color-heading-5">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-slate-500 border border-slate-200 dark:border-slate-700 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-600" data-accordion-target="#accordion-color-body-5" aria-expanded="false" aria-controls="accordion-color-body-5">
                        <span>What is the character in the bottom right?</span>
                        <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </h4>
                <div id="accordion-color-body-5" class="hidden transition-all" aria-labelledby="accordion-color-heading-3">
                    <div class="p-5 border border-b-0 border-slate-200 dark:border-slate-700 dark:bg-slate-900 transition-all">
                        <p class="text-slate-500 dark:text-slate-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat corporis nam, quam dicta ipsa eos minus veritatis, quae tenetur laudantium mollitia id distinctio sequi beatae ducimus tempora illum ipsam odio.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
