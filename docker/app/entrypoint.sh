#!/bin/sh

# Exit immediately if a command fails
set -e

# Run migrations (optional)
php artisan migrate --force || true

# Clear and cache configs
php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan route:cache
php artisan view:clear
php artisan view:cache

# Set storage permissions
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Start PHP-FPM
exec "$@"
