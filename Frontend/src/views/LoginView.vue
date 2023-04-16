<script setup>
import DarkMode from '../components/utilites/DarkMode.vue';
import HexagonalRow from '../components/utilites/HexagonalRow.vue';
import RectangularLogo from '../components/utilites/RectangularLogo.vue';
import TextInput from '../components/utilites/TextInput.vue';
import SubmitBtn from '../components/utilites/SubmitBtn.vue';
import { ref } from 'vue';

let email = ref(null);
let pwd = ref(null);
</script>

<template>
    <main>
        <div class="relative h-screen min-h-[610px] xl:min-h-[710px] w-full overflow-hidden">
            <HexagonalRow />
            <HexagonalRow />
            <HexagonalRow />
            <HexagonalRow />
            <HexagonalRow />
            <HexagonalRow />
            <HexagonalRow />
            <HexagonalRow />
            <HexagonalRow />
            <HexagonalRow />
            <HexagonalRow />
            <HexagonalRow />
            <HexagonalRow />
        </div>
        <div class="absolute top-0 left-0 h-full min-h-[610px] xl:min-h-[710px] w-full flex justify-center items-center pointer-events-none">
            <div class="backdrop-blur-md rounded-2xl border border-slate-400 dark:border-slate-700 shadow-lg shadow-slate-400 dark:shadow-slate-700 pointer-events-auto">
                <div class="w-80 md:w-[400px] xl:w-[500px] h-[600px] xl:h-[700px] px-2 md:px-5 py-5 md:py-10 flex flex-col items-center justify-between">
                    <div class="w-full">
                        <div class="flex justify-between items-center mb-8">
                            <RouterLink to="/">
                                <RectangularLogo class="h-5 md:h-8" />
                            </RouterLink>
                            <DarkMode class="max-md:scale-75" />
                        </div>
                        <h2 class="relative text-2xl md:text-3xl text-center font-semibold before:absolute before:w-32 before:h-0.5 md:before:h-1 before:-bottom-2 before:left-1/2 before:-translate-x-1/2 before:bg-slate-950 before:dark:bg-slate-100">Login</h2>
                    </div>
                    <form>
                        <div class="flex flex-col items-center justify-between gap-y-14">
                            <div class="w-64 flex flex-col gap-y-8">
                                <TextInput v-model:input="email" label="Your E-mail" inputType="email" inputID="user_email" error="" errorID="user_email_error" />
                                <TextInput v-model:input="pwd" label="Your password" inputType="password" inputID="user_password" error="" errorID="user_password_error" />
                            </div>
                            <SubmitBtn name="Login" />
                        </div>
                    </form>
                    <h6 class="text-center">You don't have an account? <RouterLink to="/register" class="underline decoration-amber-400 decoration-2 underline-offset-2">Sign Up now.</RouterLink></h6>
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped>
</style>
