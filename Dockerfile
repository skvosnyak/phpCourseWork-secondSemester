FROM php:8.4-apache

RUN apt-get update && apt-get install -y libpq-dev zip unzip \
  && docker-php-ext-install pdo pdo_pgsql \
  && a2enmod rewrite

COPY . /var/www/html
COPY apache.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && composer install --no-interaction

RUN chown -R www-data:www-data /var/www/html \
  && chmod -R 777 /var/www/html/storage \
  && chmod -R 777 /var/www/html/bootstrap/cache