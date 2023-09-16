
    <!-- css style -->
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Ubuntu", sans-serif;
      }
      /* membuat navbar kiri */
      :root {
        --blue: #0d6efd;
        --blue2: #73a0e2;
        --white: #fff;
        --blue3: rgb(197, 215, 231);

      }
      body {
        overflow: auto;
      }
      .detailes {
        width: 100%;
        display: flex;
        padding: 19px;
        justify-content: center;
        align-items: center;
      }
      .detailes .detailesNy {
        width: 700px;
        border-radius: 17px;
        padding: 30px;
        box-shadow: 0 9px 23px rgb(228 227 227);
      }
      .cardHeaderr {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 20px;
        padding-bottom: 25px;
      }
      .cardHeaderr h3 {
        font-weight: 600;
        color: var(--blue);
      }
      .sub {
        font-size: 18px;
        color: #0d6efd;
        padding-top: 20px;
        padding-bottom: 20px;
      }
      input[type="email"],
      input[type="password"],
      input[type="name"],
      input[type="text"],
      input[type="date"],
      input[type="file"],
      select {
        background-color: var(--blue2);
        color: var(--white);
        border: 2px solid var(--white);
        border-radius: 10px;
        margin-bottom: 25px;
      }
      select.form-control {
        border-radius: 10px;
        background-color: var(--blue3);
        color: var(--blue);
      }
      .btn {
        position: relative;
        padding: 5px 20px;
        background: var(--blue);
        color: var(--white);
        text-decoration: none;
        border-radius: 7px;
      }

      @media (max-width: 1000px) {
        .detailes {
          padding-right: 10%;
          padding-left: 10%;
        }
      }
      @media (max-width: 500px) {
        .detailes {
          padding-right: 5%;
          padding-left: 5%;
        }
      }
    </style>
    <title>Registrasi</title>
  </head>
  <body>
    <!-- form -->
    <div class="detailes">
      <div class="detailesNy">
        <div class="cardHeaderr">
          <h3 class="header">Form Udah Data Diri</h3>
        </div>
        <form action="<?= BASEURL; ?>Profil/prosesUbahProfil" onsubmit="return confirm('Data sudah benar?')" method="post">
          
        <?php foreach( $data['user'] as $iden ) : ?>
          <div class="sub"><b>Akun</b></div>
          <input type="hidden" value="<?= $iden['id_user']; ?>" name="id_user">
          <div>
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $iden['email']; ?>" required />
          </div>
          <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="<?= $iden['password']; ?>" required/>
          </div><br>

          <div class="sub"><b>Identitas</b></div>
          
          <div>
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= $iden['nama']; ?>" required></input>
          </div>
          
          <div>
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim" id="nim" value="<?= $iden['nim']; ?>" required></input>
          </div>

          <div>
            <label for="jenis_kelamin" class="form-label">Jenis kelamin</label>
            <select name="jenis_kelamin" class="form-control">
              <option value="">Pilih</option>
              <option value="laki-laki">Laki-laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
          </div>

          <div>
            <label for="ttl" class="form-label">Tanggal lahir</label>
            <input type="date" class="form-control" name="ttl" id="ttl" value="<?= $iden['ttl']; ?>" required></input>
          </div>
          

          <div>
            <label for="id_fakultas" class="form-label">Fakultas</label>
            <select name="id_fakultas" class="form-control">
              <option>Pilih</option>
              <!-- pengisian opsi -->
              <?php $i = 1; ?>
              <?php foreach( $data['fakultas'] as $row ) : ?>
                <option value="<?= $row["id_fakultas"]; ?>"><?= $row["fakultas"]; ?></option>
              <?php $i++ ?>
              <?php endforeach; ?>
            </select>
          </div>

          <div>
            <label for="id_prodi" class="form-label">Program studi</label>
            <select name="id_prodi" class="form-control">
              <option>Pilih</option>
              <!-- pengisian opsi -->
              <?php $i = 1; ?>
              <?php foreach( $data['prodi'] as $row ) : ?>
                <option value="<?= $row["id_prodi"]; ?>"><?= $row["prodi"]; ?></option>
              <?php $i++ ?>
              <?php endforeach; ?>
            </select>
          </div>

          
          <div>
            <label for="id_kelas" class="form-label">Semester</label>
            <select name="id_kelas" class="form-control">
              <option>Pilih</option>
              <!-- pengisian opsi -->
              <?php $i = 1; ?>
              <?php foreach( $data['kelas'] as $row ) : ?>
                <option value="<?= $row["id_kelas"]; ?>"><?= $row["kelas"]; ?></option>
              <?php $i++ ?>
              <?php endforeach; ?>
            </select>
          </div>
          <br />
          <div class="button" style="text-align: center">
            <button type="submit" name="register" class="btn">Simpan</button>
            <a href="<?= BASEURL; ?>Profil" type="reset" class="btn btn-primary">Cancel</a>
          </div>
          <?php endforeach; ?>
        </form>
        <br />
      </div> 
    </div>

