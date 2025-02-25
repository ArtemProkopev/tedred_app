import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/contact",
        name: "contact",
        component: () => import("./components/Contact.vue"),
    },
    // другие маршруты
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
