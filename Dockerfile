FROM php:8-fpm

# Install developer dependencies
RUN apt-get update -yqq
RUN apt-get install -y git

WORKDIR /app

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./composer.json composer.json

RUN composer install --no-interaction --prefer-dist --no-suggest
