import { defineStore } from 'pinia';
import axios from 'axios';
import { toast } from 'vue3-toastify';

export const useRecommendationStore = defineStore('recommendation', {
    state: () => ({
        errors: [],
        recommendations: null,
        anime: null,
        liveAction: null,
        isLoading: false,
        recIsLoading: false
    }),
    getters: {
        getRecommendations: (state) => state.recommendations,
        getAnime: (state) => state.anime,
        getLiveAction: (state) => state.liveAction,
        getErrors: (state) => state.errors
    },
    actions: {
        async fetchAllRecommendations() {
            this.isLoading = true;
            this.errors = [];

            try {
                const allRecommendations = await axios.get("/api/recommendation");
                this.recommendations = allRecommendations.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async addRecommendation(data) {
            this.isLoading = true;
            this.errors = [];

            const form = new FormData();
            form.append("show_id", data.show_id);
            form.append("color", data.color.toLowerCase());
            form.append("logo", data.logo);
            form.append("character", data.character);

            const closeBtn = document.querySelector('#create-rec');

            try {
                const newRec = await axios.post("/api/recommendation", form);
                await this.fetchAllRecommendations();
                closeBtn.click();
                toast.success(newRec.data.message);
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async updateRecommendation(id, data) {
            this.isLoading = true;
            this.errors = [];

            const form = new FormData();
            form.append("_method", "PATCH");
            if(data.show_id) form.append("show_id", data.show_id);
            if(data.color) form.append("color", data.color.toLowerCase());
            if(data.logo) form.append("logo", data.logo);
            if(data.character) form.append("character", data.character);

            const closeBtn = document.querySelector(`#update-rec-${id}`);

            try {
                const updatedRec = await axios.post(`/api/recommendation/${id}`, form);
                await this.fetchAllRecommendations();
                closeBtn.click();
                toast.success(updatedRec.data.message);
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async deleteRecommendation(id) {
            this.isLoading = true;
            this.errors = [];

            const closeBtn = document.querySelector(`#delete-rec-${id}`);

            try {
                const deletedRec = await axios.delete(`/api/recommendation/${id}`);
                await this.fetchAllRecommendations();
                closeBtn.click();
                toast.success(deletedRec.data.message);
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async fetchRecommendations() {
            this.recIsLoading = true;
            this.errors = [];

            try {
                const anime = await axios.get("/api/recommendation/anime");
                const live = await axios.get("/api/recommendation/live-action");

                this.anime = anime.data.data;
                this.liveAction = live.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.recIsLoading = false;
            }
        }
    }
});
