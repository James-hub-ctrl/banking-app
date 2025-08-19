# Use PHP + Apache
FROM php:8.1-apache

# Copy all files to Apache server folder
COPY . /var/www/html/

# Enable mysqli (for MySQL)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

EXPOSE 80



