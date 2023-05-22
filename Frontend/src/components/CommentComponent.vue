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
    comment: props.comment,
    episode_id: props.id
});
let displayUpdate = ref(false);
const closeBtn = ref(null);
let newComment = ref("");

const emit = defineEmits(['delete-comment']);

const deleteBtnClicked = () => {
    emit('delete-comment');
};

const date = new Date(props.created);
const formattedDate = formatDistanceToNow(date);

const updateComment = async () => {
    await commentStore.updateComment(data.value);
    newComment.value = commentStore.getUpdatedComment.attributes.comment;
    closeBtn.value.click();
};

onMounted (() => {
    initDropdowns();
});

onUpdated(() => {
    initDropdowns();
});
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
                        <p class="text-sm md:text-base">u/{{ username }}</p>
                        <p class="text-xs md:text-sm text-slate-600 dark:text-slate-400"><time pubdate datetime="2022-02-08"
                                title="February 8th, 2022">{{ formattedDate }} ago</time></p>
                    </div>
                </div>
                <template v-if="authStore.getUser && (authStore.getUser.id == user_id || authStore.getUser.user_type == 1)">
                    <button :data-dropdown-toggle="`dropdownComment-${id}`"
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-slate-400 bg-slate-200 rounded-lg hover:bg-slate-100 focus:ring-4 focus:outline-none focus:ring-slate-50 dark:bg-slate-900 dark:hover:bg-slate-700 dark:focus:ring-slate-600"
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
            <p class="text-slate-700 dark:text-slate-300">{{ newComment || comment }}</p>
        </div>
        <div v-else>
            <form @submit.prevent="updateComment">
                <div class="w-full flex flex-col items-end gap-y-2">
                    <textarea v-model="data.comment" @keydown.enter.prevent="updateComment" id="comment-area" class="w-full bg-slate-200 dark:bg-slate-800 px-5 py-4 rounded-2xl rounded-br-none border border-slate-300 dark:border-slate-600 resize-y caret-orange-400 focus:ring-orange-400 focus:border-orange-400 dark:caret-orange-500 focus:dark:ring-orange-500 focus:dark:border-orange-500"></textarea>
                    <div class="self-start" v-if="commentStore.getUpdateErrors">
                        <p v-for="error in commentStore.getUpdateErrors.comment" :key="error" class="mt-2 text-left text-sm text-red-600 dark:text-red-400 font-medium dark:drop-shadow-black-sm">{{ error }}</p>
                    </div>
                    <div class="flex gap-x-2">
                        <button type="submit" class="flex items-center gap-x-3 px-4 py-1 bg-sky-400 dark:bg-sky-600 text-black dark:text-white rounded-md hover:bg-sky-300 hover:dark:bg-sky-700">
                            <Icon v-if="!commentStore.isLoading" class="text-lg mr-0.5" icon="material-symbols:edit-outline-rounded" />
                            <div v-else role="status">
                                <svg aria-hidden="true" class="w-5 h-5 text-slate-200 animate-spin dark:text-slate-800 fill-slate-950 dark:fill-slate-100" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                            <span>Update</span>
                        </button>
                        <button ref="closeBtn" @click="displayUpdate = !displayUpdate" type="button" class="flex items-center gap-x-3 px-4 py-1 bg-gray-400 dark:bg-gray-600 text-black dark:text-white rounded-md hover:bg-gray-200 hover:dark:bg-gray-700">
                            <Icon class="text-lg" icon="material-symbols:cancel-outline-rounded" />
                            <span>Cancel</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </article>
</template>
