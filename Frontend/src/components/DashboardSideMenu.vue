<script setup>
import ToggleBtn from '../components/utilities/ToggleBtn.vue';
import RectangularLogoDark from './utilities/RectangularLogoDark.vue';
import RectangularLogoLight from './utilities/RectangularLogoLight.vue';
import SubtitleSettings from './custom-icons/SubtitleSettings.vue';
import { onMounted, ref } from 'vue';
import { Icon } from '@iconify/vue';
import { useRoute } from 'vue-router';
import { useAuthStore } from '../stores/auth';

const authStore = useAuthStore();
const sideDashboardMenu = ref(null);
const toggleBtn = ref(null);
const toggleBtnContainer = ref(null);
const RectLogo = ref(null);
const sideMenuList = ref(null);
const toggleSideMenu = function () {
    const switchingArrows = toggleBtn.value.$el.querySelector("#icon-arrow");
    const sectionsTitle = document.querySelectorAll(".text");
    const adminText = document.querySelector(".text-admin");

    sideDashboardMenu.value.classList.toggle("w-20");
    sideDashboardMenu.value.classList.toggle("w-64");
    switchingArrows.classList.toggle("rotate-z-180");
    toggleBtnContainer.value.classList.toggle("left-64");
    toggleBtnContainer.value.classList.toggle("left-1/2");
    RectLogo.value.classList.toggle("invisible");
    RectLogo.value.classList.toggle("opacity-0");
    adminText.classList.toggle("text-[0px]");
    
    sectionsTitle.forEach(element => {
        element.classList.toggle("invisible");
        element.classList.toggle("opacity-0");
    });
};
const toggleDashboardSections = function () {
    const dashboardSections = document.querySelectorAll(".dashboard-sections");
    
    for (let i = 0; i < dashboardSections.length; i++) {
        dashboardSections[i].addEventListener("click", function () {
            for (let j = 0; j < dashboardSections.length; j++) {
                dashboardSections[j].classList.remove("active");
                this.classList.add("active");
            }
        });
    }
};
const hideShowSideMenu = function () {
    sideDashboardMenu.value.classList.toggle("h-0");
    sideDashboardMenu.value.classList.toggle("overflow-hidden");
    sideMenuList.value.classList.toggle("opacity-0");
};
const currentPath = ref("");
const route = useRoute();
currentPath.value = route.name;

onMounted(() => {
    toggleDashboardSections();
});
</script>

