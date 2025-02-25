## Belajar Laravel 11: CRUD
Ini adalah repositori untuk dokumentasi [Percobaan development CRUD App sederhana menggunakan LARAVEL 11](https://qadrlabs.com/post/percobaan-development-crud-app-sederhana-menggunakan-laravel-11)

![image](https://cdn.jsdelivr.net/gh/gungunpriatna/tes-repositori@master/laravel/percobaan-develop-crud-app-laravel-11/Percobaan%20development%20CRUD%20App%20sederhana%20menggunakan%20LARAVEL%2011.webp)

## How to use
- Clone repositori ini menggunakan `git clone https://github.com/qadrLabs/crud-laravel-11.git`
- Copy `.env.example` menjadi `.env` dan edit credentials database di file ini.
- Run command `composer install`
- Run command `php artisan key:generate`
- Run command `php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"`
- Run command `php artisan migrate`
- Run command `php artisan serve`, lalu buka halamannya di browser.
