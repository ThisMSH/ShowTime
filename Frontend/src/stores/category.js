import { defineStore } from 'pinia';
import axios from 'axios';

export const useCategoryStore = defineStore('category', {
    state: () => ({
        errors: [],
        categories: null,
        shows: null,
        allCatLoading: false,
        catShowsLoading: true
    }),
    getters: {
        getCategories: (state) => state.categories,
        getShows: (state) => state.shows
    },
    actions: {
        async fetchAllCategories() {
            this.allCatLoading = true;
            this.errors = [];

            try {
                const categoriesList = await axios.get("/api/category");
                this.categories = categoriesList.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.allCatLoading = false;
            }
        },
        async fetchCategoryShows(id) {
            this.catShowsLoading = true;
            this.errors = [];

            try {
                const catShows = await axios.get(`/api/category/${id}`);
                this.shows = catShows.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.catShowsLoading = false;
            }
        }
    }
});
