<?php

class db
{
    public static $connection = null;

    private static function create_connection()
    {
        $database_config_data = get_env("database");
        $servername = $database_config_data["servername"];
        $username = $database_config_data["username"];
        $password = $database_config_data["password"];
        $db = $database_config_data["db"];

        $conn = new mysqli($servername, $username, $password, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public static function get_connection()
    {
        if (db::$connection == null) {
            $conn = db::create_connection();
            db::$connection = $conn;
            return $conn;
        } else {
            return db::$connection;
        }
    }

    public static function select_user($user)
    {
        $conn = db::get_connection();
        $sql = "SELECT * FROM `users` WHERE `email`='$user' OR `username`='$user' LIMIT 1";
        $result = $conn->query($sql);

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    public static function insert_user($name, $username, $email, $phone, $password)
    {
        $conn = db::get_connection();
        $sql = "INSERT INTO `users` (`name`, `username`, `email`, `phone`, `password`, `is_verified`)
VALUES ('$name', '$username', '$email', '$phone', '$password', '0');";
        $result = $conn->query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
}
