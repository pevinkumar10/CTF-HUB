<?php
include_once "../libs/loader.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/custom.css" rel="stylesheet" />
    <style>
        body {
            background-color: #121212;
            color: #fff;
        }

        .sidebar {
            height: 100vh;
            background-color: #1e1e1e;
            padding-top: 20px;
        }

        .sidebar a {
            color: #ccc;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar .active {
            background-color: #ffc107;
            color: #000;
            border-radius: 5px;
        }

        .content {
            padding: 20px;
        }

        .card {
            background-color: #1e1e1e;
            border: 1px solid #ffc107;
        }

        .card-title {
            color: #ffc107;
        }
    </style>
</head>

<body>

    <?php
    if (isset($_SESSION['admin'])) { ?>
        <div class="container-fluid">
            <div class="row">

                <!-- Sidebar -->
                <nav class="col-md-2 d-none d-md-block sidebar">
                    <h4 class="text-center text-warning">Welcome <?php echo htmlspecialchars(strtoupper($_SESSION['name'])); ?></h4>
                    <p class="mx-4 px-3 text-end" style="font-size: 0.75rem;">v1.0.0</p>
                    <p class="text-center" style="font-size: 0.75rem;">flag{hardc0d3d_cr3d3nt1al_l3ak3d}</p>
                    <a href="#" class="active">Dashboard</a>
                    <a href="#">Orders</a>
                    <a href="#">Users</a>
                    <a href="#">Products</a>
                    <a href="#">Settings</a>
                    <a href="logout.php" class="text-danger">Logout</a>
                </nav>

                <!-- Main Content -->
                <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 content">
                    <h2 class="mb-4 text-white">Dashboard Overview</h2>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card p-3">
                                <h5 class="card-title text-warning">Total Users</h5>
                                <p class="fs-4 text-white">523</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card p-3">
                                <h5 class="card-title text-warning">Total Orders</h5>
                                <p class="fs-4 text-white">1,340</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card p-3">
                                <h5 class="card-title text-warning">Revenue</h5>
                                <p class="fs-4 text-white">₹1,25,348</p>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Orders Table -->
                    <div class="card mt-4 p-3">
                        <h5 class="card-title">Recent Orders</h5>
                        <div class="table-responsive">
                            <table class="table table-dark table-hover mt-3">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#1001</td>
                                        <td>John Doe</td>
                                        <td>Masala Chai</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td>2025-08-06</td>
                                    </tr>
                                    <tr>
                                        <td>#1002</td>
                                        <td>Jane Smith</td>
                                        <td>Green Chai</td>
                                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                                        <td>2025-08-06</td>
                                    </tr>
                                    <tr>
                                        <td>#1003</td>
                                        <td>Samir Khan</td>
                                        <td>Butter Tea</td>
                                        <td><span class="badge bg-danger">Cancelled</span></td>
                                        <td>2025-08-05</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </main>
            </div>
        </div>
    <?php } else {
    ?>
        <div class="container center-box">
            <div class="error-code">403</div>
            <div class="message text-white">Oops! Something’s went wrong...</div>
            <div class="subtext">Forbidden</div>
            <a href="/" class="btn btn-warning">Back to Home</a>
            <div class="chai-icon">☕</div>
        </div>
    <?php
        echo '<meta http-equiv="refresh" content="3;url=login.php" />';
    } ?>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>