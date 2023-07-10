<script setup>
import DarkMode from '../components/utilities/DarkMode.vue';
import GradientHexaRow from '../components/utilities/GradientHexaRow.vue';
import RectangularLogoDark from '../components/utilities/RectangularLogoDark.vue';
import RectangularLogoLight from '../components/utilities/RectangularLogoLight.vue';
import TextInput from '../components/utilities/TextInput.vue';
import SubmitBtn from '../components/utilities/SubmitBtn.vue';
import router from '../router';
import { onMounted, ref } from 'vue';
import { useAuthStore } from '../stores/auth';

const authStore = useAuthStore()

const formData = ref({
    email: "",
    password: ""
});

document.title = "Sign-in - ShowTime";

onMounted(async () => {
    if (!authStore.getUser) {
        await authStore.fetchUser();
        authStore.getUser ? router.push("/dashboard/profile") : null;
    }
});
</script>

<template>
    <main class="bg-gradient-to-b from-transparent via-orange-500 dark:via-orange-400 to-transparent to-30% dark:to-30%">
        <div class="relative h-screen min-h-[700px] xl:min-h-[800px] w-full overflow-hidden">
            <GradientHexaRow />
            <GradientHexaRow />
            <GradientHexaRow />
            <GradientHexaRow />
            <GradientHexaRow />
            <GradientHexaRow />
            <GradientHexaRow />
            <GradientHexaRow />
            <GradientHexaRow />
            <GradientHexaRow />
            <GradientHexaRow />
            <GradientHexaRow />
            <GradientHexaRow />
        </div>
        <div class="absolute top-0 left-0 flex items-center justify-center w-full min-h-full pointer-events-none">
            <div class="border shadow-lg pointer-events-auto backdrop-blur-md rounded-2xl border-slate-400 dark:border-slate-700 shadow-slate-400 dark:shadow-slate-700">
                <div class="w-80 md:w-[400px] xl:w-[500px] h-[600px] xl:h-[700px] px-2 md:px-5 py-5 md:py-10 flex flex-col items-center justify-between">
                    <div class="w-full">
                        <div class="flex items-center justify-between mb-8">
                            <RouterLink to="/" class="max-md:pl-2">
                                <RectangularLogoDark class="hidden dark:flex" text-class="text-3xl xl:text-4xl" logo-class="w-12 xl:w-16" />
                                <RectangularLogoLight class="flex dark:hidden" text-class="text-3xl xl:text-4xl" logo-class="w-12 xl:w-16" />
                            </RouterLink>
                            <DarkMode class="max-md:scale-75" />
                        </div>
                        <h2 class="relative text-2xl md:text-3xl text-center font-semibold before:absolute before:w-32 before:h-0.5 md:before:h-1 before:-bottom-2 before:left-1/2 before:-translate-x-1/2 before:bg-slate-950 before:dark:bg-slate-100">Login</h2>
                    </div>
                    <form @submit.prevent="authStore.handleLogin(formData)">
                        <div class="flex flex-col items-center justify-between gap-y-14">
                            <div class="flex flex-col w-64 gap-y-8">
                                <TextInput v-model:input="formData.email" label="Your E-mail" inputType="email" inputID="user_email" :errors="authStore.getErrors.email" errorID="user_email_error" :isFocused="true" :isRequired="true" />
                                <TextInput v-model:input="formData.password" label="Your password" inputType="password" inputID="user_password" :errors="authStore.getErrors.password" errorID="user_password_error" :isRequired="true" />
                            </div>
                            <SubmitBtn name="Login" />
                        </div>
                    </form>
                    <h6 class="text-center">You don't have an account? <RouterLink to="/register" class="underline decoration-amber-400 decoration-2 underline-offset-2">Sign Up now.</RouterLink></h6>
                </div>
                <div v-if="authStore.isLoading" role="status" class="absolute top-0 z-10 flex items-center justify-center w-full h-full bg-black/40 rounded-xl">
                    <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped>
main {
    animation: background-slide 9s linear infinite;
}

@keyframes background-slide {
    0% {
        background-position-y: -50vh;

    }
    100% {
        background-position-y: 150vh;
    }
}
</style>
