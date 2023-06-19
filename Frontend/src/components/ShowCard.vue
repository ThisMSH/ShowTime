<script setup>
import { Icon } from '@iconify/vue';

const props = defineProps(["showCardContent"]);
</script>

<template>
    <div :class="showCardContent.attributes.color"
        class="group relative max-w-[96vw] w-72 sm:w-80 xl:w-96 h-72 sm:h-80 xl:h-96 text-slate-100 flex items-center justify-center rounded-3xl transition-all duration-500 delay-500 hover:w-[400px] hover:h-[700px] xl:hover:w-[700px] xl:hover:h-96 hover:delay-500">
        <div
            class="absolute left-0 top-0 w-full h-full bg-gradient-to-r opacity-0 z-[1] transition-all duration-500 delay-[0.75s] rounded-[50%] pointer-events-none group-hover:opacity-100 group-hover:rounded-3xl group-hover:delay-500">
        </div>
        <div
            class="circle absolute z-0 top-0 left-0 w-full h-full flex flex-col justify-center items-center before:absolute before:top-0 before:left-0 before:w-72 before:sm:w-80 before:xl:w-96 before:h-72 before:sm:h-80 before:xl:h-96 before:rounded-[50%] before:bg-slate-100 before:dark:bg-slate-950 before:border-8 group-hover:before:w-full group-hover:before:h-full group-hover:before:rounded-3xl group-hover:before:delay-500">
            <img class="relative w-60 sm:w-64 xl:w-72 z-[2] transition-all duration-500 delay-500 group-hover:scale-0 group-hover:delay-0 drop-shadow-black-sm dark:drop-shadow-white-sm"
                :src="showCardContent.attributes.logo" :alt="`${showCardContent.relationships.show.title}${showCardContent.relationships.show.season ? ' - ' + showCardContent.relationships.show.season : ''} \'s logo`">
        </div>
        <div
            class="absolute z-[3] xl:w-1/2 xl:left-1/4 bottom-2 xl:bottom-auto p-6 xl:p-5 xl:pl-10 opacity-0 transition-all duration-500 invisible group-hover:left-0 group-hover:visible group-hover:opacity-100 group-hover:delay-[0.75s]">
            <h2 class="text-2xl md:text-3xl font-bold tracking-wide mb-5 line-clamp-2" :title="`${showCardContent.relationships.show.title}${showCardContent.relationships.show.season ? ' - ' + showCardContent.relationships.show.season : ''}`">{{ showCardContent.relationships.show.title }}{{ showCardContent.relationships.show.season ? ' - ' + showCardContent.relationships.show.season : '' }}</h2>
            <p class="line-clamp-6 mb-5">{{ showCardContent.relationships.show.description }}</p>
            <RouterLink :to="`/show/${showCardContent.relationships.show.id}`"
                class="flex items-center justify-center bg-slate-100 text-slate-950 text-xl md:text-2xl font-medium w-52 md:w-60 h-11 md:h-14 rounded-[28px] transition-all hover:bg-orange-400">
                <Icon class="inline-block text-3xl md:text-4xl" icon="line-md:play" /><span class="pr-2.5">Watch Now!</span>
            </RouterLink>
        </div>
        <img class="absolute max-w-[96vw] z-[3] bottom-1/2 right-1/2 w-60 translate-x-1/2 translate-y-1/2 scale-0 transition-all ease-in-out group-hover:w-[400px] xl:group-hover:-right-20 group-hover:bottom-1/2 xl:group-hover:bottom-0 group-hover:translate-y-0 xl:group-hover:translate-x-0 group-hover:scale-100 group-hover:delay-[0.75s]"
            :src="showCardContent.attributes.character" :alt="`${showCardContent.relationships.show.title}${showCardContent.relationships.show.season ? ' - ' + showCardContent.relationships.show.season : ''} \'s character`">
    </div>
</template>

<style scoped>
.circle::before {
    transition: 0.5s, background 0.5s;
    transition-delay: 0.75s, 1s;
}

.red div:first-child {
    @apply from-red-950 to-red-600;
}

.red div:nth-child(2) {
    @apply before:border-red-600 before:drop-shadow-red group-hover:before:bg-red-900;
}

.gray div:first-child {
    @apply from-gray-950 to-gray-600;
}

.gray div:nth-child(2) {
    @apply before:border-gray-600 before:drop-shadow-gray group-hover:before:bg-gray-900;
}

.blue div:first-child {
    @apply from-blue-950 to-blue-600;
}

.blue div:nth-child(2) {
    @apply before:border-blue-600 before:drop-shadow-blue group-hover:before:bg-blue-900;
}

.yellow div:first-child {
    @apply from-yellow-950 to-yellow-600;
}

.yellow div:nth-child(2) {
    @apply before:border-yellow-600 before:drop-shadow-yellow group-hover:before:bg-yellow-900;
}

.orange div:first-child {
    @apply from-orange-950 to-orange-600;
}

.orange div:nth-child(2) {
    @apply before:border-orange-600 before:drop-shadow-orange group-hover:before:bg-orange-900;
}

.green div:first-child {
    @apply from-green-950 to-green-600;
}

.green div:nth-child(2) {
    @apply before:border-green-600 before:drop-shadow-green group-hover:before:bg-green-900;
}

.violet div:first-child {
    @apply from-violet-950 to-violet-600;
}

.violet div:nth-child(2) {
    @apply before:border-violet-600 before:drop-shadow-violet group-hover:before:bg-violet-900;
}

.pink div:first-child {
    @apply from-pink-950 to-pink-600;
}

.pink div:nth-child(2) {
    @apply before:border-pink-600 before:drop-shadow-pink group-hover:before:bg-pink-900;
}
</style>
