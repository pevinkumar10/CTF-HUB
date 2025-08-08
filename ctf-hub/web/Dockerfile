FROM php:8.3-apache

ENV TZ=Asia/kolkata
ENV DEBIAN_FRONTEND=noninteractive 

# Admin dashboard env configuration
ENV ADMIN_USERNAME=john1018
ENV ADMIN_PASSWORD='@&(gjsb%@)!hdska'

WORKDIR /CTF-HUB

COPY . /CTF-HUB

RUN apt-get update && \
    apt-get upgrade -y

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN chown -R www-data:www-data /CTF-HUB

RUN chmod +x /CTF-HUB/scripts/entry.sh

EXPOSE 80

CMD ["/CTF-HUB/scripts/entry.sh"]