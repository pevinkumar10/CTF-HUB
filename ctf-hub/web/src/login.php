<?php
include_once "libs/loader.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF-HUB 🍵| Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

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
            $_SESSION["session_data"] = $login_result;
            load_template('login');
    ?>
            <div class="alert alert-success position-fixed bottom-0 end-0 m-4 shadow" role="alert" style="z-index: 9999;">
                Login successful,You will be redirected in 3 seconds
            </div>
        <?php
            header('Refresh: 3, URL=/');
        } else {
            load_template('login');
        ?>
            <div class="alert alert-danger position-fixed bottom-0 end-0 m-4 shadow" role="alert" style="z-index: 9999;">
                Login unsuccessful
            </div>
    <?php
            header('Refresh: 2');
        }
    } else {
        load_template('login');
    }
    ?>
</body>

</html>