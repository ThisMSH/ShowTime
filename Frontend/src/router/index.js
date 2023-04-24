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
import Pricing from '../views/children/Pricing.vue';
import ManageUsers from '../views/children/ManageUsers.vue';
import ManageShows from '../views/children/ManageShows.vue';
import ManageEpisodes from '../views/children/ManageEpisodes.vue';
import PageNotFound from '../views/PageNotFound.vue';

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
                    path: 'category',
                    name: 'category',
                    component: Category
                },
                {
                    path: 'show',
                    name: 'show',
                    component: Show
                },
                {
                    path: 'episode',
                    name: 'episode',
                    component: Episode
                },
            ]
        },
        {
            path: '/login',
            name: 'login',
            component: LoginView
        },
        {
            path: '/register',
            name: 'SignUp',
            component: RegisterView
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: DashboardView,
            redirect: '/dashboard/profile',
            children: [
                {
                    path: 'profile',
                    name: 'profile',
                    component: Profile
                },
                {
                    path: 'pricing',
                    name: 'pricing',
                    component: Pricing
                },
                {
                    path: 'manage_shows',
                    name: 'manage_shows',
                    component: ManageShows
                },
                {
                    path: 'manage_users',
                    name: 'manage_users',
                    component: ManageUsers
                },
                {
                    path: 'manage_episodes',
                    name: 'manage_episodes',
                    component: ManageEpisodes
                },
            ]
        },
        // 404 Page not found
        {
            path: '/:catchAll(.*)',
            name: 'PageNotFound',
            component: PageNotFound
        }
    ]
})

export default router
