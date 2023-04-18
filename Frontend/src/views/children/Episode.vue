<script setup>
import VideoPlayer from '../../components/VideoPlayer.vue';
import H4 from '../../components/utilities/H4.vue';
import NoBlackBgButton from '../../components/utilities/NoBlackBgButton.vue';
import CommentComponent from '../../components/CommentComponent.vue';
import EpisodeComponentHori from '../../components/EpisodeComponentHori.vue';
import EpisodeComponent from '../../components/EpisodeComponent.vue';

const episodes = [
    {
        "title": "Fate/stay night dflkqjsdf ljsflmkjsq lqfjlkfjqs lssdfkg jslmkgj dslgsd gdjgsdmgkl dgmlksdgj dsflmkgj fdgmldjfg ljsdgmsd gdfj q",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE.png",
        "link": "episode/1",
    },
    {
        "title": "JJK Movie",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-1.png",
        "link": "episode/1",
    },
    {
        "title": "JJK S2",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-2.png",
        "link": "episode/1",
    },
    {
        "title": "Fate/Zero",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-3.png",
        "link": "episode/1",
    },
    {
        "title": "JJK S1",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-4.png",
        "link": "episode/1",
    },
    {
        "title": "Naruto",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-5.png",
        "link": "episode/1",
    },
    {
        "title": "One Piece",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-6.png",
        "link": "episode/1",
    },
    {
        "title": "OPM",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-7.png",
        "link": "episode/1",
    },
    {
        "title": "Kimetsu no Yaiba",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-8.png",
        "link": "episode/1",
    },
    {
        "title": "Kimetsu no Yaiba",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-9.png",
        "link": "episode/1",
    },
    {
        "title": "Kimetsu no Yaiba",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-10.png",
        "link": "episode/1",
    },
    {
        "title": "Kimetsu no Yaiba",
        "image": "http://localhost:3000/src/assets/images/testing/IMAGE-11.png",
        "link": "episode/1",
    },
];
</script>

<template>
    <div class="container px-3 mx-auto grid grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-8 mb-20">
        <!-- Video section -->
        <section class="col-span-3 flex flex-col gap-y-6">
            <div class="">
                <VideoPlayer class="aspect-video" />
            </div>
            <h6 class="text-orange-500 dark:text-orange-400">Jujutsu Kaisen</h6>
            <h3 class="text-xl sm:text-2xl lg:text-3xl font-semibold">Episode 1 - Ryomen Sukuna</h3>
            <div class="px-10 text-justify">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </section>
        <!-- Episodes list section -->
        <section class="col-span-3 lg:col-span-1 row-span-2 mt-5">
            <div class="flex flex-col px-4 py-6 gap-y-5 rounded-2xl bg-slate-300 dark:bg-slate-700">
                <h3 class="text-xl sm:text-2xl lg:text-3xl text-orange-500 dark:text-amber-500 font-medium sm:font-semibold">Episodes</h3>
                <div class="hidden sm:block lg:hidden xl:block rounded-xl bg-slate-100 dark:bg-slate-950 overflow-hidden" v-for="episode in episodes" :key="episode.title">
                    <EpisodeComponentHori :title="episode.title" :image="episode.image" :toEpisode="episode.link" customClass="px-3 py-2.5" clamp="line-clamp-2" />
                </div>
                <div class="block sm:hidden lg:block xl:hidden rounded-xl bg-slate-100 dark:bg-slate-950 overflow-hidden" v-for="episode in episodes" :key="episode.title">
                    <EpisodeComponent :title="episode.title" :image="episode.image" :toEpisode="episode.link" customClass="px-3 py-2.5" clamp="line-clamp-2" imageClass="max-sm:w-full" />
                </div>
            </div>
        </section>
        <!-- Comments section -->
        <section class="col-span-3 flex flex-col gap-y-10">
            <div class="w-full h-1 bg-gradient-to-r from-transparent via-slate-900 dark:via-slate-100 to-transparent"></div>
            <H4 title="Comments" />
            <div class="flex justify-evenly items-center gap-x-10">
                <div class="max-sm:hidden">
                    <img class="min-w-[64px] w-16 rounded-full ring-4 ring-slate-400 dark:ring-slate-600" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Rounded avatar">
                </div>
                <form class="w-11/12">
                    <div class="w-full flex flex-col items-end gap-y-5">
                        <textarea name="" id="comment-area" class="w-full bg-slate-200 dark:bg-slate-800 px-5 py-4 rounded-2xl rounded-br-none border border-slate-300 dark:border-slate-600 resize-y caret-orange-400 focus:ring-orange-400 focus:border-orange-400 dark:caret-orange-500 focus:dark:ring-orange-500 focus:dark:border-orange-500"></textarea>
                        <NoBlackBgButton name="Comment" iconName="carbon:send-alt" />
                    </div>
                </form>
            </div>
            <!-- Comments from database -->
            <div>
                <CommentComponent />
                <CommentComponent />
                <CommentComponent />
                <CommentComponent />
                <CommentComponent />
                <CommentComponent />
                <CommentComponent />
                <CommentComponent />
                <CommentComponent />
                <CommentComponent />
                <CommentComponent />
                <CommentComponent />
                <CommentComponent />
            </div>
        </section>
    </div>
</template>

<style>
#comment-area::-webkit-scrollbar {
    /* border-radius: 10px; */
    width: 6px;
    height: 6px;
}
#comment-area::-webkit-scrollbar-track {
    border-radius: 3px;
    margin-top: 16px;
    margin-left: 16px;
}
#comment-area::-webkit-scrollbar-thumb {
    background-color: rgb(251 146 60);
    margin-top: 16px;
    border-radius: 3px;
}
#comment-area::-webkit-scrollbar-thumb:hover{
    background-color: rgb(234 88 12);
}
</style>
