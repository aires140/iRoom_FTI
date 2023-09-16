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


    public function tambahRuangan($data)
    {
      $query = "INSERT INTO ruangan
                VALUES
                ('', :kode_ruangan, :gedung, :fasilitas, :kapasitas, :ket, :status, '')";
    
      $this->db->query($query);

      $this->db->bind('kode_ruangan', $data['kode_ruangan']);
      $this->db->bind('gedung', $data['gedung']);
      $this->db->bind('fasilitas', $data['fasilitas']);
      $this->db->bind('kapasitas', $data['kapasitas']);
      $this->db->bind('ket', $data['ket']);
      $this->db->bind('status', $data['status']);

      $this->db->execute();

      return $this->db->rowCount();
    }



    public function ubahRuangan($id_ruangan)
    {
      $this->db->query("SELECT * FROM ruangan WHERE id_ruangan = :id_ruangan");
      $this->db->bind('id_ruangan', $id_ruangan);

      return $this->db->resultSet();
    }

    public function prosesUbahRuangan($data)
    {
      $query = "UPDATE ruangan SET kode_ruangan = :kode_ruangan, gedung = :gedung, fasilitas = :fasilitas, kapasitas = :kapasitas, ket = :ket, status = :status WHERE id_ruangan = :id_ruangan";
    
      $this->db->query($query);

      $this->db->bind('kode_ruangan', $data['kode_ruangan']);
      $this->db->bind('gedung', $data['gedung']);
      $this->db->bind('fasilitas', $data['fasilitas']);
      $this->db->bind('kapasitas', $data['kapasitas']);
      $this->db->bind('ket', $data['ket']);
      $this->db->bind('status', $data['status']);
      $this->db->bind('id_ruangan', $data['id_ruangan']);

      $this->db->execute();

      return $this->db->rowCount();
    }



    public function hapusRuangan($id_ruangan)
    {
      $query = "DELETE FROM ruangan WHERE id_ruangan = :id_ruangan";
      $this->db->query($query);
      $this->db->bind('id_ruangan', $id_ruangan);

      $this->db->execute();

      return $this->db->rowCount();
    }

    public function cariDataRuangan()
    {
      $keyword = $_POST['keyword'];

      $query = "SELECT * FROM ruangan 
                WHERE kode_ruangan LIKE :keyword 
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



    public function getIdentityByNama($nama)
    {
      $this->db->query("SELECT u.*, f.fakultas, p.prodi, k.kelas FROM user u
                        LEFT JOIN fakultas f ON u.id_fakultas = f.id_fakultas
                        LEFT JOIN prodi p ON u.id_prodi = p.id_prodi
                        LEFT JOIN kelas k ON u.id_kelas = k.id_kelas
                        WHERE u.nama = :nama");
      $this->db->bind('nama', $nama);

      return $this->db->resultSet();

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