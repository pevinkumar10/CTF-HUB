FROM ubuntu:20.04 

ENV TZ=Asia/kolkata
ENV DEBIAN_FRONTEND=noninteractive 

# Mysql env configuration
ENV SERVERNAME=localhost
ENV USERNAME=ctfhub
ENV PASSWORD=ctfhubpass123
ENV DB=ctf_hub

WORKDIR /CTF-HUB

RUN apt-get update && \
    apt-get upgrade -y

RUN apt-get install -y python3 \
                        apache2 \
                        php \
                        php-mysql \
                        mysql-server \
                        libapache2-mod-php

RUN chown -R www-data:www-data /CTF-HUB

EXPOSE 80 3306

COPY ./ctf-hub /CTF-HUB

CMD ["/CTF-HUB/script/entry.sh"]