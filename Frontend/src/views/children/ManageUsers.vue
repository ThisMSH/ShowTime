<script setup>
import DashboardHeader from '../../components/DashboardHeader.vue';
import AdminUpdateUser from '../../components/modals/AdminUpdateUser.vue';
import AdminDeleteUser from '../../components/modals/AdminDeleteUser.vue';
import FooterRights from '../../components/utilities/FooterRights.vue';
import { Icon } from '@iconify/vue';

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
    {
        user: 'Lind88ton',
        fullName: 'Lindsay Walton',
        email: 'lindsay.walton@example.com',
        birthday: '22-01-1998',
        role: 'Member',
        image:
            'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
    },
]
</script>

<template>
    <div>
        <DashboardHeader tabName="Users Information" />
        <div class="mt-16">
            <!-- Statistics -->
            <dl class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-3">
                <div
                    class="px-4 py-5 flex items-center gap-x-3 bg-slate-200 dark:bg-slate-800 shadow rounded-lg overflow-hidden sm:p-6">
                    <div class="text-white text-4xl p-2 rounded-lg bg-gradient-to-tl from-red-600 to-orange-400">
                        <Icon icon="ic:round-groups" />
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-slate-700 dark:text-slate-300 truncate">
                            Total Users
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold">
                            78531
                        </dd>
                    </div>
                </div>
                <div
                    class="px-4 py-5 flex items-center gap-x-3 bg-slate-200 dark:bg-slate-800 shadow rounded-lg overflow-hidden sm:p-6">
                    <div class="text-white text-4xl p-2 rounded-lg bg-gradient-to-tl from-indigo-900 to-blue-500">
                        <Icon icon="fluent:person-48-filled" />
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-slate-700 dark:text-slate-300 truncate">
                            Total Regular Members
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold">
                            78531
                        </dd>
                    </div>
                </div>
                <div
                    class="px-4 py-5 flex items-center gap-x-3 bg-slate-200 dark:bg-slate-800 shadow rounded-lg overflow-hidden sm:p-6">
                    <div class="text-white text-4xl p-2 rounded-lg bg-gradient-to-tl from-violet-600 to-pink-400">
                        <Icon icon="fluent:premium-person-24-regular" />
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-slate-700 dark:text-slate-300 truncate">
                            Total Premium Members
                        </dt>
                        <dd class="mt-1 text-3xl font-semibold">
                            78531
                        </dd>
                    </div>
                </div>
            </dl>
            <!-- Users table -->
            <div class="mt-10 flex flex-col">
                <div class="">
                    <div class="inline-block min-w-full align-middle">
                        <div class="shadow ring-1 ring-black ring-opacity-5">
                            <table class="min-w-full divide-y divide-slate-400">
                                <thead class="sticky top-0 z-10 bg-slate-200 dark:bg-slate-800">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6">
                                            USER</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">FULL
                                            NAME
                                        </th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">E-MAIL
                                        </th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">BIRTHDAY
                                        </th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">ROLE
                                        </th>
                                        <th scope="col" class="py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">MANAGE</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-700 dark:divide-slate-200 bg-slate-300 dark:bg-slate-700">
                                    <tr v-for="person in people" :key="person.email">
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                            <div class="flex items-center">
                                                <div class="h-10 w-10 flex-shrink-0">
                                                    <img class="h-10 w-10 rounded-full" :src="person.image" alt="" />
                                                </div>
                                                <div class="ml-4">
                                                    <div class="font-medium">{{ person.user }}</div>
                                                </div>
                                            </div>
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
                                            <AdminUpdateUser />
                                            <AdminDeleteUser userID="1" />
                                        </td>
                                    </tr>
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
