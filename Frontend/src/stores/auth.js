import { defineStore } from 'pinia';
import axios from 'axios';
import { toast } from 'vue3-toastify';

export const useAuthStore = defineStore("auth", {
    state: () => ({
        authUser: null,
        allUsers: null,
        authErrors: [],
        isLoading: false,
        anotherLoading: false
    }),
    getters: {
        getUser: (state) => state.authUser,
        getAllUsers: (state) => state.allUsers,
        getErrors: (state) => state.authErrors
    },
    actions: {
        async fetchToken() {
            await axios.get("/sanctum/csrf-cookie");
        },
        async fetchAllUsers() {
            this.authErrors = [];

            try {
                const userData = await axios.get("/api/users");
                this.allUsers = userData.data.data;
            } catch (error) {
                toast.error("You are not authenticated or authorized for this request.");
            }
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
                    toast.error(this.authErrors.email);
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

            try {
                await this.fetchToken();
                await axios.post("/register", registerData);
                this.router.push("/login");
                setTimeout(() => {
                    toast.success("Your account has been created successfully.");
                }, 500);
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.authErrors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async handleLogout() {
            this.isLoading = true;

            try {
                await axios.post("/logout");
                this.authUser = null;
                this.router.push("/");
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.authErrors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async updateUser(data) {
            this.authErrors = [];
            this.anotherLoading = true;

            const form = new FormData();
            form.append('_method', 'PATCH');
            if (data.name) form.append('name', data.name);
            if (data.username) form.append('username', data.username);
            if (data.email) form.append('email', data.email);
            if (data.birthday) form.append('birthday', data.birthday);
            if (data.image) form.append('avatar', data.image);
            if (data.current_password) form.append('old_password', data.current_password);
            if (data.password) form.append('password', data.password);
            if (data.confirm_password) form.append('password_confirmation', data.confirm_password);

            const closeModal = document.querySelector("#updateUserModal");

            try {
                const user = await axios.post(`/api/user/${this.getUser.id}`, form);
                const userData = await axios.get("/api/user");
                this.authUser = userData.data.data;
                toast.success(user.data.message);
                closeModal.click();
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.authErrors = error.response.data.errors || {current_password: [error.response.data.message]};
                }
            } finally {
                this.anotherLoading = false;
            }
        },
        async adminUpdateUser(id, data) {
            this.authErrors = [];
            this.anotherLoading = true;

            const form = new FormData();
            form.append('_method', 'PATCH');
            if (data.name) form.append('name', data.name);
            if (data.username) form.append('username', data.username);
            if (data.email) form.append('email', data.email);
            if (data.birthday) form.append('birthday', data.birthday);
            if (data.membership) form.append('user_type', data.membership);
            if (data.image) form.append('avatar', data.image);

            const closeModal = document.querySelector(`#update-user-${id}`);

            try {
                const user = await axios.post(`/api/user/${id}`, form);
                await this.fetchAllUsers();
                toast.success(user.data.message);
                closeModal.click();
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.authErrors = error.response.data.errors;
                }
            } finally {
                this.anotherLoading = false;
            }
        },
        async deleteAccount(id) {
            this.authErrors = [];
            this.anotherLoading = true;

            const closeModal = document.querySelector(`#delete-user-${id}`);

            try {
                const user = await axios.delete(`/api/user/${id}`);
                await this.fetchAllUsers();
                toast.success(user.data.message);
                closeModal.click();
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.authErrors = error.response.data.errors;
                }
            } finally {
                this.anotherLoading = false;
            }
        }
    }
});
