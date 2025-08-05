<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF-HUB | Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <?php
    include_once "libs/loader.php";
    ?>
    <style>
        body {
            background-color: #191e25;
        }

        .advertisement {
            background-color: #e9e8e8ff;
        }
    </style>
</head>

<body>
    <?php
    load_template("nav");
    load_template('hero');
    load_template('products');
    ?>
</body>

</html>