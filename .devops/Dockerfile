FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    iputils-ping \
    git \
    unzip \
    libpq-dev \
    libxml2-dev && \
    docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader

COPY . .

RUN composer dump-autoload --optimize

EXPOSE 8000

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
