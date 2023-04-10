<script setup>
import { Icon } from '@iconify/vue';

const props = defineProps(["showCardContent"]);
</script>

<template>
    <div class="group relative max-w-[96vw] w-72 sm:w-80 lg:w-96 h-72 sm:h-80 lg:h-96 text-slate-100 flex items-center justify-center rounded-3xl transition-all duration-500 delay-500 hover:w-[400px] hover:h-[700px] lg:hover:w-[700px] lg:hover:h-96 hover:delay-500">
        <div :class="`from-${showCardContent.color}-950 to-${showCardContent.color}-600`" class="absolute left-0 top-0 w-full h-full bg-gradient-to-r opacity-0 z-[1] transition-all duration-500 delay-[0.75s] rounded-[50%] pointer-events-none group-hover:opacity-100 group-hover:rounded-3xl group-hover:delay-500"></div>
        <div :class="`before:border-${showCardContent.color}-600 before:drop-shadow-${showCardContent.color} group-hover:before:bg-${showCardContent.color}-900`" class="circle absolute z-0 top-0 left-0 w-full h-full flex justify-center items-center before:absolute before:top-0 before:left-0 before:w-72 before:sm:w-80 before:lg:w-96 before:h-72 before:sm:h-80 before:lg:h-96 before:rounded-[50%] before:bg-slate-100 before:dark:bg-slate-950 before:border-8 group-hover:before:w-full group-hover:before:h-full group-hover:before:rounded-3xl group-hover:before:delay-500">
            <img class="relative w-60 sm:w-64 lg:w-72 z-[2] transition-all duration-500 delay-500 group-hover:scale-0 group-hover:delay-0 drop-shadow-black-sm dark:drop-shadow-white-sm" :src="showCardContent.logo" alt="Show Logo">
        </div>
        <div class="absolute z-[3] lg:w-1/2 lg:left-1/4 bottom-2 lg:bottom-auto p-6 lg:p-5 lg:pl-10 opacity-0 transition-all duration-500 invisible group-hover:left-0 group-hover:visible group-hover:opacity-100 group-hover:delay-[0.75s]">
            <h2 class="text-2xl md:text-3xl font-bold tracking-wide mb-5">{{ showCardContent.title }}</h2>
            <p class="line-clamp-6 mb-5">{{ showCardContent.desc }}</p>
            <RouterLink to="" class="flex items-center justify-center bg-slate-100 text-slate-950 text-xl md:text-2xl font-medium w-52 md:w-60 h-11 md:h-14 rounded-[28px]"><Icon class="inline-block text-3xl md:text-4xl" icon="line-md:play" /><span class="pr-2.5">Watch Now!</span></RouterLink>
        </div>
        <img class="absolute max-w-[96vw] z-[3] bottom-1/2 right-1/2 w-60 translate-x-1/2 translate-y-1/2 scale-0 transition-all ease-in-out group-hover:w-[400px] lg:group-hover:-right-20 group-hover:bottom-1/2 lg:group-hover:bottom-0 group-hover:translate-y-0 lg:group-hover:translate-x-0 group-hover:scale-100 group-hover:delay-[0.75s]" :src="showCardContent.character" alt="Character">
    </div>
</template>

<style scoped>
.circle::before {
    transition: 0.5s, background 0.5s;
    transition-delay: 0.75s, 1s;
}
</style>