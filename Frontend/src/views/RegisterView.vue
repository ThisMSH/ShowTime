<script setup>
import DarkMode from '../components/utilities/DarkMode.vue'
import RectangularLogo from '../components/utilities/RectangularLogo.vue';
import TextInput from '../components/utilities/TextInput.vue';
import DateInput from '../components/utilities/DateInput.vue';
import SubmitBtn from '../components/utilities/SubmitBtn.vue';
import { onMounted, ref } from 'vue';

let name = ref(null);
let username = ref(null);
let email = ref(null);
let birthday = ref(null);
let password = ref(null);
let confirm_password = ref(null);
let image = ref(null);

onMounted(() => {
    
});
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
                                <DateInput v-model:input="birthday" label="Birthday" inputID="birthday" error="" errorID="birthday_error" />
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
