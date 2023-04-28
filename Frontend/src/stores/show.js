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

            try {
                await axios.post("/api/show", form);
                await this.fetchAllShows();
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

            try {
                await axios.delete(`/api/show/${id}`);
                await this.fetchAllShows();
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
