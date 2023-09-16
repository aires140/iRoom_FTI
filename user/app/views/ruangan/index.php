

  <div class="small-box bg-white shadow" style="padding: 2%; margin:2%;">


    <nav class="navbar">
      <div class="container-fluid">
        <!-- judul -->
          <a class="navbar-brand"><h4 class="m-0"><b style="color:blue;">Data Ruangan</b></h4></a>
    
          <!-- pencarian -->
          <!-- input -->
          <form class="d-flex" role="search" action="<?= BASEURL; ?>Ruangan/cari" method="post">
            <input class="form-control me-2" type="search" placeholder="Cari" name="keyword" id="keyword" autocomplete="off">
            <button class="btn btn-link" style="color: #17a2b8;" type="submit" id="tombolCari">
              <i class="fas fa-search"></i>
            </button>
          </form>
      </div>

      <!-- catatan kecil -->
      <div class="row">
        <p style="padding-top: 6px; padding-left: 25px; opacity: 0.7;">Silahkan klik button <b>kosong</b> pada tabel apabila kamu ingin <i>booking</i> ruangan dan memiliki perizinan <b>akses banyak ruangan </b>.</p>
      </div> 

      <!-- flasher -->
          <?php Flasher::flash(); ?>
      <!-- akhir row -->

    </nav>
    <!-- akhir navbar tabel -->

      <!-- awal tabel -->
      <table class="table" style="overflow-x: auto; width:100%; ">
        <thead">
          <tr style="padding: 8px;">
            <th style="vertical-align:middle;">No</th>
            <th style="vertical-align:middle;">Kode Ruangan</th>
            <th style="vertical-align:middle;">Gedung</th>
            <th style="vertical-align:middle;">Fasilitas</th>
            <th style="vertical-align:middle;">Kapasitas</th>
            <th style="vertical-align:middle;">Jenis Ruangan</th>
            <th style="vertical-align:middle;">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
            <?php foreach ($data['ruangan'] as $ruangan) : ?>

            <tr>
                <th><?= $i; ?></th>
                <td><?= $ruangan['kode_ruangan']; ?></td>
                <td><?= $ruangan['gedung']; ?></td>
                <td><?= $ruangan['fasilitas']; ?></td>
                <td><?= $ruangan['kapasitas']; ?></td>
                <td><?= $ruangan['ket']; ?></td>

                <td>
                    <?php
                    foreach ($data['user'] as $user) {
                    if (isset($user['akses']) && $user['akses'] === 'banyak') {
                        if ($ruangan['status'] === 'Kosong') {
                            echo '<a href="' . BASEURL . '/Ruangan/setTerisi/' . $ruangan['id_ruangan'] . '"  class="btn btn-success" style="text-decoration: none;"><b>Kosong</b></a>';
                        } else {
                            echo '<a href="#" class="btn btn-secondary" style="text-decoration: none;"><b>Terisi</b></a>';
                        }
                    } else {
                        echo $ruangan['status']; // Menampilkan status ruangan tanpa tombol
                    }
                  }
                    ?>
                </td>
            </tr>

            <?php $i++; ?>
            <?php endforeach; ?>

        </tbody>
      </table>
      <!-- akhir tabel -->


  </div>

<!-- Modal tambah data -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title fs-5" id="formModal"><b style="color:#17a2b8;">Tambah Data Ruangan</b></h4>
        <a class="btn-close" data-bs-dismiss="modal"></a>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/Ruangan/tambahRuangan" method="post">

          <div class="mb-3">
            <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
            <input type="text" class="form-control" id="kode_ruangan" name="kode_ruangan">
          </div>

          <div class="mb-3">
            <label for="lantai" class="form-label">Lantai</label>
            <input type="text" class="form-control" id="lantai" name="lantai">
          </div>

          <div class="mb-3">
            <label for="gedung" class="form-label">Gedung</label>
            <input type="text" class="form-control" id="gedung" name="gedung">
          </div>
          
          <div class="mb-3">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <input type="text" class="form-control" id="fasilitas" name="fasilitas">
          </div>

          <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="text" class="form-control" id="kapasitas" name="kapasitas">
          </div>

          <div>
            <label for="status" class="form-label">Status Ruangan</label>
            <select name="status" id="status" class="form-control">
              <option value="Kosong">Kosong</option>
              <option value="Proses">Proses</option> 
              <option value="Terisi">Terisi</option> 
            </select>
          </div>
        

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
    </div>
  </div>
</div>

