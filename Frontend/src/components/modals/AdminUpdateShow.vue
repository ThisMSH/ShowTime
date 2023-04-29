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
    <!-- Modal toggle -->
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
                        Updating {{ props.show.attributes.title }} - {{ props.show.attributes.season }}.
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
            </div>
        </div>
    </div>
</template>
