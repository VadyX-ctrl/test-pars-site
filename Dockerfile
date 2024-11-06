FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libxml2-dev \
    default-mysql-client \
    libmariadb-dev-compat \
    libmariadb-dev \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN chmod +x docker-entrypoint.sh
RUN chmod +x wait-for-it.sh

RUN composer install --no-interaction --optimize-autoloader

EXPOSE 9000

ENTRYPOINT ["./docker-entrypoint.sh"]
