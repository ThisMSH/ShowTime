import { defineStore } from "pinia";
import axios from "axios";
import { useEpisodeStore } from "./episode";

export const useCommentStore = defineStore('comment', {
    state: () => ({
        errors: [],
        updateErrors: [],
        comment: null,
        updatedComment: null,
        isLoading: false,
        addLoading: false,
        commentDeleted: false,
    }),
    getters: {
        getComment: (state) => state.comment,
        getUpdatedComment: (state) => state.updatedComment,
        getCommentState: (state) => state.commentDeleted,
        getErrors: (state) => state.errors,
        getUpdateErrors: (state) => state.updateErrors,
    },
    actions: {
        async addComment(data) {
            this.addLoading = true;
            this.errors = [];

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
        async updateComment(data) {
            this.isLoading = true;
            this.updateErrors = [];

            const form = {"comment": data.comment};

            try {
                const editedComment = await axios.patch(`/api/comment/${data.episode_id}`, form);
                this.updatedComment = editedComment.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.updateErrors = error.response.data.errors;
                    console.log(this.updateErrors);
                }
            } finally {
                this.isLoading = false;
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