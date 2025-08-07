<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF-HUB 🍵| Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <?php
    include_once "libs/loader.php";
    ?>
</head>

<body>
    <?php
    load_template("nav");
    if (isset($_SESSION['session_data'])) {
    ?>
    <?php
        load_template('order');
    } else {
        load_template('404', $variables = ["message" => "Login first to order your tea"]);
        header('Refresh: 3,URL=/loginphp');
    }

    ?>
</body>

</html>