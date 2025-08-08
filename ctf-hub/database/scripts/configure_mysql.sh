#!/bin/bash

# === Creating DB, USER ===
mysql -u root <<EOF
CREATE DATABASE IF NOT EXISTS ctf_hub;
CREATE USER IF NOT EXISTS 'ctfhub'@'%' IDENTIFIED BY 'ctfhubpass123';
CREATE USER IF NOT EXISTS 'ctfhub'@'localhost' IDENTIFIED BY 'ctfhubpass123';
GRANT ALL PRIVILEGES ON ctf_hub.* TO 'ctfhub'@'%';
GRANT ALL PRIVILEGES ON ctf_hub.* TO 'ctfhub'@'localhost';
FLUSH PRIVILEGES;
EOF

echo "[✓] DB User created."

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

echo "[✓] Users table created."

# === Create orders table ===
mysql -u ctfhub -p'ctfhubpass123' ctf_hub <<EOF
CREATE TABLE IF NOT EXISTS cart (
  order_id int NOT NULL AUTO_INCREMENT,
  user_id int NOT NULL,
  product_name varchar(64) NOT NULL,
  quantity int NOT NULL,
  price int NOT NULL,
  order_date date NOT NULL,
  is_ordered int NOT NULL DEFAULT '0',
  is_delivered int NOT NULL DEFAULT '0',
  PRIMARY KEY (order_id),
  KEY user_id (user_id),
  CONSTRAINT orders_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (id)
);
EOF

echo "[✓] Orders table created."

