# PHP-FPM dev container
FROM php:8.1-fpm-alpine as dev

RUN docker-php-ext-install -j$(nproc) pdo_mysql

WORKDIR /var/www/html

# Composer install step
FROM composer:2 as build

WORKDIR /var/www/html

COPY ./composer.* ./
COPY ./database ./database

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# PHP-FPM production container
FROM dev

COPY ./docker/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY . /var/www/html
COPY --from=build /var/www/html/vendor /var/www/html/vendor

RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache
