import { defineStore } from "pinia";
import axios from "axios";

export const useEpisodeStore = defineStore('episode', {
    state: () => ({
        errors: [],
        episode: null,
        episodes: null,
        episodeLoading: false
    }),
    getters: {
        getSingleEpisode: (state) => state.episode,
        getAllEpisodes: (state) => state.episodes
    },
    actions: {
        async fetchAllEpisodes() {
            this.errors = [];

            try {
                const allEpisodes = await axios.get("/api/episode");
                this.episodes = allEpisodes.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                }
            }
        },
        async fetchEpisode(id) {
            this.episodeLoading = true;
            this.errors = [];

            try {
                const singleEpisode = await axios.get(`/api/episode/${id}`);
                this.episode = singleEpisode.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                }
            } finally {
                this.episodeLoading = false;
            }
        }
    }
});
