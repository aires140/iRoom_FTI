

<div class="small-box bg-white shadow" style="padding: 2%; margin:2%;">


<nav class="navbar">
  <div class="container-fluid">
    <!-- judul -->
      <a class="navbar-brand"><h4 class="m-0"><b style="color:#17a2b8;">Data User</b></h4></a>

      <!-- pencarian -->
      <!-- input -->
      <form class="d-flex" role="search" action="<?= BASEURL; ?>User/cari" method="post">
        <input class="form-control me-2" type="search" placeholder="Cari" name="keyword" id="keyword" autocomplete="off">
        <button class="btn btn-link" style="color: #17a2b8;" type="submit" id="tombolCari">
          <i class="fas fa-search"></i>
        </button>
      </form>
      

      
  </div>


  <!-- flasher -->
  <div style="padding-top: 2%; padding-bottom: -5px">
      <?php Flasher::flash(); ?>
  </div>

</nav>
<!-- akhir navbar tabel -->

  <!-- awal tabel -->
  <table class="table" style="overflow-x: auto; width:100%; ">
    <thead">
      <tr style="padding: 8px;">
        <th rowspan="2" style="vertical-align:middle;">No</th>
        <th rowspan="2" style="vertical-align:middle;">Nama</th>
        <th rowspan="2" style="vertical-align:middle;">NIM</th>
        <th rowspan="2" style="vertical-align:middle;">E-Mail</th>
        <th rowspan="2" style="vertical-align:middle;">Jenis Kelamin</th>
        <th rowspan="2" style="vertical-align:middle;">Tgl Lahir</th>
        <th rowspan="2" style="vertical-align:middle;">Fakultas</th>
        <th rowspan="2" style="vertical-align:middle;">Prodi</th>
        <th rowspan="2" style="vertical-align:middle;">Semester</th>
        <th colspan="2" style="vertical-align:middle; text-align:center;">Opsi</th>
      </tr>
      <tr style="text-align:center;">
        <th>hapus</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach($data['user'] as $user): ?>
        
      <tr>
        <th><?= $i; ?></th>
        <td><?= $user['nama']; ?></td>
        <td><?= $user['nim']; ?></td>
        <td><?= $user['email']; ?></td>
        <td><?= $user['jenis_kelamin']; ?></td>
        <td><?= $user['ttl']; ?></td>
        <td><?= $user['fakultas']; ?></td>
        <td><?= $user['prodi']; ?></td>
        <td><?= $user['kelas']; ?></td>

        <!-- hak akses
        <td style="text-align: center;">
          <div class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-edit" style="color: blue;" ></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?= BASEURL; ?>User/akses/<?= $user['id_user'];?>">Akses banyak ruangan</a></li>
              <li><a class="dropdown-item" href="<?= BASEURL; ?>User/aksess/<?= $user['id_user'];?>">Akses satu ruangan</a></li>
            </ul>
          </div>
        </td> -->
      


        <!-- hapus -->
        <td style="text-align: center;">
          <a href="<?= BASEURL; ?>User/hapus/<?= $user['id_user']; ?>" onclick="return confirm('Apakah kamu yakin akan menghapus data?');">
            <i class="fa fa-trash" style="color: red;"></i>
          </a>
        </td>

      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  <!-- akhir tabel -->


</div>

