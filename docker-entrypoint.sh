#!/bin/bash
set -e

php bin/console doctrine:migrations:migrate --no-interaction

php -S 0.0.0.0:8000 -t public