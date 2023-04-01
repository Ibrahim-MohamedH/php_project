<?php
// functions
include "./app/config.php";
include "./app/functions.php";

// ui
include "./shared/heade.php";

$errors = [];
if (isset($_POST['send'])) {
  $name = $_POST["username"];
  $password = $_POST["password"];
  $hashedPassword = sha1($password);
  $select = "SELECT * FROM `admin` WHERE username = '$name' and `password` = '$hashedPassword' limit 1";
  $s = mysqli_query($connection, $select);
  $numRow = mysqli_num_rows($s);
  if ($numRow == 0) {
    $errors[] = "Username or password is incorrect, please try again!";
  } else {
    $row = mysqli_fetch_assoc($s);
    $_SESSION['admin'] = [
      'id' => $row['id'],
      'name' => $row['username'],
      'image' => $row['image'],
      'rule' => $row['rule']
    ];
    path("dashboard/index.php");
  }
}

?>
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="row w-100 m-0">
      <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
        <div class="card col-lg-4 mx-auto">
          <div class="card-body px-5 py-5">
            <h3 class="card-title text-left mb-3">Login</h3>
            <form method="POST">
              <div class="form-group">
                <label>Username *</label>
                <input name="username" type="text" class="form-control p_input">
              </div>
              <div class="form-group">
                <label>Password *</label>
                <input name="password" type="password" class="form-control p_input">
              </div>
              <div class="form-group d-flex align-items-center justify-content-between">

                <a href="#" class="forgot-pass">Forgot password</a>
              </div>
              <div class="text-center">
                <button name="send" class="btn btn-primary btn-block enter-btn">Login</button>
              </div>
              <p class="sign-up">Don't have an Account?<a href="/odc/dashboard/register.php"> Sign Up</a></p>
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