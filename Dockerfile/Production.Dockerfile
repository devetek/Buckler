FROM composer:latest AS env-build

COPY composer.* /app/

RUN set -xe \
 && composer install --no-dev --no-scripts --no-suggest --no-interaction --prefer-dist --optimize-autoloader

RUN composer dump-autoload --no-dev --optimize --classmap-authoritative

FROM wordpress:latest

WORKDIR /var/www/html

# prepare file and folder after build, prepare for running environment
COPY ./config/php.conf.ini /usr/local/etc/php/conf.d/conf.ini
COPY wp-content wp-content
COPY .env.example .
COPY composer.json .
COPY composer.lock .
COPY wp-config.php .
COPY --from=env-build /app/vendor /var/www/html/vendor