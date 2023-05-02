<script setup>
import VideoPlayer from '../../components/VideoPlayer.vue';
import H4 from '../../components/utilities/H4.vue';
import NoBlackBgButton from '../../components/utilities/NoBlackBgButton.vue';
import CommentComponent from '../../components/CommentComponent.vue';
import EpisodeComponentHori from '../../components/EpisodeComponentHori.vue';
import EpisodeComponent from '../../components/EpisodeComponent.vue';
import { onMounted, watch, ref } from 'vue';
import { useEpisodeStore } from '../../stores/episode';
import { useShowStore } from '../../stores/show';
import { useAuthStore } from '../../stores/auth';
import { useCommentStore } from '../../stores/comment';

const episodeStore = useEpisodeStore();
const showStore = useShowStore();
const authStore = useAuthStore();
const commentStore = useCommentStore();
const props = defineProps(["id"]);
let thisShowID = ref(null);

const data = ref({
    comment: null,
    episode_id: props.id
});

const addComment = async () => {
    await commentStore.addComment(data.value);
    data.value.comment = null;
};

onMounted(async () => {
    await episodeStore.fetchEpisode(props.id);
    thisShowID.value = episodeStore.getSingleEpisode?.episode.relationships.show.id;
    await showStore.fetchShow(thisShowID.value);
});

watch(() => props.id, async (episodeID) => {
    await episodeStore.fetchEpisode(episodeID);
});

watch(() => thisShowID.value, async (showID) => {
    await showStore.fetchShow(showID);
});

watch(() => props.id, (newEpisodeID) => {
    data.value.episode_id = newEpisodeID;
});
</script>

