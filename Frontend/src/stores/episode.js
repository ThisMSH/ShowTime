import { defineStore } from "pinia";
import axios from "axios";

export const useEpisodeStore = defineStore('episode', {
    state: () => ({
        errors: [],
        episode: null,
        episodes: null,
        episodeLoading: false,
        isLoading: false
    }),
    getters: {
        getSingleEpisode: (state) => state.episode,
        getAllEpisodes: (state) => state.episodes,
        getErrors: (state) => state.errors
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
        },
        async addEpisode(data) {
            this.isLoading = true;
            this.errors = [];

            const form = new FormData();
            form.append("show_id", data.show_id);
            form.append("title", data.title);
            form.append("description", data.description);
            form.append("number", data.number);
            form.append("premium", data.membership);
            form.append("thumbnail", data.thumbnail);
            form.append("video", data.video);

            const closeButton = document.querySelector('#create-episode [data-modal-toggle]');

            try {
                await axios.post("/api/episode", form);
                closeButton.click();
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
