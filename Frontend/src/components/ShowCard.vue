<script setup>
import { Icon } from '@iconify/vue';

const props = defineProps(["showCardContent"]);
</script>

<template>
    <div class="group relative max-w-[96vw] w-72 sm:w-80 xl:w-96 h-72 sm:h-80 xl:h-96 text-slate-100 flex items-center justify-center rounded-3xl transition-all duration-500 delay-500 hover:w-[400px] hover:h-[700px] xl:hover:w-[700px] xl:hover:h-96 hover:delay-500">
        <div :class="`from-${showCardContent.color}-950 to-${showCardContent.color}-600`" class="absolute left-0 top-0 w-full h-full bg-gradient-to-r opacity-0 z-[1] transition-all duration-500 delay-[0.75s] rounded-[50%] pointer-events-none group-hover:opacity-100 group-hover:rounded-3xl group-hover:delay-500"></div>
        <div :class="`before:border-${showCardContent.color}-600 before:drop-shadow-${showCardContent.color} group-hover:before:bg-${showCardContent.color}-900`" class="circle absolute z-0 top-0 left-0 w-full h-full flex justify-center items-center before:absolute before:top-0 before:left-0 before:w-72 before:sm:w-80 before:xl:w-96 before:h-72 before:sm:h-80 before:xl:h-96 before:rounded-[50%] before:bg-slate-100 before:dark:bg-slate-950 before:border-8 group-hover:before:w-full group-hover:before:h-full group-hover:before:rounded-3xl group-hover:before:delay-500">
            <img class="relative w-60 sm:w-64 xl:w-72 z-[2] transition-all duration-500 delay-500 group-hover:scale-0 group-hover:delay-0 drop-shadow-black-sm dark:drop-shadow-white-sm" :src="showCardContent.logo" alt="Show Logo">
        </div>
        <div class="absolute z-[3] xl:w-1/2 xl:left-1/4 bottom-2 xl:bottom-auto p-6 xl:p-5 xl:pl-10 opacity-0 transition-all duration-500 invisible group-hover:left-0 group-hover:visible group-hover:opacity-100 group-hover:delay-[0.75s]">
            <h2 class="text-2xl md:text-3xl font-bold tracking-wide mb-5">{{ showCardContent.title }}</h2>
            <p class="line-clamp-6 mb-5">{{ showCardContent.desc }}</p>
            <RouterLink to="" class="flex items-center justify-center bg-slate-100 text-slate-950 text-xl md:text-2xl font-medium w-52 md:w-60 h-11 md:h-14 rounded-[28px]"><Icon class="inline-block text-3xl md:text-4xl" icon="line-md:play" /><span class="pr-2.5">Watch Now!</span></RouterLink>
        </div>
        <img class="absolute max-w-[96vw] z-[3] bottom-1/2 right-1/2 w-60 translate-x-1/2 translate-y-1/2 scale-0 transition-all ease-in-out group-hover:w-[400px] xl:group-hover:-right-20 group-hover:bottom-1/2 xl:group-hover:bottom-0 group-hover:translate-y-0 xl:group-hover:translate-x-0 group-hover:scale-100 group-hover:delay-[0.75s]" :src="showCardContent.character" alt="Character">
    </div>
</template>

