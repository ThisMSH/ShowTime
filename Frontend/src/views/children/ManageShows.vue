<script setup>
import DashboardHeader from '../../components/DashboardHeader.vue';
import FooterRights from '../../components/utilities/FooterRights.vue';
import { Icon } from '@iconify/vue';
</script>

<template>
    <div>
        <DashboardHeader tabName="Shows Management" />
        <div class="mt-16">
            <!-- Statistics -->
            <dl class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-3">
                <div
                    class="px-4 py-5 flex items-center gap-x-3 bg-slate-200 dark:bg-slate-800 shadow rounded-lg overflow-hidden sm:p-6">
                    <div class="text-white text-4xl p-2 rounded-lg bg-gradient-to-tl from-blue-700 to-sky-400">
                        <Icon class="stroke-2" icon="arcticons:anilib" />
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-slate-700 dark:text-slate-300 truncate">
                            Total Anime
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold">
                            78531
                        </dd>
                    </div>
                </div>
                <div
                    class="px-4 py-5 flex items-center gap-x-3 bg-slate-200 dark:bg-slate-800 shadow rounded-lg overflow-hidden sm:p-6">
                    <div class="text-white text-4xl p-2 rounded-lg bg-gradient-to-tl from-red-900 to-orange-500">
                        <Icon icon="fluent:movies-and-tv-24-filled" />
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-slate-700 dark:text-slate-300 truncate">
                            Total Live Action
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold">
                            78531
                        </dd>
                    </div>
                </div>
                <div
                    class="px-4 py-5 flex items-center gap-x-3 bg-slate-200 dark:bg-slate-800 shadow rounded-lg overflow-hidden sm:p-6">
                    <div class="text-white text-4xl p-2 rounded-lg bg-gradient-to-tl from-green-700 to-lime-400">
                        <Icon icon="system-uicons:episodes" />
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-slate-700 dark:text-slate-300 truncate">
                            Total Episodes
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold">
                            78531
                        </dd>
                    </div>
                </div>
            </dl>
            <!-- Shows Management -->
            <div>

            </div>
        </div>
        <FooterRights />
    </div>
</template>

<style></style>
