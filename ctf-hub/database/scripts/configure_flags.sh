# == IDOR flag ==
echo "[+] Configuring IDOR flag ."

mysql -u ctfhub -p'ctfhubpass123' ctf_hub <<EOF
INSERT INTO cart (user_id, product_name, quantity, price, order_date, is_ordered, is_delivered)
VALUES ('1010', 'f1ag{ID0R_1s_Scary_If_P11_Exp0s3d}', '1', '1', now(), '1', '0');
EOF

echo "[✓] IDOR Flag Configured."