<?php 


class Jadwal_model
{
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }


    public function getAllJadwal()
    {
      $this->db->query("SELECT j.*, m.*, r.*, w.*, k.*
                        FROM jadwal j
                        INNER JOIN matkul m ON j.id_matkul = m.id_matkul
                        INNER JOIN ruangan r ON j.id_ruangan = r.id_ruangan
                        INNER JOIN waktu w ON j.id_rangewaktu = w.id_rangewaktu
                        INNER JOIN kelas k ON j.id_kelas = k.id_kelas
                        ");
  
      return $this->db->resultSet();
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

    // untuk opsi form tambah jadwal
    public function getOptionRuangan()
    {
      $this->db->query("SELECT * FROM ruangan ORDER BY :id_ruangan");
      return $this->db->resultSet();
    }

    public function getOptionKelas()
    {
      $this->db->query("SELECT * FROM kelas ORDER BY :id_kelas");
      return $this->db->resultSet();
    }
    // end


    public function tambahJadwal($data)
    {
      $query = "INSERT INTO jadwal
                VALUES
                ('', :kode_matkul, :matkul, :dosen, :sks, :id_kelas, :id_ruangan, :hari, :waktu)";
    
      $this->db->query($query);

      $this->db->bind('kode_matkul', $data['kode_matkul']);
      $this->db->bind('matkul', $data['matkul']);
      $this->db->bind('dosen', $data['dosen']);
      $this->db->bind('sks', $data['sks']);
      $this->db->bind('id_kelas', $data['id_kelas']);
      $this->db->bind('id_ruangan', $data['id_ruangan']);
      $this->db->bind('hari', $data['hari']);
      $this->db->bind('waktu', $data['waktu']);

      $this->db->execute();

      return $this->db->rowCount();
    }

    public function getJadwalById($id_jadwal)
    {
      $this->db->query("SELECT * FROM jadwal WHERE id_jadwal = :id_jadwal");
      $this->db->bind('id_jadwal', $id_jadwal);

      return $this->db->resultSet();
    }

    public function ubahJadwal($data)
    {
      $query =  "UPDATE jadwal
                SET kode_matkul = :kode_matkul, matkul = :matkul, dosen = :dosen, sks = :sks, id_kelas = :id_kelas, id_ruangan = :id_ruangan, hari  = :hari, waktu = :waktu WHERE id_jadwal = :id_jadwal";
    
      $this->db->query($query);

      $this->db->bind('kode_matkul', $data['kode_matkul']);
      $this->db->bind('matkul', $data['matkul']);
      $this->db->bind('dosen', $data['dosen']);
      $this->db->bind('sks', $data['sks']);
      $this->db->bind('id_kelas', $data['id_kelas']);
      $this->db->bind('id_ruangan', $data['id_ruangan']);
      $this->db->bind('hari', $data['hari']);
      $this->db->bind('waktu', $data['waktu']);

      $this->db->execute();

      return $this->db->rowCount();
    }

    public function hapusJadwal($id_jadwal)
    {
      $query = "DELETE FROM jadwal WHERE id_jadwal = :id_jadwal";
      $this->db->query($query);
      $this->db->bind('id_jadwal', $id_jadwal);

      $this->db->execute();

      return $this->db->rowCount();
    }


}