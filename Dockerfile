# Using 8.4-apache as the base
FROM php:8.4-apache

# 1. Install ONLY the necessary system headers
# We add libsqlite3-dev specifically for your database
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql pdo_sqlite zip

# 2. Enable Apache rewrite for Laravel routes
RUN a2enmod rewrite

# 3. Set Working Directory
WORKDIR /var/www/html

# 4. Copy project and set permissions
COPY . .
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 5. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 6. Configure Apache to point to /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

EXPOSE 80