# iLevel task #
1. Clone this repository [https://github.com/vladkudinov89/iLevel](https://github.com/vladkudinov89/iLevel)
2. Install & run project locally or in container with [docker-compose](https://dotsandbrackets.com/quick-intro-to-docker-compose-ru/)
Execute commands in docker-compose:
    - Execute `cp .env.example .env`
    - Run docker `docker-compose up -d`
    - Install composer-package `docker-compose exec app composer install`
    - Execute _php artisan_ commands `docker-compose exec app php artisan migrate:fresh --seed`
3. Execute test run `docker-compose exec app php ./vendor/bin/phpunit`.

After operation with docker-compose open application in `localhost:8001` in your browser.

Stop application execute `docker-compose dowm` 
