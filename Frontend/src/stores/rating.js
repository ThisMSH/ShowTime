import { defineStore } from "pinia";
import axios from "axios";
import { toast } from 'vue3-toastify';

export const useRatingStore = defineStore('rating', {
    state: () => ({
        errors: [],
        rating: null,
        ratings: null,
        isLoading: false
    }),
    getters: {
        getRating: (state) => state.rating,
        getAllRatings: (state) => state.ratings,
        getErrors: (state) => state.errors
    },
    actions: {
        async fetchAllRatings() {
            this.isLoading = true;

            try {
                const ratings = await axios.get("/api/rating");
                this.ratings = ratings.data.data;
            } catch (error) {
                toast.error("You are not authenticated or authorized for this request.");
            } finally {
                this.isLoading = false;
            }
        },
        async addUpdateRating(data) {
            this.errors = [];

            const form = new FormData();
            form.append("show_id", data.show_id);
            form.append("rating", data.rating);

            try {
                const ratingData = await axios.post("/api/rating/", form);
                this.rating = ratingData.data;
                toast.success(ratingData.data.message);
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
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
