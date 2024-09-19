FROM php:8.1-fpm

ENV TZ=Asia/Almaty \
    USER=developer \
    USER_GROUP=www-data

RUN apt-get update -q && apt-get install -yq --no-install-recommends \
         git \
         curl \
         zip \
         unzip \
         libxml2-dev \
         libzip-dev \
         libonig-dev \
         locales \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN sed -i -e \
  's/# ru_RU.UTF-8 UTF-8/ru_RU.UTF-8 UTF-8/' /etc/locale.gen \
   && locale-gen

ENV LANG ru_RU.UTF-8
ENV LANGUAGE ru_RU:ru
ENV LC_LANG ru_RU.UTF-8
ENV LC_ALL ru_RU.UTF-8

RUN docker-php-ext-install mbstring zip opcache

RUN groupadd --force -g 1000 ${USER} \
    && useradd -ms /bin/bash --no-user-group -g 1000 -u 1000 ${USER} \
    && usermod -aG sudo ${USER} \
    && usermod -aG sudo ${USER_GROUP}

RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

COPY _docker/local/app/php.ini /usr/local/etc/php/conf.d/local.ini
COPY _docker/local/app/php-fpm.conf /usr/local/etc/php-fpm.d/www.conf
COPY _docker/local/entrypoint.sh /usr/local/bin/

RUN chmod +x /usr/local/bin/entrypoint.sh

WORKDIR /var/www/back
EXPOSE 9000

CMD ["/usr/local/bin/entrypoint.sh"]