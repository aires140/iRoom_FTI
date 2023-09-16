<?php

class Aktivasi_model
{
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    public function getAllAktivasi()
    {
      $this->db->query("SELECT u.*, f.fakultas, p.prodi, k.kelas
                        FROM user u
                        INNER JOIN fakultas f ON u.id_fakultas = f.id_fakultas
                        INNER JOIN prodi p ON u.id_prodi = p.id_prodi
                        INNER JOIN kelas k ON u.id_kelas = k.id_kelas
                        WHERE u.status = ' '
                        ");

      return $this->db->resultSet();
    }


    public function hapusUser($id_user)
    {
      $query = "DELETE FROM user WHERE id_user = :id_user";
      $this->db->query($query);
      $this->db->bind('id_user', $id_user);

      $this->db->execute();

      return $this->db->rowCount();
    }

    public function aktivasiUser($id_user)
    {
      $query = "UPDATE user 
                SET status = 'aktif' WHERE id_user = :id_user";

      $this->db->query($query);
      $this->db->bind('id_user', $id_user);

      $this->db->execute();

      return $this->db->rowCount();
    }


}