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
        // Pastikan variabel session 'nama' sudah terdefinisi
        if (!isset($_SESSION['nama'])) {
            return []; // Return array kosong jika 'nama' belum terdefinisi
        }
        
        $nama = $_SESSION['nama'];
        
        // Ambil data id_kelas dari tabel user
        $queryIdKelas = "SELECT id_kelas FROM user WHERE nama = :nama AND status = 'aktif'";
        $this->db->query($queryIdKelas);
        $this->db->bind(':nama', $nama);
        $id_kelas = $this->db->single();
        
        // Query untuk mendapatkan jadwal dengan menggabungkan beberapa tabel
        $queryJadwal = "SELECT j.*, m.*, r.*, w.*, k.*
                        FROM jadwal j
                        INNER JOIN matkul m ON j.id_matkul = m.id_matkul
                        INNER JOIN ruangan r ON j.id_ruangan = r.id_ruangan
                        INNER JOIN waktu w ON j.id_rangewaktu = w.id_rangewaktu
                        INNER JOIN kelas k ON j.id_kelas = k.id_kelas
                        WHERE j.id_kelas = :id_kelas";
        
        $this->db->query($queryJadwal);
        $this->db->bind(':id_kelas', $id_kelas['id_kelas']); // Ambil nilai id_kelas dari hasil query pertama
        $jadwal = $this->db->resultSet();
        
        return $jadwal;
    }
    
    
    

    public function cariDataJadwal()
    {
      $keyword = $_POST['keyword'];
      $query = "SELECT * FROM jadwal 
                JOIN kelas ON jadwal.id_kelas = kelas.id_kelas 
                JOIN ruangan ON jadwal.id_ruangan = ruangan.id_ruangan
                WHERE jadwal.kode_matkul LIKE :keyword
                or jadwal.matkul LIKE :keyword 
                or jadwal.dosen LIKE :keyword 
                or jadwal.sks LIKE :keyword 
                or kelas.kelas LIKE :keyword 
                or ruangan.kode_ruangan LIKE :keyword 
                or jadwal.hari LIKE :keyword 
                or jadwal.waktu LIKE :keyword";
      $this->db->query($query);
      $this->db->bind('keyword', "%$keyword%");
      return $this->db->resultSet();
    }

}