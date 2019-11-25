<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# laravel-api
- First clone via `git bash` or download it. It is a RESTful api, you will find `angular` app [angular-laravel](https://github.com/eliyas5044/angular-laravel) .

- Create your database with name `laravel_api`, you may change later.

- After creating database, run this command in your terminal
```
make init
```

- Run this command to live your RESTful api
```
php artisan serve
```

- You can check via [postman](https://www.getpostman.com/apps). All books routes are protected by `auth:api` middleware, so you have to register or login to navigate those uri's.

## All end points
### user routes
1. `http://localhost:8000/api/register`
2. `http://localhost:8000/api/login`
3. `http://localhost:8000/api/logout`
4. `http://localhost:8000/api/me`
5. `http://localhost:8000/api/refresh`

### book routes
1. Method `GET`, `URI` - `http://localhost:8000/api/book`
2. Method `POST`, `URI` - `http://localhost:8000/api/book`
3. Method `PUT`, `URI` - `http://localhost:8000/api/book/{id}`
4. Method `DELETE`, `URI` - `http://localhost:8000/api/book/{id}`

- Clone or download [angular](https://github.com/eliyas5044/angular-laravel) and run this app. You will see data will load from this server to your `angluar` app.

## Enjoy !
