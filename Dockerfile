FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    build-essential \
    openssl

RUN useradd -G www-data,root -d /home/gym gym
RUN mkdir -p /home/gym/.composer && \
    chown -R gym:gym /home/gym

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

USER gym

COPY composer.json composer.lock ./

RUN composer install --no-interaction --no-plugins --no-scripts

COPY . .

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
