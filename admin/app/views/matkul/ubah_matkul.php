
      <div class=" mt-5" style="padding-left: 20%; padding-right: 20%">
        <h4 style="color: gray; text-align:center;"><b>Form Ubah Mata Kuliah</b></h4><hr>

        <form action="<?= BASEURL; ?>Matkul/prosesUbahMatkul" method="post">
        <?php foreach( $data['matkul'] as $mat ): ?>

          
          <input type="hidden" value="<?= $mat['id_matkul']; ?>" name="id_matkul">

            <div class="mb-3">
              <label for="mata_kuliah" class="form-label" style="color: #17a2b8;">Mata Kuliah</label>
              <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah" value="<?= $mat['mata_kuliah']; ?>">
            </div>

          <div class="mb-3">
          <label for="kelas" class="form-label" style="color: #17a2b8;">Kelas</label>
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
              <label for="kategori" class="form-label" style="color: #17a2b8;">Kategori</label>
              <select name="kategori" id="kategori" class="form-control">
                <option value="Pagi">Pagi</option> 
                <option value="Sore">Sore</option> 
              </select>
            </div>

            <div>
              <label for="ket" class="form-label" style="color: #17a2b8;">Jenis Materi</label>
              <select name="ket" id="ket" class="form-control">
                <option value="Teori">Teori</option> 
                <option value="Praktikum">Praktikum</option> 
              </select>
            </div>
            
            <div class="mb-3">
              <label for="sks" class="form-label" style="color: #17a2b8;">SKS</label>
              <input type="number" class="form-control" id="sks" name="sks" value="<?= $mat['sks']; ?>">
            </div>
            
              <a href="<?= BASEURL; ?>Matkul" class="btn btn-secondary">Batal</a>
              <button type="submit" class="btn btn-primary">Simpan</button>

        <?php endforeach; ?>
        </form>
      </div>

    
        
