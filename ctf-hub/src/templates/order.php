<?php
$selected_product = $_GET['product'];
$product = str_replace('-', ' ', $selected_product);
$product_details_file = "products/product_list.json";
$all_product_details = json_decode(file_get_contents($product_details_file), true);

$product_details = $all_product_details['tea'][$product];
?>
<div>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5 pt-5">
                <div class="card bg-dark border border-warning text-white">
                    <div class="card-body">
                        <h4 class="card-title text-warning"><?php htmlentities($product) ?></h4>
                        <div class="d-flex justify-content-center align-items-center pb-3">
                            <img class="shadow" src="img/<?php echo strtolower($selected_product); ?>.jpg" alt="<?php echo $selected_product ?>" height="250px">
                        </div>

                        <p class="card-text"><?php echo htmlentities($product_details['description']) ?></p>

                        <ul class="list-unstyled mb-3">
                            <li><strong>Price: </strong> ₹<?php echo htmlentities($product_details['price']) ?></li>
                            <li><strong>Category: </strong><?php echo htmlentities($product_details['category']) ?> </li>
                            <li><strong>Available: </strong> <?php echo htmlentities($product_details['availability']) ?></li>
                        </ul>

                        <form method="POST" action="checkout.php">
                            <div class="mb-3">
                                <label for="quantity" class="form-label text-warning">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control bg-dark text-white border-warning" value="1" min="1">
                            </div>

                            <!-- Hidden fields -->
                            <input type="hidden" name="action" value="add_to_cart">
                            <input type="hidden" name="product" value="<?php echo htmlentities($product) ?>">

                            <div class="d-grid">
                                <button type="submit" class="btn btn-warning fw-bold">Add to Cart</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container">
                    <a href="/" class="row justify-content-center text-decoration-none">
                        <span class="row justify-content-center text-warning">« back to home »</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>