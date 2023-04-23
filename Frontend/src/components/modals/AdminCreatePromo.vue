<script setup>
import TextInput from '../utilities/TextInput.vue';
import NoBlackBgButton from '../utilities/NoBlackBgButton.vue';
import DefaultButton from '../utilities/DefaultButton.vue';
import { initFlowbite } from 'flowbite';
import { onMounted, ref } from 'vue';
import ListInput from '../utilities/ListInput.vue';

let title = ref(null);
let trailer = ref(null);
let show = ref(null);

onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <!-- Modal toggle -->
    <DefaultButton type="button" name="New promotion" icon-name="bi:collection-play" data-modal-toggle="create-trailer" />

    <!-- Main modal -->
    <div id="create-trailer" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-slate-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-slate-600">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                        Add a new promotional video.
                    </h3>
                    <button type="button"
                        class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                        data-modal-toggle="create-trailer">
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
                <form action="">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                        <TextInput v-model:input="title" label="Title" inputType="text" inputID="trailer-title" error=""
                            errorID="trailer-title-error" />
                        <div class="relative">
                            <TextInput v-model:input="trailer" label="Promotion's ID" inputType="text" inputID="trailer"
                                error="" errorID="trailer-error" />

                            <button class="absolute top-4 right-2" data-popover-target="popover-description"
                                data-popover-placement="bottom-end" type="button"><svg
                                    class="w-4 h-4 ml-2 text-slate-400 hover:text-slate-500" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg><span class="sr-only">Show information</span></button>
                            <div data-popover id="popover-description" role="tooltip"
                                class="absolute z-10 invisible inline-block text-sm text-slate-600 transition-opacity duration-300 bg-white border border-slate-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-slate-800 dark:border-slate-600 dark:text-slate-400">
                                <div class="p-3 space-y-2">
                                    <h5 class="font-semibold text-slate-900 dark:text-slate-100">How to set a promotional video
                                    </h5>
                                    <p>Copy the id of the promotional video from YouTube and paste it here, like the one highlighted
                                        below:</p>
                                    <p>https://www.youtube.com/watch?v=<span
                                            class="font-medium text-slate-900 dark:text-slate-100 bg-slate-200 dark:bg-slate-700">a9tq0aS5Zu8</span>
                                    </p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </div>
                        <ListInput v-model:input="show" label="Show" inputType="" inputID="trailer-show"
                            datalistID="trailer-show-list" error="" errorID="trailer-show-error" />
                        <div class="lg:col-span-2 flex justify-center items-center">
                            <NoBlackBgButton name="Submit" iconName="ic:round-system-update-alt" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
