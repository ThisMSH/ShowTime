<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const scrollBtn = ref();
const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
};
const scrollFunction = () => {
    if (window.scrollY > 500) {
        scrollBtn.value.classList.remove("hidden");
    } else {
        scrollBtn.value.classList.add("hidden");
    }
};

onMounted(() => {
    window.addEventListener("scroll", scrollFunction);
});

onUnmounted(() => {
    window.removeEventListener("scroll", scrollFunction);
});
</script>

<template>
    <button @click="scrollToTop" ref="scrollBtn" type="button" class="fixed z-[29] bottom-6 right-6 w-12 md:w-16 hidden hover:drop-shadow-black-sm hover:dark:drop-shadow-white-sm transition-all duration-300">
        <img src="../assets/images/to_top/chopper.png" alt="Chopper">
        <p class="font-coiny text-slate-900 dark:text-slate-100">To Top</p>
    </button>
</template>
