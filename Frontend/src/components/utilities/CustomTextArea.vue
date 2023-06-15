<script setup>
import { toRefs, computed } from 'vue';

const emit = defineEmits(['update:input']);
const props = defineProps({
    label: String,
    isRequired: { type: Boolean, default: false },
    input: String,
    textareaID: String,
    errors: { type: Array, default: [] },
    errorID: String,
});
const { label, input, textareaID, errors, errorID } = toRefs(props);
const inputComputed = computed({
    get: () => input.value,
    set: (val) => emit("update:input", val)
});
</script>

<template>
    <div>
        <div class="relative z-0">
            <textarea v-model="inputComputed" :id="textareaID" :aria-describedby="errorID"
                :class="[errors.length > 0 ? 'border-red-600' : 'border-slate-600', errors.length > 0 ? 'dark:border-red-500' : 'dark:border-slate-400', errors.length > 0 ? 'focus:border-red-600' : 'focus:border-slate-600', errors.length > 0 ? 'dark:focus:border-red-500' : 'dark:focus:border-slate-400']"
                class="block py-2.5 px-0 w-full max-md:text-sm bg-transparent border-0 border-b-2 appearance-none caret-orange-400 dark:caret-orange-500 focus:outline-none focus:ring-0 peer" :required="isRequired"></textarea>
            <label :for="textareaID" :class="[errors.length > 0 ? 'text-red-600' : 'text-slate-600', errors.length > 0 ? 'dark:text-red-500' : 'dark:text-slate-400']"
                class="absolute text-sm duration-300 transform -translate-y-6 scale-75 left-0 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{
                    label }}</label>
        </div>
        <div v-if="errors" :id="errorID">
            <p v-for="error in errors" :key="error"
                class="mt-2 text-sm font-medium text-left text-red-600 dark:text-red-400 dark:drop-shadow-black-sm whitespace-normal">{{ error
                }}</p>
        </div>
    </div>
</template>
