<script setup>
import H4 from '../../components/utilities/H4.vue';
import AdminCreateEpisode from '../../components/modals/AdminCreateEpisode.vue';
import AdminUpdateEpisode from '../../components/modals/AdminUpdateEpisode.vue';
import AdminDeleteEpisode from '../../components/modals/AdminDeleteEpisode.vue';
import { initFlowbite } from 'flowbite';
import { onMounted } from 'vue';
import { useEpisodeStore } from '../../stores/episode';

const episodeStore = useEpisodeStore();

document.title = "Dashboard - Episodes Management - ShowTime";

onMounted(async () => {
    await episodeStore.fetchAllEpisodes();
    initFlowbite();
});
</script>

<template>
    <div class="mt-16">
        <!-- Creating Episodes -->
        <div class="flex flex-wrap items-center justify-between gap-3 mt-10">
            <H4 class="mb-0" title="List of all the shows with their episodes" />
            <template v-if="episodeStore.getAllEpisodes">
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <AdminCreateEpisode />
                </div>
            </template>
            <template v-else>
                <div role="status" class="animate-pulse">
                    <div class="rounded-full h-14 w-44 bg-slate-200 dark:bg-slate-800"></div>
                    <span class="sr-only">Loading...</span>
                </div>
            </template>
        </div>
        <!-- Episodes Management -->
        <div class="flex flex-col mt-10">
            <div class="">
                <div class="inline-block min-w-full align-middle">
                    <div class="py-2.5 bg-slate-200 dark:bg-slate-900 rounded-xl shadow ring-1 ring-white ring-opacity-20">
                        <!-- Main table, contains shows -->
                        <table class="min-w-full divide-y divide-slate-400">
                            <thead class="sticky top-0 z-10 bg-slate-200 dark:bg-slate-900">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6" colspan="2">Title
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Category
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700 dark:divide-slate-200 bg-slate-300 dark:bg-slate-700" data-accordion="collapse" data-inactive-classes="bg-slate-300 dark:bg-slate-800" data-active-classes="bg-slate-400 dark:bg-slate-700">
                                <template v-if="episodeStore.getAllEpisodes" v-for="show in episodeStore.getAllEpisodes" :key="show.id">
                                    <template v-if="show.relationships.episodes.list.length > 0">
                                        <tr class="bg-slate-300 dark:bg-slate-800" :id="`show-name-${show.id}`" :data-accordion-target="`#show-episodes-${show.id}`" aria-expanded="false" :aria-controls="`show-episodes-${show.id}`">
                                            <td class="py-4 pl-4 pr-3 text-sm whitespace-nowrap sm:pl-6">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0">
                                                        <img class="w-20 min-w-[60px] rounded-md" :src="show.attributes.cover" :alt="`${show.attributes.title} ${show.attributes.season}\'s cover`" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-3 py-4 text-sm whitespace-nowrap text-slate-700 dark:text-slate-300">
                                                <div class="font-medium">{{ show.attributes.title }}{{ show.attributes.season ? ' - ' + show.attributes.season : '' }}</div>
                                            </td>
                                            <td class="px-3 py-4 text-sm whitespace-nowrap text-slate-700 dark:text-slate-300">
                                                <div class="">{{ show.relationships.category.name }}</div>
                                            </td>
                                        </tr>
                                        <tr class="hidden" :id="`show-episodes-${show.id}`" :aria-labelledby="`show-name-${show.id}`">
                                            <td class="" colspan="3">
                                                <!-- Child table, contains episodes -->
                                                <table class="min-w-full divide-y divide-neutral-400">
                                                    <thead class="sticky top-0 z-10 bg-neutral-200 dark:bg-neutral-900">
                                                        <tr>
                                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6">Title
                                                            </th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Number
                                                            </th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Membership
                                                            </th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Show
                                                            </th>
                                                            <th scope="col" class="py-3.5 pl-3 pr-4 sm:pr-6">
                                                                <span class="sr-only">MANAGE</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-neutral-700 dark:divide-neutral-200 bg-neutral-300 dark:bg-neutral-800">
                                                        <template v-for="episode in show.relationships.episodes.list" :key="episode.id">
                                                            <tr>
                                                                <td class="py-4 pl-4 pr-3 text-sm whitespace-nowrap sm:pl-6">
                                                                    <div class="font-medium">{{ episode.attributes.title }}</div>
                                                                </td>
                                                                <td class="px-3 py-4 text-sm whitespace-nowrap text-neutral-900 dark:text-neutral-200">
                                                                    <div class="">{{ episode.attributes.number }}</div>
                                                                </td>
                                                                <td class="px-3 py-4 text-sm whitespace-nowrap text-neutral-900 dark:text-neutral-200">
                                                                    <div class="">{{ episode.attributes.premium == 0 ? "Free" : "Premium" }}</div>
                                                                </td>
                                                                <td class="px-3 py-4 text-sm whitespace-nowrap text-neutral-900 dark:text-neutral-200">
                                                                    <div class="">{{ episode.relationships.show.title }}{{ episode.relationships.show.season ? ' - ' + episode.relationships.show.season : '' }}</div>
                                                                </td>
                                                                <td
                                                                    class="relative flex py-4 pl-3 pr-4 text-sm font-medium text-right gap-x-5 whitespace-nowrap sm:pr-6">
                                                                    <AdminUpdateEpisode :episode="episode" />
                                                                    <AdminDeleteEpisode :epiID="episode.id" :episodeTitle="episode.attributes.title" />
                                                                </td>
                                                            </tr>
                                                        </template>
                                                    </tbody>
                                                </table>
                                                <!-- End of episodes list -->
                                            </td>
                                        </tr>
                                    </template>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="3">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
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
