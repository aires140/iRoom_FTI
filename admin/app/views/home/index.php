
    
    <div class="content">
            <div class="container-fluid">
        <!-- Small boxes (Start box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-info shadow rounded-lg">
              <div class="inner">
                <h3>
                  <?= count($data['JmlRuangKosong']); ?>
                </h3>

                <p>Ruangan Kosong</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-door-open"></i>
              </div>
              <a href="<?= BASEURL; ?>Ruangan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-info shadow rounded-lg">
              <div class="inner">
                <h3>
                  <!-- menghitung jumlah data -->
                  <?= count($data['JmlRuangIsi']); ?>
                </h3>

                <p>Ruangan Dipakai</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-door-closed"></i>
              </div>
              <a href="<?= BASEURL; ?>Ruangan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-info shadow rounded-lg">
              <div class="inner">
                  <h3>
                    <!-- menghitung jumlah data -->
                    <?= count($data['JmlAktivasi']); ?>
                  </h3>


                <p>Aktivasi user</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-user-check"></i>
              </div>
              <a href="<?= BASEURL; ?>Aktivasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="small-box bg-gradient-info shadow rounded-lg">
              <div class="inner round">
                <h3>
                  <!-- menghitung jumlah data -->
                  <?= count($data['JmlUser']) ?>
                    
                </h3>
                <p>Data User</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-users"></i>
              </div>
              <a href="<?= BASEURL; ?>User" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="row" style="margin: 2px; margin-top: 20px;">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <strong>Selamat datang Admin!</strong><br> Kamu sekarang dapat mengakses data yang ada di iRoom Informatika.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>


          <!-- Visi dan Misi teknik informatika -->
          <!-- small box -->
          <div class="row" style="padding-right:3%;">
            <div class="small-box bg-white shadow" style="padding: 3%; margin:2%; padding-right:5%;">
              <h4 class="m-0"><b style="color:#17a2b8;">Visi & Misi</b></h4><br>
                <strong><center>Visi</center></strong>
                <p>Menjadi Program Studi Teknik Informatika yang mampu menghasilkan lulusan yang unggul dan mandiri bidang rekayasa perangkat lunak di Jawa Barat pada tahun 2028.</p>
                <strong><center>Misi</center></strong>
                <ul style="text-align: justify;">
                  <li><p>Mengembangkan sistem dan proses belajar bidang rekayasa perangkat lunak serta mampu mengembangkan Pendidikan untuk menghasilkan lulusan yang unggul dan mandiri.</p></li>
                  <li><p>Mengembangkan penelitian bidang rekayasa perangkat lunak yang inovatif dan bermanfaat untuk perkembangan teknologi rekayasa perangkat lunak dan masyarakat.</p></li>
                  <li><p>Mengembangkan pengabdian kepada masyarakat dalam bentuk pengembangan teori, sistem dan aplikasi serta pemecahan berbagai permasalahan bidang rekayasa perangkat lunak yang sesuai dengan kebutuhan masyarakat.</p></li>
                  <li><p>Meningkatkan Kerjasama yang berkelanjutan dengan Lembaga institusi lain, pemerintah industry, asosiasi bidang keilmuan, dan masyarakat dalam rangka meningkatkan terselenggaranya kualitas Pendidikan, penelitian dan pengabdian kepada masyarakat.</p></li>
                </ul>
            </div>
          </div>
          
        </div>

                        

    </div>
