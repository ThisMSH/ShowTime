<script setup>
import TextInput from '../utilities/TextInput.vue';
import NoBlackBgButton from '../utilities/NoBlackBgButton.vue';
import { initFlowbite } from 'flowbite';
import { onMounted, ref } from 'vue';
import { Icon } from '@iconify/vue';
import CustomTextArea from '../utilities/CustomTextArea.vue';
import ListInput from '../utilities/ListInput.vue';
import FileInput from '../utilities/FileInput.vue';
import { useShowStore } from '../../stores/show';
import { useCategoryStore } from '../../stores/category';

const showStore = useShowStore();
const categoryStore = useCategoryStore();
const props = defineProps(["show"])

const formData = ref({
    title: props.show.attributes.title,
    season: props.show.attributes.season,
    description: props.show.attributes.description,
    category_id: props.show.relationships.category.id,
    prequel: props.show.relationships.prequel.id ?? "",
    sequel: props.show.relationships.sequel.id ?? "",
    cover: "",
    wide_cover: ""
});

function getCover(file) {
    formData.value.cover = file;
}

function getWideCover(file) {
    formData.value.wide_cover = file;
}

onMounted(async () => {
    initFlowbite();
});
</script>

<template>
    <!-- Update modal toggle -->
    <button type="button" class="flex items-center gap-x-3 px-4 py-1 bg-sky-400 dark:bg-sky-600 text-black dark:text-white rounded-md hover:bg-sky-300 hover:dark:bg-sky-700" :data-modal-toggle="`show-${show.id}`">
        <Icon class="text-lg" icon="material-symbols:edit-outline-rounded" />
        <span>Edit</span>
    </button>

    <!-- Main modal -->
    <div :id="`show-${show.id}`" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-slate-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-slate-600">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                        Updating {{ props.show.attributes.title }}{{ props.show.attributes.season ? ' - ' + props.show.attributes.season : '' }}.
                    </h3>
                    <button type="button"
                        class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                        :data-modal-toggle="`show-${show.id}`">
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
                <form @submit.prevent="showStore.updateShow(show.id, formData)">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                        <TextInput v-model:input="formData.title" label="Title" inputType="text" :inputID="`title-${show.id}`" :errors="showStore.getErrors.title"
                            :errorID="`title-error-${show.id}`" />
                        <TextInput v-model:input="formData.season" label="Season" inputType="text" :inputID="`season-${show.id}`" :errors="showStore.getErrors.season"
                            :errorID="`season-error-${show.id}`" />
                        <div>
                            <div class="relative z-0">
                                <label :for="`category_select-${show.id}`" class="absolute text-slate-600 dark:text-slate-400 duration-300 transform -translate-y-6 scale-75 left-0 top-2 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category</label>
                                <select v-model="formData.category_id" :id="`category_select-${show.id}`" class="block py-2.5 px-2 w-full max-md:text-sm bg-transparent border-0 border-b-2 border-slate-600 appearance-none child:bg-slate-100 child:dark:bg-slate-950 dark:border-slate-400 dark:focus:border-slate-400 focus:outline-none focus:ring-0 focus:border-slate-600 peer">
                                    <option disabled selected>Select</option>
                                    <option v-if="categoryStore.getCategories" v-for="category in categoryStore.getCategories" :key="category.id" :value="category.id">{{ category.category }}</option>
                                </select>
                            </div>
                            <div v-if="showStore.getErrors">
                                <p v-for="error in showStore.getErrors.category_id" :key="error" class="mt-2 text-left text-sm text-red-600 dark:text-red-400 font-medium dark:drop-shadow-black-sm">{{ error }}</p>
                            </div>
                        </div>
                        <CustomTextArea class="col-span-2" v-model:input="formData.description" label="Description"
                            :textareaID="`description-${show.id}`" :errors="showStore.getErrors.description" :errorID="`description-error-${show.id}`" />
                        <ListInput v-model:input="formData.prequel" label="Prequel" inputType="" :inputID="`prequel-${show.id}`"
                            :datalistID="`prequel-list-${show.id}`" :showsList="showStore.getAllShows?.shows" :errors="showStore.getErrors.prequel" :errorID="`prequel-error-${show.id}`" />
                        <ListInput v-model:input="formData.sequel" label="Sequel" inputType="" :inputID="`sequel-${show.id}`"
                            :datalistID="`sequel-list-${show.id}`" :showsList="showStore.getAllShows?.shows" :errors="showStore.getErrors.sequel" :errorID="`sequel-error-${show.id}`" />
                        <FileInput @file-content="getCover" class="lg:col-span-2"  label="Cover" inputType="file" :inputID="`cover-${show.id}`" :errors="showStore.getErrors.cover" :errorID="`cover-error-${show.id}`" />
                        <FileInput @file-content="getWideCover" class="lg:col-span-2"  label="Wide Cover" inputType="file" :inputID="`wide-cover-${show.id}`" :errors="showStore.getErrors.wide_cover" :errorID="`wide-cover-error-${show.id}`" />
                        <div class="lg:col-span-2 flex justify-center items-center">
                            <NoBlackBgButton name="Update" iconName="ic:round-system-update-alt" />
                        </div>
                    </div>
                </form>
                <div v-if="showStore.isLoading" role="status" class="flex justify-center items-center absolute w-full h-full left-0 top-0 bg-black/40 rounded-lg z-10">
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