<template>
    <aside class="">
        <div ref="sideDashboardMenu" class="sticky flex flex-col items-center justify-end w-64 pb-10 ml-4 transition-all duration-500 rounded-lg top-4 bg-slate-300 dark:bg-slate-800">
            <!-- hide and show menu in small screens -->
            <div class="absolute top-0 flex items-center justify-center h-10 lg:hidden">
                <button @click="hideShowSideMenu" type="button" class="text-3xl">
                    <Icon icon="ic:round-menu" />
                </button>
            </div>
            <!-- Logo & toggling wide and small side menu -->
            <div class="absolute top-0 flex items-center justify-center w-full h-20 border-b max-lg:top-10 max-lg:h-16 max-lg:border-t border-slate-950/25">
                <div class="flex items-center pl-4 transition-all duration-500" ref="RectLogo">
                    <RouterLink to="/" class="w-2/3">
                        <RectangularLogoLight :logoClass="'w-12'" :textClass="'text-2xl'" class="flex w-full dark:hidden" />
                        <RectangularLogoDark :logoClass="'w-12'" :textClass="'text-2xl'" class="hidden w-full dark:flex" />
                    </RouterLink>
                </div>
                <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
                    <div class="relative inline-block transition-all duration-500 -translate-x-1/2 -translate-y-1/2 pointer-events-auto top-1/2 left-64 max-lg:scale-75" ref="toggleBtnContainer">
                        <ToggleBtn switchArrows="rotate-z-180" class="relative" ref="toggleBtn" @click="toggleSideMenu" />
                    </div>
                </div>
            </div>
            <!-- Side menu contents -->
            <ul ref="sideMenuList" class="mt-28 flex flex-col text-start w-full transition-all duration-500 child:relative child:w-full child:h-20 child:rounded-full child:border-8 child:border-transparent child:transition-all child:duration-500 child:before:absolute child:before:w-5 child:before:h-5 child:before:rounded-br-3xl child:before:shadow-[6px_5px_0_5px] child:before:shadow-slate-100 child:before:dark:shadow-slate-950 child:before:-right-3 child:before:-top-7 child:before:opacity-0 child:before:scale-0 child:before:transition-all child:before:duration-500 child:before:origin-bottom-right child:after:absolute child:after:w-5 child:after:h-5 child:after:rounded-tr-3xl child:after:shadow-[6px_-5px_0_5px] child:after:shadow-slate-100 child:after:dark:shadow-slate-950 child:after:-right-3 child:after:-bottom-7 child:after:opacity-0 child:after:scale-0 child:after:transition-all child:after:duration-500 child:after:origin-bottom-right">
                <li @click="toggleDashboardSections" :class="[currentPath == 'profile' ? 'active' : '']" class="dashboard-sections">
                    <RouterLink class="relative z-10 flex items-center w-full no-underline" to="/dashboard/profile" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-full
                            text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:rounded-full before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:rounded-full after:bg-red-500 after:dark:bg-red-600 after:border-slate-100 after:border-8 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500"><Icon icon="ic:baseline-person" /></span>
                        <span class="pl-4 text-lg font-medium transition-all duration-500 text">Personal Information</span>
                    </RouterLink>
                </li>
                <li @click="toggleDashboardSections" :class="[currentPath == 'my_space' ? 'active' : '']" class="dashboard-sections">
                    <RouterLink class="relative z-10 flex items-center w-full no-underline" to="/dashboard/my_space" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-full
                            text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:rounded-full before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:rounded-full after:bg-sky-400 after:dark:bg-sky-600 after:border-slate-100 after:border-8 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500"><Icon icon="ic:baseline-favorite" /></span>
                        <span class="pl-4 text-lg font-medium transition-all duration-500 text">My Space</span>
                    </RouterLink>
                </li>
                <li @click="toggleDashboardSections" :class="[currentPath == 'pricing' ? 'active' : '']" class="dashboard-sections">
                    <RouterLink class="relative z-10 flex items-center w-full no-underline" to="/dashboard/pricing" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-full
                            text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:rounded-full before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:rounded-full after:bg-orange-400 after:dark:bg-orange-500 after:border-slate-100 after:border-8 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500"><Icon icon="streamline:money-cash-bag-dollar-bag-payment-cash-money-finance" /></span>
                        <span class="pl-4 text-lg font-medium transition-all duration-500 text">Pricing</span>
                    </RouterLink>
                </li>
                <template v-if="authStore.getUser && authStore.getUser.user_type == 1">
                    <li class="my-2">
                        <div class="">
                            <p class="flex items-center justify-center py-2">
                                <Icon class="text-5xl text-amber-500 dark:text-amber-400 dark:drop-shadow-black-sm drop-shadow-white-sm" icon="material-symbols:admin-panel-settings-rounded" />
                                <span class="text-2xl font-semibold transition-all duration-500 text-admin text-amber-500 dark:text-amber-400 dark:drop-shadow-black-sm drop-shadow-white-sm">Admin</span>
                            </p>
                            <div class="h-1 bg-gradient-to-r from-transparent via-slate-500 dark:via-slate-400 to-transparent"></div>
                        </div>
                    </li>
                    <li @click="toggleDashboardSections" :class="[currentPath == 'manage_users' ? 'active' : '']" class="dashboard-sections">
                        <RouterLink class="relative z-10 flex items-center w-full no-underline" to="/dashboard/manage_users" >
                            <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-full
                                text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:rounded-full before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:rounded-full after:bg-lime-400 after:dark:bg-lime-600 after:border-slate-100 after:border-8 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500"><Icon icon="material-symbols:settings-account-box-outline-rounded" /></span>
                            <span class="pl-4 text-lg font-medium transition-all duration-500 text">Users Information</span>
                        </RouterLink>
                    </li>
                    <li @click="toggleDashboardSections" :class="[currentPath == 'manage_shows' ? 'active' : '']" class="dashboard-sections">
                        <RouterLink class="relative z-10 flex items-center w-full no-underline" to="/dashboard/manage_shows" >
                            <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-full
                                text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:rounded-full before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:rounded-full after:bg-violet-400 after:dark:bg-violet-600 after:border-slate-100 after:border-8 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500"><Icon icon="material-symbols:settings-cinematic-blur-outline-rounded" /></span>
                            <span class="pl-4 text-lg font-medium transition-all duration-500 text">Shows Management</span>
                        </RouterLink>
                    </li>
                    <li @click="toggleDashboardSections" :class="[currentPath == 'manage_episodes' ? 'active' : '']" class="dashboard-sections">
                        <RouterLink class="relative z-10 flex items-center w-full no-underline" to="/dashboard/manage_episodes" >
                            <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-full
                                text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:rounded-full before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:rounded-full after:bg-pink-400 after:dark:bg-pink-600 after:border-slate-100 after:border-8 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500"><Icon icon="material-symbols:settings-video-camera-outline-rounded" /></span>
                            <span class="pl-4 text-lg font-medium transition-all duration-500 text">Episodes Management</span>
                        </RouterLink>
                    </li>
                    <li @click="toggleDashboardSections" :class="[currentPath == 'manage_trailers' ? 'active' : '']" class="dashboard-sections">
                        <RouterLink class="relative z-10 flex items-center w-full no-underline" to="/dashboard/manage_trailers" >
                            <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-full
                                text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:rounded-full before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:rounded-full after:bg-amber-400 after:dark:bg-amber-600 after:border-slate-100 after:border-8 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500"><Icon icon="material-symbols:settings-panorama-outline-rounded" /></span>
                            <span class="pl-4 text-lg font-medium transition-all duration-500 text">Promotions Management</span>
                        </RouterLink>
                    </li>
                    <li @click="toggleDashboardSections" :class="[currentPath == 'manage_subtitles' ? 'active' : '']" class="dashboard-sections">
                        <RouterLink class="relative z-10 flex items-center w-full no-underline" to="/dashboard/manage_subtitles" >
                            <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-full
                                text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:rounded-full before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:rounded-full after:bg-gray-400 after:dark:bg-gray-600 after:border-slate-100 after:border-8 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500">
                                <SubtitleSettings class="transition-all duration-500 delay-1000 fill-slate-950 dark:fill-slate-100" />
                            </span>
                            <span class="pl-4 text-lg font-medium transition-all duration-500 text">Subtitles Management</span>
                        </RouterLink>
                    </li>
                </template>
            </ul>
        </div>
    </aside>
