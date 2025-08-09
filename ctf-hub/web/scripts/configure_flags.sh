#!/bin/bash

# == LFI Flag ==
echo "[+] Configuring LFI flag ."
cp /CTF-HUB/flags/ma1nta1nanc3_n0t3s.js  /var/www/html/ctf-hub/js/

echo "[✓] LFI Flag Configured."

# == CMD Injection flag ==
echo "[+] Configuring CMD injection flag ."
cp /CTF-HUB/flags/dev-notes.txt /var/www/html/ctf-hub/

echo "[✓] CMD injection Flag Configured."

