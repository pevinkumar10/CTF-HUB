<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF-HUB 🍵| Checkout</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <?php
    include_once "libs/loader.php";
    ?>
</head>

<body>
    <?php
    if (isset($_POST['action']) and $_POST['action'] == 'add_to_cart') {

        $product_details_file = "products/product_list.json";
        $all_product_details = json_decode(file_get_contents($product_details_file), true);

        $uid = $_SESSION['session_data']['id'];
        $product = $_POST['product'];
        $quantity = $_POST['quantity'];
        $price = $all_product_details['tea'][$product]['price'];

        $result = user::add_to_cart($uid, $product, $quantity, $price);

        if ($result) {
    ?>
            <div class="d-flex justify-content-center align-items-center min-vh-100 bg-dark">
                <div class="card bg-dark text-white border border-warning p-4" style="min-width: 300px; max-width: 500px;">
                    <h4 class="text-warning mb-3 text-center">☕ <?php echo $product ?> added to cart.</h4>
                    <p class="text-white text-center">Explore our curated selection of exotic teas and flavors, brewed with love.</p>
                    <div class="text-center mt-4">
                        <a href="/products.php" class="btn btn-warning">Shop more </a>
                    </div>
                </div>
            </div>
        <?php
        } else {
            print("$product couldn't added to cart.");
        }
    } else if (isset($_POST['action']) and $_POST['action'] == 'place_order') {
        $uid = $_SESSION['session_data']['id'];

        print_r($_SESSION);
        exit();

        $result = user::place_order($uid);

        if ($result) {
        ?>
            <div class="d-flex justify-content-center align-items-center min-vh-100 bg-dark">
                <div class="card bg-dark text-white border border-warning p-4" style="min-width: 300px; max-width: 500px;">
                    <h4 class="text-warning mb-3 text-center">☕ Order placed</h4>
                    <p class="text-white text-center">Thank you ,Explore our curated selection of exotic teas and flavors, brewed with love.</p>
                    <div class="text-center mt-4">
                        <a href="/products.php" class="btn btn-warning">Shop more</a>
                    </div>
                </div>
            </div>
    <?php
        } else {
            print("Couldn't place order right now, Kindly try again later.");
        }
    }
    ?>
</body>

</html>