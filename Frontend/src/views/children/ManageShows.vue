<script setup>
import DashboardHeader from '../../components/DashboardHeader.vue';
import FooterRights from '../../components/utilities/FooterRights.vue';
import DefaultButton from '../../components/utilities/DefaultButton.vue';
import H4 from '../../components/utilities/H4.vue';
import { Icon } from '@iconify/vue';
import AdminCreateShow from '../../components/modals/AdminCreateShow.vue';
import AdminCreateEpisode from '../../components/modals/AdminCreateEpisode.vue';
import AdminCreatePromo from '../../components/modals/AdminCreatePromo.vue';
import AdminUpdateShow from '../../components/modals/AdminUpdateShow.vue';
import AdminDeleteShow from '../../components/modals/AdminDeleteShow.vue';

const people = [
    {
        user: 'Lind88ton',
        fullName: 'Lindsay Walton',
        email: 'lindsay.walton@example.com',
        birthday: '22-01-1998',
        role: 'Member',
        image:
            'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    },
    {
        user: 'Lind88ton',
        fullName: 'Lindsay Walton',
        email: 'lindsay.walton@example.com',
        birthday: '22-01-1998',
        role: 'Member',
        image:
            'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    },
];
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
            <!-- Creating Shows -->
            <div class="mt-10 flex justify-between items-center gap-3 flex-wrap">
                <H4 class="mb-0" title="List of all the shows" />
                <div class="flex justify-center items-center gap-3 flex-wrap">
                    <AdminCreateShow />
                </div>
            </div>
            <!-- Shows Management -->
            <div class="mt-10 flex flex-col">
                <div class="">
                    <div class="inline-block min-w-full align-middle">
                        <div class="shadow ring-1 ring-black ring-opacity-5">
                            <table class="min-w-full divide-y divide-slate-400 border border-slate-400 dark:border-slate-500">
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
                                    <template v-for="person in people" :key="person.email">
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-md" :src="person.image" alt="" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                                <div class="font-medium">{{ person.user }}</div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                                <div class="">{{ person.fullName }}</div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                                <div class="">{{ person.email }}</div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                                <div class="">{{ person.birthday }}</div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                                {{ person.role }}</td>
                                            <td
                                                class="relative flex gap-x-5 whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <AdminUpdateShow />
                                                <AdminDeleteShow showID="1" />
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
        <FooterRights />
    </div>
</template>

<style></style>
