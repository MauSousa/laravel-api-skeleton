# This is a simple skeleton for a Laravel API project.

## What is installed?

- Basic Laravel application
- Laravel Sanctum for authentication
- Laravel Pint for code formatting
- Larastan for static analysis
- PeckPHP for spelling analysis
- PestPHP for testing


## Installation

1. Clone this repository
```
git clone git@github.com:MauSousa/laravel-api-skeleton.git
```

2. Install dependencies
```
composer install
```

3. Copy `.env.example` to `.env` and fill in the values
```
cp .env.example .env
```

4. Generate the application key
```
php artisan key:generate
```

5. Run the migrations
```
php artisan migrate
```

6. Run the tests
```
./vendor/bin/pest
```

7. Run the complete test suite
```
composer test
```
