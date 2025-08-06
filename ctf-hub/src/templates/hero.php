<div class="container col-xl-6 px-2 py-5 min-vh-100">
    <div class="row flex-lg-row-reverse align-items-center mt-3 g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="img/tea.jpg" class="d-block mx-lg-auto img-fluid shadow bg-body-tertiary" alt="Tea" width="650" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3 text-white">A WARM CUP FOR EVERY LINE OF CODE</h1>
            <p class="lead" style="color: #ffc107;"><i>Take a break, clear your mind, and enjoy a cup of chai. Whether you're debugging or building your next big idea, we're here to keep you refreshed and inspired.</i></p>
            <?php if (!isset($_SESSION['session_data'])) { ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a class="text-decoration-none" href="/login.php"><button type="button" class="btn btn-outline-warning rounded-pill btn-lg px-4 me-md-2" style="color: white;">Login</button></a>
                    <a class="text-decoration-none" href="/signup.php"><button type="button" class="btn btn-outline-warning rounded-pill btn-lg px-4" style="color: white;">Signup</button></a>
                </div>
            <?php } else { ?>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a class="text-decoration-none" href="#products"><button type="button" class="btn btn-outline-warning rounded-pill btn-lg px-4" style="color: white;">Explore</button></a>
                </div>
            <?php } ?>
        </div>
        <div class="container mt-5">
            <div class="py-2 text-center rounded-3" style="background-color: #d7c770;">
                <h1 class="display-5 fw-bold">WELCOME <?php echo htmlentities(strtoupper($_SESSION["session_data"]["name"])); ?></h1>
                <p class="lead">
                    This is a simple Bootstrap jumbotron that sits within a <code>container</code>, recreated with built-in utility classes.
                </p>
            </div>
        </div>
    </div>
</div>