# docker/app/Dockerfile

# Base image with PHP & common extensions
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd

# Set working directory
WORKDIR /var/www

# Copy composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copy everything
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port
EXPOSE 9000

# Run PHP-FPM
CMD ["php-fpm"]
