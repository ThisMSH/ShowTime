<script setup>
import DarkMode from '../components/utilities/DarkMode.vue';
import ToggleBtn from '../components/utilities/ToggleBtn.vue';
import CircleLogo from '../components/utilities/CircleLogo.vue';
import RectangularLogo from '../components/utilities/RectangularLogo.vue';
import { ref, onMounted } from 'vue';
import { Icon } from '@iconify/vue';

const sideDashboardMenu = ref(null);
const toggleBtn = ref(null);
const toggleBtnContainer = ref(null);
const CircLogo = ref(null);
const RectLogo = ref(null);
const toggleSideMenu = function () {
    const switchingArrows = toggleBtn.value.$el.querySelector("#icon-arrow");
    sideDashboardMenu.value.classList.toggle("w-20");
    sideDashboardMenu.value.classList.toggle("w-64");
    switchingArrows.classList.toggle("rotate-z-180");
    toggleBtnContainer.value.classList.toggle("left-64");
    toggleBtnContainer.value.classList.toggle("left-1/2");
    CircLogo.value.classList.toggle("flex");
    CircLogo.value.classList.toggle("hidden");
    RectLogo.value.classList.toggle("flex");
    RectLogo.value.classList.toggle("hidden");
};
const toggleDashboardSections = function () {
    const dashboardSections = document.querySelectorAll(".dashboard-sections");
    
    dashboardSections.forEach((element) => {
        element.addEventListener("click", function () {
            dashboardSections.forEach((item) => {
                item.classList.remove("active");
                this.classList.add("active");
            });
        });
    });
}

onMounted(() => {
    
});
</script>

<template>
    <DarkMode class="absolute top-0 right-11" />
    <aside class="">
        <div ref="sideDashboardMenu" class="bg-slate-600 navigation fixed inset-y-10 right-0 left-5 w-20 flex flex-col justify-center items-center transition-all duration-500">
            <!-- Logo -->
            <div class="absolute top-0 w-full h-20 flex justify-center items-center">
                <div class="flex justify-center items-center transition-all duration-500" ref="CircLogo">
                    <RouterLink to="/" class="w-16">
                        <CircleLogo class="w-full" />
                    </RouterLink>
                </div>
                <div class="hidden justify-center items-center transition-all duration-500" ref="RectLogo">
                    <RouterLink to="/" class="w-5/6">
                        <RectangularLogo class="w-full" />
                    </RouterLink>
                </div>
            </div>
            <!-- Side menu toggle -->
            <div class="menuToggle absolute top-20 left-0 w-full h-20">
                <div class="absolute top-0 left-0 w-full h-1/2 border-b border-slate-950/25"></div>
                <div class="absolute top-0 left-0 w-full h-full">
                    <div class="relative inline-block top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transition-all duration-500" ref="toggleBtnContainer">
                        <ToggleBtn class="relative" ref="toggleBtn" @click="toggleSideMenu" />
                    </div>
                </div>
            </div>
            <!-- Side menu contents -->
            <ul class="flex flex-col w-full child:relative child:w-full child:h-20 child:rounded-xl child:border-8 child:border-transparent child:transition-all child:duration-500 child:before:absolute child:before:w-5 child:before:h-5 child:before:rounded-br-3xl child:before:shadow-[6px_5px_0_5px] child:before:dark:shadow-slate-950 child:before:-right-3 child:before:-top-7 child:before:opacity-0 child:before:scale-0 child:before:transition-all child:before:duration-500 child:before:origin-bottom-right child:after:absolute child:after:w-5 child:after:h-5 child:after:rounded-tr-3xl child:after:shadow-[6px_-5px_0_5px] child:after:dark:shadow-slate-950 child:after:-right-3 child:after:-bottom-7 child:after:opacity-0 child:after:scale-0 child:after:transition-all child:after:duration-500 child:after:origin-bottom-right">
                <li @click="toggleDashboardSections" class="dashboard-sections active">
                    <RouterLink class="relative flex items-center w-full text-center no-underline z-10" to="" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-lg
                         text-5xl before:absolute before:top-3 before:w-full before:h-full before:blur-md before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:bg-red-500 after:dark:bg-red-600"><Icon icon="ic:baseline-person" /></span>
                        <span class="">Personal Information</span>
                    </RouterLink>
                </li>
                <li @click="toggleDashboardSections" class="dashboard-sections">
                    <RouterLink class="relative flex items-center w-full text-center no-underline z-10" to="" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-lg
                         text-5xl before:absolute before:top-3 before:w-full before:h-full before:blur-md before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:bg-sky-400 after:dark:bg-sky-600"><Icon icon="ic:baseline-favorite" /></span>
                        <span class="">My Favorites</span>
                    </RouterLink>
                </li>
                <li @click="toggleDashboardSections" class="dashboard-sections">
                    <RouterLink class="relative flex items-center w-full text-center no-underline z-10" to="" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-lg
                         text-5xl before:absolute before:top-3 before:w-full before:h-full before:blur-md before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:bg-orange-400 after:dark:bg-orange-500"><Icon icon="streamline:money-cash-bag-dollar-bag-payment-cash-money-finance" /></span>
                        <span class="">Pricing</span>
                    </RouterLink>
                </li>
                <li>
                    Admin
                </li>
                <li @click="toggleDashboardSections" class="dashboard-sections">
                    <RouterLink class="relative flex items-center w-full text-center no-underline z-10" to="" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-lg
                         text-5xl before:absolute before:top-3 before:w-full before:h-full before:blur-md before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:bg-lime-400 after:dark:bg-lime-600"><Icon icon="ic:round-manage-accounts" /></span>
                        <span class="">Users Information</span>
                    </RouterLink>
                </li>
                <li @click="toggleDashboardSections" class="dashboard-sections">
                    <RouterLink class="relative flex items-center w-full text-center no-underline z-10" to="" >
                        <span class="icon relative flex justify-center items-center min-w-[64px] h-16 rounded-lg
                         text-5xl before:absolute before:top-3 before:w-full before:h-full before:blur-md before:opacity-0 before:transition-all before:duration-500 before:z-[-1] after:absolute after:w-4 after:h-4 after:bg-violet-400 after:dark:bg-violet-600"><Icon icon="ic:outline-video-settings" /></span>
                        <span class="">Shows Management</span>
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
    clip-path: polygon(0 0, 0% 100%, 100% 50%);
}
</style>
