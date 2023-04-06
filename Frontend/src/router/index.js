import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import Main from '../views/children/Main.vue';
import Category from '../views/children/Category.vue';
import Show from '../views/children/Show.vue';
import Episode from '../views/children/Episode.vue';

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
            path: '/about',
            name: 'about',
            // route level code-splitting
            // this generates a separate chunk (About.[hash].js) for this route
            // which is lazy-loaded when the route is visited.
            component: () => import('../views/AboutView.vue')
        }
    ]
})

export default router
