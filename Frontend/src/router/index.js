import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import Main from '../views/children/Main.vue';
import Category from '../views/children/Category.vue';
import Show from '../views/children/Show.vue';
import Episode from '../views/children/Episode.vue';
import LoginView from '../views/LoginView.vue';

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
        }
    ]
})

export default router
