<?php

class db
{
    public static $connection = null;

    private static function create_connection()
    {

        $servername = getenv("SERVERNAME");
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

    public static function select_user($email)
    {
        $conn = db::get_connection();
        $sql = "SELECT * FROM `users` WHERE `email`='$email'LIMIT 1";
        $result = $conn->query($sql);

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    public static function insert_user($name, $email, $password)
    {
        $conn = db::get_connection();
        $sql = "INSERT INTO `users` (`name`, `email`, `password`)
VALUES ('$name', '$email', '$password');";
        $result = $conn->query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
    public static function update_user($uid, $name, $email, $password, $phone, $city, $address)
    {
        $conn = db::get_connection();

        $update_parts = [];

        if (!empty($name)) {
            $update_parts[] = "`name` = '$name'";
        }
        if (!empty($email)) {
            $update_parts[] = "`email` = '$email'";
        }
        if (!empty($phone)) {
            $update_parts[] = "`phone` = '$phone'";
        }
        if (!empty($password)) {
            $update_parts[] = "`password` = '$password'";
        }
        if (!empty($city)) {
            $update_parts[] = "`city` = '$city'";
        }
        if (!empty($address)) {
            $update_parts[] = "`address` = '$address'";
        }

        if (empty($update_parts)) {
            return false;
        }

        $update_query = implode(", ", $update_parts);

        $sql = "UPDATE `users` SET $update_query WHERE `id` = $uid";

        $result = $conn->query($sql);
        print($result);

        return $result ? true : false;
    }
    public static function place_order($session_user_id) {}

    public static function get_orders($uid) {}
}
