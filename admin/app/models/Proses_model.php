<?php 

// jadwal_model.php

  class Proses_Model {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRuangan() {
        $this->db->query("SELECT id_ruangan, kode_ruangan, ket FROM ruangan");

        return $this->db->resultSet();
        
    }

    public function getMataKuliah() {
      $this->db->query("SELECT id_matkul, mata_kuliah, kategori, sks, ket, id_kelas FROM matkul");

        return $this->db->resultSet();
    }

    public function getRangeWaktuPagi() {
      $this->db->query("SELECT id_rangewaktu, range_waktu, sks FROM waktu WHERE kategori = 'Pagi'");

      return $this->db->resultSet();
    }

    public function getRangeWaktuSore() {
        $this->db->query("SELECT id_rangewaktu, range_waktu, sks FROM waktu WHERE kategori = 'Sore'");
      
        return $this->db->resultSet();
    }

    public function tambahUpdateJadwal($data)
  {
      $idMatkul = $data['id_matkul'];

      foreach ($idMatkul as $key => $id) {
          // Cek apakah id_matkul sudah ada di database
          $query = "SELECT id_jadwal FROM jadwal WHERE id_matkul = :id_matkul";
          $this->db->query($query);
          $this->db->bind('id_matkul', $id);
          $result = $this->db->single();

          if ($result) {
              // Jika id_matkul sudah ada, lakukan update
              $query = "UPDATE jadwal
                        SET
                        id_kelas = :id_kelas, id_ruangan = :id_ruangan, id_rangewaktu = :id_rangewaktu, hari = :hari WHERE id_matkul = :id_matkul";
              
              $this->db->query($query);
              $this->db->bind('id_kelas', $data['id_kelas'][$key]);
              $this->db->bind('id_ruangan', $data['id_ruangan'][$key]);
              $this->db->bind('id_rangewaktu', $data['id_rangewaktu'][$key]);
              $this->db->bind('hari', $data['hari'][$key]);
              $this->db->bind('id_matkul', $id);

              $this->db->execute();
          } else {
              // Jika id_matkul belum ada, tambahkan data
              $query = "INSERT INTO jadwal (id_matkul, id_kelas, id_ruangan, id_rangewaktu, hari)
                        VALUES (:id_matkul, :id_kelas, :id_ruangan, :id_rangewaktu, :hari)";
              
              $this->db->query($query);
              $this->db->bind('id_matkul', $id);
              $this->db->bind('id_kelas', $data['id_kelas'][$key]);
              $this->db->bind('id_ruangan', $data['id_ruangan'][$key]);
              $this->db->bind('id_rangewaktu', $data['id_rangewaktu'][$key]);
              $this->db->bind('hari', $data['hari'][$key]);

              $this->db->execute();
          }
      }

      return count($idMatkul); // Mengembalikan jumlah data yang diupdate/tambahkan
  }

  // public function cariData($keyword) {

  // }

  // public function tambahJadwal($data)
  // {
  //   $id = $_POST['id'];
  //   $jum = count($id);

  //   // Memindahkan pernyataan query ke luar loop
  //   $query = "INSERT INTO jadwal VALUES ('', :id_matkul, :id_ruangan, :id_rangewaktu, :hari)";
  //   $this->db->query($query);

  //   for ($i = 0; $i < $jum; $i++) {
  //       // Mengikat parameter untuk setiap iterasi
  //       $this->db->bind('id_matkul', $data['matkul']['id_matkul'][$i]);
  //       $this->db->bind('id_ruangan', $data['ruangan']['id_ruangan'][$i]);
  //       $this->db->bind('id_rangewaktu', $data['waktu']['range_waktu']['id_rangewaktu'][$i]);
  //       $this->db->bind('hari', $data['waktu']['hari'][$i]);

  //       // Mengeksekusi pernyataan SQL di setiap iterasi
  //       $this->db->execute();
  //   }

  //   // Mengembalikan jumlah baris yang diinsert
  //   return $this->db->rowCount();
  // }

  // public function UpdateJadwal($data)
  // {
  //   $id = $_POST['id'];
  //   $jum = count($id);

  //   for ($i=0; $i<$jum; $i++) {

  //     $query = "UPDATE jadwal
  //               SET
  //               id_matkul = :id_matkul, id_ruangan = :id_ruangan, id_rangewaktu = :id_rangewaktu, hari = :hari WHERE id_jadwal = :id_jadwal)";
    
  //     $this->db->query($query);

      
  //     $this->db->bind('id_matkul', $data['id_matkul']);
  //     $this->db->bind('id_ruangan', $data['id_ruangan']);
  //     $this->db->bind('id_rangewaktu', $data['id_rangewaktu']);
  //     $this->db->bind('hari', $data['hari']);

  //     $this->db->execute();
      
  //     return $this->db->rowCount();
  //   } 
  // }


}