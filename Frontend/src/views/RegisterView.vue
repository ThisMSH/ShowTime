<script setup>
import DarkMode from '../components/utilites/DarkMode.vue'
import RectangularLogo from '../components/utilites/RectangularLogo.vue';
import TextInput from '../components/utilites/TextInput.vue';
import Datepicker from 'flowbite-datepicker/Datepicker';
import { onMounted, ref } from 'vue';

let name = ref(null);
let username = ref(null);
let email = ref(null);
let birthday = ref(null);
let password = ref(null);
let confirm_password = ref(null);
let image = ref(null);

const birthday_input = ref(null);
onMounted(() => {
    console.log(birthday_input.value);
})
</script>

<template>
    <main class="relative h-screen min-h-fit flex justify-center items-center bg-gradient-to-br dark:from-slate-950 dark:to-slate-800 from-slate-200 to-slate-50 overflow-hidden">
        <div class="min-h-fit flex justify-center items-center">
            <span class="absolute block -top-72 w-[600px] h-[600px] bg-red-500 dark:bg-red-700 blur-[150px]"></span>
            <span class="absolute block -bottom-36 left-24 w-[500px] h-[500px] bg-orange-400 dark:bg-orange-600 blur-[150px]"></span>
            <span class="absolute block bottom-12 right-24 w-[300px] h-[300px] bg-yellow-300 dark:bg-yellow-400 blur-[150px]"></span>
            <div class="box">
                <div class="cont">
                    <div class="form">
                        <div class="grid grid-cols-1 lg:grid-cols-2">
                            <RouterLink to="/">
                                <RectangularLogo class="h-5 sm:h-8" />
                            </RouterLink>
                            <DarkMode class="max-md:scale-75" />
                            <h2 class="relative text-2xl md:text-3xl text-center font-semibold before:absolute before:w-32 before:h-0.5 md:before:h-1 before:-bottom-2 before:left-1/2 before:-translate-x-1/2 before:bg-slate-950 before:dark:bg-slate-100">Sign up</h2>
                        </div>
                        <form action="">
                            <div class="grid grid-cols-1 lg:grid-cols-2">
                                <TextInput v-model:input="name" label="Full name" inputType="text" inputID="name" error="" errorID="name_error" />
                                <TextInput v-model:input="username" label="Username" inputType="text" inputID="username" error="" errorID="username_error" />
                                <TextInput v-model:input="email" label="E-mail" inputType="email" inputID="email" error="" errorID="email_error" />
                                <TextInput ref="birthday_input" v-model:input="birthday" label="Birthday" inputType="date" inputID="birthday" error="" errorID="birthday_error" />
                                <TextInput v-model:input="password" label="Password" inputType="password" inputID="pwd" error="" errorID="pwd_error" />
                                <TextInput v-model:input="confirm_password" label="Confirm password" inputType="password" inputID="c_pwd" error="" errorID="c_pwd_error" />
                                <TextInput class="col-span-2" v-model:input="image" label="Avatar (optional)" inputType="file" inputID="avatar" error="" errorID="avatar_error" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<style>

</style>
