FROM nginx:1.23-alpine

ARG NGINXGROUP
ARG NGINXUSER

ENV NGINXGROUP=${NGINXGROUP}
ENV NGINXUSER=${NGINXUSER}

RUN sed -i "s/user  nginx/user ${NGINXUSER}/g" /etc/nginx/nginx.conf

ADD ./docker/nginx/1.23/conf/default.conf /etc/nginx/conf.d/

RUN mkdir -p /var/www/html

RUN adduser -g ${NGINXGROUP} -s /bin/false -D ${NGINXUSER}; exit 0

RUN chown -R ${NGINXGROUP}:${NGINXUSER} /var/www
