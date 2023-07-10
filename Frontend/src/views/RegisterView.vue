<script setup>
import DarkMode from '../components/utilities/DarkMode.vue'
import RectangularLogoDark from '../components/utilities/RectangularLogoDark.vue';
import RectangularLogoLight from '../components/utilities/RectangularLogoLight.vue';
import TextInput from '../components/utilities/TextInput.vue';
import FileInput from '../components/utilities/FileInput.vue';
import DateInput from '../components/utilities/DateInput.vue';
import SubmitBtn from '../components/utilities/SubmitBtn.vue';
import { onMounted, ref } from 'vue';
import { useAuthStore } from '../stores/auth';

const authStore = useAuthStore();

const formData = ref({
    name: "",
    username: "",
    email: "",
    birthday: "",
    password: "",
    confirm_password: "",
    image: ""
});

function getAvatar(data) {
    formData.value.image = data;
}

document.title = "Sign-up - ShowTime";

onMounted(async () => {
    if (!authStore.getUser) {
        await authStore.fetchUser();
        authStore.getUser ? router.push("/dashboard/profile") : null;
    }
});
</script>

<template>
    <main class="relative h-screen min-h-[1200px] lg:min-h-[900px] flex justify-center items-center bg-gradient-to-br dark:from-slate-950 dark:to-slate-800 from-slate-200 to-slate-50 overflow-hidden">
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
                <div class="relative w-full lg:w-[800px] min-h-[980px] lg:min-h-[700px] bg-white/20 dark:bg-white/10 rounded-xl flex justify-center items-center backdrop-blur shadow-xl shadow-black/10 dark:shadow-white/40 border border-slate-100/50 border-b-slate-100/10 border-r-slate-100/10">
                    <div class="relative w-full h-full p-10">
                        <div class="grid grid-cols-2 gap-8 mb-10">
                            <RouterLink to="/" class="justify-self-start">
                                <RectangularLogoDark class="hidden dark:flex" text-class="text-2xl sm:text-3xl xl:text-4xl" logo-class="w-10 sm:w-12 xl:w-16" />
                                <RectangularLogoLight class="flex dark:hidden" text-class="text-2xl sm:text-3xl xl:text-4xl" logo-class="w-10 sm:w-12 xl:w-16" />
                            </RouterLink>
                            <div class="relative">
                                <DarkMode class="absolute right-0 max-md:scale-75" />
                            </div>
                            <h2 class="col-span-2 relative text-2xl md:text-3xl text-center font-semibold before:absolute before:w-32 before:h-0.5 md:before:h-1 before:-bottom-2 before:left-1/2 before:-translate-x-1/2 before:bg-slate-950 before:dark:bg-slate-100">Sign up</h2>
                        </div>
                        <form @submit.prevent="authStore.handelSignup(formData)">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                                <TextInput v-model:input="formData.name" label="Full name" inputType="text" inputID="name" :errors="authStore.getErrors.name" errorID="name-error" :isRequired="true" />
                                <TextInput v-model:input="formData.username" label="Username" inputType="text" inputID="username" :errors="authStore.getErrors.username" errorID="username-error" :isRequired="true" />
                                <TextInput v-model:input="formData.email" label="E-mail" inputType="email" inputID="email" :errors="authStore.getErrors.email" errorID="email-error" :isRequired="true" />
                                <DateInput v-model:input="formData.birthday" label="Birthday" inputID="birthday" :errors="authStore.getErrors.birthday" errorID="birthday-error" :isRequired="true" />
                                <TextInput v-model:input="formData.password" label="Password" inputType="password" inputID="pwd" :errors="authStore.getErrors.password" errorID="pwd-error" :isRequired="true" />
                                <TextInput v-model:input="formData.confirm_password" label="Confirm password" inputType="password" inputID="c_pwd" :isRequired="true" />
                                <FileInput @file-content="getAvatar" class="lg:col-span-2"  label="Avatar (optional)" inputType="file" inputID="avatar" :errors="authStore.getErrors.avatar" errorID="avatar-error" />
                                <div class="lg:col-span-2 flex justify-center items-center">
                                    <SubmitBtn name="Sign Up" />
                                </div>
                            </div>
                        </form>
                        <h6 class="text-center mt-10">You already have an account? <RouterLink to="/login" class="underline decoration-amber-400 decoration-2 underline-offset-2">Sign in now.</RouterLink></h6>
                    </div>
                    <div v-if="authStore.isLoading" role="status" class="flex justify-center items-center absolute w-full h-full top-0 bg-black/40 rounded-xl z-10">
                        <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                        <span class="sr-only">Loading...</span>
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
