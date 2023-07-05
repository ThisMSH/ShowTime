<script setup>
import AdminUpdateUser from '../../components/modals/AdminUpdateUser.vue';
import AdminDeleteUser from '../../components/modals/AdminDeleteUser.vue';
import { Icon } from '@iconify/vue';
import { useAuthStore } from '../../stores/auth';
import { onMounted } from 'vue';
import { format } from 'date-fns';

const authStore = useAuthStore();

document.title = "Dashboard - Users Management - ShowTime";

onMounted(async () => {
    await authStore.fetchAllUsers();
});
</script>

<template>
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
                        {{ authStore.getAllUsers?.total_users }}
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
                        {{ authStore.getAllUsers?.total_free }}
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
                        {{ authStore.getAllUsers?.total_premium }}
                    </dd>
                </div>
            </div>
        </dl>
        <!-- Users table -->
        <div class="mt-10 flex flex-col">
            <div class="">
                <div class="inline-block min-w-full align-middle">
                    <div class="py-2.5 bg-slate-200 dark:bg-slate-800 rounded-xl shadow ring-1 ring-white ring-opacity-20">
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
                                <template v-if="authStore.getAllUsers">
                                    <tr v-for="person in authStore.getAllUsers.users" :key="person.id">
                                        <td class="py-4 pl-4 pr-3 text-sm sm:pl-6">
                                            <div :title="`u/${person.attributes.username}`" class="flex items-center">
                                                <div class="h-10 w-10 flex-shrink-0">
                                                    <img class="h-10 w-10 rounded-full object-cover" :src="person.attributes.avatar" :alt="`${person.attributes.name}'s avatar'`" />
                                                </div>
                                                <div class="ml-4">
                                                    <p class="font-medium">u/{{ person.attributes.username }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                            <p :title="person.attributes.name" class="">{{ person.attributes.name }}</p>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                            <p :title="person.attributes.email" class="">{{ person.attributes.email }}</p>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                            <p :title="new Date(person.attributes.birthday).toDateString()" class="">{{ format(new Date(person.attributes.birthday), "dd-MM-yyyy") }}</p>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-slate-700 dark:text-slate-300">
                                            <p  v-if="person.attributes.user_type == 0" title="Free membership">
                                                Free
                                            </p>
                                            <p  v-else-if="person.attributes.user_type == 1" title="Admin">
                                                Admin
                                            </p>
                                            <p  v-else-if="person.attributes.user_type == 2" title="Premium membership">
                                                Premium
                                            </p>
                                        </td>
                                        <td
                                            class="relative flex gap-x-5 py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <AdminUpdateUser :user="person" />
                                            <AdminDeleteUser :user="person" />
                                        </td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="6">
                                            <div role="status" class="animate-pulse p-4">
                                                <div class="h-20 bg-slate-200 rounded-md dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <div role="status" class="animate-pulse p-4">
                                                <div class="h-20 bg-slate-200 rounded-md dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <div role="status" class="animate-pulse p-4">
                                                <div class="h-20 bg-slate-200 rounded-md dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <div role="status" class="animate-pulse p-4">
                                                <div class="h-20 bg-slate-200 rounded-md dark:bg-slate-800"></div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
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
