<script setup>
import { Icon } from '@iconify/vue';
</script>

<template>
    <section>
        <div class="relative h-home-tablet lg:h-home-desktop">
            <video class="w-full h-full object-cover" autoplay loop muted poster="../../assets/images/other/Animes-low.png">
                <source src="../../assets/videos/index.mp4" type="video/mp4">
            </video>
            <div class="absolute top-0 left-0 w-full h-full opacity-80 bg-gradient-to-l from-black from-0% via-black via-40% to-transparent to-100%"></div>
            <div class="absolute top-0 right-0 w-2/5 h-full flex flex-col items-center justify-center gap-16 text-5xl text-center text-slate-100">
                <p>Welcome to</p>
                <h1 class="bg-gradient-to-l from-red-500 to-orange-500 bg-clip-text text-transparent font-bold font-lobster text-8xl">ShowTime</h1>
                <p>Join today and discover our library of Series, Movies and Anime.</p>
                <RouterLink to="" class="relative flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-slate-100 rounded-l-full rounded-r-full group bg-gradient-to-br from-red-500 to-orange-400 group-hover:from-red-500 group-hover:to-orange-400 hover:text-slate-950 focus:ring-4 focus:outline-none focus:ring-red-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-slate-950 rounded-l-full rounded-r-full group-hover:bg-opacity-0">
                        <Icon class="inline-block text-3xl md:text-4xl" icon="line-md:play" /> Join Today
                    </span>
                </RouterLink>
            </div>
        </div>
    </section>
</template>

<style>

</style>
