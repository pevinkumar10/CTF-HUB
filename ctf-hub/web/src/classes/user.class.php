<?php

class user
{
    public static $user_data = [];

    /** 
     * Login function to authenticate the user.
     * 
     * This login function is used to authenticate the user.
     * 
     * @param object $result mysql object after executing select_user funtion from db class.
     * @param string $password plain text password which is given by the user.
     * 
     * @return mixed user data as array or flase, if the authentication is failed.
     * */
    public static function login($result, $password)
    {
        // TODO: Verify the user the user password with selected user's hash using password_verify function.
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

    /** 
     * Signup an user to the web appliction.
     * 
     * This signup function is used to signup a new user.
     * 
     * @param string $name address of get user.
     * @param string $email email address of get user.
     * @param string $password of get user.
     * 
     * @return bool If the insertion is done it will return true,otherwise false.
     * */
    public static function signup($name, $email, $password)
    {
        // TODO: Enforce strong input validation & sanitization to filter malicious input.
        $result = db::insert_user($name, $email, $password);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    /** 
     * Update an user date on the database.
     * 
     * This update_profile function is used to update the user profile.
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
    public static function update_profile($uid, $name, $email, $phone, $city, $address, $password = "")
    {
        // TODO: Enforce strong input validation & sanitization to filter malicious input.
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

    /** 
     * Signup an user to the web appliction.
     * 
     * This get_user function is used to get a user from Database.
     * 
     * @param string $email address of get user.
     * 
     * @return mixed mysql object if the user exist ,else return false.
     * */
    public static function get_user($email)
    {
        return db::select_user($email);
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
        $result = db::add_to_cart($session_user_id, $product, $quantity, $price);
        return $result;
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
        $result = db::place_order($session_user_id);
        return $result;
    }

    /** 
     * Get cart items from the Database.
     * 
     * This get_crt_items function is get cart items using UID.
     * 
     * @param string $session_user_id UID of user.
     * 
     * @return array If items present in the user's cart,else empty array will be returned.
     * */
    public static function get_cart_items($session_user_id)
    {
        $cart_items = [];
        $result = db::get_cart_items($session_user_id);
        while ($row = $result->fetch_assoc()) {
            $cart_items[] = $row;
        }
        return $cart_items;
    }

    /** 
     * Get order history of the usrr from the Database.
     * 
     * This get_checkout_history function is used to get order history using UID.
     * 
     * @param string $session_user_id UID of user.
     * 
     * @return array If items present in the user's order history,else empty array will be returned.
     * */
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
