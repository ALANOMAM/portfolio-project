
FROM php:8.2.4-fpm-alpine
 
WORKDIR /var/www/html
 
COPY src .

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql

# Add user
RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel


# 👇 Copy your custom PHP config, HELP ME WITH VIDEO DIMENTIONS IN CASE I USE MINIO IN MY PROJECT
RUN echo "upload_max_filesize = 100M" > /usr/local/etc/php/conf.d/uploads.ini && \
    echo "post_max_size = 100M" >> /usr/local/etc/php/conf.d/uploads.ini

