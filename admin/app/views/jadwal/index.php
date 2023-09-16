
    <!-- <?php error_reporting(0);?> -->
    
    <div class="small-box bg-white shadow" style="padding: 2%; margin:2%;">


    <nav class="navbar">
      <div class="container-fluid">
        <!-- judul -->
          <a class="navbar-brand"><h4 class="m-0"><b style="color:#17a2b8;">Jadwal Ruangan</b></h4></a>

        <!-- pencarian -->
        <!-- input -->
          <form class="d-flex" role="search" action="<?= BASEURL; ?>Proses/cari" method="post">
            <input class="form-control me-2" type="search" placeholder="Cari" name="keyword" id="keyword" autocomplete="off">
            <button class="btn btn-link" style="color: #17a2b8;" type="submit" id="tombolCari">
              <i class="fas fa-search"></i>
            </button>
          </form>

          
      </div>

      <!-- opsi jadwal -->
      <div class="dropdown ml-3">
        <a class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none; color:#17a2b8">
          <b>Ganjil</b>
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">1A</a></li>
          <li><a class="dropdown-item" href="#">1B</a></li>
          <li><a class="dropdown-item" href="#">1C</a></li>
          <li><a class="dropdown-item" href="#">3A</a></li>
          <li><a class="dropdown-item" href="#">3B</a></li>
          <li><a class="dropdown-item" href="#">5A</a></li>
          <li><a class="dropdown-item" href="#">5B</a></li>
          <li><a class="dropdown-item" href="#">7A</a></li>
          <li><a class="dropdown-item" href="#">7B</a></li>               
        </ul>
        <a class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none; color:#17a2b8">
          <b>Genap</b>
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">2A</a></li>
          <li><a class="dropdown-item" href="#">2B</a></li>
          <li><a class="dropdown-item" href="#">2C</a></li>
          <li><a class="dropdown-item" href="#">4A</a></li>
          <li><a class="dropdown-item" href="#">4B</a></li>
          <li><a class="dropdown-item" href="#">6A</a></li>
          <li><a class="dropdown-item" href="#">6B</a></li>
          <li><a class="dropdown-item" href="#">8A</a></li>
          <li><a class="dropdown-item" href="#">8B</a></li>   
        </ul>
      </div>

    </nav>
    <!-- akhir navbar tabel -->
    <!-- flasher -->
    <div style="padding-bottom: -5px">
      <?php Flasher::flash(); ?>
    </div>
    <!-- akhir row -->

    <!-- awal tabel -->
    <table class="table" style="overflow-x: auto; width:100%; ">
      <thead">
        <tr style="padding: 8px;">
          <th style="vertical-align:middle;">No</th>
          <th style="vertical-align:middle;">Mata kuliah</th>
          <th style="vertical-align:middle;">SKS</th>
          <th style="vertical-align:middle;">Kelas</th>
          <th style="vertical-align:middle;">Ruangan</th>
          <th style="vertical-align:middle;">Jenis</th>
          <th style="vertical-align:middle;">Hari</th>
          <th style="vertical-align:middle;">Waktu</th>
        </tr>
      </thead>
      <tbody>          
        <tr>
        <!-- tampilan jadwal -->
        <!-- <?= $l = 1; ?> -->
        <?php foreach( $data['jadwal'] as $j ): ?>
            <td><?= $l++; ?></td>
            <td><?= $j['mata_kuliah']; ?></td>
            <td><?= $j['sks']; ?></td>
            <td><?= $j['kelas']; ?></td>
            <td><?= $j['kode_ruangan']; ?></td>
            <td><?= $j['ket']; ?></td>
            <td><?= $j['hari']?></td>
            <td><?= $j['range_waktu']; ?></td>
          </tr>
        <?php endforeach; ?>



        <!-- form perbarui jadwal -->
        <!-- <?= $i = 1; ?> -->
        <?php foreach($data['hasilJadwal'] as $jadwal): ?>
        <form action="<?= BASEURL; ?>Proses/tambah" method="post">

            <input type="hidden" name="id[]" value="<?= $i; ?>">
            <input type="hidden" name="id_matkul[]" value="<?= $jadwal['matkul']['id_matkul']; ?>">
            <input type="hidden" name="id_kelas[]" value="<?= $jadwal['matkul']['id_kelas']; ?>">
            <input type="hidden" name="id_ruangan[]" value="<?= $jadwal['ruangan']['id_ruangan']; ?>">
            <input type="hidden" name="id_rangewaktu[]" value="<?= $jadwal['waktu']['range_waktu']['id_rangewaktu']; ?>">
            <input type="hidden" name="hari[]" value="<?= $jadwal['waktu']['hari']; ?>">
            
            <!-- <?php var_dump($data['hasilJadwal']); ?> -->
        <?php endforeach; ?>
          <div class="col-6 text-start">
            <button type="submit" class="btn btn-success">Perbarui</button>
          </div>
        </form>


      </tbody>
    </table>
    <!-- akhir tabel -->


  </div>

  </div>
  </div>
  </div>

