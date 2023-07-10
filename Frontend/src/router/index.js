import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import Main from '../views/children/Main.vue';
import Category from '../views/children/Category.vue';
import Show from '../views/children/Show.vue';
import Episode from '../views/children/Episode.vue';
import LoginView from '../views/LoginView.vue';
import RegisterView from '../views/RegisterView.vue';
import DashboardView from '../views/DashboardView.vue';
import Profile from '../views/children/Profile.vue';
import MySpace from '../views/children/MySpace.vue';
import Pricing from '../views/children/Pricing.vue';
import ManageUsers from '../views/children/ManageUsers.vue';
import ManageShows from '../views/children/ManageShows.vue';
import ManageEpisodes from '../views/children/ManageEpisodes.vue';
import ManageTrailers from '../views/children/ManageTrailers.vue';
import ManageSubtitles from '../views/children/ManageSubtitles.vue';
import ManageRecommendations from '../views/children/ManageRecommendations.vue';
import PageNotFound from '../views/PageNotFound.vue';
import Search from '../views/children/Search.vue';
import { useAuthStore } from '../stores/auth.js';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeView,
            children: [
                {
                    path: '',
                    name: 'main',
                    component: Main
                },
                {
                    path: 'category/:id',
                    name: 'category',
                    component: Category,
                    props: true
                },
                {
                    path: 'show/:id',
                    name: 'show',
                    component: Show,
                    props: true
                },
                {
                    path: 'episode/:id',
                    name: 'episode',
                    component: Episode,
                    props: true
                },
                {
                    path: 'search',
                    name: 'search',
                    component: Search
                }
            ]
        },
        {
            path: '/login',
            name: 'login',
            component: LoginView,
            beforeEnter: (to, from, next) => {
                useAuthStore().getUser ? next("/dashboard") : next();
            }
        },
        {
            path: '/register',
            name: 'SignUp',
            component: RegisterView,
            beforeEnter: (to, from, next) => {
                useAuthStore().getUser ? next("/dashboard/profile") : next();
            }
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: DashboardView,
            redirect: "/dashboard/profile",
            beforeEnter: (to, from, next) => {
                useAuthStore().getUser ? next() : next("/login");
            },
            children: [
                {
                    path: 'profile',
                    name: 'profile',
                    component: Profile
                },
                {
                    path: 'my_space',
                    name: 'my_space',
                    component: MySpace
                },
                {
                    path: 'pricing',
                    name: 'pricing',
                    component: Pricing
                },
                {
                    path: 'manage_shows',
                    name: 'manage_shows',
                    component: ManageShows,
                    beforeEnter: (to, from, next) => {
                        useAuthStore().getUser.user_type === 1 ? next() : next("/dashboard/profile");
                    },
                },
                {
                    path: 'manage_users',
                    name: 'manage_users',
                    component: ManageUsers,
                    beforeEnter: (to, from, next) => {
                        useAuthStore().getUser.user_type === 1 ? next() : next("/dashboard/profile");
                    },
                },
                {
                    path: 'manage_episodes',
                    name: 'manage_episodes',
                    component: ManageEpisodes,
                    beforeEnter: (to, from, next) => {
                        useAuthStore().getUser.user_type === 1 ? next() : next("/dashboard/profile");
                    },
                },
                {
                    path: 'manage_trailers',
                    name: 'manage_trailers',
                    component: ManageTrailers,
                    beforeEnter: (to, from, next) => {
                        useAuthStore().getUser.user_type === 1 ? next() : next("/dashboard/profile");
                    },
                },
                {
                    path: 'manage_subtitles',
                    name: 'manage_subtitles',
                    component: ManageSubtitles,
                    beforeEnter: (to, from, next) => {
                        useAuthStore().getUser.user_type === 1 ? next() : next("/dashboard/profile");
                    },
                },
                {
                    path: 'manage_recommendations',
                    name: 'manage_recommendations',
                    component: ManageRecommendations,
                    beforeEnter: (to, from, next) => {
                        useAuthStore().getUser.user_type === 1 ? next() : next("/dashboard/profile");
                    },
                }
            ]
        },
        // 404 Page not found
        {
            path: '/:catchAll(.*)',
            name: 'PageNotFound',
            component: PageNotFound
        }
    ]
});

export default router
