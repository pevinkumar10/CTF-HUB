#!/bin/bash

echo "[+] CTF-HUB database configuring"

chmod +x /DATABASE/scripts/configure_mysql.sh
chmod +x /DATABASE/scripts/configure_dummy_data.sh
chmod +x /DATABASE/scripts/configure_flags.sh

service mysql start

bash /DATABASE/scripts/configure_mysql.sh
bash /DATABASE/scripts/configure_dummy_data.sh
bash /DATABASE/scripts/configure_flags.sh

echo "[✓] CTF-HUB database configured"

tail -f /dev/null
