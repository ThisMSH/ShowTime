<script setup>
import Breadcrumb from './utilities/Breadcrumb.vue';
import DarkMode from './utilities/DarkMode.vue';
import { initDropdowns } from 'flowbite';
import { Icon } from '@iconify/vue';
import { onMounted } from 'vue';

const props = defineProps(["tabName"])

onMounted(() => {
    initDropdowns();
});
</script>

<template>
    <div class="flex items-center justify-between">
        <Breadcrumb :tabName="tabName" />
        <h6 class="text-lg font-medium flex justify-center items-center gap-x-2">
            <Icon class="text-3xl" icon="ic:outline-waving-hand" :rotate="3" />
            Welcome back El Mahdi Saissi Hassani
        </h6>
        <div class="flex justify-center items-center gap-x-5">
            <div>
                <!-- User avatar -->
                <button type="button" class="flex text-sm bg-slate-800 rounded-full focus:ring-4 focus:ring-slate-300 dark:focus:ring-slate-600 z-[1]" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 md:w-10 md:h-10 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-3.jpg" alt="user photo">
                </button>
                <!-- User dropdown menu -->
                <div class="z-10 hidden my-4 text-base list-none bg-white divide-y divide-slate-100 rounded-lg shadow dark:bg-slate-700 dark:divide-slate-600 overflow-hidden" id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-slate-900 dark:text-white">Bonnie Green</span>
                        <span class="block text-sm text-slate-500 truncate dark:text-slate-400">example@example.com</span>
                    </div>
                    <ul class="text-slate-700 dark:text-slate-200 font-medium" aria-labelledby="user-menu-button">
                        <li>
                            <RouterLink to="/login" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="z-10 relative">Login</p></RouterLink>
                        </li>
                        <li>
                            <RouterLink to="/register" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="z-10 relative">Sign Up</p></RouterLink>
                        </li>
                        <li>
                            <RouterLink to="" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="z-10 relative">empty</p></RouterLink>
                        </li>
                        <li>
                            <RouterLink to="" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="z-10 relative">empty</p></RouterLink>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Dark mode button -->
            <DarkMode />
        </div>
    </div>
</template>

<style>

</style>
