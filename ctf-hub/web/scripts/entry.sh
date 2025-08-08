#!/bin/bash
echo "[+] CTF-HUB tea site configuring"

cp /CTF-HUB/config/site.conf  /etc/apache2/sites-available/site.conf

cp -r /CTF-HUB/src /var/www/html/ctf-hub

chmod +x /CTF-HUB/scripts/configure_flags.sh

service apache2 start

a2dissite 000-default.conf && a2ensite site.conf

service apache2 reload

bash /CTF-HUB/scripts/configure_flags.sh

echo "[✓] CTF-HUB tea shop deployed you can access it via http://localhost:5555"
tail -f /dev/null