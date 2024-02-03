FROM php:8.0-apache

COPY ./forms-profissional /var/www/html/

RUN chown -R www-data:www-data /var/www/html

# Habilita o módulo rewrite do Apache
RUN a2enmod rewrite

# Define o diretório raiz do Apache para o diretório do seu aplicativo
WORKDIR /var/www/html

