<script setup>
import { Icon } from '@iconify/vue';
import { initModals } from 'flowbite';
import { onMounted } from 'vue';
import { useSubtitleStore } from '../../stores/subtitle';

const subtitleStore = useSubtitleStore();
const props = defineProps(["subtitle", "show"]);

onMounted(() => {
    initModals();
});
</script>

<template>
    <!-- Delete modal toggle -->
    <button :id="`delete-btn-${subtitle.id}`" type="button"
        class="flex items-center px-4 py-1 text-black bg-red-400 rounded-md gap-x-3 dark:bg-red-600 dark:text-white hover:bg-red-500 hover:dark:bg-red-700"
        :data-modal-target="`delete-subtitle-${subtitle.id}`" :data-modal-toggle="`delete-subtitle-${subtitle.id}`">
        <Icon class="text-lg" icon="material-symbols:delete-outline-rounded" />
        <span>Delete</span>
    </button>

    <!-- Main modal -->
    <div :id="`delete-subtitle-${subtitle.id}`" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-800 dark:hover:text-white"
                    :data-modal-hide="`delete-subtitle-${subtitle.id}`">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-slate-400 w-14 h-14 dark:text-slate-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-lg font-normal text-slate-500 dark:text-slate-400">Are you sure you want to delete
                        " <span class="font-semibold text-slate-600 dark:text-slate-300">{{ subtitle.attributes.name
                        }}</span> " subtitle from <span class="font-semibold text-slate-600 dark:text-slate-300">
                            {{ subtitle.relationships.episode.number }} - {{ subtitle.relationships.episode.title }}
                        </span>?</h3>
                    <p class="mb-5 text-sm font-light text-center">({{ show.title }}{{ show.season ? ' - ' + show.season :
                        '' }})</p>
                    <button @click="subtitleStore.deleteSubtitle(subtitle.id)" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button :data-modal-hide="`delete-subtitle-${subtitle.id}`" type="button"
                        class="text-slate-500 bg-white hover:bg-slate-100 focus:ring-4 focus:outline-none focus:ring-slate-200 rounded-lg border border-slate-200 text-sm font-medium px-5 py-2.5 hover:text-slate-900 focus:z-10 dark:bg-slate-700 dark:text-slate-300 dark:border-slate-500 dark:hover:text-white dark:hover:bg-slate-600 dark:focus:ring-slate-600">No,
                        cancel
                    </button>
                </div>
            </div>
            <div v-if="subtitleStore.isLoading" role="status"
                class="absolute top-0 left-0 z-10 flex items-center justify-center w-full h-full rounded-lg bg-black/40">
                <svg aria-hidden="true"
                    class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</template>
