<?php
// functions
include "../app/config.php";
include "../app/functions.php";

// ui
include "../shared/heade.php";
include "../shared/sidebar.php";
include "../shared/navbar.php";

// upload image
if (isset($_POST['add'])) {
  $address = $_POST['address'];
  $price = $_POST['price'];
  $image_name = time() . $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $location = "../upload/" . $image_name;
  move_uploaded_file($tmp_name, $location);
  $insert = "INSERT INTO `estateagency`VALUES (null,'$address','$image_name','$price')";
  $i = mysqli_query($connection, $insert);
  path("dashboard/profile/estateAgency.php");
}

$select = "SELECT * FROM `estateagency`";
$s = mysqli_query($connection, $select);
auth(2);
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
      <!-- =========================== image and info ============================= -->
      <!-- ======================================================================== -->
      <div class="col-12 grid-margin">
        <div class="card" id="about">
          <div class="card-body">
            <h3 class="card-title">Change Image</h3>
            <form method="POST" enctype="multipart/form-data" class="form-sample">
              <div class="row">
                <div class="col-12">
                  <div class="form-group row">
                    <label class="col-12 col-form-label mb-3">Upload Image:</label>
                    <div class="col-12">
                      <input type="file" class="form-control" name="image" placeholder="Upload Image" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-12 col-form-label mb-3">address:</label>
                    <div class="col-12">
                      <input type="text" class="form-control" name="address" placeholder="Adress" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-12 col-form-label mb-3">price:</label>
                    <div class="col-12">
                      <input type="text" class="form-control" name="price" placeholder="Price" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row justify-content-end">
                    <div class="col-12 text-md-end text-center">
                      <button name="add" class="btn btn-primary px-5 py-2">Add</button>
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
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">image</th>
                  <th scope="col">address</th>
                  <th scope="col">price</th>
                  <th scope="col">action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($s as $data) : ?>
                  <tr>
                    <th><?= $data['id'] ?></th>
                    <td><img width="60" src="/odc/dashboard/upload/<?= $data['image'] ?>" alt=""></td>
                    <td><?= $data['address'] ?></td>
                    <td><?= $data['price'] ?>$</td>
                    <td><a href="/odc/dashboard/profile/estateAgency.php?delete=<?= $data['id'] ?>" class="btn btn-danger">Delete</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php
include "../shared/script.php";
?>