<?php
function path($location)
{
  echo "
  <script> 
  window.location.replace('/odc/$location') 
  </script>
  ";
}
function validatestring($input_value)
{
  $input_value = trim($input_value);
  $input_value = strip_tags($input_value);
  $input_value = htmlspecialchars($input_value);
  $input_value = stripslashes($input_value);

  return $input_value;
}

function lengthCounter($input_value)
{
  $input_value = strlen($input_value) < 5;
  if ($input_value) {
    return true;
  }
}

function auth($rule2 = null)
{
  if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin']['rule'] == 1 || $_SESSION['admin']['rule'] == $rule2) {
    } else {
      path("dashboard/403.php");
    }
  } else {
    path("dashboard/login.php");
  }
}
