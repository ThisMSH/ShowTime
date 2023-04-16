<script setup>
import DarkMode from '../components/utilites/DarkMode.vue'
import RectangularLogo from '../components/utilites/RectangularLogo.vue';
import TextInput from '../components/utilites/TextInput.vue';
import SubmitBtn from '../components/utilites/SubmitBtn.vue';
import Datepicker from 'flowbite-datepicker/Datepicker';
import { onMounted, ref } from 'vue';

let name = ref(null);
let username = ref(null);
let email = ref(null);
let birthday = ref(null);
let password = ref(null);
let confirm_password = ref(null);
let image = ref(null);
let datePick = ref(null);

onMounted(() => {
    new Datepicker(datePick.value, {
        clearBtn: true,
        todayBtn: true,
        autohide: true,
        orientation: 'bottom',
        format: 'dd-mm-yyyy',
        maxDate: new Date(),
    });
})
</script>

<template>
    <main class="relative h-screen min-h-[1100px] lg:min-h-[860px] flex justify-center items-center bg-gradient-to-br dark:from-slate-950 dark:to-slate-800 from-slate-200 to-slate-50 overflow-hidden">
        <div class="min-h-[1100px] lg:min-h-[860px] flex justify-center items-center">
            <span class="absolute block -top-72 w-[600px] h-[600px] bg-pink-400 dark:bg-pink-700 blur-[150px]"></span>
            <span class="absolute block -bottom-36 left-24 w-[500px] h-[500px] bg-sky-300 dark:bg-sky-500 blur-[150px]"></span>
            <span class="absolute block bottom-12 right-24 w-[300px] h-[300px] bg-yellow-200 dark:bg-yellow-300 blur-[150px]"></span>
            <div class="relative max-sm:px-2">
                <div class="glass-squares child:absolute child:backdrop-blur child:shadow-xl child:shadow-black/10 child:dark:shadow-white/40 child:border child:border-slate-100/50 child:border-b-slate-100/10 child:border-r-slate-100/10 child:rounded-lg">
                    <div class="-top-12 -right-16 w-24 h-24" style="--square-delay: 0"></div>
                    <div class="top-36 -left-24 w-32 h-32 z-[2]" style="--square-delay: 1"></div>
                    <div class="bottom-12 -right-16 w-20 h-20 z-[2]" style="--square-delay: 2"></div>
                    <div class="-bottom-16 left-24 w-12 h-12" style="--square-delay: 3"></div>
                    <div class="-top-16 left-36 w-16 h-16" style="--square-delay: 4"></div>
                </div>
                <div class="relative w-full lg:w-[800px] h-[980px] lg:h-[700px] bg-white/20 dark:bg-white/10 rounded-xl flex justify-center items-center backdrop-blur shadow-xl shadow-black/10 dark:shadow-white/40 border border-slate-100/50 border-b-slate-100/10 border-r-slate-100/10">
                    <div class="relative w-full h-full p-10">
                        <div class="grid grid-cols-2 gap-8 mb-10">
                            <RouterLink to="/">
                                <RectangularLogo class="h-5 sm:h-8" />
                            </RouterLink>
                            <div class="relative">
                                <DarkMode class="absolute right-0 max-md:scale-75" />
                            </div>
                            <h2 class="col-span-2 relative text-2xl md:text-3xl text-center font-semibold before:absolute before:w-32 before:h-0.5 md:before:h-1 before:-bottom-2 before:left-1/2 before:-translate-x-1/2 before:bg-slate-950 before:dark:bg-slate-100">Sign up</h2>
                        </div>
                        <form action="">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                                <TextInput v-model:input="name" label="Full name" inputType="text" inputID="name" error="" errorID="name_error" />
                                <TextInput v-model:input="username" label="Username" inputType="text" inputID="username" error="" errorID="username_error" />
                                <TextInput v-model:input="email" label="E-mail" inputType="email" inputID="email" error="" errorID="email_error" />
                                <div class="relative">
                                    <div class="absolute inset-y-0 right-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input id="birthday" ref="datePick" datepicker type="text" class="block py-2.5 px-0 w-full max-md:text-sm bg-transparent border-0 border-b-2 border-slate-600 appearance-none dark:border-slate-400 dark:focus:border-slate-400 focus:outline-none focus:ring-0 focus:border-slate-600 peer" placeholder=" ">
                                    <label for="birthday" class="absolute text-sm text-slate-600 dark:text-slate-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Birthday</label>
                                </div>
                                <TextInput v-model:input="password" label="Password" inputType="password" inputID="pwd" error="" errorID="pwd_error" />
                                <TextInput v-model:input="confirm_password" label="Confirm password" inputType="password" inputID="c_pwd" error="" errorID="c_pwd_error" />
                                <TextInput class="lg:col-span-2" v-model:input="image" label="Avatar (optional)" inputType="file" inputID="avatar" error="" errorID="avatar_error" />
                                <div class="lg:col-span-2 flex justify-center items-center">
                                    <SubmitBtn name="Sign Up" />
                                </div>
                            </div>
                        </form>
                        <h6 class="text-center mt-10">You already have an account? <RouterLink to="/login" class="underline decoration-amber-400 decoration-2 underline-offset-2">Sign in now.</RouterLink></h6>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<style>
.glass-squares > div {
    animation: squares 10s linear infinite;
    animation-delay: calc(-1s * var(--square-delay));
}

@keyframes squares {
    0%, 100% {
        transform: translateY(-40px);
    }
    50% {
        transform: translateY(40px);
    }
}
</style>
