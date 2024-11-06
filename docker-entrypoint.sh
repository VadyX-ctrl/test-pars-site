#!/bin/sh
set -e

./wait-for-it.sh mysql:3306 --timeout=30 --strict -- echo "MySQL is up"

php bin/console doctrine:migrations:migrate --no-interaction

php-fpm
