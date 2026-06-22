FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip unzip git nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

RUN composer install --optimize-autoloader --no-dev --no-interaction

# Copy nginx config
COPY nginx.conf /etc/nginx/sites-available/default

EXPOSE 8080
CMD service nginx start && php-fpm