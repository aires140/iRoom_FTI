
      <div class=" mt-5" style="padding-left: 20%; padding-right: 20%">
        <h4 style="color: gray; text-align:center;"><b>Form Ubah Data Ruangan</b></h4><hr>

        <form action="<?= BASEURL; ?>Ruangan/prosesUbahRuangan" method="post">
        <?php foreach( $data['ubahRuangan'] as $ruangan ): ?>
          <!-- for id ruangan -->
          <input type="hidden" value="<?= $ruangan['id_ruangan']; ?>" name="id_ruangan">
          <div class="mb-3">
              <label for="kode_ruangan" class="form-label" style="color: #17a2b8;">Kode Ruangan</label>
              <input type="text" class="form-control" id="kode_ruangan" name="kode_ruangan" value="<?= $ruangan['kode_ruangan']; ?>">
            </div>


            <div class="mb-3">
              <label for="gedung" class="form-label" style="color: #17a2b8;">Gedung</label>
              <input type="text" class="form-control" id="gedung" name="gedung" value="<?= $ruangan['gedung']; ?>">
            </div>
            
            <div class="mb-3">
              <label for="fasilitas" class="form-label" style="color: #17a2b8;">Fasilitas</label>
              <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="<?= $ruangan['fasilitas']; ?>">
            </div>

            <div class="mb-3">
              <label for="kapasitas" class="form-label" style="color: #17a2b8;">Kapasitas</label>
              <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="<?= $ruangan['kapasitas']; ?>">
            </div>

            <div>
              <label for="status" class="form-label">Jenis Ruangan</label>
              <select name="status" id="status" class="form-control">
                <option value="Teori">Teori</option>
                <option value="Praktikum">Praktikum</option> 
            </select>
            </div>

            <div>
              <label for="status" class="form-label" style="color: #17a2b8;">Status Ruangan</label>
              <select name="status" id="status" class="form-control">
                <option value="Kosong">Kosong</option> 
                <option value="Terisi">Terisi</option> 
              </select>
            </div><br><hr>
            
              <a href="<?= BASEURL; ?>Ruangan" class="btn btn-secondary">Batal</a>
              <button type="submit" class="btn btn-primary">Simpan</button>

        <?php endforeach; ?>
        </form>
      </div>

    
        
