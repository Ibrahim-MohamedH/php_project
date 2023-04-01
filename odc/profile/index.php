<?php
include "../dashboard/app/config.php";
include "../dashboard/app/functions.php";
session_start();
$id = $_SESSION['admin']['id'];
// About Section
$title = "";
$birthday = "";
$website = "";
$phone = "";
$city = "";
$age = "";
$degree = "";
$email = "";
$freelance = "";
$aboutSelect = "SELECT * FROM `about` WHERE userid = $id";
$as = mysqli_query($connection, $aboutSelect);
$asnum = mysqli_num_rows($as);
if ($asnum > 0) {
  $asrow = mysqli_fetch_assoc($as);
  $title = $asrow["title"];
  $birthday = $asrow["birthday"];
  $website = $asrow["website"];
  $phone = $asrow["phone"];
  $city = $asrow["city"];
  $age = $asrow["age"];
  $degree = $asrow["degree"];
  $email = $asrow["email"];
  $freelance = $asrow["freelance"];
}
// Skills Section
$html = "";
$css = "";
$js = "";
$PHP = "";
$angular = "";
$ps = "";
$skillSelect = "SELECT * FROM `skills` WHERE userid = $id";
$ss = mysqli_query($connection, $skillSelect);
$ssnum = mysqli_num_rows($ss);
if ($ssnum > 0) {
  $ssrow = mysqli_fetch_assoc($ss);
  $html = $ssrow["html"];
  $css = $ssrow["css"];
  $js = $ssrow["javascript"];
  $PHP = $ssrow["php"];
  $angular = $ssrow["Angular"];
  $ps = $ssrow["Photoshop"];
}
// Summary Section
$sumdescription = "";
$sumaddress = "";
$sumphone = "";
$sumemail = "";
$sumSelect = "SELECT * FROM `summary` WHERE userid = $id";
$sum = mysqli_query($connection, $sumSelect);
$sumnum = mysqli_num_rows($sum);
if ($sumnum > 0) {
  $ssrow = mysqli_fetch_assoc($sum);
  $sumdescription = $ssrow["description"];
  $sumaddress = $ssrow["address"];
  $sumphone = $ssrow["phone"];
  $sumemail = $ssrow["email"];
}
// education Section
$edtitle = "";
$edstarting_date = "";
$edending_date = "";
$edaddress = "";
$eddescription = "";
$eduSelect = "SELECT * FROM `education` WHERE userid = $id";
$edu = mysqli_query($connection, $eduSelect);
$edunum = mysqli_num_rows($edu);
if ($edunum > 0) {
  $ssrow = mysqli_fetch_assoc($edu);
  $edtitle = $ssrow['title'];
  $edstarting_date = $ssrow['starting_date'];
  $edending_date = $ssrow['ending_date'];
  $edaddress = $ssrow['address'];
  $eddescription = $ssrow['description'];
}
// experience Section
$extitle = "";
$exstarting_date = "";
$exending_date = "";
$exaddress = "";
$exdescription = "";
$expSelect = "SELECT * FROM `experience` WHERE userid = $id";
$exp = mysqli_query($connection, $expSelect);
$expnum = mysqli_num_rows($exp);
if ($expnum > 0) {
  $ssrow = mysqli_fetch_assoc($exp);
  $extitle = $ssrow['title'];
  $exstarting_date = $ssrow['starting_date'];
  $exending_date = $ssrow['ending_date'];
  $exaddress = $ssrow['address'];
  $exdescription = $ssrow['description'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/odc/profile/assets/img/favicon.png" rel="icon">
  <link href="/odc/profile/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/odc/profile/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/odc/profile/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/odc/profile/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/odc/profile/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/odc/profile/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/odc/profile/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/odc/profile/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="/odc/dashboard/upload/<?= $_SESSION['admin']['image'] ?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="/odc/profile/index.php"><?= $_SESSION['admin']['name'] ?></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" style="background:url('/odc/dashboard/upload/<?= $_SESSION['admin']['image'] ?>') top center; background-size:cover;background-attachment: fixed; " class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1><?= $_SESSION['admin']['name'] ?></h1>
      <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="/odc/dashboard/upload/<?= $_SESSION['admin']['image'] ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3><?= $title ?></h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?= $birthday ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <a href="<?= $website ?>"><?= $_SESSION['admin']['name'] ?></a></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?= $phone ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?= $city ?></span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?= $age ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?= $degree ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?= $email ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span><?= $freelance ?></span></li>
                </ul>
              </div>
            </div>
            <p>
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Skills</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row skills-content">

          <div class="col-lg-6" data-aos="fade-up">


            <div class="progress">
              <span class="skill">HTML <i class="val"><?= $html ?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $html ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">CSS <i class="val"><?= $css ?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $css ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">JavaScript <i class="val"><?= $js ?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $js ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

            <div class="progress">
              <span class="skill">PHP <i class="val"><?= $PHP ?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $PHP ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">WordPress/CMS <i class="val"><?= $angular ?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $angular ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Photoshop <i class="val"><?= $ps ?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $ps ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Resume</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title">Summary</h3>
            <div class="resume-item pb-0">
              <h4><?= $_SESSION['admin']['name'] ?></h4>
              <p><?= $sumdescription ?></p>
              <ul>
                <li><?= $sumaddress ?></li>
                <li><?= $sumphone ?></li>
                <li><?= $sumemail ?></li>
              </ul>
            </div>

            <h3 class="resume-title">Education</h3>
            <div class="resume-item">
              <h4><?= $edtitle ?></h4>
              <h5><?= $edstarting_date . " - " . $edending_date ?></h5>
              <p><?= $edaddress ?></p>
              <p><?= $eddescription ?></p>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Professional Experience</h3>
            <div class="resume-item">
              <h4><?= $edtitle ?></h4>
              <h5><?= $edstarting_date . " - " . $edending_date ?></h5>
              <p><em><?= $edaddress ?> </em></p>
              <p>
                <?= $eddescription ?>
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="credits">
        Designed by <a href="https://github.com/Ibrahim-MohamedH">Ibrahim Mohamed</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/odc/profile/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/odc/profile/assets/vendor/aos/aos.js"></script>
  <script src="/odc/profile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/odc/profile/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/odc/profile/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/odc/profile/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/odc/profile/assets/vendor/typed.js/typed.min.js"></script>
  <script src="/odc/profile/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="/odc/profile/assets/vendor/php-email-form/validate.js"></script>

  <!-- Main JS File -->
  <script src="/odc/profile/assets/js/main.js"></script>

</body>

</html>