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
import PageNotFound from '../views/PageNotFound.vue';
import Search from '../views/children/Search.vue';
import test from '../views/test.vue';

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
                {
                    path: 'manage_trailers',
                    name: 'manage_trailers',
                    component: ManageTrailers
                }
            ]
        },
        // 404 Page not found
        {
            path: '/:catchAll(.*)',
            name: 'PageNotFound',
            component: PageNotFound
        },
        {
            path: '/test',
            name: 'test',
            component: test
        },
    ]
})

export default router
