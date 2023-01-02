FROM php:8.1

# 全域設定
WORKDIR /var/www/html

RUN set -xe \
        && docker-php-ext-install -j$(nproc) \
        pdo_mysql

CMD ["php", "artisan", "serve", "--host", "0.0.0.0"]