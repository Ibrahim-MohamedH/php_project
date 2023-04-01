<?php
// functions
include "../app/config.php";
include "../app/functions.php";

// ui
include "../shared/heade.php";
include "../shared/sidebar.php";
include "../shared/navbar.php";

$id = $_SESSION['admin']['id'];
// booleans
$about = false;
$experience = false;
$educational = false;
$summary = false;
$skills = false;
// errors
$about_errors = [];
$experience_errors = [];
$educational_errors = [];
$summary_errors = [];
// upload image
if (isset($_POST['upload'])) {
  if (!empty($_FILES['image']['name'])) {
    $image_name = time() . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "../upload/" . $image_name;
    move_uploaded_file($tmp_name, $location);
    $oldImage = $_SESSION['admin']['image'];
    if ($oldImage != 'fake.png') {
      unlink("../upload/$oldImage");
    }
    $_SESSION['admin']['image'] = $image_name;
  } else {
    $image_name = $_SESSION['admin']['image'];
  }
  $update = "UPDATE `admin` set `image`='$image_name' where id=$id";
  $u = mysqli_query($connection, $update);
  path("dashboard/profile/editProfile.php");
}
// about
if (isset($_POST["about_send"])) {
  $title = validatestring($_POST["title"]);
  $birthdate = validatestring($_POST["birthdate"]);
  $website = validatestring($_POST["website"]);
  $phone = validatestring($_POST["phone"]);
  $city = validatestring($_POST["city"]);
  $age = validatestring($_POST["age"]);
  $degree = validatestring($_POST["degree"]);
  $email = validatestring($_POST["email"]);
  $freelance = validatestring($_POST["freelance"]);
  /* ================ Validation ================ */
  if (empty($title)) {
    $about_errors[] = "Enter valid title";
  }
  if (empty($birthdate)) {
    $about_errors[] = "Enter valid birthdate";
  }
  if (empty($website)) {
    $about_errors[] = "Enter valid website";
  }
  if (empty($phone)) {
    $about_errors[] = "Enter valid phone";
  }
  if (empty($city)) {
    $about_errors[] = "Enter valid city";
  }
  if (empty($age)) {
    $about_errors[] = "Enter valid age";
  }
  if (empty($degree)) {
    $about_errors[] = "Enter valid degree";
  }
  if (empty($email)) {
    $about_errors[] = "Enter valid email";
  }
  if (empty($freelance)) {
    $about_errors[] = "Enter valid freelance";
  }

  if (empty($about_errors)) {
    $insert = "INSERT INTO `about` VALUES (null,'$title','$birthdate','$website','$phone','$city','$age','$degree','$email','$freelance',$id)";
    $i = mysqli_query($connection, $insert);
    if ($i) {
      $about = true;
      path("dashboard/profile/editProfile.php#about");
    }
  }
}
if (isset($_POST["ex_send"])) {
  $ex_title = validatestring($_POST["ex_title"]);
  $ex_from = validatestring($_POST["ex_from"]);
  $ex_to = validatestring($_POST["ex_to"]);
  $ex_address = validatestring($_POST["ex_address"]);
  $ex_description = validatestring($_POST["ex_description"]);
  /* ================ Validation ================ */
  if (empty($ex_title)) {
    $experience_errors = "Enter valid title";
  }
  if (empty($ex_from)) {
    $experience_errors = "Choose a valid 'from' date";
  }
  if (empty($ex_to)) {
    $experience_errors = "Choose a valid 'to' date";
  }
  if (empty($ex_address)) {
    $experience_errors = "Enter valid address";
  }
  if (empty($ex_description)) {
    $experience_errors = "Enter valid description";
  }
  if (empty($experience_errors)) {
    $insert = "INSERT INTO `experience` VALUES (null, '$ex_title','$ex_from','$ex_to','$ex_address','$ex_description',$id)";
    $i = mysqli_query($connection, $insert);
    if ($i) {
      $experience = true;
      path("dashboard/profile/editProfile.php#experience");
    }
  }
}
if (isset($_POST["ed_send"])) {
  $ed_title = validatestring($_POST["ed_title"]);
  $ed_from = validatestring($_POST["ed_from"]);
  $ed_to = validatestring($_POST["ed_to"]);
  $ed_address = validatestring($_POST["ed_address"]);
  $ed_description = validatestring($_POST["ed_description"]);
  /* ================ Validation ================ */
  if (empty($ed_title)) {
    $educational_errors = "Enter valid title";
  }
  if (empty($ed_from)) {
    $educational_errors = "Choose a valid 'from' date";
  }
  if (empty($ed_to)) {
    $educational_errors = "Choose a valid 'to' date";
  }
  if (empty($ed_address)) {
    $educational_errors = "Enter valid address";
  }
  if (empty($ed_description)) {
    $educational_errors = "Enter valid description";
  }
  if (empty($educational_errors)) {
    $insert = "INSERT INTO `education` VALUES (null, '$ed_title','$ed_from','$ed_to','$ed_address','$ed_description',$id)";
    $i = mysqli_query($connection, $insert);
    if ($i) {
      $educational = true;
      path("dashboard/profile/editProfile.php#education");
    }
  }
}
if (isset($_POST["s_send"])) {
  $s_description = validatestring($_POST["s_description"]);
  $s_address = validatestring($_POST["s_address"]);
  $s_phone = validatestring($_POST["s_phone"]);
  $s_email = validatestring($_POST["s_email"]);
  /* ================ Validation ================ */
  if (empty($s_description)) {
    $summary_errors = "Enter valid description";
  }
  if (empty($s_address)) {
    $summary_errors = "Enter valid address";
  }
  if (empty($s_phone)) {
    $summary_errors = "Enter valid phone";
  }
  if (empty($s_email)) {
    $summary_errors = "Enter valid email";
  }
  if (empty($summary_errors)) {
    $insert = "INSERT INTO `summary` VALUES (null, '$s_description','$s_address','$s_phone','$s_email',$id)";
    $i = mysqli_query($connection, $insert);
    if ($i) {
      $summary = true;
      path("dashboard/profile/editProfile.php#summary");
    }
  }
}
if (isset($_POST["skill_send"])) {
  $html = $_POST["html"];
  $css = $_POST["css"];
  $js = $_POST["js"];
  $php = $_POST["php"];
  $angular = $_POST["angular"];
  $ps = $_POST["ps"];
  $insert = "INSERT INTO `skills` VALUES (null, '$html','$css','$js','$php','$angular','$ps',$id)";
  $i = mysqli_query($connection, $insert);
  if ($i) {
    $skills = true;
    path("dashboard/profile/editProfile.php#skills");
  }
}
auth()
?>

