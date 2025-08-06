  <div class="container">
      <div class="row">

          <!-- Right side -->
          <div class="col-md-4 justify-content-center align-items-center">
              <h3 class="fw-bold mb-4 text-center text-md-start">CREATE AN ACCOUNT</h3>
              <form action="/signup.php" method="post">
                  <div class="mb-3">
                      <label for="name" class="form-label text-warning">Full Name</label>
                      <input type="text" class="form-control border border-warning text-black" id="name" placeholder="e.g. james" name="name" value="" required>
                  </div>

                  <div class="mb-3">
                      <label for="email" class="form-label text-warning">Email</label>
                      <input type="email" class="form-control border border-warning text-black" id="email" placeholder="james@gmail.com" name="email" value="" required>
                  </div>

                  <div class="mb-3">
                      <label for="password" class="form-label text-warning">Password</label>
                      <input type="password" class="form-control border border-warning text-black" id="password" placeholder="Create a password" name="password" value="" required>
                  </div>

                  <div class="mb-3">
                      <label for="confirm-password" class="form-label text-warning">Confirm Password</label>
                      <input type="password" class="form-control border border-warning text-black" id="confirm-password" placeholder="Re-enter password" name="re-password" value="password" required>
                  </div>

                  <div class="d-grid mb-3">
                      <input type="hidden" name="method" value="signup">
                      <button type="submit" class="btn btn-warning fw-semibold">Signup</button>
                  </div>

                  <div class="text-center">
                      <p class="text-white-50">Already have an account? <a href="/login.php" class="text-warning text-decoration-none">Login</a></p>
                  </div>
              </form>
          </div>
          <!-- Left side-->
          <div class="col-md-6 text-center text-md-start mx-5 mb-5 mb-md-0">
              <h1 class="fw-bold">Start Your Journey with a Sip</h1>
              <p class="text-warning mt-3 fs-5">
                  <i>Join the community of <u>developers</u> who build, debug, and sip. Sign up now to begin your chai-fueled coding sessions.</i>
              </p>
          </div>

      </div>
  </div>