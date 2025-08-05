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
            $user_pass = auth::$user_data["password"];
            if ($password == $user_pass) {
                return auth::$user_data['username'];
            }
        } else {
            return false;
        }
    }

    public static function signup($name, $username, $email, $phone, $password)
    {
        $result = db::insert_user($name, $username, $email, $phone, $password);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}
