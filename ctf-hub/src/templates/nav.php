<div class="d-flex py-3 float-end">
    <ul class="nav nav-pills mx-3">
        <a class="text-decoration-none" href="/"><button type="button" class="nav-item btn btn-outline-warning mx-2 active">Home</button></a>
        <?php if (isset($_SESSION['session_data'])) { ?>
            <a class="text-decoration-none" href="/dashboard.php"><button type="button" class="nav-item btn btn-outline-warning mx-2">Dashboard</button></a>
        <?php
        } ?>
        <a class="text-decoration-none" href="/products.php"><button type="button" class="nav-item btn btn-outline-warning mx-2 px-3">Chai</button></a>
        <a class="text-decoration-none" href="#"><button type="button" class="nav-item btn btn-outline-warning mx-2 px-3">FAQs</button></a>
        <a class="text-decoration-none" href="/about.php"><button type="button" class="nav-item btn btn-outline-warning mx-2 px-3">About Us</button></a>
    </ul>
</div>