import { defineStore } from 'pinia';
import axios from 'axios';

export const useCategoryStore = defineStore('category', {
    state: () => ({
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

            try {
                const categoriesList = await axios.get("/api/category");
                this.categories = categoriesList.data.data;
            } catch (error) {
                toast.error("An error has occurred!");
            } finally {
                this.allCatLoading = false;
            }
        },
        async fetchCategoryShows(id) {
            this.catShowsLoading = true;

            try {
                const catShows = await axios.get(`/api/category/${id}`);
                this.shows = catShows.data.data;
            } catch (error) {
                toast.error("An error has occurred!");
            } finally {
                this.catShowsLoading = false;
            }
        }
    }
});
