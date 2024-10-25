FROM nginx:alpine

WORKDIR /var/www/html

COPY ./docker/nginx/default.conf /etc/nginx/conf.d

COPY ./www /var/www/html

CMD ["nginx", "-g", "daemon off;"]