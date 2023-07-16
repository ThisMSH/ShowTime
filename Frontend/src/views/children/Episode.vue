<script setup>
import gsap from 'gsap';
import VideoPlayer from '../../components/VideoPlayer.vue';
import H4 from '../../components/utilities/H4.vue';
import NoBlackBgButton from '../../components/utilities/NoBlackBgButton.vue';
import CommentComponent from '../../components/CommentComponent.vue';
import EpisodeComponentHori from '../../components/EpisodeComponentHori.vue';
import EpisodeComponent from '../../components/EpisodeComponent.vue';
import CommentSkeleton from '../../components/skeleton/CommentSkeleton.vue';
import EpisodeSkeleton from '../../components/skeleton/EpisodeSkeleton.vue';
import SubmitBtn from '../../components/utilities/SubmitBtn.vue';
import { onMounted, watch, ref } from 'vue';
import { useEpisodeStore } from '../../stores/episode';
import { useShowStore } from '../../stores/show';
import { useAuthStore } from '../../stores/auth';
import { useCommentStore } from '../../stores/comment';
import { Icon } from '@iconify/vue';

const episodeStore = useEpisodeStore();
const showStore = useShowStore();
const authStore = useAuthStore();
const commentStore = useCommentStore();
const props = defineProps(["id"]);
const thisShowID = ref(null);
const comments = ref([]);
const fetchedComments = ref(null);
const fetchedEpisode = ref(null);
const fetchedSubs = ref(null);
const data = ref({
    comment: null,
    episode_id: props.id
});

const addComment = async () => {
    await commentStore.addComment(data.value);
    data.value.comment = null;
};

const deleteComment = async (id) => {
    await commentStore.deleteComment(id);
    comments.value = [];
    await episodeStore.fetchEpisode(props.id);
};

const vidListBeforeEnter = (el) => {
    gsap.from(el, {
        y: "-30px",
        scale: 0.95,
        opacity: 0
    });
};

const vidListCommentEnter = (el) => {
    gsap.to(el, {
        duration: 0.5,
        y: 0,
        scale: 1,
        opacity: 1
    });
};

const commentBeforeEnter = (el) => {
    gsap.from(el, {
        y: "30px",
        scale: 0.95,
        opacity: 0
    });
};

const epListBeforeEnter = (el) => {
    gsap.from(el, {
        y: "-30px",
        opacity: 0
    });
};

const epListEnter = (el, done) => {
    gsap.to(el, {
        duration: 0.5,
        y: 0,
        opacity: 1,
        onComplete: done,
        delay: el.dataset.epindex * 0.05
    });
};

onMounted(async () => {
    await episodeStore.fetchEpisode(props.id);
    thisShowID.value = episodeStore.getSingleEpisode?.episode.relationships.show.id;

    document.title = `${episodeStore.getSingleEpisode?.episode.attributes.title + ' - '}ShowTime`;

    if (episodeStore.getErrors[0] !== 404) {
        await showStore.fetchShow(thisShowID.value);
    }
});

watch(() => props.id, async (episodeID) => {
    fetchedEpisode.value = null;
    await episodeStore.fetchEpisode(episodeID);

    document.title = `${episodeStore.getSingleEpisode?.episode.attributes.title + ' - '}ShowTime`;
});

watch(() => thisShowID.value, async (showID) => {
    if (episodeStore.getErrors[0] !== 404) {
        await showStore.fetchShow(showID);
    }
});

watch(() => props.id, (newEpisodeID) => {
    data.value.episode_id = newEpisodeID;
});

watch(() => commentStore.getComment, (newComment) => {
    comments.value.unshift(newComment);
});

watch(() => episodeStore.getSingleEpisode?.comments, () => {
    fetchedComments.value = episodeStore.getSingleEpisode.comments;
});

watch(() => episodeStore.getSingleEpisode?.episode, () => {
    fetchedEpisode.value = episodeStore.getSingleEpisode.episode;
});

watch(() => episodeStore.getSingleEpisode?.subtitles, () => {
    fetchedSubs.value = episodeStore.getSingleEpisode.subtitles;
});
</script>

