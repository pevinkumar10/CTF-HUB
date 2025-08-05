  <div class="container" style="max-width: 400px;">
      <div class="text-center mb-4">
          <h1 class="fw-bold">WELCOME BACK</h1>
          <p class="text-warning">Login to sip & ship your code</p>
      </div>

      <form action="/login.php" method="post">
          <div class="mb-3">
              <label for="email" class="form-label text-warning">Email</label>
              <input type="email" class="form-control border border-warning text-black" id="email" placeholder="example@gmail.com" name="email" value="" required>
          </div>

          <div class="mb-3">
              <label for="password" class="form-label text-warning">Password</label>
              <input type="password" class="form-control border border-warning text-black" id="password" placeholder="* * * * * * * *" name="email" value="" required>
          </div>

          <div class="d-grid mb-3">
              <button type="submit" class="btn btn-warning fw-semibold">Login</button>
          </div>

          <div class="text-center">
              <p class="text-white-50">Don't have an account? <a href="/signup.php" class="text-warning text-decoration-none">Sign up</a></p>
          </div>
      </form>
  </div>