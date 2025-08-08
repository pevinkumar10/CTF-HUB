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
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    load_template("nav");
    load_template('hero');
    load_template('banner');
    load_template('tea');
    load_template('footer')
    ?>
</body>
<script>
    // Product availability check is still in development.
</script>

</html>