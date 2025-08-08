#!/bin/bash

# == LFI Flag ==
echo "[+] Configuring LFI flag ."
cp /CTF-HUB/flags/ma1nta1nanc3_n0t3s.js  /CTF-HUB/src/js

echo "[✓] LFI Flag Configured."

# == CMD Injection flag ==
echo "[+] Configuring CMD injection flag ."
cp /CTF-HUB/flags/dev-notes.txt /CTF-HUB/src/

echo "[✓] CMD injection Flag Configured."

