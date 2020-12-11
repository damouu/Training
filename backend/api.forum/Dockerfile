FROM php:api.forum
WORKDIR /var/www/html/api.forum/
COPY composer.json /var/www/html/api.forum/composer.json
RUN composer update
RUN composer install
