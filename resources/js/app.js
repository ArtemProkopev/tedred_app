import { createApp } from "vue"; // Импортируем Vue
import "./bootstrap"; // Оставляем подключение bootstrap.js
import App from "./components/App.vue"; // Импортируем главный компонент Vue
import router from "./router"; // Импортируем маршруты

// Создаем экземпляр приложения Vue и монтируем его на элемент с id="app"
createApp(App).use(router).mount("#app");
