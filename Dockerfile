FROM php:8.1.5-fpm

WORKDIR /app

RUN apt-get update

RUN apt-get -y install git zip libpq-dev

RUN docker-php-ext-install pdo pdo_pgsql pgsql

RUN curl -sL https://getcomposer.org/installer | php -- --install-dir /usr/bin --filename composer

RUN pecl install xdebug

COPY ~/Desktop/ZAI.conf /etc/apache2/sites-available/ZAI.conf

RUN touch /var/www/html/ZAI/index.php  \
    && chmod -R 755 /var/www/html/ZAI \
    && chown -R www-data:www-data /var/www/html/ZAI \
    && a2dissite 000-default.conf \
    && a2enssite ZAI.conf \
    && service apache2 restart

CMD ["php-fpm"]