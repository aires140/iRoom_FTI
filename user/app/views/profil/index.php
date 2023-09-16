

<div class="small-box bg-white shadow" style="padding: 5%; margin-right:17%; margin-left:17%;">

      <div class="navbar">
        <h4 style="color: blue;">Identitas</h4>
          <a href="<?= BASEURL; ?>">
            <i class="nav-icon fas fa-times" style="color: gray;"></i>
          </a> 
      </div><hr>

      <center>
        <div class="container-fluid">
          <table cellspacing="20" border="0" > 
            <tr>
              <td colspan="3"><center><img src="<?= BASEURL; ?>img/person (1).png" width="110px" height="110px" style="border-radius: 50%"></center> <br></td>
            </tr>
          <?php foreach($data['user'] as $iden): ?>
            <div style="padding-bottom: -4px">
              <?php Flasher::flash(); ?>
            </div>
            <tr>
              <td colspan="3" style="text-align:center; color: blue;"><h5><?= $iden["nama"]; ?></h5></td>
            </tr>
            <tr>
              <td style="text-align:justify;">E-mail</td>
              <td style="text-align:justify;">:</td>
              <td style="text-align:justify;"><?= $iden["email"]; ?></td>
            </tr>
            <tr>
              <td style="text-align:justify;">NIM</td>
              <td style="text-align:justify;">: </td>
              <td style="text-align:justify;"><?= $iden["nim"]; ?></td>
            </tr>
            <tr>
              <td style="text-align:justify;">Jenis Kelamin</td>
              <td style="text-align:justify;">: </td>
              <td style="text-align:justify;"><?= $iden["jenis_kelamin"]; ?></td>
            </tr>
            <tr>
            <tr>
              <td style="text-align:justify;">Tanggal Lahir</td>
              <td style="text-align:justify;">: </td>
              <td style="text-align:justify;"><?= $iden["ttl"]; ?></td>
            </tr>
            <tr>
              <td style="text-align:justify;">Fakultas</td>
              <td style="text-align:justify;">: </td>
              <td style="text-align:justify;"><?= $iden["fakultas"]?></td>
            </tr>
            <tr>
              <td style="text-align:justify;">Prodi</td>
              <td style="text-align:justify;">: </td>
              <td style="text-align:justify;"><?= $iden["prodi"]; ?></td>
            </tr>
            <tr>
              <td style="text-align:justify;">Kelas/Semester</td>
              <td style="text-align:justify;">: </td>
              <td style="text-align:justify;"><?= $iden["kelas"]?></td>
            </tr>
          <?php endforeach; ?>
        </table><hr>
        <!-- ubah -->
        <td style="text-align: center;">
          <a href="<?= BASEURL; ?>Profil/ubahProfil/<?= $iden['id_user'];?>" class="btn btn-primary" style="text-decoration: none;"><i class="fa fa-edit" style="color: white;" ></i><b>Ubah</b></a>
        </td>
          <div style="padding-top: 40px;">
          </div>
      </div>
      </center>
    </div>  
  </div>
