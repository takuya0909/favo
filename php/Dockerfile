FROM php:7-fpm
COPY php.ini /usr/local/etc/php/
RUN apt-get update && docker-php-ext-install pdo_mysql