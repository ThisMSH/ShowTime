<script setup>
import { toRefs, computed } from 'vue';

const emit = defineEmits(['update:input']);
const props = defineProps({
    label: String,
    isReadOnly: { type: Boolean, default: false },
    isFocused: { type: Boolean, default: false },
    input: String,
    inputType: String,
    inputID: String,
    error: String,
    errorID: String,
    datalistID: String,
});
const { label, input, inputType, inputID, error, errorID, datalistID } = toRefs(props);
const inputComputed = computed({
    get: () => input.value,
    set: (val) => emit("update:input", val)
});
</script>

<template>
    <div>
        <div class="relative z-0">
            <input v-model="inputComputed" :list="datalistID" :type="inputType" :id="inputID" :aria-describedby="errorID" :class="[error ? 'border-red-600' : '', error ? 'dark:border-red-500' : '', error ? 'focus:border-red-600' : '', error ? 'dark:focus:border-red-500' : '']" class="datalist block py-2.5 px-0 w-full max-md:text-sm bg-transparent border-0 border-b-2 border-slate-600 appearance-none dark:border-slate-400 dark:focus:border-slate-400 focus:outline-none focus:ring-0 focus:border-slate-600 peer" placeholder=" " :readonly="isReadOnly" :autofocus="isFocused" />
            <label :for="inputID" :class="[error ? 'text-red-600' : '', error ? 'dark:text-red-500' : '']" class="absolute text-sm text-slate-600 dark:text-slate-400 duration-300 transform -translate-y-6 scale-75 left-0 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{ label }}</label>
            <datalist :id="datalistID">
                <option value="1">Kimetsu</option>
                <option value="2">attack</option>
                <option value="3">kaguya</option>
                <option value="4">one_piece</option>
                <option value="5">jujutsu</option>
                <option value="6">something</option>
                <option value="71">Fate</option>
            </datalist>
        </div>
        <p v-if="error" :id="errorID" class="mt-2 text-sm text-red-600 dark:text-red-500 font-medium">{{ error }}</p>
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
} */
</style>
