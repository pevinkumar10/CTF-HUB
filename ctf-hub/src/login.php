<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF-HUB 🍵| Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <?php
    include_once "libs/loader.php";
    ?>
    <style>
        body {
            background-color: #191e25;
        }
    </style>
</head>

<body class="text-white vh-100 d-flex align-items-center justify-content-center">
    <?php
    if (isset($_POST["email"]) and isset($_POST["password"])) {
        $user = $_POST["email"];
        $pass = $_POST["password"];
        $database_connection = db::get_connection();
        $results = db::select_user($user);
        $login_result = user::login($results, $pass);
        if ($login_result) {
            setcookie("uid", '2012354' . $login_result['id'], time() + (86400 * 1), "/");
            $_SESSION["session_data"] = $login_result;
            print("Login successfull\nYou will be redirected in 3 seconds.");
            header('Refresh: 3, URL=/');
        } else {
            print("Login not successfull");
            header('location: /');
        }
    } else {
        load_template('login');
    }
    ?>
</body>

</html>