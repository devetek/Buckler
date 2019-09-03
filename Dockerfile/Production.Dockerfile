FROM wordpress:5.2.2

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./config/php.conf.ini /usr/local/etc/php/conf.d/conf.ini
COPY .env.example .
COPY composer.json .
COPY composer.lock .
COPY wp-config.php .
COPY vendor/ /var/www/html/vendor