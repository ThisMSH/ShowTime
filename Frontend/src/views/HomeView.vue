<script setup>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
import ScrollToTop from '../components/ScrollToTop.vue'
</script>

<template>
    <Header />
    <main class="mt-[70px] lg:mt-[92px]">
        <RouterView />
    </main>
    <ScrollToTop />
    <Footer />
</template>
