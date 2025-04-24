// vite.config.js
import tailwindcss from "@tailwindcss/vite";
import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import path from "path";
import { defineConfig } from "vite";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
            // если хотите самописную папку сборки:
            // buildDirectory: 'build'
        }),
        vue(),
        tailwindcss(),
    ],
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "resources/js"),
            "@assets": path.resolve(__dirname, "resources/assets"),
        },
    },
    server: {
        port: 3000,
        strictPort: true,
        proxy: {
            "/api": {
                target: "http://localhost:8000",
                changeOrigin: true,
                rewrite: (p) => p.replace(/^\/api/, ""),
            },
        },
    },
    build: {
        // по умолчанию Laravel ищет manifest именно здесь:
        outDir: "public/build",
        emptyOutDir: true,
        manifest: true,
    },
});
