# test-pars-site

## Update hosts file (add to /etc/hosts):
127.0.0.1   test-pars-site.loc

## Set execute permissions
chmod +x docker-entrypoint.sh wait-for-it.sh

## Build and run containers
docker-compose up --build

## Access the application at:
http://test-pars-site.loc

## Run database migrations (if necessary)
docker-compose exec symfony php bin/console doctrine:migrations:migrate

## Common commands:

## Stop containers
docker-compose down

## Rebuild containers
docker-compose build

## View logs
docker-compose logs

## Enter the Symfony container
docker-compose exec symfony bash

## Run Symfony console commands
docker-compose exec symfony php bin/console <command>

# Short Troubleshooting Guide

## If permissions issues occur:
chmod +x docker-entrypoint.sh wait-for-it.sh
docker-compose build

## If database connection errors occur:
docker-compose down
docker-compose up --build

## If 404 Not Found errors occur:
## - Verify routes are correctly configured in Symfony.
## - Check Nginx configuration.
## - Restart containers after changes.

## To clear Symfony cache:
docker-compose exec symfony php bin/console cache:clear

## To remove all containers, volumes, and images (use with caution):
docker-compose down -v
docker system prune -af
