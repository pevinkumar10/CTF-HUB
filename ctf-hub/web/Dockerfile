# Using php:8.3-apache As Base Image.
FROM php:8.3-apache

# Configuring Env Variables.
ENV TZ=Asia/kolkata
ENV DEBIAN_FRONTEND=noninteractive 

# Setting Working Directory.
WORKDIR /CTF-HUB

# Copy All Files Into Container.
COPY . /CTF-HUB

# Updating & Upgrading.
RUN apt-get update && \
    apt-get upgrade -y

# Installing Dependancies.
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Changing Ownership To www-data.
RUN chown -R www-data:www-data /CTF-HUB

# Adding Execution Permission To Entrypoint Script.
RUN chmod +x /CTF-HUB/scripts/entry.sh

# Exposing Port 80.
EXPOSE 80

# Running Entrypoint Script As Entrypoint.
ENTRYPOINT ["/CTF-HUB/scripts/entry.sh"]