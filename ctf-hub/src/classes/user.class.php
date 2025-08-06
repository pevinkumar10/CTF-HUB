<?php

class auth
{
    public static $user_data = [];

    public static function login($result, $password)
    {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                auth::$user_data = $row;
            }
            $user_pass_hash = auth::$user_data["password"];
            $password_hash = md5($password);
            if ($password_hash == $user_pass_hash) {
                return auth::$user_data;
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
}
