// Подключаем стили Tailwind
import "../css/app.css";

// Laravel-bootstrap (axios, CSRF-токен и т.п.)
import "./bootstrap";

// Vue
import { createApp } from "vue";
import App from "./components/App.vue";
import router from "./router";

// Создаём и монтируем SPA
createApp(App).use(router).mount("#app");