<template>
    <div class="container grid grid-cols-3 px-3 mx-auto mb-20 lg:grid-cols-4 gap-x-4 gap-y-8">
        <!-- Video section -->
        <Transition v-if="!fetchedEpisode" @beforeEnter="vidListBeforeEnter" @enter="vidListCommentEnter" appear>
            <section class="col-span-3">
                <div role="status"
                    class="flex items-center justify-center my-5 bg-gray-300 rounded-lg gap-y-6 aspect-video animate-pulse dark:bg-gray-700">
                    <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" fill="currentColor" viewBox="0 0 384 512">
                        <path
                            d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
                <div role="status" class="animate-pulse">
                    <div class="w-56 h-3 mb-4 bg-gray-200 rounded-full dark:bg-gray-700"></div>
                    <div class="h-6 mb-6 bg-gray-200 rounded-full w-72 dark:bg-gray-700"></div>
                    <div class="w-full h-20 bg-gray-200 rounded-xl dark:bg-gray-700"></div>
                    <span class="sr-only">Loading...</span>
                </div>
            </section>
        </Transition>
        <Transition v-else @beforeEnter="vidListBeforeEnter" @enter="vidListCommentEnter" appear>
            <section class="flex flex-col col-span-3 mt-5 gap-y-6">
                <template v-if="!authStore.getUser">
                    <div class="relative">
                        <img class="relative w-full border border-slate-500 dark:border-slate-700 rounded-lg aspect-video z-[1]"
                            src="../../assets/images/other/smoke_bg.png" alt="Login or Sign up to watch the episode">
                        <img class="absolute w-full top-0 blur-xl rounded-lg z-0"
                            src="../../assets/images/other/smoke_bg.png" alt="Login or Sign up to watch the episode">
                        <div
                            class="absolute w-full sm:w-4/5 md:w-2/3 xl:w-1/2 left-1/2 top-2/3 flex flex-col justify-center items-center gap-y-2 sm:gap-y-10 -translate-x-1/2 -translate-y-1/2 z-10">
                            <p
                                class="sm:text-lg md:text-xl text-center font-medium text-slate-100 text-shadow-slate-950-5 drop-shadow-black">
                                You need to be logged in in order to watch our shows</p>
                            <div class="w-full flex justify-around">
                                <RouterLink class="max-sm:scale-75" to="/login">
                                    <SubmitBtn name="Login" />
                                </RouterLink>
                                <RouterLink class="max-sm:scale-75" to="/register">
                                    <SubmitBtn name="Sign Up" />
                                </RouterLink>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <template v-if="authStore.getUser.user_type == 0 && fetchedEpisode.attributes.premium != 0">
                        <div class="relative">
                            <img class="relative w-full border border-slate-500 dark:border-slate-700 rounded-lg aspect-video z-[1]"
                                src="../../assets/images/other/smoke_bg.png" alt="Login or Sign up to watch the episode">
                            <img class="absolute w-full top-0 blur-xl rounded-lg z-0"
                                src="../../assets/images/other/smoke_bg.png" alt="Login or Sign up to watch the episode">
                            <div
                                class="absolute w-5/6 sm:w-max left-1/2 top-2/3 flex flex-col justify-center items-center gap-y-2 sm:gap-y-10 -translate-x-1/2 -translate-y-1/2 z-10">
                                <p
                                    class="sm:text-lg md:text-xl text-center font-medium text-slate-100 text-shadow-slate-950-5 drop-shadow-black">
                                    This episode is available for premium users only!</p>
                                <Icon icon="mdi:crown"
                                    class="absolute text-orange-500 dark:text-orange-400 text-3xl -top-2 sm:top-0 right-1/2 sm:right-0 translate-x-1/2 -translate-y-1/2 sm:rotate-12" />
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <VideoPlayer :title="fetchedEpisode.attributes.title" :url="fetchedEpisode.attributes.video"
                            :subs="fetchedSubs" class="aspect-video" />
                    </template>
                </template>
                <RouterLink class="inline-block w-fit" :to="`/show/${showStore.getSingleShow?.show.id}`">
                    <h6 class="text-orange-500 dark:text-orange-400">{{ fetchedEpisode.relationships.show.title }}{{
                        fetchedEpisode.relationships.show.season ? ' - ' + fetchedEpisode.relationships.show.season : '' }}
                    </h6>
                </RouterLink>
                <h3 class="text-xl font-semibold sm:text-2xl lg:text-3xl">{{ fetchedEpisode.attributes.number }} - {{
                    fetchedEpisode.attributes.title }}</h3>
                <div class="px-10 text-justify">
                    <p>{{ fetchedEpisode.attributes.description }}</p>
                </div>
            </section>
        </Transition>
        <!-- Episodes list section -->
        <Transition @beforeEnter="vidListBeforeEnter" @enter="vidListCommentEnter" appear>
            <section class="col-span-3 row-span-2 mt-5 lg:col-span-1">
                <div class="flex flex-col px-4 py-6 rounded-md gap-y-5 bg-slate-200 dark:bg-slate-900">
                    <h3
                        class="text-xl font-medium text-orange-500 sm:text-2xl lg:text-3xl dark:text-amber-500 sm:font-semibold">
                        Episodes</h3>
                    <template v-if="showStore.getSingleShow">
                        <TransitionGroup tag="div" @beforeEnter="epListBeforeEnter" @enter="epListEnter" appear
                            class="flex flex-col gap-y-5">
                            <div class="hidden overflow-hidden transition-all duration-300 sm:block lg:hidden xl:block rounded-xl bg-slate-100 dark:bg-slate-950"
                                v-for="(episode, index) in showStore.getSingleShow.episodes" :key="episode.id"
                                :class="[episode.id == id ? 'drop-shadow-black-sm dark:drop-shadow-white-sm' : '']"
                                :data-epindex="index">
                                <EpisodeComponentHori :number="episode.attributes.number" :title="episode.attributes.title"
                                    :image="episode.attributes.thumbnail" :toEpisode="episode.id" customClass="px-3 py-2.5"
                                    clamp="line-clamp-2" imageClass="rounded-l-xl" :epiType="episode.attributes.premium" />
                            </div>
                        </TransitionGroup>
                        <TransitionGroup tag="div" @beforeEnter="epListBeforeEnter" @enter="epListEnter" appear
                            class="flex flex-col gap-y-5">
                            <div class="block overflow-hidden transition-all duration-300 sm:hidden lg:block xl:hidden rounded-xl bg-slate-100 dark:bg-slate-950"
                                v-for="episode in showStore.getSingleShow.episodes" :key="episode.id"
                                :class="[episode.id == id ? 'drop-shadow-black-sm dark:drop-shadow-white-sm' : '']">
                                <EpisodeComponent :number="episode.attributes.number" :title="episode.attributes.title"
                                    :image="episode.attributes.thumbnail" :toEpisode="episode.id" customClass="px-3 py-2.5"
                                    clamp="line-clamp-2" imageClass="max-sm:w-full rounded-t-xl"
                                    :epiType="episode.attributes.premium" />
                            </div>
                        </TransitionGroup>
                    </template>
                    <template v-else>
                        <div>
                            <EpisodeSkeleton v-for="i in 12" :key="i" class="mb-4" />
                        </div>
                    </template>
                </div>
            </section>
        </Transition>
        <!-- Comments section -->
        <Transition v-if="!fetchedEpisode" @beforeEnter="commentBeforeEnter" @enter="vidListCommentEnter" appear>
            <section class="col-span-3">
                <CommentSkeleton v-for="i in 5" :key="i" class="mb-6" />
            </section>
        </Transition>
        <Transition v-else @beforeEnter="commentBeforeEnter" @enter="vidListCommentEnter" appear>
            <section class="flex flex-col col-span-3 gap-y-10">
                <div class="w-full h-1 bg-gradient-to-r from-transparent via-slate-900 dark:via-slate-100 to-transparent">
                </div>
                <H4 :title="`${parseInt(fetchedEpisode.attributes.comments_count) + comments.length} Comments`" />
                <div v-if="authStore.getUser" class="flex items-center justify-evenly gap-x-10">
                    <div class="max-sm:hidden">
                        <img class="min-w-[64px] w-16 h-16 object-cover rounded-full ring-4 ring-slate-400 dark:ring-slate-600"
                            :src="authStore.getUser.avatar" :alt="`${authStore.getUser.name}'s avatar'`">
                    </div>
                    <form class="w-11/12" @submit.prevent="addComment">
                        <div class="flex flex-col items-end w-full gap-y-5">
                            <textarea v-model="data.comment" @keydown.enter.prevent="addComment" id="comment-area"
                                class="w-full px-5 py-4 border rounded-br-none resize-y bg-slate-200 dark:bg-slate-800 rounded-2xl border-slate-300 dark:border-slate-600 caret-orange-400 focus:ring-orange-400 focus:border-orange-400 dark:caret-orange-500 focus:dark:ring-orange-500 focus:dark:border-orange-500"
                                required></textarea>
                            <div class="self-start" v-if="commentStore.getErrors">
                                <p v-for="error in commentStore.getErrors.comment" :key="error"
                                    class="mt-2 text-sm font-medium text-left text-red-600 dark:text-red-400 dark:drop-shadow-black-sm">
                                    {{ error }}</p>
                            </div>
                            <NoBlackBgButton name="Comment" iconName="carbon:send-alt" />
                        </div>
                    </form>
                </div>
                <!-- Comments from database -->
                <TransitionGroup tag="div" name="comment" class="relative" appear>
                    <CommentComponent v-if="comments" v-for="comment in comments" :key="comment.id" :id="comment.id"
                        :user_id="comment.relationships.creator.user_id"
                        :episode_id="comment.relationships.episode.episode_id" :comment="comment.attributes.comment"
                        :created="comment.attributes.created" :username="comment.relationships.creator.username"
                        :name="comment.relationships.creator.name" :avatar="comment.relationships.creator.avatar"
                        @delete-comment="deleteComment(comment.id)" />
                    <CommentComponent v-for="comment in fetchedComments" :key="comment.id" :id="comment.id"
                        :user_id="comment.relationships.creator.user_id"
                        :episode_id="comment.relationships.episode.episode_id" :comment="comment.attributes.comment"
                        :created="comment.attributes.created" :username="comment.relationships.creator.username"
                        :name="comment.relationships.creator.name" :avatar="comment.relationships.creator.avatar"
                        @delete-comment="deleteComment(comment.id)" />
                </TransitionGroup>
            </section>
        </Transition>
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

#comment-area::-webkit-scrollbar-thumb:hover {
    background-color: rgb(234 88 12);
}

.comment-enter-from,
.comment-leave-to {
    transform: scale(0.5);
    opacity: 0;
}
.comment-enter-to,
.comment-leave-from {
    transform: scale(1);
    opacity: 1;
}
.comment-enter-active,
.comment-leave-active {
    transition: all 0.5s ease-out;
}
.comment-leave-active {
    position: absolute;
}
.comment-move {
    transition: all 0.4s ease;
}
</style>
