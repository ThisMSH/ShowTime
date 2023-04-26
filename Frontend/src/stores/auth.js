import { defineStore } from 'pinia';
import axios from 'axios';

export const useAuthStore = defineStore("auth", {
    state: () => ({
        authUser: null,
        authErrors: [],
        isLoading: false
    }),
    getters: {
        getUser: (state) => state.authUser,
        getErrors: (state) => state.authErrors
    },
    actions: {
        async fetchToken() {
            await axios.get("/sanctum/csrf-cookie");
        },
        async fetchUser() {
            this.authErrors = [];
            this.isLoading = true;
            await this.fetchToken();

            try {
                const userData = await axios.get("/api/user");
                this.authUser = userData.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.authErrors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async handleLogin(data) {
            this.authErrors = [];
            this.isLoading = true;

            const registerData = new FormData();
            registerData.append('email', data.email);
            registerData.append('password', data.password);
            
            try {
                await this.fetchToken();
                await axios.post("/login", registerData);
                await this.fetchUser();
                this.router.push("/");
            } catch (error) {
                if (error.response.status === 422) {
                    this.authErrors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async handelSignup(data) {
            this.authErrors = [];
            this.isLoading = true;

            const registerData = new FormData();
            registerData.append('name', data.name);
            registerData.append('username', data.username);
            registerData.append('email', data.email);
            registerData.append('birthday', data.birthday);
            registerData.append('avatar', data.image);
            registerData.append('password', data.password);
            registerData.append('password_confirmation', data.confirm_password);
            // console.log(Array.from(registerData.entries()));

            try {
                await this.fetchToken();
                await axios.post("/register", registerData);
                this.router.push("/login");
            } catch (error) {
                if(error.response.status === 422) {
                    this.authErrors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async handleLogout() {
            await axios.post("/logout");
            this.authUser = null;
        },
    }
});
