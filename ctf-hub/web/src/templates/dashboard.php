<div class="pt-1">
    <?php
    if (isset($_SESSION['session_data'])) {
        $cart_items = $variables['cart_items'] ?? [];
        $history = $variables['history'] ?? [];
    ?>
        <div class="container">
            <div class="row g-4 mt-5 pt-5">

                <!-- Left Column -->
                <div class="col-md-8">
                    <div class="card bg-dark border border-warning text-white">
                        <div class="card-body mb-2">
                            <h4 class="card-title text-warning mb-4">Profile Details:</h4>
                            <form action="/dashboard.php" method="post">
                                <div class="row pt-2">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-warning">Full Name</label>
                                        <input type="text" class="form-control bg-dark text-white border-warning" name="name" value="<?= htmlspecialchars($_SESSION["session_data"]["name"] ?? ''); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-warning">Email</label>
                                        <input type="email" class="form-control bg-dark text-white border-warning" name="email" value="<?= htmlspecialchars($_SESSION["session_data"]["email"] ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="row pt-2">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-warning">Phone</label>
                                        <input type="text" class="form-control bg-dark text-white border-warning" name="phone" value="<?= htmlspecialchars($_SESSION["session_data"]["phone"] ?? ''); ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label text-warning">City</label>
                                        <input type="text" class="form-control bg-dark text-white border-warning" name="city" value="<?= htmlspecialchars($_SESSION["session_data"]["city"] ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-warning pt-2">Delivery Address</label>
                                    <textarea name="address" class="form-control bg-dark text-white border-warning" rows="2"><?= htmlspecialchars($_SESSION["session_data"]["address"] ?? ''); ?></textarea>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-warning fw-bold">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-4">
                    <div class="card bg-dark border border-warning text-white pb-1">
                        <div class="text-center pt-4">
                            <img src="img/profile.png" alt="profile" width="120px">
                        </div>
                        <div class="card-body">
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

                                <form action="logout.php">
                                    <button class="btn btn-warning w-25 mt-3">Logout</button>
                                </form>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Cart & Summary -->
            <section class="container my-5">
                <div class="row">
                    <!-- Cart Items -->
                    <div class="col-md-6">
                        <h3 class="mb-4 text-warning">Your Cart:</h3>
                        <?php
                        $total_price = 0;
                        foreach ($cart_items as $item): ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title mb-2"><?= $item['product_name']; ?></h5>
                                    <small class="text-muted">Qty: <?= $item['quantity']; ?></small><br>
                                    <small class="text-muted">Total: ₹<?= (int)$item['price'] * (int)$item['quantity']; ?></small>
                                </div>
                            </div>
                            <?php $total_price += (int)$item['price'] * (int)$item['quantity']; ?>
                        <?php endforeach; ?>
                    </div>

                    <!-- Summary -->
                    <div class="col-md-4 px-4">
                        <h3 class="mb-4 text-warning">Summary:</h3>
                        <div class="card p-3 shadow-sm">
                            <div class="d-flex justify-content-between mb-3">
                                <span>Subtotal</span>
                                <span>₹<?= $total_price; ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Delivery</span>
                                <span>₹10</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between fw-bold">
                                <span>Total</span>
                                <span>₹<?= ($total_price != 0) ? $total_price + 10 : $total_price; ?></span>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6 mb-2">
                                    <a href="products.php">
                                        <button type="button" class="btn btn-warning w-100">Add Products</button>
                                    </a>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <form action="dashboard.php" method="post">
                                        <input type="hidden" name="id" value="<?= base64_encode($_SESSION['session_data']['id']) ?>">
                                        <button class="btn btn-warning w-100" name="action" value="check_history">Order History</button>
                                    </form>
                                </div>
                            </div>

                            <form action="checkout.php" method="post">
                                <button class="btn btn-warning w-100 mt-1" name="action" value="place_order">Place Order</button>
                            </form>
                        </div>
                    </div>

                    <!-- Order History -->
                    <?php if (count($history) >= 1): ?>
                        <div class="col-md-12 pt-5">
                            <div class="card bg-dark border border-warning text-white shadow-lg p-4">
                                <div class="mb-4 d-flex justify-content-between align-items-center">
                                    <h4 class="text-warning m-0">🧾 Order History</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-dark table-bordered border-warning align-middle text-white">
                                        <thead class="text-warning">
                                            <tr>
                                                <th>#</th>
                                                <th>Product</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($history as $index => $item): ?>
                                                <tr>
                                                    <td><?= $index + 1; ?></td>
                                                    <td><?= htmlspecialchars($item['product_name'] ?? ''); ?></td>
                                                    <td><?= htmlspecialchars($item['quantity'] ?? ''); ?></td>
                                                    <td>₹<?= htmlspecialchars($item['price'] ?? ''); ?></td>
                                                    <td><?= htmlspecialchars($item['name'] ?? ''); ?></td>
                                                    <td><?= htmlspecialchars($item['phone'] ?? ''); ?></td>
                                                    <td><?= htmlspecialchars($item['address'] ?? ''); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    <?php
    } else {
    ?>
        <div class="container center-box">
            <div class="error-code"><?php if (isset($variables['status_code'])) {
                                        print($variables['status_code']);
                                    } else {
                                        print("404");
                                    };  ?></div>
            <div class="message text-white">Oops! Something’s went wrong...</div>
            <div class="subtext"><?php if (isset($variables['message'])) {
                                        print($variables['message']);
                                    } else {
                                        print("Something went wrong");
                                    };  ?></div>
            <a href="/" class="btn btn-warning">Back to Home</a>
            <div class="chai-icon">☕</div>
        </div>
    <?php
        echo '<meta http-equiv="refresh" content="1;url=/" />';
    }
    ?>
</div>