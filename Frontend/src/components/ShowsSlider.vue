<script setup>
import test from './ShowComponent.vue';
</script>

<template>
    <div class="group relative p-16 w-full flex overflow-x-hidden">
        <div class="shows-slide1 flex child:mx-6 child:p-2 child:rounded-md child:transition-all child:duration-300 child-hover:shadow-[0_0_60px_-20px] child-hover:shadow-slate-600 child-hover:dark:shadow-slate-400 group-hover:child:opacity-10 group-hover:child:blur-sm group-hover:child-hover:opacity-100 group-hover:child-hover:blur-0">
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
        </div>
        <div class="shows-slide2 flex child:mx-6 child:p-2 child:rounded-md child:transition-all child:duration-300 child-hover:shadow-[0_0_60px_-15px] child-hover:shadow-slate-600 child-hover:dark:shadow-slate-400 group-hover:child:opacity-10 group-hover:child:blur-sm group-hover:child-hover:opacity-100 group-hover:child-hover:blur-0">
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
            <div><test /></div>
        </div>
    </div>
</template>

<style>
.shows-slide1 {
    animation: slide1 40s linear infinite;
    animation-delay: -20s;
}
.shows-slide2 {
    animation: slide2 40s linear infinite;
}
.group:hover .shows-slide1,
.group:hover .shows-slide2 {
    animation-play-state: paused;
}

@keyframes slide1 {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}
@keyframes slide2 {
    0% {
        transform: translateX(0%);
    }
    100% {
        transform: translateX(-200%);
    }
}
</style>
