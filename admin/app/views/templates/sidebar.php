  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-cyan elevation-4">
    <div class="sidebar">

    <!-- Brand Logo -->
    <div class="brand-link" style="margin-left: -7px;">
      <img src="<?= BASEURL; ?>img/iroom.png" alt="iroom logo" class="brand-image" style="opacity: 0.8">
      <span class="brand-text font-weight-bold" style="color: #17a2b8;">iRoom Admin</span>
    </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open ">
            <a href="<?= BASEURL; ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          <li class="nav-header">Ruangan</li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>ruangan" class="nav-link">
              <i class="nav-icon fas fa-door-closed"></i>
              <p>
                Data Ruangan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>proses" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Jadwal
              </p>
            </a>
          </li>

          <li class="nav-header">Mata Kuliah</li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>matkul" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Mata Kuliah
              </p>
            </a>
          </li>

          <!-- user -->
          <li class="nav-header">User</li>
          <li class="nav-item">
            <a href="<?= BASEURL; ?>user" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data User
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="<?= BASEURL; ?>aktivasi" class="nav-link">
                  <i class="nav-icon fas fa-user-check"></i>
                  <p>
                      Aktivasi
                      <?php if ($data['aktivasi'] > 0): ?>
                          <span class="badge badge-danger right"><?= count($data['aktivasi']); ?></span>
                      <?php endif; ?>
                  </p>
              </a>
          </li>
          <!-- lainnya -->
          <li class="nav-header">Lainnya</li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#bantuan">
              <i class="nav-icon fas fa-question"></i>
              <p>
                Bantuan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#keluar">
              <i class="nav-icon fas fa-times"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><b style="color:#17a2b8;"><?= $data['title']; ?></b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= BASEURL; ?>">Home</a></li>
              <li class="breadcrumb-item active"><?= $data['title']; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- modal bantuan -->
    <div class="modal fade" id="bantuan" aria-hidden="true" aria-labelledby="bantuanLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="bantuan" style="color: #17a2b8;">Bantuan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" >
            Apakah kamu butuh bantuan?
          </div>
          <div class="modal-footer">
            <button class="btn btn-info" data-bs-toggle="modal"><a href="https://wa.me/6281382209822?text=Saya%20butuh%20bantuan%20mengenai%20iRoom" style="color: white; text-decoration: none">Kirim pesan </a></button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal bantuan -->

    <!-- modal logout -->
    <div class="modal fade" id="keluar" aria-hidden="true" aria-labelledby="keluarLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="bantuan" style="color: #17a2b8;">Keluar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" >
            Apakah kamu akan keluar?
          </div>
          <div class="modal-footer">
          <button class="btn btn-info" data-bs-toggle="modal"><a href="<?= BASEURL; ?>Login/logout" style="color: white; text-decoration: none">Ya</a></button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal logout -->

    <!-- Main content -->
    <section class="content">
      


