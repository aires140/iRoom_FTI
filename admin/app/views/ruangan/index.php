

  <div class="small-box bg-white shadow" style="padding: 2%; margin:2%;">


    <nav class="navbar">
      <div class="container-fluid">
        <!-- judul -->
          <a class="navbar-brand"><h4 class="m-0"><b style="color:#17a2b8;">Data Ruangan</b></h4></a>
    
          <!-- pencarian -->
          <!-- input -->
          <form class="d-flex" role="search" action="<?= BASEURL; ?>Ruangan/cari" method="post">
            <input class="form-control me-2" type="search" placeholder="Cari" name="keyword" id="keyword" autocomplete="off">
            <button class="btn btn-link" style="color: #17a2b8;" type="submit" id="tombolCari">
              <i class="fas fa-search"></i>
            </button>
          </form>

          <!-- cetak -->
          <a href="<?= BASEURL; ?>ruangan/cetak" class="btn btn-link" style="color: white;" type="submit">
            <i class="fas fa-print" style="color: #17a2b8;"></i>
          </a>
          
          <!-- tambah -->
          <a href="<?= BASEURL; ?>Ruangan/tambahRuangan" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#formModal">
            <i class="fas fa-plus"style="color:white;"></i>
          </a>
      </div>

      <!-- catatan kecil -->
      <div class="row">
        <p style="padding-top: 5px; padding-left: 25px; opacity: 0.7;">Silahkan klik icon <b>ubah</b> pada tabel, lalu pilih opsi dibaris status ruangan apabila kamu akan <i>booking</i> ruangan.</p>
      </div> 

      <!-- flasher -->
      <div style="padding-top: 5%; padding-bottom: -5px">
          <?php Flasher::flash(); ?>
      </div>
      <!-- akhir row -->

    </nav>
    <!-- akhir navbar tabel -->

      <!-- awal tabel -->
      <table class="table" style="overflow-x: auto; width:100%; ">
        <thead">
          <tr style="padding: 8px;">
            <th rowspan="2" style="vertical-align:middle;">No</th>
            <th rowspan="2" style="vertical-align:middle;">Kode Ruangan</th>
            <th rowspan="2" style="vertical-align:middle;">Gedung</th>
            <th rowspan="2" style="vertical-align:middle;">Fasilitas</th>
            <th rowspan="2" style="vertical-align:middle;">Kapasitas</th>
            <th rowspan="2" style="vertical-align:middle;">Jenis Ruangan</th>
            <th rowspan="2" style="vertical-align:middle;">Status</th>
            <th rowspan="2" style="vertical-align:middle;">Pengguna</th>
            <th colspan="2" style="vertical-align:middle; text-align:center;">Opsi</th>
          </tr>
          <tr style="text-align:center;">
            <th>ubah</th>
            <th>hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach($data['ruangan'] as $ruangan): ?>
            
          <tr>
            <th><?= $i; ?></th>
            <td><?= $ruangan['kode_ruangan']; ?></td>
            <td><?= $ruangan['gedung']; ?></td>
            <td><?= $ruangan['fasilitas']; ?></td>
            <td><?= $ruangan['kapasitas']; ?></td>
            <td><?= $ruangan['ket']; ?></td>
            <td><?= $ruangan['status']; ?></td>
            <td><?= $ruangan['nama']; ?></td>

            <!-- ubah -->
            <td style="text-align: center;">
              <a href="<?= BASEURL; ?>Ruangan/formUbahRuangan/<?= $ruangan['id_ruangan'];?>"><i class="fa fa-edit" style="color: blue;" ></i></a>
            </td>

            <!-- hapus -->
            <td style="text-align: center;">
              <a href="<?= BASEURL; ?>Ruangan/hapusRuangan/<?= $ruangan['id_ruangan']; ?>" onclick="return confirm('Apakah kamu yakin akan menghapus data?');">
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
            <label for="ket" class="form-label">Jenis Ruangan</label>
            <select name="ket" id="ket" class="form-control">
              <option value="Teori">Teori</option>
              <option value="Praktikum">Praktikum</option> 
            </select>
          </div>

          <div>
            <label for="status" class="form-label">Status Ruangan</label>
            <select name="status" id="status" class="form-control">
              <option value="Kosong">Kosong</option>
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

