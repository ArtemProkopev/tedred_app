import { createApp } from "vue"; // Импортируем Vue
import "./bootstrap"; // Оставляем подключение bootstrap.js
import App from "./components/App.vue"; // Импортируем главный компонент Vue

// Создаем экземпляр приложения Vue и монтируем его на элемент с id="app"
createApp(App).mount("#app");
