<script setup>
import { Icon } from '@iconify/vue';
import CircleLogo from './utilities/CircleLogo.vue';
import H4 from './utilities/H4.vue';

const currentYear = new Date().getFullYear();
</script>

<template>
    <footer>
        <div
            class="max-sm:px-3 md:px-20 grid sm:max-lg:grid-cols-[repeat(3,_minmax(0,_auto))] lg:grid-cols-[repeat(5,_minmax(0,_auto))] max-sm:gap-y-6 gap-2 lg:gap-0">
            <div class="flex justify-center p-5 sm:max-lg:row-start-1 sm:max-lg:row-span-2">
                <RouterLink class="" to="/">
                    <CircleLogo class="w-32 xl:w-40" />
                </RouterLink>
            </div>
            <div>
                <H4 title="Categories" />
                <ul class="flex flex-col gap-y-1">
                    <li>
                        <RouterLink to=""
                            class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                            Series</RouterLink>
                    </li>
                    <li>
                        <RouterLink to=""
                            class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                            Movies</RouterLink>
                    </li>
                    <li>
                        <RouterLink to=""
                            class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        Anime Series</RouterLink>
                </li>
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        Anime Movies</RouterLink>
                </li>
            </ul>
        </div>
        <div>
            <H4 title="Support & Service" />
            <ul class="flex flex-col gap-y-1">
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        Terms of Use</RouterLink>
                </li>
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        Privacy Policy</RouterLink>
                </li>
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        Help/FAQ</RouterLink>
                </li>
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        License</RouterLink>
                </li>
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        Contact Us</RouterLink>
                </li>
            </ul>
        </div>
        <div>
            <H4 title="ShowTime" />
            <ul class="flex flex-col gap-y-1">
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        About</RouterLink>
                </li>
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        News</RouterLink>
                </li>
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        Store</RouterLink>
                </li>
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        Games</RouterLink>
                </li>
            </ul>
        </div>
        <div>
            <H4 title="Account" />
            <ul class="flex flex-col gap-y-1">
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        Create Account</RouterLink>
                </li>
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        Log In</RouterLink>
                </li>
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-block transition-all hover:underline hover:underline-offset-2 hover:translate-x-2">
                        Pricing</RouterLink>
                </li>
                <li>
                    <RouterLink to=""
                        class="text-sm lg:text-base inline-flex gap-x-2 transition-all hover:underline hover:underline-offset-2 hover:translate-x-2 text-orange-500 dark:text-orange-400">
                        <Icon icon="mdi:crown" class="text-xl" /> Become Premium
                    </RouterLink>
                </li>
            </ul>
        </div>
    </div>
    <div class="mt-5 lg:mt-8">
        <div class="flex justify-center items-center">
            <ul class="flex text-2xl md:text-4xl gap-x-5">
                <li><a href="#" target="_blank"
                        class="inline-block transition-all hover:text-[#FF0000] hover:-translate-y-2">
                        <Icon icon="fa6-brands:youtube" />
                    </a></li>
                <li><a href="#" target="_blank"
                        class="inline-block transition-all hover:text-[#4267B2] hover:-translate-y-2">
                        <Icon icon="fa6-brands:square-facebook" />
                    </a></li>
                <li><a href="#" target="_blank"
                        class="inline-block transition-all hover:text-[#1DA1F2] hover:-translate-y-2">
                        <Icon icon="fa6-brands:square-twitter" />
                    </a></li>
                <li><a href="#" target="_blank"
                        class="inline-block transition-all hover:text-[#833AB4] hover:-translate-y-2">
                        <Icon icon="fa6-brands:instagram" />
                    </a></li>
                <li><a href="#" target="_blank"
                        class="inline-block transition-all hover:text-[#0077b5] hover:-translate-y-2">
                        <Icon icon="fa6-brands:linkedin" />
                    </a></li>
            </ul>
        </div>
        <div class="border-b border-slate-300 dark:border-slate-600"></div>
        <div>
            <p class="text-sm text-center text-slate-600 dark:text-slate-400 p-2">© {{ currentYear }} ShowTime, all
                rights reserved. Made with ❤️</p>
        </div>
    </div>
</footer></template>

<style></style>
