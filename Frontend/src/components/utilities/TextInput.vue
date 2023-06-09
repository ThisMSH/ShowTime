<script setup>
import { toRefs, computed } from 'vue';

const emit = defineEmits(['update:input']);
const props = defineProps({
    label: String,
    isReadOnly: { type: Boolean, default: false },
    isFocused: { type: Boolean, default: false },
    isRequired: { type: Boolean, default: false },
    input: String,
    inputType: String,
    inputID: String,
    errors: { type: Array, default: [] },
    errorID: String,
    customInputClasses: String
});
const { label, input, inputType, inputID, errors, errorID } = toRefs(props);
const inputComputed = computed({
    get: () => input.value,
    set: (val) => emit("update:input", val)
});
</script>

<template>
    <div>
        <div class="relative z-0">
            <input v-model="inputComputed" :type="inputType" :id="inputID" :aria-describedby="errorID"
                :class="[errors.length > 0 ? 'border-red-600' : 'border-slate-600', errors.length > 0 ? 'dark:border-red-500' : 'dark:border-slate-400', errors.length > 0 ? 'focus:border-red-600' : 'focus:border-slate-600', errors.length > 0 ? 'dark:focus:border-red-500' : 'dark:focus:border-slate-400', customInputClasses]"
                class="block py-2.5 px-0 w-full max-md:text-sm bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 peer"
                placeholder=" " :readonly="isReadOnly" :autofocus="isFocused" :required="isRequired" />
            <label :for="inputID" :class="[errors.length > 0 ? 'text-red-600' : 'text-slate-600', errors.length > 0 ? 'dark:text-red-500' : 'dark:text-slate-400']"
                class="absolute text-sm duration-300 transform -translate-y-6 scale-75 left-0 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{
                    label }}</label>
        </div>
        <div v-if="errors" :id="errorID">
            <p v-for="error in errors" :key="error"
                class="mt-2 text-left text-sm text-red-600 dark:text-red-400 font-medium dark:drop-shadow-black-sm whitespace-normal">{{ error
                }}</p>
        </div>
    </div>
</template>

<style>
.border-red-600 {
    --tw-border-opacity: 1;
    border-color: rgb(224 36 36 / var(--tw-border-opacity));
}

:is(.dark .dark\:border-red-500) {
    --tw-border-opacity: 1;
    border-color: rgb(240 82 82 / var(--tw-border-opacity));
}

.focus\:border-red-600:focus {
    --tw-border-opacity: 1;
    border-color: rgb(224 36 36 / var(--tw-border-opacity));
}

:is(.dark .dark\:focus\:border-red-500:focus) {
    --tw-border-opacity: 1;
    border-color: rgb(240 82 82 / var(--tw-border-opacity));
}

/* .text-red-600 {
    --tw-text-opacity: 1;
    color: rgb(224 36 36 / var(--tw-text-opacity));
}
:is(.dark .dark\:text-red-500) {
    --tw-text-opacity: 1;
    color: rgb(240 82 82 / var(--tw-text-opacity));
} */</style>
