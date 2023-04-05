<?php
session_start();
include './shared/head.php';
include './app/config.php';
include './app/function.php';
if (isset($_POST['login'])) {
  $name = $_POST['name'];
  $password = $_POST['password'];
  $haspass = sha1($password);
  $select = "SELECT * FROM admins WHERE name = '$name' and password = '$haspass'";
  $s = mysqli_query($connect, $select);
  $numRows = mysqli_num_rows($s);
  $row = mysqli_fetch_assoc($s);
  if ($numRows == 1) {
    $_SESSION['admin'] = [
      "name" => $name,
      "rule" => $row['rule'],
      "id" => $row['id'],
    ];
    path('index.php');
  } else {
    header("Location: /NiceAdmin/pages-login.php");
  }
}
?>
<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
              </a>
            </div>
            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>
                <form method="POST" class="row g-3 needs-validation" novalidate>
                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="name" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" name="login" type="submit">Login</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="credits">
              Designed by <a href="#">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>
<?php
include './shared/script.php';
?>