<script setup>
import { Icon } from '@iconify/vue';
import ScrollDown from '../../components/ScrollDown.vue';
import ShowCard from '../../components/ShowCard.vue';
import ShowsSlider from '../../components/ShowsSlider.vue';

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
    "color": "slate",
    },
];

const animeShows = [
    {
        "title": "Fate/stay night",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517657556398090/113810l.jpg",
        "show_type": "Series",
        "rating": "9.3/10"
    },
    {
        "title": "JJK Movie",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517657350864916/119044l.jpg",
        "show_type": "Movie",
        "rating": "9.3/10"
    },
    {
        "title": "JJK S2",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517657111806025/FLY4LfmacAExJK1.jpg",
        "show_type": "Series",
        "rating": "9.3/10"
    },
    {
        "title": "Fate/Zero",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517657795477534/117645l.jpg",
        "show_type": "Series",
        "rating": "9.3/10"
    },
    {
        "title": "JJK S1",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517658017759242/109222l.jpg",
        "show_type": "Series",
        "rating": "9.3/10"
    },
    {
        "title": "Naruto",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517658256850985/111305l.jpg",
        "show_type": "Series",
        "rating": "1.3/10"
    },
    {
        "title": "One Piece",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517658445578260/120243l.jpg",
        "show_type": "Series",
        "rating": "3.3/10"
    },
    {
        "title": "OPM",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517658684670023/72533l.jpg",
        "show_type": "Series",
        "rating": "7.3/10"
    },
    {
        "title": "Kimetsu no Yaiba",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093517658860814406/120036l.jpg",
        "show_type": "Series",
        "rating": "10/10"
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
    "color": "slate",
    },
];

const liveShows = [
    {
        "title": "Show one",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093569563112779927/a2096c83decf5b1d32c414de10f5df11.jpg",
        "show_type": "Series",
        "rating": "9.3/10"
    },
    {
        "title": "Show two",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093569563330875543/7516fd69b3eb14b8587a2911fd505e8f.jpg",
        "show_type": "Movie",
        "rating": "9.3/10"
    },
    {
        "title": "Show aaa",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093569563548983356/7548d760c35b06029e4c9778065baa2a.jpg",
        "show_type": "Series",
        "rating": "9.3/10"
    },
    {
        "title": "Show zzz",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093569563775479818/8669af1522d2a280e79555f0e2d18b83.jpg",
        "show_type": "Movie",
        "rating": "9.3/10"
    },
    {
        "title": "Show bbb",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093569564001964095/f4b55c684e533915648dc01986ea8f04.jpg",
        "show_type": "Series",
        "rating": "9.3/10"
    },
    {
        "title": "Show fff",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093569564203294851/f5c4d33040b5c0636a473a9fbe27749e.jpg",
        "show_type": "Movie",
        "rating": "1.3/10"
    },
    {
        "title": "Show 123",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093569564421402644/fa04a811f674e363cecd6f17d79c56be.jpg",
        "show_type": "Series",
        "rating": "3.3/10"
    },
    {
        "title": "Show final",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093569564769521774/43702135cdbad67e6efcde27547f7040.jpg",
        "show_type": "Series",
        "rating": "7.3/10"
    },
    {
        "title": "Show yes",
        "cover": "https://cdn.discordapp.com/attachments/1093229006402375680/1093569564983435377/a8bdfe222ec670a9244f30c301c33e52.jpg",
        "show_type": "Movie",
        "rating": "10/10"
    },
];

</script>

<template>
    <!-- Top section -->
    <section>
        <div class="relative h-home-tablet lg:h-home-desktop">
            <video class="w-full h-full object-cover" autoplay loop muted poster="../../assets/images/other/covers.jpg">
                <source src="../../assets/videos/index.mp4" type="video/mp4">
            </video>
            <div class="absolute top-0 left-0 w-full h-full opacity-80 bg-gradient-to-l from-black from-0% via-black via-100% md:via-60% lg:via-40% to-transparent to-100%"></div>
            <div class="p-10 absolute top-0 right-0 w-full md:w-3/5 lg:w-2/5 h-full flex flex-col items-center justify-evenly text-3xl lg:text-4xl 2xl:text-5xl text-center text-slate-100 font-medium">
                <p>Welcome to</p>
                <h1 class="bg-gradient-to-l from-red-500 to-orange-500 bg-clip-text text-transparent font-bold font-lobster text-6xl lg:text-7xl 2xl:text-8xl">ShowTime</h1>
                <p>Join today and discover our library of Series, Movies and Anime.</p>
                <RouterLink to="" class="relative flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-slate-100 rounded-l-full rounded-r-full group bg-gradient-to-br from-red-500 to-orange-400 group-hover:from-red-500 group-hover:to-orange-400 hover:text-slate-950 focus:ring-4 focus:outline-none focus:ring-red-800">
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
        <h2 class="relative  text-3xl text-center font-semibold before:absolute before:w-48 before:h-1 before:-bottom-2 before:left-1/2 before:-translate-x-1/2 before:bg-slate-950 before:dark:bg-slate-100">Our Anime Recommendation</h2>
        <div class="flex max-md:flex-col max-md:gap-y-32 items-center justify-around my-52">
            <ShowCard v-for="showCardContent in animeShowCardContents" :key="showCardContent.title" :showCardContent="showCardContent" class="max-lg:scale-90" />
        </div>
    </section>
    <section>
        <h2 class="relative text-3xl text-center font-semibold before:absolute before:w-48 before:h-1 before:-bottom-2 before:left-1/2 before:-translate-x-1/2 before:bg-slate-950 before:dark:bg-slate-100">Our Latest Anime</h2>
        <div class="my-40">
            <ShowsSlider :shows="animeShows" />
        </div>
    </section>
    <section>
        <div class="h-[600px] bg-[url('../../assets/images/other/Animes-low.png')] bg-no-repeat bg-cover bg-fixed bg-center"></div>
    </section>
    <!-- Live action showcase -->
    <section class="container mx-auto mt-40">
        <h2 class="relative  text-3xl text-center font-semibold before:absolute before:w-48 before:h-1 before:-bottom-2 before:left-1/2 before:-translate-x-1/2 before:bg-slate-950 before:dark:bg-slate-100">Our Shows Recommendation</h2>
        <div class="flex max-md:flex-col max-md:gap-y-32 items-center justify-around my-52">
            <ShowCard v-for="showCardContent in liveShowCardContents" :key="showCardContent.title" :showCardContent="showCardContent"  />
        </div>
    </section>
    <section>
        <h2 class="relative text-3xl text-center font-semibold before:absolute before:w-48 before:h-1 before:-bottom-2 before:left-1/2 before:-translate-x-1/2 before:bg-slate-950 before:dark:bg-slate-100">Our Latest Shows</h2>
        <div class="my-40">
            <ShowsSlider :shows="liveShows" />
        </div>
    </section>
    <section>
        <div class="h-[600px] bg-[url('../../assets/images/other/Shows-low.png')] bg-no-repeat bg-cover bg-fixed bg-center"></div>
    </section>
    <!-- Q & A -->
    <section class="container mx-auto mt-40">
        <h2 class="relative  text-3xl text-center font-semibold before:absolute before:w-48 before:h-1 before:-bottom-2 before:left-1/2 before:-translate-x-1/2 before:bg-slate-950 before:dark:bg-slate-100">Frequently Asked Questions</h2>
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

<style>

</style>
