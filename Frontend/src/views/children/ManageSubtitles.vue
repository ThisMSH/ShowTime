<script setup>
import H4 from '../../components/utilities/H4.vue';
import AdminCreateSubtitle from '../../components/modals/AdminCreateSubtitle.vue';
import AdminUpdateSubtitle from '../../components/modals/AdminUpdateSubtitle.vue';
import AdminDeleteSubtitle from '../../components/modals/AdminDeleteSubtitle.vue';
import { initFlowbite } from 'flowbite';
import { onMounted, ref } from 'vue';
import { useSubtitleStore } from '../../stores/subtitle';

const subtitleStore = useSubtitleStore();
const subCurrentIndex = ref(null);

function showSubs(idx) {
    if (subCurrentIndex.value != idx) {
        subCurrentIndex.value = idx;
    } else {
        subCurrentIndex.value = null;
    }
}

document.title = "Dashboard - Subtitles Management - ShowTime";

onMounted(async () => {
    await subtitleStore.fetchAllSubtitles();
    initFlowbite();
});
</script>

<template>
    <div class="mt-16">
        <!-- Creating Episodes -->
        <div class="flex flex-wrap items-center justify-between gap-3 mt-10">
            <H4 class="mb-0" title="List of all the shows with their episodes and subtitles" />
            <template v-if="subtitleStore.getAllSubtitles">
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <AdminCreateSubtitle />
                </div>
            </template>
            <template v-else>
                <div role="status" class="animate-pulse">
                    <div class="rounded-full h-14 w-44 bg-slate-200 dark:bg-slate-800"></div>
                    <span class="sr-only">Loading...</span>
                </div>
            </template>
        </div>
        <!-- Subtitles Management -->
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
                                <template v-if="subtitleStore.getAllSubtitles" v-for="show in subtitleStore.getAllSubtitles" :key="show.id">
                                    <template v-if="show.relationships.episodes.list.length > 0">
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
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Number
                                                            </th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Membership
                                                            </th>
                                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Show
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-neutral-700 dark:divide-neutral-200 bg-neutral-300 dark:bg-neutral-800">
                                                        <template v-for="(episode, index) in show.relationships.episodes.list" :key="episode.id">
                                                            <template v-if="episode.relationships.subtitles.list.length > 0">
                                                                <tr @click="showSubs(index)" :class="[subCurrentIndex == index ? 'bg-neutral-300 dark:bg-neutral-700' : '']">
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
                                                                </tr>
                                                                <tr v-show="subCurrentIndex == index">
                                                                    <td colspan="4">
                                                                        <!-- Grand child table, contains the subtitles -->
                                                                        <table class="min-w-full divide-y divide-orange-400">
                                                                            <thead class="sticky top-0 z-10 bg-orange-200 dark:bg-orange-900">
                                                                                <tr>
                                                                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6">Subtitle
                                                                                    </th>
                                                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">Episode
                                                                                    </th>
                                                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="bg-orange-300 divide-y divide-orange-700 dark:divide-orange-200 dark:bg-orange-800">
                                                                                <template v-for="subtitle in episode.relationships.subtitles.list" :key="subtitle.id">
                                                                                    <tr>
                                                                                        <td class="py-4 pl-4 pr-3 text-sm whitespace-nowrap sm:pl-6">
                                                                                            <div class="font-medium">{{ subtitle.attributes.name }}</div>
                                                                                        </td>
                                                                                        <td class="px-3 py-4 text-sm text-orange-900 whitespace-nowrap dark:text-orange-200">
                                                                                            <div class="">{{ subtitle.relationships.episode.number }} - {{ subtitle.relationships.episode.title }}</div>
                                                                                        </td>
                                                                                        <td class="px-3 py-4 text-sm text-orange-900 flex gap-x-5 whitespace-nowrap dark:text-orange-200">
                                                                                            <AdminUpdateSubtitle :subtitle="subtitle" :show="episode.relationships.show" />
                                                                                            <AdminDeleteSubtitle :subtitle="subtitle" :show="episode.relationships.show" />
                                                                                        </td>
                                                                                    </tr>
                                                                                </template>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </template>
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
