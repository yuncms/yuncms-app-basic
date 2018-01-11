FROM yuncms/php:7.1-nginx

LABEL maintainer="xutongle@gmail.com"

ADD nginx.conf /usr/local/etc/nginx/sites/default.conf

COPY . /app/

WORKDIR /app

RUN chown -R www-data:www-data /app

