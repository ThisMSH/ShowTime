<script setup>
import { initDropdowns } from 'flowbite';
import { onMounted } from 'vue';
import { formatDistanceToNow } from 'date-fns';
import { useAuthStore } from '../stores/auth';
import { useCommentStore } from '../stores/comment';
import { ref, onUpdated } from 'vue';
import { Icon } from '@iconify/vue';

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
const data = ref({
    comment: null,
    episode_id: props.id
});
let displayUpdate = ref(false);

const emit = defineEmits(['delete-comment', 'update-comment']);

const deleteBtnClicked = () => {
    emit('delete-comment');
};

// const editBtnClicked = () => {
//     emit('update-comment');
// };

const date = new Date(props.created);
const formattedDate = formatDistanceToNow(date);

onMounted (() => {
    initDropdowns();
});

onUpdated(() => {
    initDropdowns();
    console.log("comment component updated");
})
</script>

<template>
    <article class="p-6 mb-6 text-base bg-slate-300 rounded-lg dark:bg-slate-800">
        <div v-if="!displayUpdate">
            <div class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3">
                        <img
                            class="mr-2 w-10 h-10 rounded-full object-cover"
                            :src="avatar"
                            :alt="`${name}'s avatar'`">
                    </p>
                    <div>
                        <p class="text-sm md:text-base">{{ username }}</p>
                        <p class="text-xs md:text-sm text-slate-600 dark:text-slate-400"><time pubdate datetime="2022-02-08"
                                title="February 8th, 2022">{{ formattedDate }} ago</time></p>
                    </div>
                </div>
                <template v-if="authStore.getUser && (authStore.getUser.id == user_id || authStore.getUser.user_type == 1)">
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
                                <!-- <button @click="editBtnClicked" type="button" class="block w-full text-left py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">Edit</button> -->
                                <button @click="displayUpdate = !displayUpdate" type="button" class="block w-full text-left py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">Edit</button>
                            </li>
                            <li>
                                <button @click="deleteBtnClicked" type="button" class="block w-full text-left py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">Remove</button>
                            </li>
                        </ul>
                    </div>
                </template>
            </div>
            <p class="text-slate-700 dark:text-slate-300">{{ comment }}</p>
        </div>
        <div v-else>
            <form class="w-11/12" @submit.prevent="updateComment">
                <div class="w-full flex flex-col items-end gap-y-5">
                    <textarea v-model="data.comment" @keydown.enter="updateComment" id="comment-area" class="w-full bg-slate-200 dark:bg-slate-800 px-5 py-4 rounded-2xl rounded-br-none border border-slate-300 dark:border-slate-600 resize-y caret-orange-400 focus:ring-orange-400 focus:border-orange-400 dark:caret-orange-500 focus:dark:ring-orange-500 focus:dark:border-orange-500"></textarea>
                    <div class="self-start" v-if="commentStore.getUpdateErrors">
                        <p v-for="error in commentStore.getUpdateErrors.comment" :key="error" class="mt-2 text-left text-sm text-red-600 dark:text-red-400 font-medium dark:drop-shadow-black-sm">{{ error }}</p>
                    </div>
                    <button type="submit" class="flex items-center gap-x-3 px-4 py-1 bg-sky-400 dark:bg-sky-600 text-black dark:text-white rounded-md hover:bg-sky-300 hover:dark:bg-sky-700">
                        <Icon class="text-lg" icon="material-symbols:edit-outline-rounded" />
                        <span>Edit</span>
                    </button>
                    <button @click="displayUpdate = !displayUpdate" type="button" class="flex items-center gap-x-3 px-4 py-1 bg-gray-400 dark:bg-gray-600 text-black dark:text-white rounded-md hover:bg-gray-300 hover:dark:bg-gray-700">
                        <Icon class="text-lg" icon="material-symbols:edit-outline-rounded" />
                        <span>Edit</span>
                    </button>
                </div>
            </form>
        </div>
    </article>
</template>

<style>

</style>
