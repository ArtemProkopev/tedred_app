import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "main",
        component: () => import("./components/Main.vue"),
    },
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
