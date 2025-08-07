<?php

class user
{
    public static $user_data = [];


    public static function login($result, $password)
    {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                user::$user_data = $row;
            }
            $user_pass_hash = user::$user_data["password"];
            $password_hash = md5($password);
            if ($password_hash == $user_pass_hash) {
                return user::$user_data;
            }
        } else {
            return false;
        }
    }

    public static function signup($name, $email, $password)
    {
        $result = db::insert_user($name, $email, $password);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public static function update_profile($uid, $name, $email, $phone, $city, $address, $password = "")
    {
        $result = db::update_user($uid, $name, $email, $password, $phone, $city, $address);

        if ($result) {

            $result = user::get_user($email);

            while ($row = $result->fetch_assoc()) {
                user::$user_data = $row;
            }
            return true;
        } else {
            return false;
        }
    }

    public static function get_user($user)
    {
        return db::select_user($user);
    }

    public static function add_to_cart($uid, $product, $quantity, $price)
    {
        $result = db::add_to_cart($uid, $product, $quantity, $price);
        return $result;
    }

    public static function place_order($uid)
    {
        $result = db::place_order($uid);
        return $result;
    }

    public static function get_cart_items($uid)
    {
        $cart_items = [];
        $result = db::get_cart_items($uid);
        while ($row = $result->fetch_assoc()) {
            $cart_items[] = $row;
        }
        return $cart_items;
    }

    public static function get_checkout_history($uid)
    {
        $order_history = [];
        $result = db::get_order_history($uid);

        while ($row = $result->fetch_assoc()) {
            $order_history[] = $row;
        }
        return $order_history;
    }
}
