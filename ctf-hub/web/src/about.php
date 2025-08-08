<?php
include_once "libs/loader.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF-HUB 🍵| About</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <?php
    if (isset($_GET['page'])) {
        $root_dir = "templates/";
        $page = $_GET['page'];

        $include_file = $root_dir . $page . ".php";
        if (file_exists($include_file)) {
            include($include_file);
        } else {
            $include_file = $root_dir . "404.php";
            include($include_file);
        }
    } else {
        load_template('nav');
        load_template('about');
    }
    ?>
</body>

</html>