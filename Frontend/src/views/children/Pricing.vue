<script setup>
import { Icon } from '@iconify/vue';
import NoBlackBgButton from '../../components/utilities/NoBlackBgButton.vue';

document.title = "Dashboard - Pricing - ShowTime";
</script>

<template>
    <div class="grid grid-cols-2 p-16 mt-16 border gap-x-16 gap-y-20 bg-slate-300 dark:bg-slate-800 rounded-2xl border-l-slate-600 border-t-slate-600 border-slate-900 dark:border-l-slate-400 dark:border-t-slate-400 dark:border-slate-600">
        <div class="col-span-2">
            <h1 class="mb-4 text-2xl font-bold sm:text-3xl lg:text-5xl">Pricing Plans</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus, mollitia quaerat esse quisquam tempore, neque odio nulla dolore sit est expedita at cumque? Maiores ipsam optio mollitia nulla amet et?</p>
        </div>
        <div class="px-6 py-8 bg-white border dark:bg-black rounded-xl border-l-slate-600 border-t-slate-600 border-slate-900 dark:border-l-slate-400 dark:border-t-slate-400 dark:border-slate-600">
            <div class="">
                <h6 class="mb-2 font-medium">Regular Account</h6>
                <h3 class="mb-6 text-2xl font-semibold sm:text-3xl lg:text-4xl">Free</h3>
                <div class="mb-16">
                    <p class="mb-5">Having a free account will provide you with these features:</p>
                    <ul class="flex flex-col list-none gap-y-5 child:flex child:items-center child:text-sm child:gap-x-4">
                        <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>Watch with ads</span></li>
                        <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>Limited access to the our library</span></li>
                        <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>Watch free shows</span></li>
                        <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>48-hour support response time</span></li>
                    </ul>
                </div>
            </div>
            <NoBlackBgButton class="w-5/6 -translate-x-1/2 left-1/2" name="Your current plan" :hide="true" />
        </div>
        <div class="relative px-6 py-8 bg-white border dark:bg-black rounded-xl border-l-slate-600 border-t-slate-600 border-slate-900 dark:border-l-slate-400 dark:border-t-slate-400 dark:border-slate-600">
            <div class="absolute -top-10 -left-7 -rotate-[30deg]">
                <Icon icon="mdi:crown" class="text-orange-500 text-7xl" />
            </div>
            <div class="">
                <h6 class="mb-2 font-medium">Premium Account</h6>
                <h3 class="mb-6 text-2xl font-semibold sm:text-3xl lg:text-4xl">$ 5<span class="text-base font-medium">/month</span></h3>
                <div class="mb-16">
                    <p class="mb-5">Having a <span class="">premium</span> account will provide you with these features:</p>
                    <ul class="flex flex-col list-none gap-y-5 child:flex child:items-center child:text-sm child:gap-x-4">
                        <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>No ads</span></li>
                        <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>Unlimited access to the our library</span></li>
                        <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>Watch free <span>& premium</span> shows</span></li>
                        <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>24-hour support response time</span></li>
                    </ul>
                </div>
            </div>
            <NoBlackBgButton class="w-5/6 -translate-x-1/2 left-1/2" name="Become a premium member" :hide="true" />
        </div>
    </div>
</template>
