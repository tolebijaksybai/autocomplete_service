#!/bin/bash

php-fpm

chown -R developer:www-data /var/www/back
chmod -R 777 /var/www/back
