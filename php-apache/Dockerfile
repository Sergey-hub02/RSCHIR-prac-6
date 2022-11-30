FROM php:8.1-apache

RUN mkdir -p /var/www/apache-server/html
RUN apt-get update -y && apt-get install -y apache2-utils libaprutil1-dbd-mysql
RUN apt-get install -y libpng-dev
RUN apt-get install zip unzip

RUN a2enmod authn_dbd
RUN docker-php-ext-install mysqli pdo pdo_mysql gd

RUN pecl install xdebug \
  && apt install libzip-dev -y \
  && docker-php-ext-enable xdebug \
  && docker-php-ext-install zip \
  && rm -rf /var/lib/apt/lists/*

COPY --from=composer /usr/bin/composer /usr/bin/composer
