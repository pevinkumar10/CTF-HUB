<?php
include_once "../libs/loader.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <title>Admin Login</title>
    <style>
        .login-box {
            max-width: 400px;
            margin: auto;
            margin-top: 10%;
            padding: 30px;
            border: 1px solid #ffc107;
            border-radius: 10px;
            background-color: #1e1e1e;
            box-shadow: 0 0 10px rgba(255, 193, 7, 0.5);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ffc107;
        }

        .btn-warning {
            width: 100%;
        }
    </style>
</head>

<body>
    <?php
    $admin_user = 'john1018';
    $admin_pass = '@&(gjsb%@)!hdska';

    if (isset($_POST['username']) and isset($_POST['password'])) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === $admin_user && $password === $admin_pass) {
            $_SESSION['admin'] = true;
            $_SESSION['name'] = $username;
    ?>
            <div class="alert alert-success position-fixed bottom-0 end-0 m-4 shadow" role="alert" style="z-index: 9999;">
                Login successful,You will be redirected in 3 seconds
            </div>
        <?php
            echo '<meta http-equiv="refresh" content="3;url=/dashboard.php" />';
        } else {

        ?>
            <div class="alert alert-danger position-fixed bottom-0 end-0 m-4 shadow" role="alert" style="z-index: 9999;">
                Login failed, invalid username or password.
            </div>
    <?php
        }
    }
    ?>
    <div class="login-box">
        <h3 class="text-center text-warning mb-4">Admin Panel Login</h3>
        <form action="admin.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label text-white">Username</label>
                <input type="text" class="form-control bg-dark text-white" id="username" name="username" value="" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" class="form-control bg-dark text-white" id="password" name="password" value="" required>
            </div>
            <button type="submit" class="btn btn-warning">Login</button>
        </form>
    </div>
    <p class="text-center text-white pt-4">© 2025 Company, Inc</p>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>