FROM yuncms/php:7.1-nginx

LABEL maintainer="xutongle@gmail.com"

ADD nginx.conf /usr/local/etc/nginx/sites/default.conf

# Environment settings
ENV YUNCMS_DB_NAME yuncms
ENV YUNCMS_DB_USER yuncms
ENV YUNCMS_DB_PASSWORD 123456
ENV YUNCMS_DB_HOST localhost

COPY . /app/

WORKDIR /app

RUN chown -R www-data:www-data /app

