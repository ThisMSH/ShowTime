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
</script>

<template>
    <div v-if="episodeStore.getSingleEpisode" class="container px-3 mx-auto grid grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-8 mb-20">
        <!-- Video section -->
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
