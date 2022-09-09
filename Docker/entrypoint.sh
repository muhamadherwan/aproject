#!/bin/bash

# install composer
if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

# create .env file with env value from docker-compose.yml
if [ ! -f ".env" ]; then
    echo "Creating env file for env $APP_ENV"
    cp .env.example .env
else
    echo "env file exists."
fi

#role=${CONTAINER_ROLE:-app}

# run laravel installation
#if [ "$role" = "app" ]; then
php artisan key:generate
php artisan migrate
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# run laravel on localhost
php artisan serve --port=$PORT --host=0.0.0.0 --env=.env

exec docker-php-entrypoint "$@"

#fi
