<script setup>
import DefaultButton from '../../components/utilities/DefaultButton.vue';
import H4 from '../../components/utilities/H4.vue';
import { Icon } from '@iconify/vue';
import AdminCreateShow from '../../components/modals/AdminCreateShow.vue';
import AdminCreateEpisode from '../../components/modals/AdminCreateEpisode.vue';
import AdminCreatePromo from '../../components/modals/AdminCreatePromo.vue';
import AdminUpdateShow from '../../components/modals/AdminUpdateShow.vue';
import AdminDeleteShow from '../../components/modals/AdminDeleteShow.vue';
import { initFlowbite } from 'flowbite';
import { onMounted, ref } from 'vue';
import { useShowStore } from '../../stores/show';
import { useEpisodeStore } from '../../stores/episode';

const showStore = useShowStore();
const episodeStore = useEpisodeStore();

let epiShows = ref([]);

document.title = "Dashboard - Episodes Management - ShowTime";

onMounted(async () => {
    await showStore.fetchAllShows();
    const shows = showStore.getAllShows;

    for (const show of shows.shows) {
        await showStore.fetchShow(show.id)
        epiShows.value.push(showStore.getSingleShow);
    }
    console.log(epiShows.value);

    initFlowbite();
});
</script>

<template>
    <div class="mt-16">
        <!-- Creating Episodes -->
        <div class="mt-10 flex justify-between items-center gap-3 flex-wrap">
            <H4 class="mb-0" title="List of all the shows" />
            <template v-if="showStore.getAllShows">
                <div class="flex justify-center items-center gap-3 flex-wrap">
                    <AdminCreateEpisode />
                    <AdminCreatePromo />
                </div>
            </template>
            <template v-else>
                <div role="status" class="animate-pulse">
                    <div class="h-14 w-44 bg-slate-200 rounded-full dark:bg-slate-800"></div>
                    <span class="sr-only">Loading...</span>
                </div>
            </template>
        </div>
        <!-- Shows Management -->
        <div class="mt-10 flex flex-col">
            <div class="">
                <div class="inline-block min-w-full align-middle">
                    <div class="shadow ring-1 ring-black ring-opacity-5">
                        <!-- Main table, contains shows -->
                        <table class="min-w-full divide-y divide-slate-400 border border-slate-400 dark:border-slate-500">
                            <thead class="sticky top-0 z-10 bg-slate-300 dark:bg-slate-900">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6" colspan="2">Title
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Category
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700 dark:divide-slate-200 bg-slate-300 dark:bg-slate-700" data-accordion="collapse" data-inactive-classes="bg-slate-200 dark:bg-slate-800" data-active-classes="bg-slate-300 dark:bg-slate-700">
                                <template v-if="!showStore.allShowsLoading" v-for="show in epiShows" :key="show.show.id">
                                    <tr class="bg-slate-200 dark:bg-slate-800" :id="`show-name-${show.show.id}`" :data-accordion-target="`#show-episodes-${show.show.id}`" aria-expanded="false" :aria-controls="`show-episodes-${show.show.id}`">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                    <img class="w-20 min-w-[60px] rounded-md" :src="show.show.attributes.cover" :alt="`${show.show.attributes.title} ${show.show.attributes.season}\'s cover`" />
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                            <div class="font-medium">{{ show.show.attributes.title }} - {{ show.show.attributes.season }}</div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                            <div class="">{{ show.show.relationships.category.name }}</div>
                                        </td>
                                    </tr>
                                    <tr class="hidden" :id="`show-episodes-${show.show.id}`" :aria-labelledby="`show-name-${show.show.id}`">
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
                                                    <template v-for="episode in show.episodes" :key="episode.id">
                                                        <tr>
                                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                                <div class="font-medium">{{ episode.attributes.title }}</div>
                                                            </td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-neutral-900 dark:text-neutral-200">
                                                                <div class="">{{ episode.attributes.number }}</div>
                                                            </td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-neutral-900 dark:text-neutral-200">
                                                                <div class="">{{ episode.attributes.premium == 0 ? "Free" : "Premium" }}</div>
                                                            </td>
                                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-neutral-900 dark:text-neutral-200">
                                                                <div class="">{{ episode.relationships.show.title }} - {{ episode.relationships.show.season }}</div>
                                                            </td>
                                                            <td
                                                                class="relative flex gap-x-5 whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                <button :id="`delete-btn-${showID}`" type="button" class="flex items-center gap-x-3 px-4 py-1 bg-red-400 dark:bg-red-600 text-black dark:text-white rounded-md hover:bg-red-500 hover:dark:bg-red-700" :data-modal-target="`delete-show-${showID}`" :data-modal-toggle="`delete-show-${showID}`">
                                                                    <Icon class="text-lg" icon="material-symbols:delete-outline-rounded" />
                                                                    <span>Delete</span>
                                                                </button>
                                                                <button type="button" class="flex items-center gap-x-3 px-4 py-1 bg-sky-400 dark:bg-sky-600 text-black dark:text-white rounded-md hover:bg-sky-300 hover:dark:bg-sky-700" :data-modal-toggle="`show-${show.id}`">
                                                                    <Icon class="text-lg" icon="material-symbols:edit-outline-rounded" />
                                                                    <span>Edit</span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                            <!-- End of episodes list -->
                                        </td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="3">
                                            <div role="status" class="animate-pulse p-4">
                                                <div class="h-20 bg-slate-200 rounded-md dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div role="status" class="animate-pulse p-4">
                                                <div class="h-20 bg-slate-200 rounded-md dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div role="status" class="animate-pulse p-4">
                                                <div class="h-20 bg-slate-200 rounded-md dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div role="status" class="animate-pulse p-4">
                                                <div class="h-20 bg-slate-200 rounded-md dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <div role="status" class="animate-pulse p-4">
                                                <div class="h-20 bg-slate-200 rounded-md dark:bg-slate-800"></div>
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
