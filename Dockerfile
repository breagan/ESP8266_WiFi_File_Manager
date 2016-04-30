FROM php:5.6-apache
COPY PHP_files/ /var/www/html/
RUN chmod 777 /var/www/html/controllerIP.txt
VOLUME /var/www/html/filebin
