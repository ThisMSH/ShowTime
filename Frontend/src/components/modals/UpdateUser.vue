<script setup>
import TextInput from '../utilities/TextInput.vue';
import DateInput from '../utilities/DateInput.vue';
import NoBlackBgButton from '../utilities/NoBlackBgButton.vue';
import DefaultButton from '../utilities/DefaultButton.vue';
import { initModals } from 'flowbite';
import { onMounted, ref } from 'vue';

let update_name = ref(null);
let update_username = ref(null);
let update_email = ref(null);
let update_birthday = ref(null);
let update_image = ref(null);
let update_current_password = ref(null);
let update_password = ref(null);
let update_confirm_password = ref(null);

onMounted(() => {
    initModals();
});
</script>

<template>
    <!-- Modal toggle -->
    <div class="flex justify-center m-5">
        <DefaultButton name="Update" iconName="ic:round-edit" id="updateUserButton" data-modal-toggle="updateUserModal" />
    </div>

    <!-- Main modal -->
    <div id="updateUserModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-slate-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-slate-600">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">
                        Update User
                    </h3>
                    <button type="button" class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-modal-toggle="updateUserModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                        <TextInput v-model:input="update_name" label="Full name" inputType="text" inputID="updqte_name" error="" errorID="name_error" />
                        <TextInput v-model:input="update_username" label="Username" inputType="text" inputID="updqte_username" error="" errorID="username_error" />
                        <TextInput v-model:input="update_email" label="E-mail" inputType="email" inputID="updqte_email" error="" errorID="email_error" />
                        <DateInput v-model:input="update_birthday" label="Birthday" inputID="updqte_birthday" error="" errorID="birthday_error" />
                        <TextInput class="lg:col-span-2" v-model:input="update_image" label="Avatar (optional)" inputType="file" inputID="updqte_avatar" error="" errorID="avatar_error" />
                        <TextInput v-model:input="update_current_password" label="Current Password" inputType="password" inputID="updqte_pwd" error="" errorID="pwd_error" />
                        <div class="max-lg:hidden"></div>
                        <TextInput v-model:input="update_password" label="New Password" inputType="password" inputID="updqte_new_pwd" error="" errorID="new_pwd_error" />
                        <TextInput v-model:input="update_confirm_password" label="Confirm password" inputType="password" inputID="updqte_c_pwd" error="" errorID="c_pwd_error" />
                        <div class="lg:col-span-2 flex justify-center items-center">
                            <NoBlackBgButton name="Submit" iconName="ic:round-system-update-alt" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style>

</style>
