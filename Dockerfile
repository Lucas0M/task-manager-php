FROM php:8.2-apache

RUN apt-get update && apt-get install -y libsqlite3-dev && \
    docker-php-ext-install pdo_sqlite && \
    rm -rf /var/lib/apt/lists/*

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html/database && \
    chmod -R 775 /var/www/html/database

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
