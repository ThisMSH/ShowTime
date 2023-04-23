<script setup>
import TextInput from '../utilities/TextInput.vue';
import NoBlackBgButton from '../utilities/NoBlackBgButton.vue';
import DefaultButton from '../utilities/DefaultButton.vue';
import { initFlowbite } from 'flowbite';
import { onMounted, ref } from 'vue';
import CustomTextArea from '../utilities/CustomTextArea.vue';
import ListInput from '../utilities/ListInput.vue';

let title = ref(null);
let number = ref(null);
// let membership = ref(null);
let show = ref(null);
let description = ref(null);
let thumbnail = ref(null);
let video = ref(null);

onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <!-- Modal toggle -->
    <DefaultButton type="button" name="New episode" icon-name="iconoir:add-media-video"
        data-modal-toggle="create-episode" />

    <!-- Main modal -->
    <div id="create-episode" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-slate-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-slate-600">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                        Create a new episode.
                    </h3>
                    <button type="button"
                        class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                        data-modal-toggle="create-episode">
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
                        <TextInput v-model:input="title" label="Title" inputType="text" inputID="epi-title" error=""
                            errorID="title-error" />
                        <TextInput v-model:input="number" label="Number" inputType="text" inputID="epi-number" error=""
                            errorID="number-error" />
                        <div>
                            <div class="relative z-0">
                                <label for="memebership-select"
                                    class="absolute text-slate-600 dark:text-slate-400 duration-300 transform -translate-y-6 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Membership</label>
                                <select id="memebership-select"
                                    class="block py-2.5 px-2 w-full max-md:text-sm bg-transparent border-0 border-b-2 border-slate-600 appearance-none child:bg-slate-100 child:dark:bg-slate-950 dark:border-slate-400 dark:focus:border-slate-400 focus:outline-none focus:ring-0 focus:border-slate-600 peer">
                                    <option disabled selected>Select</option>
                                    <option value="0">Free</option>
                                    <option value="1">Premium</option>
                                </select>
                            </div>
                            <p v-if="error" :id="errorID" class="mt-2 text-sm text-red-600 dark:text-red-500 font-medium">{{
                                error }}</p>
                        </div>
                        <ListInput v-model:input="show" label="Show" inputType="" inputID="epi-show"
                            datalistID="epi-show-list" error="" errorID="epi-show-error" />
                        <CustomTextArea class="col-span-2" v-model:input="description" label="Description"
                            textareaID="epi-description" error="" errorID="epi-description-error" />
                        <TextInput class="lg:col-span-2" v-model:input="thumbnail" label="Thumbnail" inputType="file"
                            inputID="thumbnail" error="" errorID="thumbnail-error" />
                        <TextInput class="lg:col-span-2" v-model:input="video" label="Video" inputType="file"
                            inputID="video" error="" errorID="video-error" />
                        <div class="lg:col-span-2 flex justify-center items-center">
                            <NoBlackBgButton name="Submit" iconName="ic:round-system-update-alt" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
