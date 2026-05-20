# Каталог фильмов

Тестовое веб-приложение для просмотра и оценки фильмов, построенное на Laravel 13 и PostgreSQL.

## Стек

- PHP 8.4 + Apache
- Laravel 13
- PostgreSQL 16
- Docker
- Docker Compose
- GNU Makefile

## Функциональность

- Просмотр каталога фильмов
- Фильтрация по жанру и поиск по названию (без перезагрузки страницы)
- Страница фильма со средним рейтингом на основе рецензий
- Добавление, редактирование и удаление фильмов (необходим вход)
- Добавление рецензий с оценкой от 1 до 10 (необходим вход)

## Структура проекта

```
CourseProject/
├── app/
│   ├── Http/Controllers/
│   │   ├── MovieController.php
│   │   └── ReviewController.php
|   ├── Http/Middleware/ 
|   |   └── AdminMiddleware.php
│   └── Models/
│       ├── Movie.php
|       ├── Review.php
│       └── User.php
├── database/
│   ├── migrations/
│   └── seeders/
│       └── MovieSeeder.php
├── resources/views/
|   ├── auth/
|   |   └──login.blade.php
│   ├── layouts/
│   │   └── app.blade.php
│   └── movies/
│       ├── index.blade.php
│       ├── show.blade.php
│       ├── create.blade.php
│       └── edit.blade.php
├── public/css/
├── Dockerfile
├── docker-compose.yml
└── Makefile
```

## Запуск

1. Склонировать репозиторий:
```bash
git clone <url>
cd CourseProject
```

2. Создать `.env` файл:
```bash
cp .env.example .env
```

Заполнить переменные:
```env
APP_KEY=
DB_PASSWORD=yourpassword
```

3. Запустить контейнеры:
```bash
make up-build
```

4. Выполнить миграции и заполнить БД:
```bash
docker compose exec app php artisan migrate --seed
```

Приложение доступно на `http://localhost:8080/movies`

Данные для получения прав на редактирование и добавление фильмов :

Login: admin

Password: admin123

## Команды

```bash
make up          # запустить контейнеры
make up-build    # пересобрать и запустить
make down        # остановить контейнеры
make rebuild     # пересобрать с нуля
make logs-app    # логи веб-сервера
make logs-bd     # логи базы данных
make bash        # войти в контейнер
make kill        # принудительно остановить
```

## Маршруты

| Метод | URL | Описание |
|---|---|---|
| GET | `/movies` | Список фильмов |
| GET | `/movies/create` | Форма добавления |
| POST | `/movies` | Сохранить фильм |
| GET | `/movies/{id}` | Страница фильма |
| GET | `/movies/{id}/edit` | Форма редактирования |
| PUT | `/movies/{id}` | Обновить фильм |
| DELETE | `/movies/{id}` | Удалить фильм |
| POST | `/movies/{id}/reviews` | Добавить рецензию |
| POST | `/login` | Аутентификация и авторизация |
| POST | `/logout` | Завершение сессии администратора |