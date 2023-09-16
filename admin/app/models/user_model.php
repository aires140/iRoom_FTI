<?php

class User_model
{
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    public function getAllUser()
    {
      $this->db->query("SELECT u.*, f.fakultas, p.prodi, k.kelas
                        FROM user u
                        INNER JOIN fakultas f ON u.id_fakultas = f.id_fakultas
                        INNER JOIN prodi p ON u.id_prodi = p.id_prodi
                        INNER JOIN kelas k ON u.id_kelas = k.id_kelas
                        WHERE u.status = 'aktif'
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

    public function aksesUser($id_user)
    {
      $query = "UPDATE user 
                SET akses = 'banyak' WHERE id_user = :id_user";


      $this->db->query($query);
      $this->db->bind('id_user', $id_user);

      $this->db->execute();

      return $this->db->rowCount();
    }

    public function aksesUserr($id_user)
    {
      $query = "UPDATE user 
                SET akses = 'satu' WHERE id_user = :id_user";


      $this->db->query($query);
      $this->db->bind('id_user', $id_user);

      $this->db->execute();

      return $this->db->rowCount();
    }

}