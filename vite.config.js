import tailwindcss from "@tailwindcss/vite";
import vue from "@vitejs/plugin-vue"; // Импортируем плагин Vue
import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        tailwindcss(),
        vue(), // Добавляем плагин Vue
    ],
});
