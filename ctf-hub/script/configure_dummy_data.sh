#!/bin/bash

echo "[*] Inserting dummy users..."

mysql -u ctfhub -p'ctfhubpass123' ctf_hub <<EOF

INSERT INTO users (id, name, email, password, phone, city, address)
VALUES (1001, 'john', 'john@ctfhub.com', md5('john123'), '9876543210', 'Chennai', 'No.13, Nageswara Rao Rd, T. Nagar, Chennai, TN 600017');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('adam', 'adam@ctfhub.com', md5('@adam123adam'), '9853533411', 'Chennai', 'Badri Veeraswamy Lane, NSC Bose Rd, Sowcarpet, Chennai');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('kevin', 'kevin@ctfhub.com', md5('@IamKeViN007'), '8643269341', 'Chennai', 'Station Border Rd, Tambaram Sanatorium, Chennai');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('lara', 'lara@ctfhub.com', md5('lara@007'), '9123456780', 'Chennai', 'Anna Nagar West, Chennai');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('ron', 'ron@ctfhub.com', md5('ron@99'), '9012345678', 'Chennai', 'Mount Road, Chennai');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('hermione', 'hermione@ctfhub.com', md5('magic@potter'), '9876501234', 'Chennai', 'Poonamallee High Road, Chennai');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('harry', 'harry@ctfhub.com', md5('scar@potter'), '9876512345', 'Chennai', 'Mylapore, Chennai');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('george', 'george@ctfhub.com', md5('twin@fun'), '9876523456', 'Chennai', 'Guindy, Chennai');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('fred', 'fred@ctfhub.com', md5('twin@chaos'), '9876534567', 'Chennai', 'Teynampet, Chennai');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('flag', 'flag@ctfhub.com', md5('fl@g_p@ssword'), '0000000000', 'CTFHub', 'flag');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('bella', 'bella@ctfhub.com', md5('bella123'), '9876543201', 'Chennai', 'Nungambakkam, Chennai');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('tom', 'tom@ctfhub.com', md5('catmouse'), '9876543202', 'Chennai', 'Triplicane, Chennai');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('jerry', 'jerry@ctfhub.com', md5('mousecat'), '9876543203', 'Chennai', 'Perambur, Chennai');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('david', 'david@ctfhub.com', md5('davidpass'), '9876543204', 'Chennai', 'Kodambakkam, Chennai');

INSERT INTO users (name, email, password, phone, city, address)
VALUES ('nancy', 'nancy@ctfhub.com', md5('nancy321'), '9876543205', 'Chennai', 'Ashok Nagar, Chennai');

EOF

echo "[✓] 15 dummy users inserted with flag set at user 10."

mysql -u ctfhub -p'ctfhubpass123' ctf_hub <<EOF

INSERT INTO cart (user_id, product_name, quantity, price, order_date, is_ordered)
VALUES
(1001, 'Masala Chai', 2, 50, NOW(), 1),
(1001, 'Green Chai', 1, 45, NOW(), 1);

INSERT INTO cart (user_id, product_name, quantity, price, order_date, is_ordered)
VALUES
(1002, 'Butter Tea', 3, 55, NOW(), 1);

INSERT INTO cart (user_id, product_name, quantity, price, order_date, is_ordered)
VALUES
(1003, 'Sulaimani Chai', 1, 35, NOW(), 1),
(1003, 'Tulsi Chai', 2, 40, NOW(), 1);

INSERT INTO cart (user_id, product_name, quantity, price, order_date, is_ordered)
VALUES
(1004, 'Earl Gray Tea', 1, 65, NOW(), 1);

INSERT INTO cart (user_id, product_name, quantity, price, order_date, is_ordered)
VALUES
(1005, 'Kashmiri Kahwa', 1, 70, NOW(), 1),
(1005, 'Masala Chai', 1, 50, NOW(), 1);

EOF