<?php
include_once "libs/loader.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF-HUB 🍵| Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

</head>

<body>
    <?php
    // update profile
    if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['city']) and isset($_POST['address'])) {

        $uid = $_SESSION['session_data']['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $result = user::update_profile($uid, $name, $email, $phone, $city, $address);

        if ($result) {
            $user_data = user::$user_data;
            $_SESSION['session_data'] = $user_data;
    ?>
            <div class="alert alert-success position-fixed bottom-0 end-0 m-4 shadow" role="alert" style="z-index: 9999;">
                Profile Updated 🍵
            </div>
        <?php
            echo '<meta http-equiv="refresh" content="2;url=/login.php" />';
        } else {
        ?>
            <div class="alert alert-danger position-fixed bottom-0 end-0 m-4 shadow" role="alert" style="z-index: 9999;">
                Profile Updated unsuccessful 😥
            </div>
    <?php

        }
    } elseif (isset($_POST['action']) == 'check_history') {
        // chack history
        $id = base64_decode($_POST['id']);
        $history = user::get_checkout_history($id);

        load_template("nav");
        load_template('dashboard', $variables = ["history" => $history]);
    } else {
        // load dashbooard
        if (isset($_SESSION['session_data'])) {
            $uid = $_SESSION['session_data']['id'];
            $cart_items = user::get_cart_items($uid);
            load_template("nav");
            load_template('dashboard', $variables = ["cart_items" => $cart_items]);
            load_template('footer');
        } else {
            load_template('404', $variables = ["status_code" => "403", "message" => "Please login to access your dashboard."]);
            echo '<meta http-equiv="refresh" content="3;url=/login.php" />';
        }
    }

    ?>
    <script src="js/custom.js"></script>
</body>

</html>