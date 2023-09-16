<?php

  class Profil_model
  {
      private $db;

      public function __construct()
      {
        $this->db = new Database;
      }


      public function getIdentitasByNama($nama)
      {
        $this->db->query("SELECT u.*, f.fakultas, p.prodi, k.kelas FROM user u
                          LEFT JOIN fakultas f ON u.id_fakultas = f.id_fakultas
                          LEFT JOIN prodi p ON u.id_prodi = p.id_prodi
                          LEFT JOIN kelas k ON u.id_kelas = k.id_kelas
                          WHERE u.nama = :nama");
        $this->db->bind('nama', $nama);
  
        return $this->db->resultSet();
  
      }
      
    public function getIdentitas($id_user)
    {
      $this->db->query("SELECT u.*, f.fakultas, p.prodi, k.kelas FROM user u
                        LEFT JOIN fakultas f ON u.id_fakultas = f.id_fakultas
                        LEFT JOIN prodi p ON u.id_prodi = p.id_prodi
                        LEFT JOIN kelas k ON u.id_kelas = k.id_kelas
                        WHERE u.id_user = :id_user");
      $this->db->bind('id_user', $id_user);

      return $this->db->resultSet();

    }

    
    public function getFakultas()
    {
      $this->db->query("SELECT * FROM fakultas");
      return $this->db->resultSet();
    }

    public function getProdi()
    {
      $this->db->query("SELECT * FROM prodi");
      return $this->db->resultSet();
    }

    public function getKelas()
    {
      $this->db->query("SELECT * FROM kelas");
      return $this->db->resultSet();
    }


    public function prosesUbahProfil($data)
    {
      $query = "UPDATE user SET email = :email, password = :password, nama = :nama, nim = :nim, jenis_kelamin = :jenis_kelamin, ttl = :ttl, id_fakultas = :id_fakultas, id_prodi = :id_prodi, id_kelas = :id_kelas WHERE id_user = :id_user";
    
      $this->db->query($query);

      $this->db->bind('email', $data['email']);
      $this->db->bind('password', $data['password']);
      $this->db->bind('nama', $data['nama']);
      $this->db->bind('nim', $data['nim']);
      $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
      $this->db->bind('ttl', $data['ttl']);
      $this->db->bind('id_fakultas', $data['id_fakultas']);
      $this->db->bind('id_prodi', $data['id_prodi']);
      $this->db->bind('id_kelas', $data['id_kelas']);
      $this->db->bind('id_user', $data['id_user']);

      $this->db->execute();

      return $this->db->rowCount();
    }
    }