<script setup>
import DarkMode from './utilities/DarkMode.vue';
import { Icon } from '@iconify/vue';
import { onMounted, ref } from 'vue';
import { initDropdowns } from 'flowbite';
import RectangularLogo from './utilities/RectangularLogo.vue';
import CircleLogoDark from './utilities/CircleLogoDark.vue';
import { useAuthStore } from '../stores/auth';

const authStore = useAuthStore();

// const sideHeader = ref(null);
const sideHeaderClasses = ref("-right-80");
const navBar = ref(null);

function openSideHeader() {
    sideHeaderClasses.value = "right-0";
    // sideHeader.value.classList.add("right-0");
    // sideHeader.value.classList.remove("-right-80");
}

function closeSideHeader() {
    sideHeaderClasses.value = "-right-80";
    // sideHeader.value.classList.remove("right-0");
    // sideHeader.value.classList.add("-right-80");
}

window.addEventListener("scroll", function() {
	navBar.value.classList.toggle("navbar", window.scrollY > 0);
});

onMounted(async () => {
    await authStore.fetchUser();
    initDropdowns();
});
</script>

<template>
    <header class="fixed top-0 left-0 w-full z-30 backdrop-blur">
        <nav ref="navBar" class="bg-slate-100 px-4 py-3 lg:p-6 dark:bg-slate-950 bg-opacity-30 dark:bg-opacity-40 border-slate-400 dark:border-slate-600 transition-all duration-300">
            <div class="absolute h-full w-32 sm:w-2/5 lg:w-2/5 right-0 top-0 bg-orange-500 bg-opacity-70 dark:bg-opacity-70 rounded-l-full transition-all"></div>
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <!-- Logo -->
                <RouterLink class="mr-3" to="/">
                    <RectangularLogo class="h-6 sm:h-9" />
                </RouterLink>
                <div class="flex items-center gap-x-2 sm:gap-x-6 lg:order-2 lg:gap-x-3">
                    <!-- Search bar -->
                    <form class="hidden lg:flex items-center">   
                        <label for="search-1" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-slate-500 dark:text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" id="search-1" class="bg-slate-100 border border-slate-300 text-slate-900 text-sm rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 pr-4 dark:bg-slate-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-slate-100 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                        </div>
                    </form>
                    <template v-if="authStore.isLoading">
                        <div role="status" class="animate-pulse">
                            <svg class="text-gray-200 w-8 h-8 md:w-10 md:h-10 dark:text-gray-700" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </template>
                    <template v-else >
                        <template v-if="authStore.getUser">
                            <!-- User avatar -->
                            <button type="button" class="flex text-sm bg-slate-800 border-2 border-slate-500 rounded-full focus:ring-4 focus:ring-slate-300 dark:focus:ring-slate-600 z-[1]" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 md:w-10 md:h-10 rounded-full object-cover" :src="authStore.getUser.avatar" alt="user photo">
                            </button>
                            <!-- User dropdown menu -->
                            <div class="z-10 hidden my-4 text-base list-none bg-white divide-y divide-slate-100 rounded-lg shadow dark:bg-slate-700 dark:divide-slate-600 overflow-hidden" id="user-dropdown">
                                <div class="px-4 py-3">
                                    <span class="block text-sm text-slate-900 dark:text-white">{{ authStore.getUser.name }}</span>
                                    <span class="block text-sm text-slate-500 truncate dark:text-slate-400">{{ authStore.getUser.username }}</span>
                                </div>
                                <ul class="text-slate-700 dark:text-slate-200 font-medium" aria-labelledby="user-menu-button">
                                    <li>
                                        <RouterLink to="/dashboard" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="z-10 relative">Dashboard</p></RouterLink>
                                    </li>
                                    <li>
                                        <button @click="authStore.handleLogout" type="button" class="block w-full px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="z-10 relative">Logout</p></button>
                                    </li>
                                </ul>
                            </div>
                        </template>
                        <template v-else>
                            <!-- User avatar -->
                            <button type="button" class="flex text-sm bg-slate-800 border-2 border-slate-500 rounded-full focus:ring-4 focus:ring-slate-300 dark:focus:ring-slate-600 z-[1]" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 md:w-10 md:h-10 rounded-full" src="../assets/images/avatar/default.jpg" alt="user photo">
                            </button>
                            <!-- User dropdown menu -->
                            <div class="z-10 hidden my-4 text-base list-none bg-white divide-y divide-slate-100 rounded-lg shadow dark:bg-slate-700 dark:divide-slate-600 overflow-hidden" id="user-dropdown">
                                <ul class="text-slate-700 dark:text-slate-200 font-medium" aria-labelledby="user-menu-button">
                                    <li>
                                        <RouterLink to="/login" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="z-10 relative">Login</p></RouterLink>
                                    </li>
                                    <li>
                                        <RouterLink to="/register" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="z-10 relative">Sign Up</p></RouterLink>
                                    </li>
                                </ul>
                            </div>
                        </template>
                    </template>
                    <!-- Dark mode button -->
                    <DarkMode class="hidden sm:block scale-75 md:scale-100" />
                    <!-- Menu icon for mobile and tablet view -->
                    <button @click="openSideHeader" class="block lg:hidden z-[1] p-2 rounded-md text-3xl focus:ring-2 focus:ring-slate-200 dark:focus:ring-slate-600" type="button">
                        <Icon icon="mingcute:menu-fill" />
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0 child:flex child:justify-center child:items-center">
                        <li>
                            <RouterLink to="/" class="group inline-block py-2 px-6 text-center text-lg font-semibold rounded-lg overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="transition-all duration-300 group-hover:scale-125">Home</p></RouterLink>
                        </li>
                        <li>
                            <button id="categories-dropdown" data-dropdown-toggle="dropdown" class="group inline-block py-2 px-6 text-center text-lg font-semibold rounded-lg overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0" type="button"><p class="flex items-center transition-all duration-300 group-hover:scale-125">Categories <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></p></button>
                            <!-- Dropdown menu -->
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-slate-100 rounded-lg shadow w-44 dark:bg-slate-700 overflow-hidden">
                                <ul class="text-slate-700 dark:text-slate-200 font-medium" aria-labelledby="categories-dropdown">
                                    <li>
                                        <RouterLink to="/category" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="z-10 relative">Series</p></RouterLink>
                                    </li>
                                    <li>
                                        <RouterLink to="/category" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="z-10 relative">Movies</p></RouterLink>
                                    </li>
                                    <li>
                                        <RouterLink to="/category" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="z-10 relative">Anime Series</p></RouterLink>
                                    </li>
                                    <li>
                                        <RouterLink to="/category" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="z-10 relative">Anime Movies</p></RouterLink>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
                <div ref="sideHeader" :class="sideHeaderClasses" class="absolute top-0 pb-10 pt-24 rounded-l-[50px] border-l border-slate-900 dark:border-slate-100 w-80 min-h-screen lg:hidden flex flex-col items-center justify-between bg-orange-500 z-10 transition-all duration-300">
                    <div class="flex flex-col gap-y-10">
                        <button @click="closeSideHeader" class="absolute right-5 top-8 p-2 rounded-md text-3xl focus:ring-2 focus:ring-slate-200 dark:focus:ring-slate-600" type="button">
                            <Icon icon="mingcute:close-fill" />
                        </button>
                        <!-- Dark mode button -->
                        <DarkMode class="absolute left-5 top-8 block sm:hidden scale-75" />
                        <div class="">
                            <!-- Search bar -->
                            <form class="flex items-center">
                                <label for="search-1" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-slate-500 dark:text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input type="text" id="search-1" class="bg-slate-100 border border-slate-300 text-slate-900 text-sm rounded-3xl focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 pr-4 dark:bg-slate-900 dark:border-slate-600 dark:placeholder-slate-400 dark:text-slate-100 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
                                </div>
                            </form>
                        </div>
                        <ul class="flex flex-col mt-4 font-medium justify-between items-center">
                            <li>
                                <RouterLink to="/" class="group inline-block py-2 px-6 text-center text-lg font-semibold rounded-lg overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-slate-900 before:transition-all before:duration-300 hover:shadow-header-icons-slate hover:text-slate-100 before:hover:shadow-header-icons-inner-slate hover:before:w-full hover:before:left-0"><p class="transition-all group-hover:scale-125">Home</p></RouterLink>
                            </li>
                            <li>
                                <button id="categories-dropdown-mobile" data-dropdown-toggle="dropdown2" class="group inline-block py-2 px-6 text-center text-lg font-semibold rounded-lg overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-slate-900 before:transition-all before:duration-300 hover:shadow-header-icons-slate hover:text-slate-100 before:hover:shadow-header-icons-inner-slate hover:before:w-full hover:before:left-0" type="button"><p class="flex items-center transition-all group-hover:scale-125">Categories <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></p></button>
                                <!-- Dropdown menu -->
                                <div id="dropdown2" class="z-10 hidden bg-white divide-y divide-slate-100 rounded-lg shadow w-44 dark:bg-slate-700 overflow-hidden">
                                    <ul class="text-slate-700 dark:text-slate-200 font-medium" aria-labelledby="categories-dropdown-mobile">
                                        <li>
                                            <RouterLink to="/category" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-slate-900 before:transition-all before:duration-300 hover:shadow-header-icons-slate before:hover:shadow-header-icons-inner-slate hover:before:w-full hover:before:left-0 hover:text-slate-100"><p class="z-10 relative">Series</p></RouterLink>
                                        </li>
                                        <li>
                                            <RouterLink to="/category" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-slate-900 before:transition-all before:duration-300 hover:shadow-header-icons-slate before:hover:shadow-header-icons-inner-slate hover:before:w-full hover:before:left-0 hover:text-slate-100"><p class="z-10 relative">Movies</p></RouterLink>
                                        </li>
                                        <li>
                                            <RouterLink to="/category" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-slate-900 before:transition-all before:duration-300 hover:shadow-header-icons-slate before:hover:shadow-header-icons-inner-slate hover:before:w-full hover:before:left-0 hover:text-slate-100"><p class="z-10 relative">Anime Series</p></RouterLink>
                                        </li>
                                        <li>
                                            <RouterLink to="/category" class="block px-4 py-2 overflow-hidden relative transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-slate-900 before:transition-all before:duration-300 hover:shadow-header-icons-slate before:hover:shadow-header-icons-inner-slate hover:before:w-full hover:before:left-0 hover:text-slate-100"><p class="z-10 relative">Anime Movies</p></RouterLink>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="">
                        <RouterLink class="" to="/">
                            <CircleLogoDark class="w-52" />
                        </RouterLink>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<style>
.navbar {
    padding: 10px 24px !important;
    border-bottom: 1px solid;
}

@media (max-width: 1024px) {
    .navbar {
        padding: 6px 16px !important;
        border-bottom: 1px solid;
    }   
}
</style>
