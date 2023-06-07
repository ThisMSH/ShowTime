<script setup>
import H4 from '../../components/utilities/H4.vue';
import { Icon } from '@iconify/vue';
import AdminCreateShow from '../../components/modals/AdminCreateShow.vue';
import AdminUpdateShow from '../../components/modals/AdminUpdateShow.vue';
import AdminDeleteShow from '../../components/modals/AdminDeleteShow.vue';
import { useShowStore } from '../../stores/show';
import { onMounted } from 'vue';
import { useCategoryStore } from '../../stores/category';

const categoryStore = useCategoryStore();
const showStore = useShowStore();

document.title = "Dashboard - Shows Management - ShowTime";

onMounted(async () => {
    await categoryStore.fetchAllCategories();
    await showStore.fetchAllShows();
});
</script>

<template>
    <div class="mt-16">
        <!-- Statistics -->
        <dl class="grid grid-cols-1 gap-5 mt-5 md:grid-cols-3">
            <div
                class="flex items-center px-4 py-5 overflow-hidden rounded-lg shadow gap-x-3 bg-slate-200 dark:bg-slate-800 sm:p-6">
                <div class="p-2 text-4xl text-white rounded-lg bg-gradient-to-tl from-blue-700 to-sky-400">
                    <Icon class="stroke-2" icon="arcticons:anilib" />
                </div>
                <div>
                    <dt class="text-sm font-medium truncate text-slate-700 dark:text-slate-300">
                        Total Anime
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold">
                        {{ showStore.getAllShows?.total_anime }}
                    </dd>
                </div>
            </div>
            <div
                class="flex items-center px-4 py-5 overflow-hidden rounded-lg shadow gap-x-3 bg-slate-200 dark:bg-slate-800 sm:p-6">
                <div class="p-2 text-4xl text-white rounded-lg bg-gradient-to-tl from-red-900 to-orange-500">
                    <Icon icon="fluent:movies-and-tv-24-filled" />
                </div>
                <div>
                    <dt class="text-sm font-medium truncate text-slate-700 dark:text-slate-300">
                        Total Live Action
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold">
                        {{ showStore.getAllShows?.total_liveaction }}
                    </dd>
                </div>
            </div>
            <div
                class="flex items-center px-4 py-5 overflow-hidden rounded-lg shadow gap-x-3 bg-slate-200 dark:bg-slate-800 sm:p-6">
                <div class="p-2 text-4xl text-white rounded-lg bg-gradient-to-tl from-green-700 to-lime-400">
                    <Icon icon="system-uicons:episodes" />
                </div>
                <div>
                    <dt class="text-sm font-medium truncate text-slate-700 dark:text-slate-300">
                        Total Episodes
                    </dt>
                    <dd class="mt-1 text-3xl font-semibold">
                        {{ showStore.getAllShows?.total_episodes }}
                    </dd>
                </div>
            </div>
        </dl>
        <!-- Creating Shows -->
        <div class="flex flex-wrap items-center justify-between gap-3 mt-10">
            <H4 class="mb-0" title="List of all the shows" />
            <template v-if="showStore.getAllShows">
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <AdminCreateShow />
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
                            <thead class="sticky top-0 z-10 bg-slate-200 dark:bg-slate-800">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6">Cover
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Title
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Season
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Category
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Prequel
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Sequel
                                    </th>
                                    <th scope="col" class="py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">MANAGE</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700 dark:divide-slate-200 bg-slate-300 dark:bg-slate-700">
                                <template v-if="showStore.getAllShows" v-for="show in showStore.getAllShows.shows" :key="show.id">
                                    <tr>
                                        <td class="py-4 pl-4 pr-3 text-sm sm:pl-6">
                                            <div class="flex items-center">
                                                <div class="">
                                                    <img class="w-20 min-w-[60px] rounded-md" :src="show.attributes.cover" :alt="`${show.attributes.title}'s cover`" />
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                            <p :title="show.attributes.title" class="font-medium line-clamp-3">{{ show.attributes.title }}</p>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                            <p :title="show.attributes.season" class="line-clamp-3">{{ show.attributes.season }}</p>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                            <p :title="show.relationships.category.name" class="line-clamp-3">{{ show.relationships.category.name }}</p>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                            <p :title="`${show.relationships.prequel.title}${show.relationships.prequel.season ? ' - ' + show.relationships.prequel.season : ''}`" class="line-clamp-3">{{ show.relationships.prequel.title }}{{ show.relationships.prequel.season ? ' - ' + show.relationships.prequel.season : '' }}</p>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                            <p :title="`${show.relationships.sequel.title}${show.relationships.sequel.season ? ' - ' + show.relationships.sequel.season : ''}`" class="line-clamp-3">{{ show.relationships.sequel.title }}{{ show.relationships.sequel.season ? ' - ' + show.relationships.sequel.season : '' }}</p>
                                        </td>
                                        <td class="py-4 pl-3 pr-4 text-sm font-medium text-right sm:pr-6">
                                            <div class="flex items-center gap-x-5">
                                                <AdminUpdateShow :show="show" />
                                                <AdminDeleteShow :showID="show.id" :showTitle="show.attributes.title" :showSeason="show.attributes.season" />
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="7">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <div role="status" class="p-4 animate-pulse">
                                                <div class="h-20 rounded-md bg-slate-200 dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
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
