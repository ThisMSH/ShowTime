<script setup>
import ShowComponent from './ShowComponent.vue';

const props = defineProps(["shows"]);
</script>

<template>
    <div class="group relative p-14 w-full flex overflow-x-hidden">
        <div v-for="i in 4" :key="i" class="shows-slide flex child:mx-6 child:p-2 child:rounded-md child:transition-all child:duration-300 child-hover:shadow-[0_0_60px_-20px] child-hover:shadow-slate-600 child-hover:dark:shadow-slate-300 group-hover:child:opacity-10 group-hover:child:blur-sm group-hover:child-hover:opacity-100 group-hover:child-hover:blur-0">
            <div v-for="show in shows" :key="show.title">
                <ShowComponent :show="show" />
            </div>
        </div>
    </div>
</template>

<style>
.shows-slide:nth-child(1),
.shows-slide:nth-child(3)
{
    animation: slide1 40s linear infinite;
    animation-delay: -20s;
}
.shows-slide:nth-child(2),
.shows-slide:nth-child(4)
{
    animation: slide2 40s linear infinite;
}
.group:hover .shows-slide:nth-child(1),
.group:hover .shows-slide:nth-child(2),
.group:hover .shows-slide:nth-child(3),
.group:hover .shows-slide:nth-child(4) {
    animation-play-state: paused;
}

@keyframes slide1 {
    0% {
        transform: translateX(90%);
    }
    100% {
        transform: translateX(-110%);
    }
}
@keyframes slide2 {
    0% {
        transform: translateX(-10%);
    }
    100% {
        transform: translateX(-210%);
    }
}
</style>
