import { defineStore } from "pinia";
import axios from "axios";
import { useEpisodeStore } from "./episode";

export const useCommentStore = defineStore('comment', {
    state: () => ({
        errors: [],
        comment: null,
        isLoading: false,
        addLoading: false,
    }),
    getters: {
        getComment: (state) => state.comment
    },
    actions: {
        async addComment(data) {
            this.addLoading = true;
            this.errors = [];

            const episode = useEpisodeStore();
            const form = new FormData();
            form.append("comment", data.comment);
            form.append("episode_id", data.episode_id);

            try {
                await axios.post("/api/comment", form);
                await episode.fetchEpisode(data.episode_id);
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                }
            } finally {
                this.addLoading = false;
            }
        },
        async updateComment(id) {
            this.episodeLoading = true;
            this.errors = [];

            try {
                const singleEpisode = await axios.patch(`/api/episode/${id}`);
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
        async deleteComment(id) {
            this.isLoading = true;
            this.errors = [];

            try {
                await axios.delete(`/api/comment/${id}`);
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                }
            } finally {
                this.isLoading = false;
            }
        }
    }
});