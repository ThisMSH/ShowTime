<script setup>
import { ref, onMounted } from 'vue';

const scrollBtn = ref();
const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
};

onMounted(() => {
    window.addEventListener("scroll", () => {
        if (window.scrollY > 500) {
            scrollBtn.value.classList.remove("hidden");
        } else {
            scrollBtn.value.classList.add("hidden");
        }
    });
})
</script>

<template>
    <button @click="scrollToTop" ref="scrollBtn" type="button" class="fixed z-[29] bottom-6 right-6 w-12 md:w-16 transition-all duration-300 hidden hover:drop-shadow-black-sm hover:dark:drop-shadow-white-sm">
        <img src="../assets/images/to_top/chopper.png" alt="Chopper">
        <p class="font-lobster font-bold text-slate-900 dark:text-slate-100">To Top</p>
    </button>
</template>

<style>

</style>
