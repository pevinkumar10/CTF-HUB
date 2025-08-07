<div class="pt-1">
    <?php

    if (isset($_SESSION['session_data'])) {
        $cart_items = $variables['cart_items'];
    ?>

        <!-- Main Content -->
        <div class="container">
            <div class="row g-4 mt-5 pt-5">

                <!-- Left Column -->
                <div class="col-md-8 ">
                    <div class="card bg-dark border border-warning text-white">
                        <div class="card-body">
                            <h4 class="card-title text-warning mb-4">Profile Details:</h4>
                            <form action="/dashboard.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-warning">Full Name</label>
                                        <input type="text" class="form-control bg-dark text-white border-warning" name="name" value="<?php echo htmlspecialchars($_SESSION["session_data"]["name"]); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-warning">Email</label>
                                        <input type="email" class="form-control bg-dark text-white border-warning" name="email" value="<?php echo htmlspecialchars($_SESSION["session_data"]["email"]); ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-warning">Phone</label>
                                        <input type="text" class="form-control bg-dark text-white border-warning" name="phone" value="<?php echo htmlspecialchars($_SESSION["session_data"]["phone"]); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-warning">City</label>
                                        <input type="text" class="form-control bg-dark text-white border-warning" name="city" value="<?php echo htmlspecialchars($_SESSION["session_data"]["city"]); ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-warning">Delivery Address</label>
                                    <textarea name="address" class="form-control bg-dark text-white border-warning" rows="2"><?php echo htmlspecialchars($_SESSION["session_data"]["address"]); ?></textarea>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-warning fw-bold">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Column-->
                <div class="col-md-4">
                    <div class="card bg-dark border border-warning text-white pb-3">
                        <div>
                            <img src="img/profile.png" alt="profile" width="150px">
                        </div>
                        <div class=" card-body">
                            <h5 class="card-title text-warning mb-3">Quick Info:</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-dark text-white border-bottom border-warning">
                                    <strong>Favorite Tea:</strong> Masala Chai
                                </li>
                                <li class="list-group-item bg-dark text-white border-bottom border-warning">
                                    <strong>Total Orders:</strong> 12
                                </li>
                                <li class="list-group-item bg-dark text-white border-bottom border-warning">
                                    <strong>Last Order:</strong> No orders yet
                                </li>
                                <li class="list-group-item bg-dark text-white">
                                    <strong>Member Since:</strong> Jan 2024
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!-- cart -->
            <div class="">
                <section class="container my-5">
                    <div class="row">
                        <!-- Cart Items -->
                        <div class="col-md-6">
                            <h3 class="mb-4 text-warning">Your Cart:</h3>
                            <?php
                            $total_price = 0;
                            foreach ($cart_items as $item) { ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="card-title mb-2"><?php echo $item['product_name']; ?></h5>
                                            <small class="text-muted">Qty: <?php echo $item['quantity']; ?></small>
                                        </div>
                                        <div>

                                            <small class="text-muted"> Total: ₹<?php echo (int)$item['price'] * (int) $item['quantity'];
                                                                                $total_price += (int)$item['price'] * (int) $item['quantity'];
                                                                                ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>

                        <!-- Order Summary -->
                        <div class="col-md-4 px-4">
                            <h3 class="mb-4 text-warning">Summary:</h3>
                            <div class="card p-3 shadow-sm">
                                <div class="d-flex justify-content-between mb-3 ">
                                    <span>Subtotal</span>
                                    <span>₹ <?php echo $total_price ?></span>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <span>Delivery</span>
                                    <span>₹10</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total</span>
                                    <span>₹ <?php echo $total_price + 10 ?></span>
                                </div>
                                <a href="dashboard.php?check_history=<?php echo base64_encode($_SESSION['session_data']['id']) ?>"><button class="btn btn-warning w-100 mt-4">Order History</button></a>
                                <a href="checkout.php?action=place_order"><button class="btn btn-warning w-100 mt-1">Place Order</button></a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    <?php
    } else {
        header('location: /');
    }
    ?>
</div>