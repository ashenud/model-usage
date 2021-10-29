# UNDERSTANDING MODEL RELATIONSHIPS IN LARAVEL ELOQUENT

This project was created to understand the use of model relationships in laravel eloquent.

Here I use the Larval Passport package to check model relationships using APIs. All test data was entered using factories and seeders.

## Installation

1. Clone this repository
    ```
    $ git clone https://github.com/ashenud/model-usage.git
    ```
2. Install backend depedencies and front end depedencies.
    ```
    $ cd model-usage
    $ composer install
    ```
3. Edit configuration files.
    ```
    $ cp .env.example .env
    $ nano .env
    ```
4. Database setup and insert fake data
    ```
    $ php artisan migrate:fresh --seed
    ```
5. Generate an application key and create a passport key
    ```
    $ php artisan key:generate
    $ php artisan passport:install
    ```
6. Serve the project
    ```
    $ php artisan serve
    ```

## Usage

Use postman to check requests.

* Login URL

> `http://127.0.0.1:8000/api/login`

Credentials 

```
username : 
password : 
```

* Get stock URL

> `http://127.0.0.1:8000/api/stock/get`

Use the token you receive when logging as the authorization Bearer Token in here


## Other

How to install laravel passport package at first time (already installed and configured in this project)

- [Laravel Passport](https://laravel.com/docs/8.x/passport)


## Author

* **[Ashen Udithamal](https://www.linkedin.com/in/ashenud/)** 
