FROM php:8.1-fpm-alpine

ARG PHPGROUP
ARG PHPUSER

ENV PHPGROUP=${PHPGROUP}
ENV PHPUSER=${PHPUSER}

RUN adduser -g ${PHPGROUP} -s /bin/sh -D ${PHPUSER}; exit 0

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

RUN sed -i "s/user = www-data/user = ${PHPUSER}/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = ${PHPGROUP}/g" /usr/local/etc/php-fpm.d/www.conf

# Install php extensions
RUN apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
    curl-dev \
    libtool \
    libxml2-dev

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN apk add --no-cache \
    bash \
    curl \
    freetype-dev \
    g++ \
    gcc \
    icu-dev \
    icu-libs \
    postgresql-client \
    zlib-dev

RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    bcmath \
    curl \
    xml \
    intl \
    pcntl

# Install composer
ENV COMPOSER_HOME /composer
ENV PATH ./vendor/bin:/composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

# Final commands
RUN apk del -f .build-deps

COPY . .

RUN composer install

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]

COPY ./docker/php/8.1/conf/php.ini $PHP_INI_DIR

USER $PHPGROUP:$PHPUSER
