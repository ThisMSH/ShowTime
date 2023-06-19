<script setup>
import H4 from '../../components/utilities/H4.vue';
import AdminCreateRecommendation from '../../components/modals/AdminCreateRecommendation.vue';
import { onMounted } from 'vue';
import { useRecommendationStore } from '../../stores/recommendation';
import { useShowStore } from '../../stores/show';
import AdminUpdateRecommendation from '../../components/modals/AdminUpdateRecommendation.vue';
import AdminDeleteRecommendation from '../../components/modals/AdminDeleteRecommendation.vue';

const recStore = useRecommendationStore();
const showStore = useShowStore();

document.title = "Dashboard - Shows Management - ShowTime";

onMounted(async () => {
    await recStore.fetchAllRecommendations();
    if (!showStore.getAllShows) {
        await showStore.fetchAllShows();
    }
});
</script>

<template>
    <div class="mt-16">
        <!-- Creating Shows -->
        <div class="flex flex-wrap items-center justify-between gap-3 mt-10">
            <H4 class="mb-0" title="List of all the recommendations" />
            <template v-if="recStore.getRecommendations">
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <AdminCreateRecommendation />
                </div>
            </template>
            <template v-else>
                <div role="status" class="animate-pulse">
                    <div class="rounded-full h-14 w-44 bg-slate-200 dark:bg-slate-800"></div>
                    <span class="sr-only">Loading...</span>
                </div>
            </template>
        </div>
        <!-- Shows Management -->
        <div class="flex flex-col mt-10">
            <!-- <div class="overflow-x-auto max-w-[1200px]"> -->
            <div class="">
                <div class="inline-block min-w-full align-middle">
                    <div class="shadow ring-1 ring-black ring-opacity-5">
                        <table class="min-w-full border divide-y divide-slate-400 border-slate-400 dark:border-slate-500">
                            <thead class="sticky top-0 z-10 bg-slate-200 dark:bg-slate-900">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6">Logo
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Character
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Color
                                    </th>
                                    <th scope="col" class="py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">MANAGE</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700 dark:divide-slate-200 bg-slate-300 dark:bg-slate-700">
                                <template v-if="recStore.getRecommendations" v-for="rec in recStore.getRecommendations" :key="rec.id">
                                    <tr class="bg-slate-400 dark:bg-slate-800">
                                        <td class="px-3 py-4 text-slate-950 dark:text-slate-300 font-semibold">
                                            <p>Show:</p>
                                        </td>
                                        <td colspan="3" class="px-3 py-4 text-slate-950 dark:text-slate-300 font-semibold">
                                            <p :title="`${rec.relationships.show.title}${rec.relationships.show.season ? ' - ' + rec.relationships.show.season : ''}`" class="line-clamp-2">{{ rec.relationships.show.title }}{{ rec.relationships.show.season ? ' - ' + rec.relationships.show.season : '' }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-4 pl-4 pr-3 text-sm sm:pl-6">
                                            <div class="flex items-center">
                                                <div class="">
                                                    <img class="w-20 min-w-[60px] rounded-md" :src="rec.attributes.logo" :alt="`${rec.relationships.show.title}'s logo`" />
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 pl-4 pr-3 text-sm sm:pl-6">
                                            <div class="flex items-center">
                                                <div class="">
                                                    <img class="w-20 min-w-[60px] rounded-md" :src="rec.attributes.character" :alt="`${rec.relationships.show.title}'s character`" />
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                            <p class="font-medium line-clamp-3">{{ rec.attributes.color.charAt(0).toUpperCase() + rec.attributes.color.slice(1) }}</p>
                                        </td>
                                        <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                                            <div class="flex items-center justify-center gap-x-5">
                                                <AdminUpdateRecommendation :rec="rec" />
                                                <AdminDeleteRecommendation :rec="rec" />
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="4">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
