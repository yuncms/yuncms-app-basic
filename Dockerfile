FROM yuncms/php:7.1-nginx

MAINTAINER XUTL <xutl@gmail.com>

COPY . /app/

WORKDIR /app

RUN rm -f /usr/local/etc/nginx/sites/default.conf \
	&& ln -s /app/nginx.conf /usr/local/etc/nginx/sites/nginx.conf \
	&& chown -R www-data:www-data /app

