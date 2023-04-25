<script setup>
import DashboardHeader from '../../components/DashboardHeader.vue';
import TextInput from '../../components/utilities/TextInput.vue';
import UpdateUser from '../../components/modals/UpdateUser.vue';
import FooterRights from '../../components/utilities/FooterRights.vue';
import HexagonalRow from '../../components/utilities/HexagonalRow.vue';
import { onMounted, ref } from 'vue';
import { useAuthStore } from '../../stores/auth';

const authStore = useAuthStore();

onMounted(() => {
    
});
</script>

<template>
    <div>
        <DashboardHeader tabName="Personal Information" />
        <div class="mt-16">
            <div class="relative h-52 rounded-2xl border border-l-slate-600 border-t-slate-600 border-slate-900 dark:border-l-slate-400 dark:border-t-slate-400 dark:border-slate-600 overflow-hidden">
                <HexagonalRow class="absolute" />
                <HexagonalRow class="absolute top-[86px]" />
                <HexagonalRow class="absolute top-[172px]" />
            </div>
            <div class="relative -mt-8 bg-slate-300 dark:bg-slate-800 rounded-2xl border border-l-slate-600 border-t-slate-600 border-slate-900 dark:border-l-slate-400 dark:border-t-slate-400 dark:border-slate-600">
                <div class="inline-flex gap-x-5 relative -top-14 left-10">
                    <template v-if="!authStore.getUser">
                        <div role="status" class="animate-pulse">
                            <svg class="text-gray-200 w-28 h-28 dark:text-gray-700" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </template>
                    <template v-else>
                        <img class="w-28 h-28 rounded-full border-2 bg-white dark:bg-black object-cover" :src="authStore.getUser.avatar" alt="Rounded avatar">
                    </template>
                    <div class="flex flex-col justify-around z-10">
                        <h5 v-if="authStore.getUser && authStore.getUser.user_type == 0" class="text-xl lg:text-2xl font-medium tracking-wide">Free Memebership</h5>
                        <h5 v-else-if="authStore.getUser && authStore.getUser.user_type == 2" class="text-xl lg:text-2xl font-medium tracking-wide">Premium Memebership</h5>
                        <h5 v-else-if="authStore.getUser && authStore.getUser.user_type == 1" class="text-xl lg:text-2xl font-medium tracking-wide">Admin</h5>
                        <h3 class="font-medium text-xl sm:text-2xl lg:text-3xl tracking-wide">{{ authStore.getUser?.name }}</h3>
                    </div>
                </div>
                <div class="px-20 grid grid-cols-2 gap-x-20 gap-y-10 my-5">
                    <template v-if="!authStore.getUser">
                        <div role="status" class="col-span-2 grid grid-cols-2 gap-x-20 gap-y-10 my-5 p-4 rounded shadow animate-pulse dark:divide-gray-700 md:px-20 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="h-1.5 bg-gray-200 rounded-full dark:bg-gray-700 w-24 mb-2.5"></div>
                                    <div class="w-64 h-6 bg-gray-300 rounded-md dark:bg-gray-600"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="h-1.5 bg-gray-200 rounded-full dark:bg-gray-700 w-24 mb-2.5"></div>
                                    <div class="w-64 h-6 bg-gray-300 rounded-md dark:bg-gray-600"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="h-1.5 bg-gray-200 rounded-full dark:bg-gray-700 w-24 mb-2.5"></div>
                                    <div class="w-64 h-6 bg-gray-300 rounded-md dark:bg-gray-600"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="h-1.5 bg-gray-200 rounded-full dark:bg-gray-700 w-24 mb-2.5"></div>
                                    <div class="w-64 h-6 bg-gray-300 rounded-md dark:bg-gray-600"></div>
                                </div>
                            </div>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </template>
                    <template v-else>
                        <TextInput v-model:input="authStore.getUser.name" label="Full name" inputType="text" inputID="name" :isReadOnly="true" />
                        <TextInput v-model:input="authStore.getUser.username" label="Username" inputType="text" inputID="username" :isReadOnly="true" />
                        <TextInput v-model:input="authStore.getUser.email" label="E-mail" inputType="email" inputID="email" :isReadOnly="true" />
                        <TextInput v-model:input="authStore.getUser.birthday" label="Birthday" inputType="text" inputID="birthday" :isReadOnly="true" />
                    </template>
                </div>
                <div class="mb-10 mt-20 flex justify-center items-center">
                    <UpdateUser />
                </div>
            </div>
        </div>
        <FooterRights />
    </div>
</template>

<style>

</style>
