import { defineStore } from "pinia";
import axios from "axios";

export const useShowStore = defineStore('show', {
    state: () => ({
        errors: [],
        show: null,
        shows: null,
        searchShows: null,
        showLoading: false,
        allShowsLoading: false,
        searchLoading: false,
        isLoading: false
    }),
    getters: {
        getSingleShow: (state) => state.show,
        getAllShows: (state) => state.shows,
        getSearchShows: (state) => state.searchShows,
        getErrors: (state) => state.errors
    },
    actions: {
        async fetchAllShows() {
            this.allShowsLoading = true;
            this.errors = [];

            try {
                const allShows = await axios.get("/api/show");
                this.shows = allShows.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                }
            } finally {
                this.allShowsLoading = false;
            }
        },
        async fetchShow(id) {
            this.showLoading = true;
            this.errors = [];

            try {
                const singleShow = await axios.get(`/api/show/${id}`);
                this.show = singleShow.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                }
            } finally {
                this.showLoading = false;
            }
        },
        async searchForShow(search) {
            this.searchLoading = true;
            this.errors = [];

            try {
                const searchShow = await axios.get(`/api/show/search/${search}`);
                this.searchShows = searchShow.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                }
            } finally {
                this.searchLoading = false;
            }
        },
        async addShow(data) {
            this.isLoading = true;
            this.errors = [];

            const form = new FormData();
            form.append("title", data.title);
            form.append("season", data.season);
            form.append("description", data.description);
            form.append("category_id", data.category);
            form.append("prequel", data.prequel);
            form.append("sequel", data.sequel);
            form.append("cover", data.cover);
            form.append("wide_cover", data.wide_cover);

            const closeButton = document.querySelector('#create-show [data-modal-toggle]');

            try {
                await axios.post("/api/show", form);
                await this.fetchAllShows();
                closeButton.click();
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async updateShow(id, data) {
            this.isLoading = true;
            this.errors = [];

            // const form = new FormData();
            // if (data.title) form.append("title", data.title);
            // if (data.season) form.append("season", data.season);
            // if (data.description) form.append("description", data.description);
            // if (data.category_id) form.append("category_id", data.category_id);
            // if (data.prequel) form.append("prequel", data.prequel);
            // if (data.sequel) form.append("sequel", data.sequel);
            // if (data.cover) form.append("cover", data.cover);
            // if (data.wide_cover) form.append("wide_cover", data.wide_cover);
            // console.log(Array.from(form.entries()));

            const form = {};
            if (data.title) form.title = data.title;  
            if (data.season) form.season = data.season; 
            if (data.description) form.description = data.description; 
            if (data.category_id) form.category_id = data.category_id; 
            if (data.prequel) form.prequel = data.prequel; 
            if (data.sequel) form.sequel = data.sequel; 
            if (data.cover) form.cover = data.cover; 
            if (data.wide_cover) form.wide_cover = data.wide_cover; 
            // console.log(form);

            const header = {
                headers: {
                    'Accept': 'application/json',
                    // 'Content-Type': 'multipart/form-data',
                    // 'Content-Type': 'application/x-www-form-urlencoded',
                }
            };

            const closeUpdateBtn = document.querySelector(`#show-${id} [data-modal-toggle]`);

            try {
                await axios.patch(`/api/show/${id}`, form);
                await this.fetchAllShows();
                closeUpdateBtn.click();
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.isLoading = false;
            }
        },
        async deleteShow(id) {
            this.isLoading = true;
            this.errors = [];
            const closeDeleteBtn = document.querySelector(`#delete-show-${id} [data-modal-hide]`);

            try {
                await axios.delete(`/api/show/${id}`);
                await this.fetchAllShows();
                closeDeleteBtn.click();
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
