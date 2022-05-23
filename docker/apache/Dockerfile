FROM php:7.4.29-apache


RUN apt-get update && apt-get install git -y

RUN git clone https://github.com/wiktorderen/ZAI /var/www/html/
#RUN mv -f /var/www/html/ZAI/* ../
COPY ./ZAI.conf /etc/apache2/sites-available/
COPY ./.env /var/www/html/


RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN composer update

RUN chmod -R 777 /var/www/html/
RUN chown -R www-data:www-data /var/www/html/

RUN a2ensite ZAI.conf
RUN a2dissite 000-default.conf
RUN service apache2 restart

RUN php bin/console cache:pool:clear cache.global_clearer

#RUN apt-get update \
#&& apt-get install -y \
#&& apt-get autoremove -y \
#&& docker-php-ext-install mysqli pdo pdo_mysql \
#&& apt-get install curl -y \
#&& apt-get install git -y\
#&& apt-get install zip -y\
#&& mv /root/.symfony/bin/symfony /usr/local/bin/symfony \
#&& touch /var/www/html/index.php \
#&& chmod -R 755 /ZAI \
#&& chown -R www-data:www-data /ZAI \
#&& a2dissite 000-default.conf \
#&& a2enssite ZAI.conf \
#&& service apache2 restart



#COPY --from=composer /usr/bin/composer /usr/bin/composer

#WORKDIR /var/www/html

EXPOSE 8888