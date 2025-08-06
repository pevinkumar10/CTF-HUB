<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF-HUB 🍵| Chai</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <?php
    include_once "libs/loader.php";
    ?>
</head>

<body>
    <?php
    print_r($_GET);
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $name = $_GET['name'];
        if ($action == "check_availability") {
            $result = Products::get_available($name);
            print_r($result);
        }
    }
    load_template('nav');
    load_template('tea');
    ?>
</body>

</html>