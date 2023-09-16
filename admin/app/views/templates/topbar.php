<?php 
  session_start();
  $nama = $_SESSION['nama'];
?>

<body class="hold-transition sidebar-mini layout-fixed">
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="margin-left: 10px;"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- fullscreen -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
      <!-- info user -->
      <li class="nav-item">
          <!-- Sidebar user panel (optional) -->
            <div class="image" style="padding-top: 7px; padding-right: 15px;">
              <img src="<?= BASEURL; ?>img/person (1).png" class="img-circle" alt="User Image" style="height: 22px;">
              <a href="<?= BASEURL; ?>Identitas/<?= $nama; ?>" style="text-decoration: none; color:white;"><?= $nama; ?></a>
            </div>
      </li>
    
    </ul>
  </nav>
  <!-- /.navbar -->
  <div class="content-wrapper">


