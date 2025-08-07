#!/bin/bash

# === Creating DB, USER ===
mysql -u root  <<EOF
CREATE DATABASE IF NOT EXISTS ctf_hub;
CREATE USER IF NOT EXISTS 'ctfhub'@'localhost' IDENTIFIED BY 'ctfhubpass123';
GRANT ALL PRIVILEGES ON ctf_hub.* TO 'ctfhub'@'localhost';
FLUSH PRIVILEGES;
EOF

# === Create users table ===
mysql -u ctfhub -p'ctfhubpass123' ctf_hub <<EOF
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(32) NOT NULL,
  email VARCHAR(32) NOT NULL,
  password VARCHAR(32) NOT NULL,
  phone VARCHAR(10),
  city VARCHAR(128),
  address VARCHAR(128)
);
EOF

# === Configuring permissions ===
usermod -aG mysql www-data

echo "[✓] Setup complete: Database, user, and table created."