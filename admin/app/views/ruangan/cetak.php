
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cetak laporan ruangan</title>
    <style>
      thead td{
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <table cellspacing="9" style="margin-left:auto;margin-right:auto">

          <td><img src="<?= BASEURL;?>img/ftiunibba.png" alt="ftiunibba" width="70px" /></td>
          <td></td>
          <td>
            <h2>
              Universitas Bale Bandung <br />
              Fakultas Teknologi Informasi <br />
              Program Studi Teknik Informatika
            </h2>
          </td>
      </table><hr>
    </div><br>
    <p><center>DAFTAR RUANGAN TEKNIK INFORMATIKA</center></p><br><br>
    <table border="1" cellspacing="0" cellpadding="4" style="margin-left:auto;margin-right:auto" border="1">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Ruangan</th>
          <th>Gedung</th>
          <th>Fasilitas</th>
          <th>Kapasitas</th>
          <th>Jenis Ruangan</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach( $data['getRuangan'] as $ruangan ) : ?>
        <tr>
          <th><?= $i; ?></th>
          <td><?= $ruangan['kode_ruangan']; ?></td>
          <td><?= $ruangan['gedung']; ?></td>
          <td><?= $ruangan['fasilitas']; ?></td>
          <td><?= $ruangan['kapasitas']; ?></td>
          <td><?= $ruangan['ket']; ?></td>
          <td><?= $ruangan['status']; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>

</html>