<template>
    <div class="container px-3 mx-auto grid grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-8 mb-20">
        <!-- Video section -->
        <template v-if="!episodeStore.getSingleEpisode || episodeStore.episodeLoading">
            <div role="status" class="mt-5 col-span-3 flex justify-center items-center gap-y-6 aspect-video bg-gray-300 rounded-lg animate-pulse dark:bg-gray-700">
                <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 384 512"><path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </template>
        <template v-else>
            <section class="mt-5 col-span-3 flex flex-col gap-y-6">
                <!-- <VideoPlayer :title="episodeStore.getSingleEpisode.episode.attributes.title" :url="episodeStore.getSingleEpisode.episode.attributes.video" class="aspect-video" /> -->
                <template v-if="!authStore.getUser">
                    <p class="aspect-video flex justify-center items-center text-xl font-medium">
                        You need to be logged in in order to watch our shows
                    </p>
                </template>
                <template v-else>
                    <template v-if="authStore.getUser.user_type == 0 && episodeStore.getSingleEpisode.episode.attributes.premium != 0">
                        <p class="aspect-video flex justify-center items-center text-xl font-medium">
                            This episode is available for premium users only!
                        </p>
                    </template>
                    <template v-else>
                        <video class="aspect-video" controls>
                            <source :src="episodeStore.getSingleEpisode.episode.attributes.video">
                        </video>
                    </template>
                </template>
                <h6 class="text-orange-500 dark:text-orange-400">{{ episodeStore.getSingleEpisode.episode.relationships.show.title }} - {{ episodeStore.getSingleEpisode.episode.relationships.show.season }}</h6>
                <h3 class="text-xl sm:text-2xl lg:text-3xl font-semibold">{{ episodeStore.getSingleEpisode.episode.attributes.number }} - {{ episodeStore.getSingleEpisode.episode.attributes.title }}</h3>
                <div class="px-10 text-justify">
                    <p>{{ episodeStore.getSingleEpisode.episode.attributes.description }}</p>
                </div>
            </section>
        </template>
        <!-- Episodes list section -->
        <section class="mt-5 col-span-3 lg:col-span-1 row-span-2">
            <div class="flex flex-col px-4 py-6 gap-y-5 rounded-md bg-slate-200 dark:bg-slate-900">
                <h3 class="text-xl sm:text-2xl lg:text-3xl text-orange-500 dark:text-amber-500 font-medium sm:font-semibold">Episodes</h3>
                <template v-if="showStore.getSingleShow">
                    <div class="hidden sm:block lg:hidden xl:block rounded-xl bg-slate-100 dark:bg-slate-950 overflow-hidden transition-all duration-300" v-for="episode in showStore.getSingleShow.episodes" :key="episode.id" :class="[episode.id == id ? 'drop-shadow-black-sm dark:drop-shadow-white-sm' : '']">
                        <EpisodeComponentHori :number="episode.attributes.number" :title="episode.attributes.title" :image="episode.attributes.thumbnail" :toEpisode="episode.id" customClass="px-3 py-2.5" clamp="line-clamp-2" />
                    </div>
                    <div class="block sm:hidden lg:block xl:hidden rounded-xl bg-slate-100 dark:bg-slate-950 overflow-hidden" v-for="episode in showStore.getSingleShow.episodes" :key="episode.id">
                        <EpisodeComponent :number="episode.attributes.number" :title="episode.attributes.title" :image="episode.attributes.thumbnail" :toEpisode="episode.id" customClass="px-3 py-2.5" clamp="line-clamp-2" imageClass="max-sm:w-full" />
                    </div>
                </template>
            </div>
        </section>
        <!-- Comments section -->
        <template v-if="!episodeStore.getSingleEpisode || episodeStore.episodeLoading">    
            <div role="status" class="col-span-3 p-4 border border-gray-200 rounded shadow animate-pulse dark:border-gray-700">
                <div class="w-full flex items-center space-x-3">
                    <svg class="text-gray-200 w-14 h-14 dark:text-gray-700" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                    <div class="w-full">
                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2"></div>
                        <div class="w-full h-20 bg-gray-200 rounded-xl dark:bg-gray-700"></div>
                    </div>
                </div>
                <span class="sr-only">Loading...</span>
            </div>
            <div role="status" class="col-span-3 p-4 border border-gray-200 rounded shadow animate-pulse dark:border-gray-700">
                <div class="w-full flex items-center space-x-3">
                    <svg class="text-gray-200 w-14 h-14 dark:text-gray-700" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                    <div class="w-full">
                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2"></div>
                        <div class="w-full h-20 bg-gray-200 rounded-xl dark:bg-gray-700"></div>
                    </div>
                </div>
                <span class="sr-only">Loading...</span>
            </div>
            <div role="status" class="col-span-3 p-4 border border-gray-200 rounded shadow animate-pulse dark:border-gray-700">
                <div class="w-full flex items-center space-x-3">
                    <svg class="text-gray-200 w-14 h-14 dark:text-gray-700" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                    <div class="w-full">
                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2"></div>
                        <div class="w-full h-20 bg-gray-200 rounded-xl dark:bg-gray-700"></div>
                    </div>
                </div>
                <span class="sr-only">Loading...</span>
            </div>
            <div role="status" class="col-span-3 p-4 border border-gray-200 rounded shadow animate-pulse dark:border-gray-700">
                <div class="w-full flex items-center space-x-3">
                    <svg class="text-gray-200 w-14 h-14 dark:text-gray-700" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                    <div class="w-full">
                        <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32 mb-2"></div>
                        <div class="w-full h-20 bg-gray-200 rounded-xl dark:bg-gray-700"></div>
                    </div>
                </div>
                <span class="sr-only">Loading...</span>
            </div>
        </template>
        <template v-else>
            <section class="col-span-3 flex flex-col gap-y-10">
                <div class="w-full h-1 bg-gradient-to-r from-transparent via-slate-900 dark:via-slate-100 to-transparent"></div>
                <H4 :title="`${episodeStore.getSingleEpisode.episode.attributes.comments_count} Comments`" />
                <div v-if="authStore.getUser" class="flex justify-evenly items-center gap-x-10">
                    <div class="max-sm:hidden">
                        <img class="min-w-[64px] w-16 rounded-full ring-4 ring-slate-400 dark:ring-slate-600" :src="authStore.getUser.avatar" :alt="`${authStore.getUser.name}'s avatar'`">
                    </div>
                    <form class="w-11/12" @submit.prevent="addComment">
                        <div class="w-full flex flex-col items-end gap-y-5">
                            <textarea v-model="data.comment" id="comment-area" class="w-full bg-slate-200 dark:bg-slate-800 px-5 py-4 rounded-2xl rounded-br-none border border-slate-300 dark:border-slate-600 resize-y caret-orange-400 focus:ring-orange-400 focus:border-orange-400 dark:caret-orange-500 focus:dark:ring-orange-500 focus:dark:border-orange-500"></textarea>
                            <NoBlackBgButton name="Comment" iconName="carbon:send-alt" />
                        </div>
                    </form>
                </div>
                <!-- Comments from database -->
                <div v-for="comment in episodeStore.getSingleEpisode.comments" :key="comment.id">
                    <CommentComponent :id="comment.id" :user_id="comment.relationships.creator.user_id" :episode_id="comment.relationships.episode.episode_id" :comment="comment.attributes.comment" :created="comment.attributes.created" :username="comment.relationships.creator.username" :name="comment.relationships.creator.name" :avatar="comment.relationships.creator.avatar" />
                </div>
            </section>
        </template>
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
