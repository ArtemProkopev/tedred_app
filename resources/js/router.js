import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/contact",
        name: "contact",
        component: () => import("./components/Contact.vue"),
    },
    {
        path: "/news",
        name: "news",
        component: () => import("./components/News.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
