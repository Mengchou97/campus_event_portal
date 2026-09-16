#!/bin/bash
set -e

chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

composer install --no-interaction --prefer-dist

npm install

php artisan key:generate --force


# Wait for MariaDB to be fully ready before running migrations
echo "Waiting for MariaDB host to be ready..."
until nc -z -v -w30 mysql 3306; do
  echo "Database is unavailable - sleeping 2 seconds"
  sleep 2
done

echo "Database is up! Running migrations..."
php artisan migrate --force

php artisan optimize:clear

php artisan storage:link

npm run dev -- --host &
exec apache2-foreground
