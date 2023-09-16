<?php 


class RuanganSaya_model
{
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }




    public function getRuanganSaya()
    {
      $nama = $_SESSION['nama'];
      $this->db->query("SELECT * FROM ruangan WHERE nama  = '$nama'");

      return $this->db->resultSet();
    }


}