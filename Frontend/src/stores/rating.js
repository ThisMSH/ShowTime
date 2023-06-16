import { defineStore } from "pinia";
import axios from "axios";

export const useRatingStore = defineStore('rating', {
    state: () => ({
        errors: [],
        rating: null,
        ratings: null,
        isLoading: false
    }),
    getters: {
        getRating: (state) => state.rating,
        getAllRating: (state) => state.ratings,
        getErrors: (state) => state.errors
    },
    actions: {
        async addUpdateRating(data) {
            this.isLoading = true;
            this.errors = [];

            const form = new FormData();
            form.append("show_id", data.show_id);
            form.append("rating", data.rating);

            try {
                const ratingData = await axios.post("/api/rating/", form);
                this.rating = ratingData.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async fetchRating(id) {
            this.isLoading = true;
            this.errors = [];

            try {
                const ratingData = await axios.get(`/api/rating/${id}`);
                this.rating = ratingData.data;
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
