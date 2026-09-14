FROM php:8.2-apache

RUN apt-get update && apt-get install -y libsqlite3-dev && \
    docker-php-ext-install pdo_sqlite && \
    rm -rf /var/lib/apt/lists/*

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html/database && \
    chmod -R 775 /var/www/html/database

RUN a2enmod rewrite
