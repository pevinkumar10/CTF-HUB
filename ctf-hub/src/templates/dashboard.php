<?php

if (isset($_SESSION['session_data'])) {
?>
    <!-- Main Content -->
    <div class="container py-5">
        <div class="row g-4">

            <!-- Left Column -->
            <div class="col-md-8">
                <div class="card bg-dark border border-warning text-white">
                    <div class="card-body">
                        <h4 class="card-title text-warning mb-4">Profile Details</h4>
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
                <div class="card bg-dark border border-warning text-white">
                    <div>
                        <img src="img/profile.png" alt="profile" width="150px">
                    </div>
                    <div class=" card-body">
                        <h5 class="card-title text-warning mb-3">Quick Info</h5>
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
    </div>
<?php
} else {
    header('location: /');
}
