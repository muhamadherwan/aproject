# get this php image
FROM php:8.1 as php

# update server packages
RUN apt-get update -y

# install extension in server
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev

# install extension for php
RUN docker-php-ext-install pdo pdo_mysql bcmath

# install redis
RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

# set the webroot inside the php container
WORKDIR /var/www
# copy local webroot to php container container
COPY . .

# install composer inside this server
COPY --from=composer:2.3.5 /usr/bin/composer /usr/bin/composer

ENV PORT=8000

# set entry point to run composer and artisan bash file
#COPY ./entrypoint.sh /entrypoint.sh
RUN chmod +x Docker/entrypoint.sh
#RUN chmod 755 Docker/entrypoint.sh
ENTRYPOINT [ "Docker/entrypoint.sh" ]
