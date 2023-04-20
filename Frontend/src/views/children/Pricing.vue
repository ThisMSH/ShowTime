<script setup>
import DashboardHeader from '../../components/DashboardHeader.vue';
import { Icon } from '@iconify/vue';
import DefaultButton from '../../components/utilities/DefaultButton.vue';
import NoBlackBgButton from '../../components/utilities/NoBlackBgButton.vue';
import FooterRights from '../../components/utilities/FooterRights.vue';
</script>

<template>
    <div>
        <DashboardHeader tabName="Pricing" />
        <div class="mt-16 p-16 grid grid-cols-2 gap-x-16 gap-y-20 bg-slate-300 dark:bg-slate-800 rounded-2xl border border-l-slate-600 border-t-slate-600 border-slate-900 dark:border-l-slate-400 dark:border-t-slate-400 dark:border-slate-600">
            <div class="col-span-2">
                <h1 class="mb-4 text-2xl sm:text-3xl lg:text-5xl font-bold">Pricing Plans</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus, mollitia quaerat esse quisquam tempore, neque odio nulla dolore sit est expedita at cumque? Maiores ipsam optio mollitia nulla amet et?</p>
            </div>
            <div class="px-6 py-8 bg-white dark:bg-black rounded-xl border border-l-slate-600 border-t-slate-600 border-slate-900 dark:border-l-slate-400 dark:border-t-slate-400 dark:border-slate-600">
                <div class="">
                    <h6 class="font-medium mb-2">Regular Account</h6>
                    <h3 class="text-2xl sm:text-3xl lg:text-4xl font-semibold mb-6">Free</h3>
                    <div class="mb-16">
                        <p class="mb-5">Having a free account will provide you with these features:</p>
                        <ul class="list-none flex flex-col gap-y-5 child:flex child:items-center child:text-sm child:gap-x-4">
                            <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>Watch with ads</span></li>
                            <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>Limited access to the our library</span></li>
                            <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>Watch free shows</span></li>
                            <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>48-hour support response time</span></li>
                        </ul>
                    </div>
                </div>
                <NoBlackBgButton class="w-5/6 left-1/2 -translate-x-1/2" name="Your current plan" :hide="true" />
            </div>
            <div class="relative px-6 py-8 bg-white dark:bg-black rounded-xl border border-l-slate-600 border-t-slate-600 border-slate-900 dark:border-l-slate-400 dark:border-t-slate-400 dark:border-slate-600">
                <div class="absolute -top-10 -left-7 -rotate-[30deg]">
                    <Icon icon="mdi:crown" class="text-7xl text-orange-500" />
                </div>
                <div class="">
                    <h6 class="font-medium mb-2">Premium Account</h6>
                    <h3 class="text-2xl sm:text-3xl lg:text-4xl font-semibold mb-6">$ 32<span class="text-base font-medium">/mounth</span></h3>
                    <div class="mb-16">
                        <p class="mb-5">Having a <span class="">premium</span> account will provide you with these features:</p>
                        <ul class="list-none flex flex-col gap-y-5 child:flex child:items-center child:text-sm child:gap-x-4">
                            <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>No ads</span></li>
                            <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>Unlimited access to the our library</span></li>
                            <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>Watch free <span>& premium</span> shows</span></li>
                            <li><Icon icon="ic:round-check" class="text-2xl text-orange-500" /><span>24-hour support response time</span></li>
                        </ul>
                    </div>
                </div>
                <NoBlackBgButton class="w-5/6 left-1/2 -translate-x-1/2" name="Become a premium member" :hide="true" />
            </div>
        </div>
        <FooterRights />
    </div>
</template>

<style>

</style>
