# skeleton-ddd-laravel-api
Skeleton for API Laravel with architecture DDD (Domain Driven Design)

## Dependencies
  - php 7.2
  - mysql 5.7
  - npm
  - composer

## How to install

```shell
composer create-project ruverd/skeleton-ddd-laravel-api
cd skeleton-ddd-laravel-api
npm install
php artisan jwt:generate
```

Configure the `.env` file after configuring run the command below to create the database:

```shell
php artisan migrator
```
