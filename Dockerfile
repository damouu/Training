FROM php:8.0.0-apache-buster

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt update\
&& apt upgrade -y\
&& apt install nano -y\
&& apt install git -y\

RUN composer create-project --prefer-dist laravel/lumen blog
