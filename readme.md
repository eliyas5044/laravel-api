<p align="center"><a href="https://laravel.com" target="_blank"><img width="150"src="https://laravel.com/laravel.png"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# laravel-api
- First clone via `git bash` or download it. It is a RESTful api, you will find `angular` app [angular-laravel](https://github.com/eliyas5044/angular-laravel) .
- Run this command in your terminal
```
composer install
```
- Rename `.env.example` file to `.env`
```
cp .env.example .env
```
- Run this command to generate key
```
php artisan key:generate
```
- Create your database and connect it via `.env` file.
- Run this command to migrate your database
```
php artisan migrate
```
- Run this command to create fake data
```
php artisan tinker
```
- Then this command
```
factory(App\Book::class, 20)->create();
```
- I used [laravel/passport](https://github.com/laravel/passport) to generate valid `token`. Please run these command to configure passport.
```
php artisan passport:install
```
```
php artisan passport:keys
```

- Run this command to live your RESTful api
```
php artisan serve
```

- Plesae navigate at `http://localhost:8000`
- Don't **forget** to start `mysql` server, if you use `mysql` or database will not connect.

- You can check via [postman](https://www.getpostman.com/apps). Navigate all URI and you can see all works well, false, it will not work as all routes are protected via `auth:api` middleware.

## All end points
1. Method `GET`, `URI` - `http://localhost:8000/api/book`
2. Method `POST`, `URI` - `http://localhost:8000/api/book`
3. Method `PUT`, `URI` - `http://localhost:8000/api/book/{id}`
4. Method `DELETE`, `URI` - `http://localhost:8000/api/book/{id}`

- Clone or download [angular](https://github.com/eliyas5044/angular-laravel) and run this app. You will see data will load from this server to your `angluar` app.

## Enjoy !
