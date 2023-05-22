<script setup>
import ShowSkeleton from './ShowSkeleton.vue';
</script>

<template>
    <div class="relative p-14 w-full flex overflow-x-hidden">
        <div v-for="i in 4" :key="i" class="shows-skeleton-slide flex child:mx-6 child:p-2 child:rounded-md">
            <div v-for="j in 9" :key="j">
                <ShowSkeleton />
            </div>
        </div>
    </div>
</template>

<style>
.shows-skeleton-slide:nth-child(1),
.shows-skeleton-slide:nth-child(3) {
    animation: slide-skeleton1 40s linear infinite;
    animation-delay: -20s;
}
.shows-skeleton-slide:nth-child(2),
.shows-skeleton-slide:nth-child(4) {
    animation: slide-skeleton2 40s linear infinite;
}

@keyframes slide-skeleton1 {
    0% {
        transform: translateX(90%);
    }
    100% {
        transform: translateX(-110%);
    }
}
@keyframes slide-skeleton2 {
    0% {
        transform: translateX(-10%);
    }
    100% {
        transform: translateX(-210%);
    }
}
</style>
