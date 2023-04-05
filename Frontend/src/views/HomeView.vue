<script setup>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'
</script>

<template>
    <Header />
    <main class="mt-[70px] lg:mt-[92px]">
        <RouterView />
    </main>
    <Footer />
</template>
