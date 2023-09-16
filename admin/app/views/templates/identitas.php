

<div class="small-box bg-white shadow" style="padding: 5%; margin-right:17%; margin-left:17%;">

      <div class="navbar">
        <h4 style="color: #17a2b8;">Identitas</h4>
          <a href="<?= BASEURL; ?>">
            <i class="nav-icon fas fa-times" style="color: gray;"></i>
          </a> 
      </div><hr>

      <center>
        <div class="container-fluid">
          <table cellspacing="20" border="0"> 
            <tr>
              <td colspan="3"><center><img src="<?= BASEURL; ?>img/person (1).png" width="110px" height="110px" style="border-radius: 50%"></center> <br></td>
            </tr>
          <?php foreach($data['admin'] as $iden): ?>
            <tr>
              <td colspan="3" style="text-align:center; color: #17a2b8;"><h5><?= $iden["nama"]; ?></h5></td>
            </tr>
            <tr>
              <td style="text-align:justify;">E-mail</td>
              <td style="text-align:justify;">:</td>
              <td style="text-align:justify;"><?= $iden["email"]; ?></td>
            </tr>
            <tr>
              <td style="text-align:justify;">No Induk</td>
              <td style="text-align:justify;">: </td>
              <td style="text-align:justify;"><?= $iden["no_induk"]; ?></td>
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
              <td style="text-align:justify;"><?= $iden["tgl_lahir"]; ?></td>
            </tr>
            <tr>
              <td style="text-align:justify;">Profesi</td>
              <td style="text-align:justify;">: </td>
              <td style="text-align:justify;"><?= $iden["profesi"]?></td>
            </tr>
          <?php endforeach; ?>
          
        </table><hr>
          <div style="padding-top: 40px;">
          </div>
      </div>
      </center>
    </div>  
  </div>
