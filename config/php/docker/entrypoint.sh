#!/bin/bash

set -e

# Composer install
cd /home/hellobees/www
if [ -e /home/hellobees/www/composer.json ]; then
  composer install
fi

echo "HelloBees ready on http://hellobees.localhost:8888/"

php-fpm