<!-- partial -->

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Add Profile info </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/odc/dashboard/index.php">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profile Info</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <!-- ======================================================================== -->
      <!-- =============================== image ================================== -->
      <!-- ======================================================================== -->
      <div class="col-12 grid-margin">
        <div class="card" id="about">
          <div class="card-body">
            <h3 class="card-title">Change Image</h3>
            <form method="POST" enctype="multipart/form-data" class="form-sample">
              <div class="row">
                <dic class="col-4">
                  <img src="/odc/dashboard/upload/<?= $_SESSION['admin']['image'] ?>" alt="" class="img-fluid">
                </dic>
                <div class="col-8">
                  <div class="form-group row">
                    <label class="col-12 col-form-label mb-3">Upload Image:</label>
                    <div class="col-12">
                      <input type="file" class="form-control" name="image" placeholder="Upload Image" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row justify-content-end">
                    <div class="col-12 text-md-end text-center">
                      <button name="upload" class="btn btn-primary px-5 py-2">upload</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- ======================================================================== -->
      <!-- =============================== About ================================== -->
      <!-- ======================================================================== -->
      <div class="col-12 grid-margin">
        <div class="card" id="about">
          <div class="card-body">
            <?php if ($about) : ?>
              <div class="alert alert-success"> About section has been updated Successfully </div>
            <?php endif; ?>

            <?php if (!empty($about_errors)) : ?>
              <div class="alert alert-danger">
                <ul>
                  <?php foreach ($about_errors as $error) : ?>
                    <li><?= $error ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <h3 class="card-title">About Info</h3>
            <form method="POST" class="form-sample">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Job Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="title" placeholder="Job Title" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="birthdate" placeholder="Date of Birth" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">website</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="website" placeholder="URL" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="phone" placeholder="Phone Number" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="city" placeholder="city" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">age</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="age" placeholder="age" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Degree</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="degree" placeholder="degree" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" name="email" placeholder="email" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Freelance</label>
                    <div class="col-sm-9">
                      <select name="freelance" class="form-control">
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row justify-content-end">
                    <div class="col-12 text-md-end text-center">
                      <button name="about_send" class="btn btn-primary px-5 py-2">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- ======================================================================== -->
      <!-- ============================= Eperience ================================ -->
      <!-- ======================================================================== -->
      <div class="col-12 grid-margin">
        <div class="card" id="eperience">
          <div class="card-body">
            <?php if ($experience) : ?>
              <div class="alert alert-success"> Experience section has been updated Successfully </div>
            <?php endif; ?>

            <?php if (!empty($experience_errors)) : ?>
              <div class="alert alert-danger">
                <ul>
                  <?php foreach ($experience_errors as $error) : ?>
                    <li><?= $error ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
            <h3 class="card-title">Experience Info</h3>
            <form method="POST" class="form-sample">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Job Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="ex_title" placeholder="Job Title" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">From</label>
                    <div class="col-sm-3">
                      <select name="ex_from" class="form-control">
                        <?php for ($i = 1980; $i <= 2023; $i++) : ?>
                          <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor ?>
                      </select>
                    </div>
                    <label class="col-sm-3 text-center col-form-label">To</label>
                    <div class="col-sm-3">
                      <select name="ex_to" class="form-control">
                        <?php for ($i = 1980; $i <= 2023; $i++) : ?>
                          <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">address</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="ex_address" placeholder="address" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                      <textarea name="ex_description" class="form-control" placeholder="Add each point in a newline"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row justify-content-end">
                    <div class="col-12 text-md-end text-center">
                      <button name="ex_send" class="btn btn-primary px-5 py-2">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- ======================================================================== -->
      <!-- ============================= Education ================================ -->
      <!-- ======================================================================== -->
      <div class="col-12 grid-margin">
        <div class="card" id="education">
          <div class="card-body">
            <?php if ($educational) : ?>
              <div class="alert alert-success"> Education section has been updated Successfully </div>
            <?php endif; ?>
            <?php if (!empty($educational_errors)) : ?>
              <div class="alert alert-danger">
                <ul>
                  <?php foreach ($educational_errors as $error) : ?>
                    <li><?= $error ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
            <h3 class="card-title">Education Info</h3>
            <form method="POST" class="form-sample">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Degree Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="ed_title" placeholder="Degree Title" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">From</label>
                    <div class="col-sm-3">
                      <select name="ed_from" class="form-control">
                        <?php for ($i = 1980; $i <= 2023; $i++) : ?>
                          <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor ?>
                      </select>
                    </div>
                    <label class="col-sm-3 text-center col-form-label">To</label>
                    <div class="col-sm-3">
                      <select name="ed_to" class="form-control">
                        <?php for ($i = 1980; $i <= 2023; $i++) : ?>
                          <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">address</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="ed_address" placeholder="address" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                      <textarea name="ed_description" class="form-control" placeholder="Add each point in a newline"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row justify-content-end">
                    <div class="col-12 text-md-end text-center">
                      <button name="ed_send" class="btn btn-primary px-5 py-2">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- ======================================================================== -->
      <!-- ============================== Summary ================================= -->
      <!-- ======================================================================== -->
      <div class="col-12 grid-margin">
        <div class="card" id="summary">
          <div class="card-body">
            <?php if ($summary) : ?>
              <div class="alert alert-success"> Summary section has been updated Successfully </div>
            <?php endif; ?>
            <?php if (!empty($esummary_errors)) : ?>
              <div class="alert alert-danger">
                <ul>
                  <?php foreach ($esummary_errors as $error) : ?>
                    <li><?= $error ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
            <h3 class="card-title">Summary</h3>
            <form method="POST" class="form-sample">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                      <textarea name="s_description" class="form-control" placeholder="Add each point in a newline"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">address</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="s_address" placeholder="address" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">phone</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="s_phone" placeholder="Phone number" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" name="s_email" placeholder="email" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row justify-content-end">
                    <div class="col-12 text-md-end text-center">
                      <button name="s_send" class="btn btn-primary px-5 py-2">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- ======================================================================== -->
      <!-- =============================== Skills ================================= -->
      <!-- ======================================================================== -->
      <div class="col-12 grid-margin">
        <div class="card" id="skills">
          <div class="card-body">
            <?php if ($skills) : ?>
              <div class="alert alert-success"> Skills have been updated Successfully </div>
            <?php endif; ?>
            <h3 class="card-title">Skills</h3>
            <form method="POST" class="form-sample">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-1 col-form-label">HTML</label>
                    <div class="col-sm-3 mb-2">
                      <input type="range" class="form-control" name="html" />
                    </div>
                    <label class="col-sm-1 col-form-label">CSS</label>
                    <div class="col-sm-3 mb-2">
                      <input type="range" class="form-control" name="css" />
                    </div>
                    <label class="col-sm-1 col-form-label">JS</label>
                    <div class="col-sm-3 mb-2">
                      <input type="range" class="form-control" name="js" />
                    </div>
                    <label class="col-sm-1 col-form-label">PHP</label>
                    <div class="col-sm-3 mb-2">
                      <input type="range" class="form-control" name="php" />
                    </div>
                    <label class="col-sm-1 col-form-label">ِAngular</label>
                    <div class="col-sm-3 mb-2">
                      <input type="range" class="form-control" name="angular" />
                    </div>
                    <label class="col-sm-1 col-form-label">Photoshop</label>
                    <div class="col-sm-3 mb-2">
                      <input type="range" class="form-control" name="ps" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row justify-content-end">
                    <div class="col-12 text-md-end text-center">
                      <button name="skill_send" class="btn btn-primary px-5 py-2">Save</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include "../shared/script.php";
?>