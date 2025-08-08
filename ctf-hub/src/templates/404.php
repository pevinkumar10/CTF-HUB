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