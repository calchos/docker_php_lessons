FROM php:7.4-fpm
COPY php.ini /usr/local/etc/php/
RUN apt-get update && apt-get install -y \
	gcc \
	make \
	git \
	unzip \
	vim \
	curl \
	locales \
	&& docker-php-ext-install pdo_mysql mysqli
