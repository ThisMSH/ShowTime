import { defineStore } from "pinia";
import axios from "axios";
import { toast } from 'vue3-toastify';

export const useFavoriteStore = defineStore('favorite', {
    state: () => ({
        fav: null,
        favs: null,
        isLoading: false,
        fetchIsLoading: false,
        allFavsLoading: false
    }),
    getters: {
        getFav: (state) => state.fav,
        getFavs: (state) => state.favs
    },
    actions: {
        async fetchAllFavs() {
            this.allFavsLoading = true;

            try {
                const favorites = await axios.get("/api/favorite");
                this.favs = favorites.data.data;
            } catch (error) {
                toast.error("You are not authenticated or authorized for this request.");
            } finally {
                this.allFavsLoading = false;
            }
        },
        async addDeleteFav(id) {
            this.isLoading = true;

            const form = new FormData();
            form.append("show_id", id);

            try {
                const favorite = await axios.post("/api/favorite", form);
                this.fav = favorite.data.data
                toast.success(favorite.data.message);
            } catch (error) {
                toast.error("An error has occurred!");
            } finally {
                this.isLoading = false;
            }
        },
        async fetchFav(id) {
            this.fetchIsLoading = true;

            try {
                const favorite = await axios.get(`/api/favorite/${id}`);
                this.fav = favorite.data.data;
            } catch (error) { 
            } finally {
                this.fetchIsLoading = false;
            }
        }
    }
});
