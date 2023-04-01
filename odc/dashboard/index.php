<?php
// functions
include "./app/config.php";
include "./app/functions.php";
//ui
include "./shared/heade.php";
include "./shared/sidebar.php";
include "./shared/navbar.php";

?>



<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-6 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="text-center font-weight-normal py-3"><a href="/odc/dashboard/profile/editProfile.php" class="py-2 px-5 btn btn-secondary btn-rounded">edit profile</a></h6>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="text-center font-weight-normal py-3"><a href="/odc/dashboard/profile/estateAgency.php" class="py-2 px-5 btn btn-success btn-rounded">Add Property</a></h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include "./shared/footer.php";
  include "./shared/script.php";
  ?>