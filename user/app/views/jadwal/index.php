

<div class="small-box bg-white shadow" style="padding: 2%; margin:2%;">


<nav class="navbar">
  <div class="container-fluid">
    <!-- judul -->
      <a class="navbar-brand"><h4 class="m-0"><b style="color:blue;">Jadwal Ruangan</b></h4></a>


  <!-- flasher -->
  <div style="padding-top: 5%; padding-bottom: -5px">
      <?php Flasher::flash(); ?>
  </div>
  <!-- akhir row -->
  <!-- hari -->




</nav>
<!-- akhir navbar tabel -->

  <!-- awal tabel -->
  <table class="table" style="overflow-x: auto; width:100%; ">
    <thead">
      <tr style="padding: 8px;">
        <th style="vertical-align:middle;">No</th>
        <th style="vertical-align:middle;">Mata Kuliah</th>
        <th style="vertical-align:middle;">SKS</th>
        <th style="vertical-align:middle;">Kelas</th>
        <th style="vertical-align:middle;">Ruangan</th>
        <th style="vertical-align:middle;">Jenis</th>
        <th style="vertical-align:middle;">Hari</th>
        <th style="vertical-align:middle;">Waktu</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach($data['jadwal'] as $jadwal): ?>
        
      <tr>
        <th><?= $i; ?></th>
        <td><?= $jadwal['mata_kuliah']; ?></td>
        <td><?= $jadwal['sks']; ?></td>
        <td><?= $jadwal['kelas']; ?></td>
        <td><?= $jadwal['kode_ruangan']; ?></td>
        <td><?= $jadwal['ket']; ?></td>
        <td><?= $jadwal['hari']?></td>
        <td><?= $jadwal['range_waktu']; ?></td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  <!-- akhir tabel -->


</div>

</div>
</div>
</div>

