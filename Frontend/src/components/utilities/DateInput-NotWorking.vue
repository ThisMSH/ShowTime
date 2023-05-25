<script setup>
import { toRefs, computed, onMounted, ref } from 'vue';
import Datepicker from 'flowbite-datepicker/Datepicker';

const datePick = ref(null);
const emit = defineEmits(['update:input']);
const props = defineProps({
    label: String,
    isReadOnly: { type: Boolean, default: false },
    input: String,
    inputID: String,
    errors: String,
    errorID: String,
});
const { label, input, inputID, errors, errorID } = toRefs(props);
const inputComputed = computed({
    get: () => input.value,
    set: (val) => emit("update:input", val)
});

onMounted(() => {
    new Datepicker(datePick.value, {
        clearBtn: true,
        todayBtn: true,
        autohide: true,
        orientation: 'bottom',
        format: 'dd-mm-yyyy',
        maxDate: new Date(),
    });
});
</script>

<template>
    <div>
        <div class="relative z-0">
            <div class="absolute inset-y-0 right-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input :id="inputID" v-model="inputComputed"
                :class="[errors.length > 0 ? 'border-red-600' : 'border-slate-600', errors.length > 0 ? 'dark:border-red-500' : 'dark:border-slate-400', errors.length > 0 ? 'focus:border-red-600' : 'focus:border-slate-600', errors.length > 0 ? 'dark:focus:border-red-500' : 'dark:focus:border-slate-400']"
                ref="datePick" datepicker type="text"
                class="block py-2.5 px-0 w-full max-md:text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                placeholder=" " :readonly="isReadOnly">
            <label :for="inputID"
                :class="[errors.length > 0 ? 'text-red-600' : 'text-slate-600', errors.length > 0 ? 'dark:text-red-500' : 'dark:text-slate-400']"
                class="absolute text-sm duration-300 transform -translate-y-6 scale-75 left-0 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{
                    label }}</label>
        </div>
        <div v-if="errors" :id="errorID" class="mt-2 text-sm text-red-600 dark:text-red-500 font-medium">
            <p v-for="error in errors" :key="error"
                class="mt-2 text-left text-sm text-red-600 dark:text-red-400 font-medium dark:drop-shadow-black-sm">{{ error
                }}
            </p>
        </div>
    </div>
</template>
