import { defineStore } from "pinia";
import axios from "axios";

export const useEpisodeStore = defineStore('episode', {
    state: () => ({
        errors: [],
        episode: null,
        episodes: null,
        episodeLoading: false,
        episodesLoading: false,
        isLoading: false
    }),
    getters: {
        getSingleEpisode: (state) => state.episode,
        getAllEpisodes: (state) => state.episodes,
        getErrors: (state) => state.errors
    },
    actions: {
        async fetchAllEpisodes() {
            this.episodesLoading = true;
            this.errors = [];

            try {
                const allEpisodes = await axios.get("/api/shows-and-episodes");
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
                const singleEpisode = await axios.get(`/api/episode/${id}`, {withCredentials: true});
                this.episode = singleEpisode.data.data;
            } catch (error) {
                if (error.response.status === 404) {
                    this.errors = [404];
                    this.router.push("/episode-not-found");
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

            const closeButton = document.querySelector('#create-episode');

            try {
                await axios.post("/api/episode", form);
                await this.fetchAllEpisodes();
                closeButton.click();
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async updateEpisode(id, data) {
            this.isLoading = true;
            this.errors = [];

            const form = new FormData();
            form.append("_method", "PATCH");
            if (data.show_id) form.append("show_id", data.show_id);
            if (data.membership) form.append("premium", data.membership);
            if (data.title) form.append("title", data.title);
            if (data.number) form.append("number", data.number);
            if (data.description) form.append("description", data.description);
            if (data.thumbnail) form.append("thumbnail", data.thumbnail);
            if (data.video) form.append("video", data.video);

            const closeUpdateBtn = document.querySelector(`#update-episode-${id}`);

            try {
                await axios.post(`api/episode/${id}`, form);
                await this.fetchAllEpisodes();
                closeUpdateBtn.click();
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async deleteEpisode(id) {
            this.isLoading = true;
            this.errors = [];
            
            const closeDeleteBtn = document.querySelector(`#delete-episode-${id} [data-modal-hide]`);

            try {
                await axios.delete(`/api/episode/${id}`);
                await this.fetchAllEpisodes();
                closeDeleteBtn.click();
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
