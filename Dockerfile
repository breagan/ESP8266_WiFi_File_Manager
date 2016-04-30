FROM php:5.6-apache
COPY PHP_files/ /var/www/html/
VOLUME /var/www/html/filebin
