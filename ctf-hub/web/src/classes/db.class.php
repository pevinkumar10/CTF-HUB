<?php

class db
{
    public static $connection = null;

    /** 
     * Create a connection to the database.
     * 
     * This create_connection function creates the connection to database.
     * If the connection is established with the database it will return the connection object. 
     * @return object The database connection object $conn only if connection is maded.
     * */
    private static function create_connection()
    {
        $servername = 'ctfhub_database';
        $username = 'ctfhub';
        $password = 'ctfhubpass123';
        $db = 'ctf_hub';
        $conn = new mysqli($servername, $username, $password, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    /** 
     * Get connection to the database.
     * 
     * This get_connection function get the connection from the $conn variable.
     * If the connection is already established it will return that connection,else it will create a new connection.
     * @return object The connection object $conn if the connection is already manded,otherwise it will create a connection then return it.
     * */
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

    /** 
     * Select an user from the database.
     * 
     * This select_user function is used to get a row from database.
     * If the user is exist it will return the mysql object as result,else returns null.
     * 
     * @param string $email email address to get user.
     * 
     * @return object The mysql object as a result if user exist.
     * */
    public static function select_user($email)
    {
        // TODO: Use parameterized queries to avoid SQL injection.
        $conn = db::get_connection();
        $sql = "SELECT * FROM `users` WHERE `email`='$email'LIMIT 1";
        $result = $conn->query($sql);

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    /** 
     * Insert an user to the database.
     * 
     * This insert_user function is used to insert a row to the users table.
     * 
     * @param string $name address of get user.
     * @param string $email email address of get user.
     * @param string $password of get user.
     * 
     * @return bool If the insertion is done it will return true,otherwise false.
     * */
    public static function insert_user($name, $email, $password)
    {
        // TODO: Use parameterized queries to avoid SQL injection.
        $conn = db::get_connection();
        $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password');";
        $result = $conn->query($sql);

        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    /** 
     * Update an user date on the database.
     * 
     * This update_user function is used to insert a row to the users table.
     * 
     * @param string $uid UID of the user.
     * @param string $name address of get user.
     * @param string $email email address of get user.
     * @param string $password password of get user.
     * @param string $phone phone number of get user.
     * @param string $city city name of get user.
     * @param string $address address of get user.
     * 
     * @return bool If the Updation is done it will return true,otherwise false.
     * */
    public static function update_user($uid, $name, $email, $password, $phone, $city, $address)
    {
        // TODO: Use parameterized queries to avoid SQL injection.
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

        return $result ? true : false;
    }

    /** 
     * Adding product to the cart.
     * 
     * This add_to_cart function is used to add product to the cart table.
     * 
     * @param string $session_user_id UID of user.
     * @param string $product product name.
     * @param string $quantity quantity of the user.
     * @param string $price price amount of the given product.
     * 
     * @return bool If the insertion is done it will return true,otherwise false.
     * */
    public static function add_to_cart($session_user_id, $product, $quantity, $price)
    {
        // TODO: Use parameterized queries to avoid SQL injection.
        $conn = db::get_connection();
        $price = (int) $quantity * $price;

        $sql = "INSERT INTO `cart` (`user_id`,`product_name`, `quantity`, `price`, `order_date`) VALUES ('$session_user_id', '$product', '$quantity', '$price', now());";

        $result = $conn->query($sql);

        return $result ? true : false;
    }

    /** 
     * Placing orders by the UID.
     * 
     * This place_order function is used to place order.
     * 
     * @param string $session_user_id UID of user.
     * 
     * @return bool If the updation is done it will return true,otherwise false.
     * */
    public static function place_order($session_user_id)
    {
        $conn = db::get_connection();
        $sql = "UPDATE `cart` SET is_ordered = 1 WHERE `user_id`='$session_user_id';";
        $result = $conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    /** 
     * Get cart items by the given UID.
     * 
     * This get_cart_items function is used to get cart items.
     * 
     * @param string $session_user_id UID of user.
     * 
     * @return object If the select operation is done it will return mysql object,otherwise false.
     * */
    public static function get_cart_items($session_user_id)
    {
        // TODO: Use parameterized queries to avoid SQL injection.
        $conn = db::get_connection();
        $sql = "SELECT * FROM `cart` WHERE `user_id`='$session_user_id' AND `is_ordered` != 1;";
        $result = $conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    /** 
     * Get order history by the given UID.
     * 
     * This get_order_history function is used to get order history.
     * 
     * @param string $session_user_id UID of user.
     * 
     * @return object If the select operation is done it will return mysql object,otherwise false.
     * */
    public static function get_order_history($session_user_id)
    {
        // TODO: Use parameterized queries to avoid SQL injection.
        $conn = db::get_connection();
        $sql = "SELECT u.id AS uid,u.name,u.phone,u.address,o.product_name,o.quantity,o.price FROM users u JOIN cart o ON u.id = o.user_id AND o.is_ordered = 1 AND u.id = $session_user_id";
        $result = $conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }
}
