import { defineStore } from "pinia";
import axios from "axios";

export const useShowStore = defineStore('show', {
    state: () => ({
        errors: [],
        show: null,
        shows: null,
        searchShows: null,
        anime: null,
        liveAction: null,
        showLoading: false,
        allShowsLoading: false,
        searchLoading: false,
        isLoading: false,
        latestLoading: false
    }),
    getters: {
        getSingleShow: (state) => state.show,
        getAllShows: (state) => state.shows,
        getSearchShows: (state) => state.searchShows,
        getLatestAnime: (state) => state.anime,
        getLatestLiveAction: (state) => state.liveAction,
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
                if (error.response.status === 404) {
                    this.router.push("/show-not-found");
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

            const closeButton = document.querySelector('#create-show');

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

            const form = new FormData();
            form.append("_method", "PATCH");
            if (data.title) form.append("title", data.title);
            if (data.season) form.append("season", data.season);
            if (data.description) form.append("description", data.description);
            if (data.category_id) form.append("category_id", data.category_id);
            if (data.prequel) form.append("prequel", data.prequel);
            if (data.sequel) form.append("sequel", data.sequel);
            if (data.cover) form.append("cover", data.cover);
            if (data.wide_cover) form.append("wide_cover", data.wide_cover);

            const closeUpdateBtn = document.querySelector(`#show-${id} [data-modal-toggle]`);

            try {
                await axios.post(`/api/show/${id}`, form);
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
                }
            } finally {
                this.isLoading = false;
            }
        },
        async latestShows() {
            this.latestLoading = true;
            this.errors = [];

            try {
                const latestAnime = await axios.get('/api/shows/latest_anime');
                const latestLiveAction = await axios.get('/api/shows/latest_live_action');

                this.anime = latestAnime.data.data;
                this.liveAction = latestLiveAction.data.data;
            } catch (error) {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
            } finally {
                this.latestLoading = false;
            }
        },
    }
});
