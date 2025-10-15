# Le decimos a Docker que use la imagen de PHP 8.2 con Apache como base
FROM php:8.2-apache

# Ejecutamos un comando para instalar la extensión mysqli y la habilitamos
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli