FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip unzip git nginx \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

RUN composer install --optimize-autoloader --no-dev --no-interaction

COPY nginx.conf /etc/nginx/sites-available/default

EXPOSE 8080

# Pakai shell script biar nginx dan php-fpm jalan bersamaan
CMD bash -c "php-fpm -D && nginx -g 'daemon off;'"