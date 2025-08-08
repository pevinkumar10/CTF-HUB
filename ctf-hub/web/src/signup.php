<?php
include_once "libs/loader.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF-HUB 🍵| Signup</title>
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
    if (isset($_POST['method']) == "signup") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $re_password = $_POST['re-password'];
        if ($password == $re_password) {
            $password_hash = md5($password);
            $result = user::signup($name, $email, $password_hash);
            if ($result) {
                load_template('signup');
    ?>
                <div class="alert alert-success position-fixed bottom-0 end-0 m-4 shadow" role="alert" style="z-index: 9999;">
                    Signup Success, You can login now!!
                </div>

            <?php
                header('Refresh: 2,URL=/login.php');
            } else {
            ?>
                <div class="alert alert-danger position-fixed bottom-0 end-0 m-4 shadow" role="alert" style="z-index: 9999;">
                    Signup failed, try again later.
                </div>

            <?php
            }
        } else {

            ?>
            <div class="alert alert-danger position-fixed bottom-0 end-0 m-4 shadow" role="alert" style="z-index: 9999;">
                Signup failed, something went wrong.
            </div>
    <?php
            header('Refresh: 2');
        }
    } else {
        load_template('signup');
    }
    ?>
</body>

</html>