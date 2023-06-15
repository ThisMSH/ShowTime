<script setup>
import TextInput from '../utilities/TextInput.vue';
import NoBlackBgButton from '../utilities/NoBlackBgButton.vue';
import ListInput from '../utilities/ListInput.vue';
import { initFlowbite } from 'flowbite';
import { onMounted, ref } from 'vue';
import { Icon } from '@iconify/vue';
import { useTrailerStore } from '../../stores/trailer';

const trailerStore = useTrailerStore();
const props = defineProps(["trailer"]);

const formData = ref({
    show_id: props.trailer.relationships.show.id,
    title: props.trailer.attributes.title,
    trailer: "",
});

const updateTrailer = async () => {
    await trailerStore.updateTrailer(props.trailer.id, formData.value);
};

onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <!-- Modal toggle -->
    <button type="button" class="flex items-center px-4 py-1 text-black rounded-md gap-x-3 bg-sky-400 dark:bg-sky-600 dark:text-white hover:bg-sky-300 hover:dark:bg-sky-700" :data-modal-toggle="`update-trailer-${trailer.id}`">
        <Icon class="text-lg" icon="material-symbols:edit-outline-rounded" />
        <span>Edit</span>
    </button>

    <!-- Main modal -->
    <div :id="`update-trailer-${trailer.id}`" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-2xl p-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-slate-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex items-center justify-between pb-4 mb-4 border-b rounded-t sm:mb-5 dark:border-slate-600">
                    <h3 class="text-lg font-semibold text-left whitespace-normal text-slate-900 dark:text-white">
                        Update the promotional video " <span class="font-bold text-slate-600 dark:text-slate-300">{{ trailer.attributes.title }}</span> " from <span class="font-bold text-slate-600 dark:text-slate-300">{{ trailer.relationships.show.title }}{{ trailer.relationships.show.season ? ' - ' + trailer.relationships.show.season : '' }}</span>.
                    </h3>
                    <button type="button"
                        class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                        :data-modal-toggle="`update-trailer-${trailer.id}`">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form @submit.prevent="updateTrailer">
                    <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">
                        <TextInput v-model:input="formData.title" label="Title" inputType="text" inputID="title" :errors="trailerStore.getErrors.title"
                            errorID="title-error" />
                        <div class="relative">
                            <TextInput v-model:input="formData.trailer" label="Promotion's ID" inputType="text" inputID="trailer" :errors="trailerStore.getErrors.trailer"
                                errorID="trailer-error" />

                            <button class="absolute top-4 right-2" data-popover-target="popover-description"
                                data-popover-placement="bottom-end" type="button"><svg
                                    class="w-4 h-4 ml-2 text-slate-400 hover:text-slate-500" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg><span class="sr-only">Show information</span></button>
                            <div data-popover id="popover-description" role="tooltip"
                                class="absolute z-10 invisible inline-block text-sm transition-opacity duration-300 bg-white border rounded-lg shadow-sm opacity-0 text-slate-600 border-slate-200 w-72 dark:bg-slate-800 dark:border-slate-600 dark:text-slate-400">
                                <div class="p-3 space-y-2">
                                    <h5 class="font-semibold text-slate-900 dark:text-slate-100">How to set a promotional video
                                    </h5>
                                    <p>Copy the id of the promotional video from YouTube and paste it here, like the one highlighted
                                        below:</p>
                                    <p>https://www.youtube.com/watch?v=<span
                                            class="font-medium text-slate-900 dark:text-slate-100 bg-slate-200 dark:bg-slate-700">dQw4w9WgXcQ</span>
                                    </p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </div>
                        <ListInput v-model:input="formData.show_id" label="Show" inputType="" :inputID="`show-id-${trailer.attributes.trailer}`"
                            datalistID="shows-list" :showsList="trailerStore.getAllTrailers" :errors="trailerStore.getErrors.show_id" errorID="show-error" />
                        <div class="flex items-center justify-center lg:col-span-2">
                            <NoBlackBgButton name="Update" iconName="ic:round-system-update-alt" />
                        </div>
                    </div>
                </form>
                <div v-if="trailerStore.isLoading" role="status" class="absolute top-0 left-0 z-10 flex items-center justify-center w-full h-full rounded-lg bg-black/40">
                    <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</template>
