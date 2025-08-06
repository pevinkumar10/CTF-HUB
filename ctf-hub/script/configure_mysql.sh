#!/bin/bash

# === Config ===
DB_NAME="$DB"
NEW_USER="$USERNAME"
NEW_PASS="$PASSWORD"
ROOT_PASS=""

# === Creating DB, USER ===
mysql -u root -p${ROOT_PASS} <<EOF
CREATE DATABASE IF NOT EXISTS ${DB_NAME};
CREATE USER IF NOT EXISTS '${NEW_USER}'@'localhost' IDENTIFIED BY '${NEW_PASS}';
GRANT ALL PRIVILEGES ON ${DB_NAME}.* TO '${NEW_USER}'@'localhost';
FLUSH PRIVILEGES;
EOF

# === Create users table ===
mysql -u ${NEW_USER} -p${NEW_PASS} ${DB_NAME} <<EOF
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

echo "[✓] Setup complete: Database, user, and table created."