# Temel PHP Apache imajı
FROM php:8.2-apache

# PHP uzantılarını yükle (isteğe bağlı)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Dosyaları Apache root'a kopyala
COPY . /var/www/html/

# Yazma izinleri (gerekirse)
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
