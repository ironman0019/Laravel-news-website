## Laravel news website

## Description
This is simple laravel news website project with full authentication with sending emails useing gmail smtp and admin panel with full CRUD functionality.

## Installation
1. Clone the project
2. Navigate to the project's root directory using terminal
3. Create `.env` file - `cp .env.example .env`
4. Config `.env` file mysql & mail setup.
5. Execute `composer install`
6. Execute `npm install`
7. Set application key - `php artisan key:generate --ansi`
8. Execute migrations - `php artisan migrate`
9. Start vite server - `npm run dev`
10. Start Artisan server - `php artisan serve`

## TODO
1. Dockerize the project.