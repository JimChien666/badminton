FROM php:8.1-apache

# 全域設定
WORKDIR /var/www/html

RUN set -xe \
        && apt-get update \
        && apt-get install --no-install-recommends --no-install-suggests -y \
            sudo \
            default-mysql-client \
        && docker-php-ext-install -j$(nproc) \
        pdo_mysql