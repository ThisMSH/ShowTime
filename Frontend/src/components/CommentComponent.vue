<script setup>
import { initDropdowns } from 'flowbite';
import { onMounted } from 'vue';
import { formatDistanceToNow } from 'date-fns';
import { useAuthStore } from '../stores/auth';
import { useCommentStore } from '../stores/comment';

const authStore = useAuthStore();
const commentStore = useCommentStore();
const props = defineProps({
    id: String,
    user_id: String,
    episode_id: String,
    comment: String,
    created: String,
    username: String,
    name: String,
    avatar: String
});

const date = new Date(props.created);
const formattedDate = formatDistanceToNow(date);

onMounted (() => {
    initDropdowns();
});
</script>

<template>
    <article class="p-6 mb-6 text-base bg-slate-300 rounded-lg dark:bg-slate-800">
        <div class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3">
                    <img
                        class="mr-2 w-10 h-10 rounded-full"
                        :src="avatar"
                        :alt="`${name}'s avatar'`">
                </p>
                <div>
                    <p class="text-sm md:text-base">{{ username }}</p>
                    <p class="text-xs md:text-sm text-slate-600 dark:text-slate-400"><time pubdate datetime="2022-02-08"
                            title="February 8th, 2022">{{ formattedDate }} ago</time></p>
                </div>
            </div>
            <template v-if="authStore.getUser && authStore.getUser.id == user_id">
                <button :data-dropdown-toggle="`dropdownComment-${id}`"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-slate-400 bg-slate-300 rounded-lg hover:bg-slate-100 focus:ring-4 focus:outline-none focus:ring-slate-50 dark:bg-slate-900 dark:hover:bg-slate-700 dark:focus:ring-slate-600"
                    type="button">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                        </path>
                    </svg>
                    <span class="sr-only">Comment settings</span>
                </button>
                <!-- Dropdown menu -->
                <div :id="`dropdownComment-${id}`"
                    class="hidden z-10 w-36 bg-slate-300 rounded divide-y divide-slate-100 shadow dark:bg-slate-700 dark:divide-slate-600">
                    <ul class="py-1 text-sm text-slate-700 dark:text-slate-200"
                        :aria-labelledby="`dropdownMenuIconHorizontalButton-${id}`">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">Edit</a>
                        </li>
                        <li>
                            <button @click="commentStore.deleteComment(id, episode_id)" type="button" class="block w-full text-left py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">Remove</button>
                        </li>
                    </ul>
                </div>
            </template>
        </div>
        <p class="text-slate-700 dark:text-slate-300">{{ comment }}</p>
    </article>
</template>

<style>

</style>
