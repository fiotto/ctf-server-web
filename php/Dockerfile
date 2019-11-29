FROM php:7.4-apache
RUN apt-get update && \
  # PHPのExtensionをインストール．
  docker-php-ext-install pdo_mysql mysqli

WORKDIR /var/www/html

EXPOSE 80
