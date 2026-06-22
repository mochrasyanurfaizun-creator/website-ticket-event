#!/bin/bash

# Set Apache port dari Railway $PORT
sed -i "s/Listen 80/Listen ${PORT:-80}/" /etc/apache2/ports.conf
sed -i "s/:80>/:${PORT:-80}>/" /etc/apache2/sites-available/000-default.conf

# Set document root ke public
sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/apache2.conf

# Enable mod_rewrite
a2enmod rewrite

# Start Apache
apache2-foreground