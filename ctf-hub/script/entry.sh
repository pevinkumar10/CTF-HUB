#!/bin/bash

cp /CTF-HUB/config/site.conf  /etc/apache2/sites-available/site.conf

cp -r /CTF-HUB/src /var/www/html/ctf-hub

a2dissite 000-default.conf && a2ensite site.conf

chmod +x /CTF-HUB/script/configure_mysql.sh
chmod +x /CTF-HUB/script/configure_flags.sh

service mysql start
service apache2 start

bash /CTF-HUB/script/configure_mysql.sh
bash /CTF-HUB/script/configure_flags.sh

tail -f /dev/null