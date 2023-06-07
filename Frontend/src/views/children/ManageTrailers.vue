<script setup>
import H4 from '../../components/utilities/H4.vue';
import AdminCreatePromo from '../../components/modals/AdminCreatePromo.vue';
import AdminUpdatePromo from '../../components/modals/AdminUpdatePromo.vue';
import AdminDeletePromo from '../../components/modals/AdminDeletePromo.vue';
import { initFlowbite } from 'flowbite';
import { onMounted } from 'vue';
import { useTrailerStore } from '../../stores/trailer';

const trailerStore = useTrailerStore();

document.title = "Dashboard - Trailers Management - ShowTime";

onMounted(async () => {
    await trailerStore.fetchAllTrailers();
    initFlowbite();
});
</script>

<template>
    <div class="mt-16">
        <!-- Creating Trailers -->
        <div class="flex flex-wrap items-center justify-between gap-3 mt-10">
            <H4 class="mb-0" title="List of all the shows with their trailers" />
            <template v-if="trailerStore.getAllTrailers">
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <AdminCreatePromo />
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
            <div class="">
                <div class="inline-block min-w-full align-middle">
                    <div class="shadow ring-1 ring-black ring-opacity-5">
                        <!-- Main table, contains shows -->
                        <table class="min-w-full border divide-y divide-slate-400 border-slate-400 dark:border-slate-500">
                            <thead class="sticky top-0 z-10 bg-slate-300 dark:bg-slate-900">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6" colspan="2">Title
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Category
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-700 dark:divide-slate-200 bg-slate-300 dark:bg-slate-700" data-accordion="collapse" data-inactive-classes="bg-slate-200 dark:bg-slate-800" data-active-classes="bg-slate-300 dark:bg-slate-700">
                                <template v-if="trailerStore.getAllTrailers" v-for="show in trailerStore.getAllTrailers" :key="show.id">
                                    <tr class="bg-slate-200 dark:bg-slate-800" :id="`show-name-${show.id}`" :data-accordion-target="`#show-episodes-${show.id}`" aria-expanded="false" :aria-controls="`show-episodes-${show.id}`">
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
                                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">YouTube ID
                                                        </th>
                                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Show
                                                        </th>
                                                        <th scope="col" class="py-3.5 pl-3 pr-4 sm:pr-6">
                                                            <span class="sr-only">MANAGE</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="divide-y divide-neutral-700 dark:divide-neutral-200 bg-neutral-300 dark:bg-neutral-800">
                                                    <template v-for="trailer in show.relationships.trailers.list" :key="trailer.id">
                                                        <tr>
                                                            <td class="py-4 pl-4 pr-3 text-sm whitespace-nowrap sm:pl-6">
                                                                <div class="font-medium">{{ trailer.attributes.title }}</div>
                                                            </td>
                                                            <td class="px-3 py-4 text-sm whitespace-nowrap text-neutral-900 dark:text-neutral-200">
                                                                <div class="">{{ trailer.attributes.trailer }}</div>
                                                            </td>
                                                            <td class="px-3 py-4 text-sm whitespace-nowrap text-neutral-900 dark:text-neutral-200">
                                                                <div class="">{{ trailer.relationships.show.title }}{{ trailer.relationships.show.season ? ' - ' + trailer.relationships.show.season : '' }}</div>
                                                            </td>
                                                            <td
                                                                class="relative flex py-4 pl-3 pr-4 text-sm font-medium text-right gap-x-5 whitespace-nowrap sm:pr-6">
                                                                <AdminUpdatePromo :trailer="trailer" />
                                                                <AdminDeletePromo :trailer="trailer" />
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
