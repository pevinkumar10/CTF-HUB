<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF-HUB 🍵| Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <?php
    include_once "libs/loader.php";
    ?>
</head>

<body>
    <?php
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
            print("Profile updated");
            header('Refresh: 1');
        } else {
            print("Couldn't update profile!");
        }
    } elseif (isset($_POST['action']) == 'check_history') {

        $id = base64_decode($_POST['id']);
        $history = user::get_checkout_history($id);

        load_template("nav");
        load_template('dashboard', $variables = ["history" => $history]);
    } else {
        $uid = $_SESSION['session_data']['id'];
        $cart_items = user::get_cart_items($uid);
        load_template("nav");
        load_template('dashboard', $variables = ["cart_items" => $cart_items]);
        load_template('footer');
    }

    ?>
    <script src="js/custom.js"></script>
</body>

</html>