import { defineStore } from "pinia";
import axios from "axios";
import { toast } from 'vue3-toastify';

export const useTrailerStore = defineStore('trailer', {
    state: () => ({
        errors: [],
        trailers: null,
        isLoading: false
    }),
    getters: {
        getAllTrailers: (state) => state.trailers,
        getErrors: (state) => state.errors
    },
    actions: {
        async fetchAllTrailers() {
            this.errors = [];
            this.isLoading = true;

            try {
                const allTrailers = await axios.get("/api/shows-and-trailers");
                this.trailers = allTrailers.data.data;
            } catch (error) {
                toast.error("You are not authenticated or authorized for this request.");
            } finally {
                this.isLoading = false;
            }
        },
        async addTrailer(data) {
            this.isLoading = true;
            this.errors = [];

            const form = new FormData();
            form.append("show_id", data.show_id);
            form.append("title", data.title);
            form.append("trailer", data.trailer);

            const closeButton = document.querySelector('#create-trailer');

            try {
                const newTrailer = await axios.post("/api/trailer", form);
                await this.fetchAllTrailers();
                closeButton.click();
                toast.success(newTrailer.data.message);
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async updateTrailer(id, data) {
            this.isLoading = true;
            this.errors = [];

            const form = new FormData();
            form.append("_method", "PATCH");
            if (data.show_id) form.append("show_id", data.show_id);
            if (data.title) form.append("title", data.title);
            if (data.trailer) form.append("trailer", data.trailer);

            const closeUpdateBtn = document.querySelector(`#update-trailer-${id}`);

            try {
                const updatedTrailer = await axios.post(`/api/trailer/${id}`, form);
                await this.fetchAllTrailers();
                closeUpdateBtn.click();
                toast.success(updatedTrailer.data.message);
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async deleteTrailer(id) {
            this.isLoading = true;
            this.errors = [];

            const clostDeleteBtn = document.querySelector(`#delete-trailer-${id}`);

            try {
                const deletedTrailer = await axios.delete(`/api/trailer/${id}`);
                await this.fetchAllTrailers();
                clostDeleteBtn.click();
                toast.success(deletedTrailer.data.message);
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        }
    }
});