<style scoped>
.circle::before {
    transition: 0.5s, background 0.5s;
    transition-delay: 0.75s, 1s;
}
.from-red-950 {
    --tw-gradient-from: #450a0a var(--tw-gradient-from-position);
    --tw-gradient-from-position:  ;
    --tw-gradient-to: rgb(69 10 10 / 0)  var(--tw-gradient-from-position);
    --tw-gradient-to-position:  ;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.to-red-600 {
    --tw-gradient-to: #E02424 var(--tw-gradient-to-position);
    --tw-gradient-to-position:  
}
.before\:border-red-600::before {
    content: var(--tw-content);
    --tw-border-opacity: 1;
    border-color: rgb(224 36 36 / var(--tw-border-opacity));
}
.before\:drop-shadow-red::before {
    content: var(--tw-content);
    --tw-drop-shadow: drop-shadow(0 0px 10px rgb(255 0 0)) drop-shadow(0 0px 60px rgb(255 0 0));
    filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.group:hover .group-hover\:before\:bg-red-900::before {
    content: var(--tw-content);
    --tw-bg-opacity: 1;
    background-color: rgb(119 29 29 / var(--tw-bg-opacity));
}
.from-gray-950 {
    --tw-gradient-from: #030712 var(--tw-gradient-from-position);
    --tw-gradient-from-position:  ;
    --tw-gradient-to: rgb(3 7 18 / 0)  var(--tw-gradient-from-position);
    --tw-gradient-to-position:  ;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.to-gray-600 {
    --tw-gradient-to: #4B5563 var(--tw-gradient-to-position);
    --tw-gradient-to-position:  
}
.before\:border-gray-600::before {
    content: var(--tw-content);
    --tw-border-opacity: 1;
    border-color: rgb(75 85 99 / var(--tw-border-opacity));
}
.before\:drop-shadow-gray::before {
    content: var(--tw-content);
    --tw-drop-shadow: drop-shadow(0 0px 10px rgb(128 128 128)) drop-shadow(0 0px 60px rgb(128 128 128));
    filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.group:hover .group-hover\:before\:bg-gray-900::before {
    content: var(--tw-content);
    --tw-bg-opacity: 1;
    background-color: rgb(17 24 39 / var(--tw-bg-opacity));
}
.from-blue-950 {
    --tw-gradient-from: #172554 var(--tw-gradient-from-position);
    --tw-gradient-from-position:  ;
    --tw-gradient-to: rgb(23 37 84 / 0)  var(--tw-gradient-from-position);
    --tw-gradient-to-position:  ;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.to-blue-600 {
    --tw-gradient-to: #1C64F2 var(--tw-gradient-to-position);
    --tw-gradient-to-position:  
}
.before\:border-blue-600::before {
    content: var(--tw-content);
    --tw-border-opacity: 1;
    border-color: rgb(28 100 242 / var(--tw-border-opacity));
}
.before\:drop-shadow-blue::before {
    content: var(--tw-content);
    --tw-drop-shadow: drop-shadow(0 0px 10px rgb(0 0 255)) drop-shadow(0 0px 60px rgb(0 0 255));
    filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.group:hover .group-hover\:before\:bg-blue-900::before {
    content: var(--tw-content);
    --tw-bg-opacity: 1;
    background-color: rgb(35 56 118 / var(--tw-bg-opacity));
}
.from-yellow-950 {
    --tw-gradient-from: #422006 var(--tw-gradient-from-position);
    --tw-gradient-from-position:  ;
    --tw-gradient-to: rgb(66 32 6 / 0)  var(--tw-gradient-from-position);
    --tw-gradient-to-position:  ;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.to-yellow-600 {
    --tw-gradient-to: #9F580A var(--tw-gradient-to-position);
    --tw-gradient-to-position:  
}
.before\:border-yellow-600::before {
    content: var(--tw-content);
    --tw-border-opacity: 1;
    border-color: rgb(159 88 10 / var(--tw-border-opacity));
}
.before\:drop-shadow-yellow::before {
    content: var(--tw-content);
    --tw-drop-shadow: drop-shadow(0 0px 10px rgb(255, 215, 0)) drop-shadow(0 0px 60px rgb(255, 215, 0));
    filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.group:hover .group-hover\:before\:bg-yellow-900::before {
    content: var(--tw-content);
    --tw-bg-opacity: 1;
    background-color: rgb(99 49 18 / var(--tw-bg-opacity));
}
.from-orange-950 {
    --tw-gradient-from: #431407 var(--tw-gradient-from-position);
    --tw-gradient-from-position:  ;
    --tw-gradient-to: rgb(67 20 7 / 0)  var(--tw-gradient-from-position);
    --tw-gradient-to-position:  ;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.to-orange-600 {
    --tw-gradient-to: #D03801 var(--tw-gradient-to-position);
    --tw-gradient-to-position:  
}
.before\:border-orange-600::before {
    content: var(--tw-content);
    --tw-border-opacity: 1;
    border-color: rgb(208 56 1 / var(--tw-border-opacity));
}
.before\:drop-shadow-orange::before {
    content: var(--tw-content);
    --tw-drop-shadow: drop-shadow(0 0px 10px rgb(255, 95, 21)) drop-shadow(0 0px 60px rgb(255, 95, 21));
    filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.group:hover .group-hover\:before\:bg-orange-900::before {
    content: var(--tw-content);
    --tw-bg-opacity: 1;
    background-color: rgb(119 29 29 / var(--tw-bg-opacity));
}
.from-green-950 {
    --tw-gradient-from: #052e16 var(--tw-gradient-from-position);
    --tw-gradient-from-position:  ;
    --tw-gradient-to: rgb(5 46 22 / 0)  var(--tw-gradient-from-position);
    --tw-gradient-to-position:  ;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.to-green-600 {
    --tw-gradient-to: #057A55 var(--tw-gradient-to-position);
    --tw-gradient-to-position:  
}
.before\:border-green-600::before {
    content: var(--tw-content);
    --tw-border-opacity: 1;
    border-color: rgb(5 122 85 / var(--tw-border-opacity));
}
.before\:drop-shadow-green::before {
    content: var(--tw-content);
    --tw-drop-shadow: drop-shadow(0 0px 10px rgb(80, 200, 120)) drop-shadow(0 0px 60px rgb(80, 200, 120));
    filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.group:hover .group-hover\:before\:bg-green-900::before {
    content: var(--tw-content);
    --tw-bg-opacity: 1;
    background-color: rgb(1 71 55 / var(--tw-bg-opacity));
}
.from-violet-950 {
    --tw-gradient-from: #2e1065 var(--tw-gradient-from-position);
    --tw-gradient-from-position:  ;
    --tw-gradient-to: rgb(46 16 101 / 0)  var(--tw-gradient-from-position);
    --tw-gradient-to-position:  ;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.to-violet-600 {
    --tw-gradient-to: #7c3aed var(--tw-gradient-to-position);
    --tw-gradient-to-position:  
}
.before\:border-violet-600::before {
    content: var(--tw-content);
    --tw-border-opacity: 1;
    border-color: rgb(124 58 237 / var(--tw-border-opacity));
}
.before\:drop-shadow-violet::before {
    content: var(--tw-content);
    --tw-drop-shadow: drop-shadow(0 0px 10px rgb(148, 0, 211)) drop-shadow(0 0px 60px rgb(148, 0, 211));
    filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.group:hover .group-hover\:before\:bg-violet-900::before {
    content: var(--tw-content);
    --tw-bg-opacity: 1;
    background-color: rgb(76 29 149 / var(--tw-bg-opacity));
}
.from-pink-950 {
    --tw-gradient-from: #500724 var(--tw-gradient-from-position);
    --tw-gradient-from-position:  ;
    --tw-gradient-to: rgb(80 7 36 / 0)  var(--tw-gradient-from-position);
    --tw-gradient-to-position:  ;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.to-pink-600 {
    --tw-gradient-to: #D61F69 var(--tw-gradient-to-position);
    --tw-gradient-to-position:  
}
.before\:border-pink-600::before {
    content: var(--tw-content);
    --tw-border-opacity: 1;
    border-color: rgb(214 31 105 / var(--tw-border-opacity));
}
.before\:drop-shadow-pink::before {
    content: var(--tw-content);
    --tw-drop-shadow: drop-shadow(0 0px 10px rgb(255, 20, 147)) drop-shadow(0 0px 60px rgb(255, 20, 147));
    filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
}
.group:hover .group-hover\:before\:bg-pink-900::before {
    content: var(--tw-content);
    --tw-bg-opacity: 1;
    background-color: rgb(117 26 61 / var(--tw-bg-opacity));
}
</style>
