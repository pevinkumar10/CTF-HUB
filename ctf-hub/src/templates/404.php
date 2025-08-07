  <div class="container center-box">
    <div class="error-code">404</div>
    <div class="message text-white">Oops! Something’s brewing...</div>
    <div class="subtext"><?php if (isset($variables['message'])) {
                            print($variables['message']);
                          } else {
                            print("Something went wrong");
                          };  ?></div>
    <a href="/" class="btn btn-warning">Back to Home</a>
    <div class="chai-icon">☕</div>
  </div>