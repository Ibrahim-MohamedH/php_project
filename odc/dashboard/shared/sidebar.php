<div class="container-scroller">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="/odc/dashboard/index.php"><img src="/odc/dashboard/assets/images/logo.svg" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="/odc/dashboard/index.php"><img src="/odc/dashboard/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle" src="/odc/dashboard/upload/<?= $_SESSION['admin']['image'] ?>" alt="" />
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal"><?= $_SESSION['admin']['name'] ?></h5>
            </div>
          </div>

        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="/odc/dashboard/index.php">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="/odc/dashboard/profile/editProfile.php">
          <span class="menu-icon">
            <i class="mdi mdi-account"></i>
          </span>
          <span class="menu-title">Profile Info</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="/odc/dashboard/profile/estateAgency.php">
          <span class="menu-icon">
            <i class="mdi mdi-account"></i>
          </span>
          <span class="menu-title">Estate Agency</span>
        </a>
      </li>
    </ul>
  </nav>