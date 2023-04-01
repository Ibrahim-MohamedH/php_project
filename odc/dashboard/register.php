<?php
// functions
include "./app/config.php";
include "./app/functions.php";

// ui
include "./shared/heade.php";

$errors = [];
if (isset($_POST["send"])) {
  $name = validatestring($_POST["username"]);
  $email = validatestring($_POST["email"]);
  $password = $_POST["password"];
  $hashedPassword = sha1($password);
  $rule = $_POST['rule'];

  $select = "SELECT username FROM `admin` WHERE username = '$name' limit 1";
  $s = mysqli_query($connection, $select);
  $numRow = mysqli_num_rows($s);
  if ($numRow > 0) {
    $errors[] = "Username is not available";
  }
  if (empty($name) || lengthCounter($name)) {
    $errors[] = "Please use a valid username";
  }
  if (empty($email)) {
    $errors[] = "Please use a valid email";
  }
  if (empty($password) || lengthCounter($password)) {
    $errors[] = "Please enter a valid password";
  }

  if (empty($errors)) {
    $insert = "INSERT INTO `admin` VALUES (null, '$name', '$email', '$hashedPassword', DEFAULT, $rule)";
    $i = mysqli_query($connection, $insert);
    path('dashboard/login.php');
  }
  auth();
}
?>
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
      <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
        <div class="card col-lg-4 mx-auto">
          <div class="card-body px-5 py-5">
            <h3 class="card-title text-left mb-3">Register</h3>
            <?php if (!empty($errors)) : ?>
              <div class="alert alert-danger">
                <ul>
                  <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif ?>
            <form method="POST">
              <div class="form-group">
                <label>Username</label>
                <input name="username" type="text" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>rule</label>
                <select name="rule" class="form-control p_input">
                  <option value="1">Access all project</option>
                  <option value="2">Vendor</option>
                </select>
              </div>
              <div class="text-center">
                <button name="send" class="btn btn-primary btn-block enter-btn">Sign up</button>
              </div>
              <p class="sign-up text-center">Already have an Account?<a href="/odc/dashboard/logn.php"> Sign In</a></p>
              <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
            </form>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- row ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<?php
include "./shared/script.php";
?>