FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

COPY .docker/apache/apache-vhost.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /var/www/html/database

EXPOSE 80