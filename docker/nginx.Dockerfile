FROM nginx:1.19-alpine

WORKDIR /var/www/html

COPY ./docker/nginx.conf /etc/nginx/nginx.conf
COPY public ./public
