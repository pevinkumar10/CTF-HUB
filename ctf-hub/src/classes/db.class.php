<?php

class db
{
    public static $connection = null;

    private static function create_connection()
    {

        $servername = "127.0.0.1";
        $username = getenv("USERNAME");
        $password = getenv("PASSWORD");
        $db = getenv("DB");
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
        $sql = "SELECT * FROM `users` WHERE `email`='$user'LIMIT 1";
        $result = $conn->query($sql);

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    public static function insert_user($name, $email, $password, $phone, $city, $address)
    {
        $conn = db::get_connection();
        $sql = "INSERT INTO `users` (`name`, `email`, `phone`, `password`, `is_verified`)
VALUES ('$name', '$email', '$phone', '$password', $city, $address, '1');";
        $result = $conn->query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
}
