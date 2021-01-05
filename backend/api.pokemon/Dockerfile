FROM damou/php8-apache2:api-pokemon
WORKDIR /var/www/html/api.pokemon/
COPY composer.json /var/www/html/api.pokemon/composer.json
RUN composer update
RUN composer install
