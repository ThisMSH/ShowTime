import { defineStore } from "pinia";
import axios from "axios";

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
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
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
                await axios.post("/api/trailer", form);
                await this.fetchAllTrailers();
                closeButton.click();
            } catch (error) {
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
                await axios.post(`/api/trailer/${id}`, form);
                await this.fetchAllTrailers();
                closeUpdateBtn.click();
            } catch (error) {
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
                await axios.delete(`/api/trailer/${id}`);
                await this.fetchAllTrailers();
                clostDeleteBtn.click();
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        }
    }
});
