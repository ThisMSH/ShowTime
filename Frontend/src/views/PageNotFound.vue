<script setup>
import DarkMode from '../components/utilities/DarkMode.vue';
// import RectangularLogo from '../components/utilities/RectangularLogo.vue';
</script>

<template>
    <main class="relative w-full min-h-screen flex flex-col items-center gap-20">
        <div class="w-full flex items-center justify-evenly mt-8">
            <RectangularLogo class="h-12" />
            <DarkMode />
        </div>
        <div class="flex justify-center items-center flex-col">
            <div class="">
                <p class="text-[200px] font-black -skew-x-[15deg] text-transparent bg-amber-500 dark:bg-amber-400 bg-clip-text text-stroke-amber-2 text-shadow-slate-100-30 dark:text-shadow-slate-950-30">404</p>
            </div>
            <div class="min-h-full flex justify-center items-center flex-col gap-y-10">
                <h1 class="text-5xl font-semibold text-orange-500 dark:text-orange-400">Oups... It looks like you lost your way.</h1>
                <p class="text-3xl font-medium">The page that you are looking for does not exist.</p>
                <RouterLink to="/" class="group relative cursor-pointer overflow-hidden px-10 md:px-12 py-2.5 md:py-3.5 border-2 border-slate-900 dark:border-slate-100 rounded-full text-xl transition-all duration-500 hover:drop-shadow-black-sm hover:dark:drop-shadow-white-sm before:absolute before:left-0 before:top-0 before:w-1/2 before:h-full before:bg-gradient-to-l before:from-slate-600 before:dark:from-slate-100 before:opacity-30 before:skew-x-[45deg] before:transition-all before:duration-500 hover:before:left-64">
                    <p class="transition-all duration-500 ease-in-out group-hover:scale-125">Home Page</p>
                </RouterLink>
            </div>
        </div>
    </main>
</template>