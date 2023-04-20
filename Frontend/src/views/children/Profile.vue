<script setup>
import DashboardHeader from '../../components/DashboardHeader.vue';
import TextInput from '../../components/utilities/TextInput.vue';
import UpdateUser from '../../components/modals/UpdateUser.vue';
import { onMounted, ref } from 'vue';
import { Icon } from '@iconify/vue';
import FooterRights from '../../components/utilities/FooterRights.vue';

let name = ref(null);
let username = ref(null);
let email = ref(null);
let birthday = ref(null);

onMounted(() => {
    
});
</script>

<template>
    <div>
        <DashboardHeader tabName="Personal Information" />
        <div class="mt-16">
            <div class="h-52 rounded-2xl bg-orange-400 dark:bg-orange-500 border border-l-slate-600 border-t-slate-600 border-slate-900 dark:border-l-slate-400 dark:border-t-slate-400 dark:border-slate-600">
            </div>
            <div class="relative -top-8 bg-slate-300 dark:bg-slate-800 rounded-2xl border border-l-slate-600 border-t-slate-600 border-slate-900 dark:border-l-slate-400 dark:border-t-slate-400 dark:border-slate-600">
                <div class="flex gap-x-5 relative -top-14 left-10">
                    <img class="w-28 h-28 rounded-full border-2" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="Rounded avatar">
                    <div class="flex flex-col justify-around">
                        <h5 class="text-xl">Premium Memebership</h5>
                        <h3 class="font-medium text-xl sm:text-2xl lg:text-3xl">El Mahdi Saissi Hassani</h3>
                    </div>
                </div>
                <div class="px-20 grid grid-cols-2 gap-x-20 gap-y-10 my-5">
                    <TextInput v-model:input="name" label="Full name" inputType="text" inputID="name" :isReadOnly="true" />
                    <TextInput v-model:input="username" label="Username" inputType="text" inputID="username" :isReadOnly="true" />
                    <TextInput v-model:input="email" label="E-mail" inputType="email" inputID="email" :isReadOnly="true" />
                    <TextInput v-model:input="birthday" label="Birthday" inputType="text" inputID="birthday" :isReadOnly="true" />
                </div>
                <div class="mb-10 mt-20">
                    <UpdateUser />
                </div>
            </div>
        </div>
        <FooterRights />
    </div>
</template>

<style>

</style>
