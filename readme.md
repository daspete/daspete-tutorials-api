# API for DasPeTeTutorials Web

## Setup

- get composer
- run ``` composer install ```
- create your .env file
- run ``` php artisan jwt:secret ``` to create a secret hash for the jwt auth
- be sure, you have configured your database settings in the .env file
- run ``` php artisan migrate ```
- run ``` php artisan db:seed --class="UsersTableSeeder" ```

The last command will create a basic user in the database

- Name: APIC User
- Email: user@api.dev
- Password: 123456



## Auth routes

there are some routes for the JWT auth process

### ``` /api/auth/login ```

This route generates a new JWT token, if the user exists and the password is correct


#### POST JSON

``` json
{
    "email": "x0x@xo.0x",
    "password": "xxxxxxxx"
}
```

#### Response

``` json
{
    "access_token": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
    "expires_in": "3600",
    "token_type": "bearer"
}
```

### ``` /api/auth/logout ```

This route invalidates the current JWT token of the user

#### POST Header

``` json
{
    "Authorization": "Bearer xxxxxxxxxxxxxxxxxxxxxxxxxxxx"
}
```

#### Response

``` json
{
    "logout": true
}
```



### ``` /api/auth/refresh ```

This route generates a new JWT token


#### POST Header

``` json
{
    "Authorization": "Bearer xxxxxxxxxxxxxxxxxxxxxxxxxxxx"
}
```

#### Response

``` json
{
    "access_token": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx",
    "expires_in": "3600",
    "token_type": "bearer"
}
```


### ``` /api/auth/me ```

Returns the current user datas


#### POST Header

``` json
{
    "Authorization": "Bearer xxxxxxxxxxxxxxxxxxxxxxxxxxxx"
}
```

#### Response

``` json
{
    "id": 1,
    "email": "x0x@xo.0x"
}
```

















<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](http://patreon.com/taylorotwell):

- **[Vehikl](http://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Styde](https://styde.net)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
