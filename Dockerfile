# FROM php:8.1-fpm

# RUN docker-php-ext-install pdo pdo_mysql

FROM jenkins/jenkins:lts

# Switch to root to install packages
USER root

# Install PHP and Composer
RUN apt-get update \
    && apt-get install -y curl php-cli php-mbstring unzip git \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Switch back to Jenkins user
USER jenkins
