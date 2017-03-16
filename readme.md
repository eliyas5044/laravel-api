<p align="center"><a href="https://laravel.com" target="_blank"><img width="150"src="https://laravel.com/laravel.png"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

# laravel-api
- First clone via `git bash` or download it. It is a RESTful api, you will find `angular2` app [here](https://github.com/eliyas5044/angular-laravel) .
- Run this command in your terminal
```
composer install
```
- Rename `.env.example` file to `.env`
- Run this command to generate key
```
php artisan key:generate
```
- Create your database and connect it via `.env` file.
- Run this command to migrate your database
```
php artisan migrate
```
- Run this command to seed your database
```
php artisan db:seed
```
- Run this command to live your RESTful api
```
php artisan serve
```

it will navigate at `http://localhost:8000/`
if you go this address in your browser, you will see nothing there !
because it's only api. Don't **forget** to start `mysql` server, if you use `mysql` or database will not connect.

You can check via [postman](https://www.getpostman.com/apps). Navigate all URI and you can see all works well.

## All end points
1. Method `GET`, `URI` - `http://localhost:8000/api/book`
2. Method `POST`, `URI` - `http://localhost:8000/api/book`
3. Method `PUT`, `URI` - `http://localhost:8000/api/book/{id}`
4. Method `DELETE`, `URI` - `http://localhost:8000/api/book/{id}`

- Clone or download [angular2](https://github.com/eliyas5044/angular-laravel) and run this app. You will see data will load from this server to your `angluar` app.

Enjoy !
