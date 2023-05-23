FROM PHP:8.1-fpm

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin -- filename=composer

WORKDIR /var/www

CMD ["php-fpm"]
