<?php

class Ruangan_model
{
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    public function getAllRuangan()
    {
      $this->db->query("SELECT * FROM ruangan ORDER BY 'id_ruangan' DESC");
      return $this->db->resultSet();
    }


    public function cariDataRuangan()
    {
      $keyword = $_POST['keyword'];

      $query = "SELECT * FROM ruangan 
                WHERE kode_ruangan LIKE :keyword 
                or lantai LIKE :keyword 
                or gedung LIKE :keyword 
                or fasilitas LIKE :keyword 
                or kapasitas LIKE :keyword 
                or status LIKE :keyword
                or nama LIKE :keyword";

      $this->db->query($query);
      $this->db->bind('keyword', "%$keyword%");
      return $this->db->resultSet();
    }

    public function getRuangan()
    {
      $this->db->query("SELECT * FROM ruangan ORDER BY id_ruangan");
      return $this->db->resultSet();
    }

    public function getUserByAkses()
    {
        $nama = $_SESSION['nama'];
        
        // Ambil data id_kelas dari tabel user
        $query = "SELECT * FROM user WHERE nama = :nama AND status = 'aktif' AND akses ='banyak'";
        $this->db->query($query);
        $this->db->bind(':nama', $nama);
        $result = $this->db->resultSet();
        
        return $result; // Mengembalikan hasil query dalam bentuk array
    }

public function setKosong($id_ruangan)
{
    $query = "UPDATE ruangan SET nama = '', status = 'Kosong' WHERE id_ruangan = :id_ruangan";
    
    $this->db->query($query);
    
    $this->db->bind(':id_ruangan', $id_ruangan); // Tambahkan tanda ":" pada placeholder
    
    $this->db->execute();
    
    return $this->db->rowCount();
}

public function setTerisi($id_ruangan)
{
    $nama = $_SESSION['nama'];

    $query = "UPDATE ruangan SET status = 'Terisi', nama = :nama WHERE id_ruangan = :id_ruangan";
    
    $this->db->query($query);
    $this->db->bind(':id_ruangan', $id_ruangan); // Tambahkan tanda ":" pada placeholder
    $this->db->bind(':nama', $nama);
    $this->db->execute();
    return $this->db->rowCount();
}

public function getRuangIsi()
{
  $this->db->query("SELECT * FROM ruangan WHERE status = 'Terisi'");

  return $this->db->resultSet();
}

public function getRuangKosong()
{
  $this->db->query("SELECT * FROM ruangan WHERE status = 'Kosong'");

  return $this->db->resultSet();
}



}