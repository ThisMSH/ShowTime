import { defineStore } from "pinia";
import axios from "axios";
import { toast } from 'vue3-toastify';

export const useSubtitleStore = defineStore('subtitle', {
    state: () => ({
        errors: [],
        subtitles: null,
        isLoading: false
    }),
    getters: {
        getAllSubtitles: (state) => state.subtitles,
        getErrors: (state) => state.errors
    },
    actions: {
        async fetchAllSubtitles() {
            this.errors = [];
            this.isLoading = true;

            try {
                const allSubs = await axios.get("/api/shows-and-subtitles");
                this.subtitles = allSubs.data.data;
            } catch (error) {
                toast.error("You are not authenticated or authorized for this request.");
            } finally {
                this.isLoading = false;
            }
        },
        async addSubtitle(data) {
            this.errors = [];
            this.isLoading = true;

            const form = new FormData();
            form.append("episode_id", data.epiID);
            form.append("subtitle_name", data.subName);
            form.append("subtitle_file", data.subFile);

            const closeAddSubModel = document.querySelector("#create-subtitle");

            try {
                const newSub = await axios.post("/api/subtitle", form);
                await this.fetchAllSubtitles();
                closeAddSubModel.click();
                toast.success(newSub.data.message);
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async updateSubtitle(id, data) {
            this.errors = [];
            this.isLoading = true;

            const form = new FormData();
            form.append("_method", "PATCH");
            if (data.epiID) form.append("episode_id", data.epiID);
            if (data.subName) form.append("subtitle_name", data.subName);
            if (data.subFile) form.append("subtitle_file", data.subFile);

            const closeUpdateSubModel = document.querySelector(`#create-subtitle-${id}`);

            try {
                const updatedSub = await axios.post(`/api/subtitle/${id}`, form);
                await this.fetchAllSubtitles();
                closeUpdateSubModel.click();
                toast.success(updatedSub.data.message);
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async deleteSubtitle(id) {
            this.errors = [];
            this.isLoading = true;

            const closeDeleteSubModel = document.querySelector(`#delete-subtitle-${id}`);

            try {
                const deleteSub = await axios.delete(`/api/subtitle/${id}`);
                await this.fetchAllSubtitles();
                closeDeleteSubModel.click();
                toast.success(deleteSub.data.message);
            } catch (error) {
                toast.error("An error has occurred!");
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
    }
});
