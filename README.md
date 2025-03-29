# **TedRed — Laravel + Vue Project**

---

## **🚀 Быстрый старт**

### **1. Установка**

```bash
git clone https://github.com/ArtemProkopev/tedred_app.git
cd your-project
```

### **2. Зависимости**

```bash
# PHP (Laravel)
composer install

# JavaScript (Vue + Vite)
npm install
```

### **3. Настройка `.env`**

Скопируйте `.env.example` → `.env` и настройте:

```env
DB_CONNECTION=pgsql
DB_HOST=your_supabase_host
DB_PORT=5432
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

Сгенерируйте ключ Laravel:

```bash
php artisan key:generate
```

### **4. Запуск**

```bash
# Dev-сервер (Vite + Laravel)
npm run dev

# Или production-сборка
npm run build
```

---

## **🔧 Основные команды**

| Команда                      | Описание                        |
| ---------------------------- | ------------------------------- |
| `php artisan serve`          | Запуск Laravel-сервера          |
| `npm run dev`                | Запуск Vite в режиме разработки |
| `npm run build`              | Production-сборка фронта        |
| `php artisan migrate`        | Запуск миграций                 |
| `php artisan moonshine:user` | Создать админа для Moonshine    |

---

## **📂 Структура проекта**

```bash
resources/
├── js/           # Vue-компоненты
├── css/          # Глобальные стили (Tailwind)
└── assets/       # Статика (изображения, шрифты)
```

---

## **🌐 Доступы**

-   **Frontend**: `http://localhost:5173`
-   **Backend (Laravel)**: `http://localhost:8000`
-   **Admin (Moonshine)**: `/admin`
    -   Логин: `artemprokopev@internet.ru`
    -   Пароль: `secret`

---

## **⚠️ Если что-то пошло не так**

| Ошибка                         | Решение                                          |
| ------------------------------ | ------------------------------------------------ |
| `Vite manifest not found`      | Запустите `npm run build`                        |
| `PostgreSQL connection failed` | Проверьте `.env` и доступы Supabase              |
| `Class "Moonshine" not found`  | Выполните `composer require moonshine/moonshine` |

---

## **🔗 Полезные ссылки**

-   [Документация Moonshine](https://moonshine.cutcode.dev/)
-   [Руководство по Vite + Vue](https://vitejs.dev/guide/)

---

**Поддерживается TedRed** 🎮  
_Версии пакетов актуальны на момент сборки._

---

### **Дополнительно**

-   Для работы с путями в Vite используется алиас `@` → `resources/js`
-   Конфиг Vite: [`vite.config.js`](./vite.config.js)
-   Supabase настройки: замените в `.env` на свои
