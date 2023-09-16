<?php 


class Matkul_model
{
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    public function getAllMatkul()
    {
      $query = "SELECT matkul.*, kelas.kelas FROM matkul JOIN kelas ON matkul.id_kelas = kelas.id_kelas";
      
      $this->db->query($query);
      return $this->db->resultSet();
    }



    public function tambah($data)
    {
      $query = "INSERT INTO matkul
                VALUES
                ('', :mata_kuliah, :id_kelas, :kategori, :ket, :sks)";
    
      $this->db->query($query);

      $this->db->bind('mata_kuliah', $data['mata_kuliah']);
      $this->db->bind('id_kelas', $data['kelas']);
      $this->db->bind('kategori', $data['kategori']);
      $this->db->bind('ket', $data['ket']);
      $this->db->bind('sks', $data['sks']);

      $this->db->execute();

      return $this->db->rowCount();
    }


    public function hapusMatkul($id_matkul)
    {
      $query = "DELETE FROM matkul WHERE id_matkul = :id_matkul";
      $this->db->query($query);
      $this->db->bind('id_matkul', $id_matkul);

      $this->db->execute();

      return $this->db->rowCount();
    }


    public function cariDataJadwal()
    {
      $keyword = $_POST['keyword'];
      $query = "SELECT j.*, m.*, r.*, w.*, k.*
                FROM jadwal  j
                JOIN matkul m ON j.id_matkul = m.id_matkul 
                JOIN ruangan r ON j.id_ruangan = r.id_ruangan
                JOIN waktu w ON j.id_rangewaktu = w.id_rangewaktu
                JOIN kelas k ON j.id_kelas = k.id_kelas
                WHERE m.mata_kuliah LIKE :keyword
                or m.sks LIKE :keyword 
                or k.kelas LIKE :keyword 
                or r.kode_ruangan LIKE :keyword 
                or r.ket LIKE :keyword 
                or j.hari LIKE :keyword 
                or w.range_waktu LIKE :keyword";
      $this->db->query($query);
      $this->db->bind('keyword', "%$keyword%");
      return $this->db->resultSet();
    }

    public function cariMatkul()
    {
      $keyword = $_POST['keyword'];
    
      $query = "SELECT m.*, k.* FROM matkul m 
                JOIN kelas k ON m.id_kelas = k.id_kelas
                WHERE m.mata_kuliah LIKE :keyword 
                OR k.kelas LIKE :keyword 
                OR m.kategori LIKE :keyword
                OR m.sks LIKE :keyword";
    
      $this->db->query($query);
      $this->db->bind('keyword', "%$keyword%");
      return $this->db->resultSet();
    }


    public function ubahMatkul($id_matkul)
    {
      $this->db->query("SELECT * FROM matkul WHERE id_matkul = :id_matkul");
      $this->db->bind('id_matkul', $id_matkul);

      return $this->db->resultSet();
    }

    public function prosesUbahMatkul($data)
    {
      $query = "UPDATE matkul SET mata_kuliah = :mata_kuliah, id_kelas = :id_kelas, kategori = :kategori, ket = :ket, sks = :sks WHERE id_matkul = :id_matkul";
    
      $this->db->query($query);

      $this->db->bind('mata_kuliah', $data['mata_kuliah']);
      $this->db->bind('id_kelas', $data['kelas']);
      $this->db->bind('kategori', $data['kategori']);
      $this->db->bind('ket', $data['ket']);
      $this->db->bind('sks', $data['sks']);
      $this->db->bind('id_matkul', $data['id_matkul']);

      $this->db->execute();

      return $this->db->rowCount();
      
    }

    public function getKelas()
    {
      $query = "SELECT * FROM kelas";
      
      $this->db->query($query);
      return $this->db->resultSet();
    }

}