

  <div class="small-box bg-white shadow" style="padding: 2%; margin:2%;">


    <nav class="navbar">
      <div class="container-fluid">
        <!-- judul -->
          <a class="navbar-brand"><h4 class="m-0"><b style="color:#17a2b8;">Data Mata Kuliah</b></h4></a>
    
          <!-- pencarian -->
          <!-- input -->
          <form class="d-flex" role="search" action="<?= BASEURL; ?>Matkul/cari" method="post">
            <input class="form-control me-2" type="search" placeholder="Cari" name="keyword" id="keyword" autocomplete="off">
            <button class="btn btn-link" style="color: #17a2b8;" type="submit" id="tombolCari">
              <i class="fas fa-search"></i>
            </button>
          </form>
          
          <!-- tambah -->
          <a href="<?= BASEURL; ?>Matkul/tambahMatkul" class="btn btn-success" style="color: white;" data-bs-toggle="modal" data-bs-target="#matkul">
            <i class="fas fa-plus"style="color:white;"></i>
          </a>
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
            <th rowspan="2" style="vertical-align:middle;">Mata Kuliah</th>
            <th rowspan="2" style="vertical-align:middle;">Kelas</th>
            <th rowspan="2" style="vertical-align:middle;">SKS</th>
            <th rowspan="2" style="vertical-align:middle;">Jenis Materi</th>
            <th colspan="2" style="vertical-align:middle; text-align:center;">Opsi</th>
          </tr>
          <tr style="text-align:center;">
            <th>ubah</th>
            <th>hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach($data['matkul'] as $mat): ?>
            
          <tr>
            <th><?= $i; ?></th>
            <td><?= $mat['mata_kuliah']; ?></td>
            <td><?= $mat['kelas']; ?></td>
            <td><?= $mat['sks']; ?></td>
            <td><?= $mat['ket']; ?></td>
            

            <!-- ubah -->
            <td style="text-align: center;">
              <a href="<?= BASEURL; ?>Matkul/formUbahMatkul/<?= $mat['id_matkul'];?>"><i class="fa fa-edit" style="color: blue;" ></i></a>
            </td>

            <!-- hapus -->
            <td style="text-align: center;">
              <a href="<?= BASEURL; ?>Matkul/hapusMatkul/<?= $mat['id_matkul']; ?>" onclick="return confirm('Apakah kamu yakin akan menghapus data?');">
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
<div class="modal fade" id="matkul" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title fs-5" id="formModal"><b style="color:#17a2b8;">Tambah Mata Kuliah</b></h4>
        <a class="btn-close" data-bs-dismiss="modal"></a>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>Matkul/tambahMatkul" method="post">

          <div class="mb-3">
            <label for="mata_kuliah" class="form-label">Mata Kuliah</label>
            <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah">
          </div>

          <div class="mb-3">
          <label for="kelas" class="form-label">Kelas</label>
            <select name="kelas" class="form-control">
              <option>Pilih</option>
              <!-- pengisian opsi -->
              <?php $i = 1; ?>
              <?php foreach( $data['kelas'] as $row ) : ?>
                <option value="<?= $row['id_kelas']; ?>"><?= $row["kelas"]; ?></option>
              <?php $i++ ?>
              <?php endforeach; ?>
            </select>
          </div>

          <div>
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-control">
              <option value="Pagi">Pagi</option>
              <option value="Siang">Siang</option> 
            </select>
          </div>
          
          <div>
            <label for="ket" class="form-label">Jenis Mata Kuliah</label>
            <select name="ket" id="ket" class="form-control">
              <option value="Teori">Teori</option>
              <option value="Praktikum">Praktikum</option> 
            </select>
          </div>

          <div class="mb-3">
            <label for="sks" class="form-label">SKS</label>
            <input type="number" class="form-control" id="sks" name="sks">
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

