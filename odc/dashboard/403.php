<?php

// functions
include "./app/config.php";
include "./app/functions.php";
//ui
include "./shared/heade.php";
include "./shared/sidebar.php";
?>
<div class="container">
  <div class="row text-center py-5">
    <h1 class="text-danger">Not Authorized to visit this page</h1>
    <div class="col-12 text-center">
      <img src="/odc/dashboard/assets/images/not_allowed.jpg" alt="" class="img-fluid">
    </div>
  </div>
</div>
<?php
include "./shared/script.php";

?>