# syntax=docker/dockerfile:1

FROM php:8.2-apache

# Copia todos los archivos, incluyendo ConnectionApi.php
COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html