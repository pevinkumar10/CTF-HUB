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

    public static function signup($name, $email, $password, $phone, $city, $address)
    {
        $result = db::insert_user($name, $email, $password, $phone, $city, $address);
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
}
