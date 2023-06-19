import { defineStore } from "pinia";
import axios from "axios";

export const useFavoriteStore = defineStore('favorite', {
    state: () => ({
        fav: null,
        isLoading: false
    }),
    getters: {
        getFav: (state) => state.fav
    },
    actions: {
        async addDeleteFav(id) {
            this.isLoading = true;

            const form = new FormData();
            form.append("show_id", id);

            try {
                const favorite = await axios.post("/api/favorite", form);
                this.fav = favorite.data
            } catch (error) {
                console.log(error);
            } finally {
                this.isLoading = false;
            }
        }
    }
});
