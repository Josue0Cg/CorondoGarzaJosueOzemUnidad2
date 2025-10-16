# Le decimos a Docker que use la imagen de PHP 8.2 con Apache como base
FROM php:8.2-apache

RUN a2enmod rewrite


RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-install -j$(nproc) zip mysqli intl

RUN docker-php-ext-install mysqli pdo_mysql && docker-php-ext-enable mysqli pdo_mysql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer