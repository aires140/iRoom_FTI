

<div class="small-box bg-white shadow" style="padding: 2%; margin:2%;">


<nav class="navbar">
  <div class="container-fluid">
    <!-- judul -->
      <a class="navbar-brand"><h4 class="m-0"><b style="color:blue;">Ruangan saya</b></h4></a>
      
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
        <th colspan="2" style="vertical-align:middle; text-align:center;">Opsi</th>
      </tr>
      <tr style="text-align:center;">
        <th>Batalkan</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach($data['ruang'] as $iz): ?>
        
      <tr>
        <th><?= $i; ?></th>
        <td><?= $iz['kode_ruangan']; ?></td>
        <td><?= $iz['gedung']; ?></td>
        <td><?= $iz['fasilitas']; ?></td>
        <td><?= $iz['kapasitas']; ?></td>
        <td><?= $iz['ket']; ?></td>
        <td><b style="color: blue;"><?= $iz['status']; ?></b></td>

        <!-- batalkan -->
        <td style="text-align: center;">
          <a href="<?= BASEURL; ?>Ruangan/SetKosong/<?= $iz['id_ruangan']; ?>" onclick="return confirm('Apakah kamu yakin akan menghapus data?');">
            <i class="nav-icon fas fa-times" style="color: red;"></i>
          </a>
        </td>

      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  <!-- akhir tabel -->


</div>