</template>

<style scoped>
.active {
    @apply translate-x-8 bg-slate-100 dark:bg-slate-950;
}
.active::after,
.active::before {
    @apply right-6 opacity-100 scale-100;
}
.dashboard-sections.active:nth-child(1) .icon,
.dashboard-sections.active:nth-child(1) .icon::before {
    @apply bg-red-500 dark:bg-red-600;
}
.dashboard-sections.active:nth-child(2) .icon,
.dashboard-sections.active:nth-child(2) .icon::before {
    @apply bg-sky-400 dark:bg-sky-600;
}
.dashboard-sections.active:nth-child(3) .icon,
.dashboard-sections.active:nth-child(3) .icon::before {
    @apply bg-orange-400 dark:bg-orange-500;
}
.dashboard-sections.active:nth-child(5) .icon,
.dashboard-sections.active:nth-child(5) .icon::before {
    @apply bg-lime-400 dark:bg-lime-600;
}
.dashboard-sections.active:nth-child(6) .icon,
.dashboard-sections.active:nth-child(6) .icon::before {
    @apply bg-violet-400 dark:bg-violet-600;
}
.dashboard-sections.active:nth-child(7) .icon,
.dashboard-sections.active:nth-child(7) .icon::before {
    @apply bg-pink-400 dark:bg-pink-600;
}
.dashboard-sections.active:nth-child(8) .icon,
.dashboard-sections.active:nth-child(8) .icon::before {
    @apply bg-amber-400 dark:bg-amber-600;
}
.dashboard-sections.active:nth-child(9) .icon,
.dashboard-sections.active:nth-child(9) .icon::before {
    @apply bg-gray-400 dark:bg-gray-600;
}
.dashboard-sections.active .icon::before
{
    @apply opacity-50;
}
.icon::after {
    opacity: 0;
    transform: scale(0);
}
.active .icon::after {
    opacity: 1;
    transform: scale(1);
}
</style>
