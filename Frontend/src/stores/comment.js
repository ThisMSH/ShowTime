import { defineStore } from "pinia";
import axios from "axios";
import { useEpisodeStore } from "./episode";

export const useCommentStore = defineStore('comment', {
    state: () => ({
        errors: [],
        updateErrors: [],
        comment: null,
        isLoading: false,
        addLoading: false,
        commentDeleted: false,
    }),
    getters: {
        getComment: (state) => state.comment,
        getCommentState: (state) => state.commentDeleted,
        getErrors: (state) => state.errors,
        getUpdateErrors: (state) => state.updateErrors,
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
                const newComment = await axios.post("/api/comment", form);
                this.comment = newComment.data.data;
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
            this.updateErrors = [];

            try {
                const singleEpisode = await axios.patch(`/api/episode/${id}`);
                this.episode = singleEpisode.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.updateErrors = error.response.data.errors;
                    console.log(this.updateErrors);
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