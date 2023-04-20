<script setup>
import ToggleBtn from '../components/utilities/ToggleBtn.vue';
import RectangularLogo from '../components/utilities/RectangularLogo.vue';
import { ref } from 'vue';
import { Icon } from '@iconify/vue';

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
}
const hideShowSideMenu = function () {
    sideDashboardMenu.value.classList.toggle("h-[680px]");
    sideDashboardMenu.value.classList.toggle("h-10");
    sideDashboardMenu.value.classList.toggle("overflow-hidden");
    sideMenuList.value.classList.toggle("opacity-0");
}
</script>

<template>
    <aside class="">
        <div ref="sideDashboardMenu" class="h-[680px] pb-10 bg-slate-300 dark:bg-slate-700 relative top-5 left-5 w-64 flex flex-col justify-end items-center rounded-lg transition-all duration-500">
            <!-- hide and show menu in small screens -->
            <div class="lg:hidden absolute top-0 h-10 flex justify-center items-center">
                <button @click="hideShowSideMenu" type="button" class="text-3xl">
                    <Icon icon="ic:round-menu" />
                </button>
            </div>
            <!-- Logo & toggling wide and small side menu -->
            <div class="absolute top-0 max-lg:top-10 w-full h-20 max-lg:h-16 flex justify-center items-center border-b max-lg:border-t border-slate-950/25">
                <div class="flex justify-center items-center transition-all duration-500" ref="RectLogo">
                    <RouterLink to="/" class="w-2/3">
                        <RectangularLogo class="w-full" />
                    </RouterLink>
                </div>
                <div class="absolute top-0 left-0 w-full h-full">
                    <div class="relative inline-block top-1/2 left-64 -translate-x-1/2 -translate-y-1/2 transition-all duration-500 max-lg:scale-75" ref="toggleBtnContainer">
                        <ToggleBtn switchArrows="rotate-z-180" class="relative" ref="toggleBtn" @click="toggleSideMenu" />
                    </div>
                </div>
            </div>
            <!-- Side menu contents -->
            <ul ref="sideMenuList" class="flex flex-col text-start w-full transition-all duration-500 child:relative child:w-full child:h-20 child:rounded-xl child:border-8 child:border-transparent child:transition-all child:duration-500 child:before:absolute child:before:w-5 child:before:h-5 child:before:rounded-br-3xl child:before:shadow-[6px_5px_0_5px] child:before:shadow-slate-100 child:before:dark:shadow-slate-950 child:before:-right-3 child:before:-top-7 child:before:opacity-0 child:before:scale-0 child:before:transition-all child:before:duration-500 child:before:origin-bottom-right child:after:absolute child:after:w-5 child:after:h-5 child:after:rounded-tr-3xl child:after:shadow-[6px_-5px_0_5px] child:after:shadow-slate-100 child:after:dark:shadow-slate-950 child:after:-right-3 child:after:-bottom-7 child:after:opacity-0 child:after:scale-0 child:after:transition-all child:after:duration-500 child:after:origin-bottom-right">
                <li @click="toggleDashboardSections" class="dashboard-sections active">
                    <RouterLink class="relative flex items-center w-full no-underline z-10" to="" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-lg
                         text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:bg-red-500 after:dark:bg-red-600 after:border-8 after:border-slate-100 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500"><Icon icon="ic:baseline-person" /></span>
                        <span class="text text-lg font-medium pl-4 transition-all duration-500">Personal Information</span>
                    </RouterLink>
                </li>
                <li @click="toggleDashboardSections" class="dashboard-sections">
                    <RouterLink class="relative flex items-center w-full no-underline z-10" to="" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-lg
                         text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:bg-sky-400 after:dark:bg-sky-600 after:border-8 after:border-slate-100 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500"><Icon icon="ic:baseline-favorite" /></span>
                        <span class="text text-lg font-medium pl-4 transition-all duration-500">My Favorites</span>
                    </RouterLink>
                </li>
                <li @click="toggleDashboardSections" class="dashboard-sections">
                    <RouterLink class="relative flex items-center w-full no-underline z-10" to="" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-lg
                         text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:bg-orange-400 after:dark:bg-orange-500 after:border-8 after:border-slate-100 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500"><Icon icon="streamline:money-cash-bag-dollar-bag-payment-cash-money-finance" /></span>
                        <span class="text text-lg font-medium pl-4 transition-all duration-500">Pricing</span>
                    </RouterLink>
                </li>
                <li class="my-2">
                    <div class="">
                        <p class="py-2 flex justify-center items-center">
                            <Icon class="text-5xl text-amber-500 dark:text-amber-400 dark:drop-shadow-black-sm drop-shadow-white-sm" icon="material-symbols:admin-panel-settings-rounded" />
                            <span class="text-admin text-2xl font-semibold text-amber-500 dark:text-amber-400 dark:drop-shadow-black-sm drop-shadow-white-sm transition-all duration-500">Admin</span>
                        </p>
                        <div class="h-1 bg-gradient-to-r from-transparent via-slate-500 dark:via-slate-400 to-transparent"></div>
                    </div>
                </li>
                <li @click="toggleDashboardSections" class="dashboard-sections">
                    <RouterLink class="relative flex items-center w-full no-underline z-10" to="" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-lg
                         text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:bg-lime-400 after:dark:bg-lime-600 after:border-8 after:border-slate-100 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500"><Icon icon="ic:round-manage-accounts" /></span>
                        <span class="text text-lg font-medium pl-4 transition-all duration-500">Users Information</span>
                    </RouterLink>
                </li>
                <li @click="toggleDashboardSections" class="dashboard-sections">
                    <RouterLink class="relative flex items-center w-full no-underline z-10" to="" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-lg
                         text-5xl before:absolute before:top-2 before:w-full before:h-full before:blur-md before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:bg-violet-400 after:dark:bg-violet-600 after:border-8 after:border-slate-100 after:dark:border-slate-950 after:box-content after:-left-14 after:transition-all after:duration-500"><Icon icon="ic:outline-video-settings" /></span>
                        <span class="text text-lg font-medium pl-4 transition-all duration-500">Shows Management</span>
                    </RouterLink>
                </li>
            </ul>
        </div>
    </aside>
</template>

<style scoped>
.active {
    @apply translate-x-8 bg-slate-100 dark:bg-slate-950;
}
.active::before {
    @apply right-6 opacity-100 scale-100;
}
.active::after {
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
.dashboard-sections.active:nth-child(1) .icon::before {
    @apply opacity-50;
}
.dashboard-sections.active:nth-child(2) .icon::before {
    @apply opacity-50;
}
.dashboard-sections.active:nth-child(3) .icon::before {
    @apply opacity-50;
}
.dashboard-sections.active:nth-child(5) .icon::before {
    @apply opacity-50;
}
.dashboard-sections.active:nth-child(6) .icon::before {
    @apply opacity-50;
}
.icon::after {
    border-radius: 0% 100% 100% 0% / 50% 50% 50% 50% ;
    opacity: 0;
    transform: scale(0);
}
.active .icon::after {
    opacity: 1;
    transform: scale(1);
}
</style>
