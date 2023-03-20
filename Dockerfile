FROM php:7.4-apache
RUN docker-php-ext-install mysqli
RUN apt-get update
RUN apt-get install vim nano -y
COPY ./php.ini-production "$PHP_INI_DIR/php.ini"