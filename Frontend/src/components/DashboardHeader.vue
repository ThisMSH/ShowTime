<script setup>
import Breadcrumb from './utilities/Breadcrumb.vue';
import DarkMode from './utilities/DarkMode.vue';
import { Icon } from '@iconify/vue';
import { useAuthStore } from '../stores/auth';
import { onMounted, ref, watch } from 'vue';
import { initDropdowns } from 'flowbite';
import { useRoute } from 'vue-router';


const authStore = useAuthStore();
const props = defineProps(["tabName"]);
const route = useRoute();
let currentPathName = ref(route.name);
const routeNames = ref({
    "profile": "Personal Information",
    "pricing": "Pricing",
    "manage_shows": "Shows Management",
    "manage_users": "Users Information",
    "manage_episodes": "Episodes Management",
    "manage_trailers": "Trailers Management",
    "manage_subtitles": "Subtitles Management",
});

onMounted(() => {
    initDropdowns();
});

watch(() => route.name, (currentRouteName) => {
    currentPathName.value = currentRouteName;
});
</script>

<template>
    <div class="flex items-center justify-between">
        <Breadcrumb :tabName="routeNames[currentPathName]" />
        <h6 class="flex items-center justify-center text-lg font-medium gap-x-2">
            <Icon class="text-3xl" icon="ic:outline-waving-hand" :rotate="3" />
            Welcome back {{ authStore.getUser?.name }}
        </h6>
        <div class="flex items-center justify-center gap-x-5">
            <div>
                <template v-if="authStore.isLoading">
                    <div role="status" class="animate-pulse">
                        <svg class="w-8 h-8 text-gray-200 md:w-10 md:h-10 dark:text-gray-700" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </template>
                <template v-else >
                    <template v-if="authStore.getUser">
                        <!-- User avatar -->
                        <button type="button" class="w-8 h-8 md:w-10 md:h-10 flex text-sm bg-slate-800 border-2 border-slate-500 rounded-full focus:ring-4 focus:ring-slate-300 dark:focus:ring-slate-600 z-[1]" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="object-cover rounded-full" :src="authStore.getUser.avatar" alt="user photo">
                        </button>
                        <!-- User dropdown menu -->
                        <div class="z-10 hidden my-4 overflow-hidden text-base list-none bg-white divide-y rounded-lg shadow divide-slate-100 dark:bg-slate-700 dark:divide-slate-600" id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm text-slate-900 dark:text-white">{{ authStore.getUser.name }}</span>
                                <span class="block text-sm truncate text-slate-500 dark:text-slate-400">u/{{ authStore.getUser.username }}</span>
                            </div>
                            <ul class="font-medium text-slate-700 dark:text-slate-200" aria-labelledby="user-menu-button">
                                <li>
                                    <RouterLink to="/dashboard" class="relative block px-4 py-2 overflow-hidden transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="relative z-10">Dashboard</p></RouterLink>
                                </li>
                                <li>
                                    <button @click="authStore.handleLogout" type="button" class="relative block w-full px-4 py-2 overflow-hidden transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="relative z-10 text-left">Logout</p></button>
                                </li>
                            </ul>
                        </div>
                    </template>
                    <template v-else>
                        <!-- User avatar -->
                        <button type="button" class="flex text-sm bg-slate-800 border-2 border-slate-500 rounded-full focus:ring-4 focus:ring-slate-300 dark:focus:ring-slate-600 z-[1]" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full md:w-10 md:h-10" src="../assets/images/avatar/default.jpg" alt="user photo">
                        </button>
                        <!-- User dropdown menu -->
                        <div class="z-10 hidden my-4 overflow-hidden text-base list-none bg-white divide-y rounded-lg shadow divide-slate-100 dark:bg-slate-700 dark:divide-slate-600" id="user-dropdown">
                            <ul class="font-medium text-slate-700 dark:text-slate-200" aria-labelledby="user-menu-button">
                                <li>
                                    <RouterLink to="/login" class="relative block px-4 py-2 overflow-hidden transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="relative z-10">Login</p></RouterLink>
                                </li>
                                <li>
                                    <RouterLink to="/register" class="relative block px-4 py-2 overflow-hidden transition-all duration-300 before:absolute before:w-0 before:h-full before:top-0 before:right-0 before:bg-orange-400 before:transition-all before:duration-300 hover:shadow-header-icons-orange hover:text-slate-900 before:hover:shadow-header-icons-inner-orange hover:before:w-full hover:before:left-0"><p class="relative z-10">Sign Up</p></RouterLink>
                                </li>
                            </ul>
                        </div>
                    </template>
                </template>
            </div>
            <!-- Dark mode button -->
            <DarkMode />
        </div>
    </div>
</template>
