# Laravel 11 + Inertia.js + Vuetify Starter

Это базовый проект, объединяющий Laravel 11, Inertia.js и Vuetify. Он предназначен для быстрого старта новых проектов и может быть использован в качестве шаблона.

## Состав проекта
- [Laravel 11 — серверная часть на современном PHP-фреймворке.](https://laravel.su/docs/11.x/installation) 
- [Inertia.js — для создания динамичных Vue.js страниц без API.](https://inertiajs.com/) 
- [Vuetify — UI-компоненты Material Design для Vue.js.](https://vuetifyjs.com/en/)

## Дополнительные зависимости
- [tighten/ziggy - Laravel маршруты в JavaScript](https://github.com/tighten/ziggy)
- @mdi/font - Material Design Icons


## Установка проекта
```bash
git clone https://github.com/MarcusLestrange/LaravelStarter.git

composer update
npm install
cp .env.example .env
php artisan key:generate

php artisan serve
npm run dev
```
