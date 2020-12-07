FROM canals/php:latest as canalsPHP

WORKDIR /var/www/

COPY composer.json /var/www/composer.json

RUN composer update

RUN composer install
