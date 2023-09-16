<?php

  class Login_model
  {
      private $db;

      public function __construct()
      {
        $this->db = new Database;
      }

      public function getData($nama, $password)
      {
        $this->db->query("SELECT * FROM user 
                          WHERE nama = :nama AND 
                          password = :password AND
                          status = 'aktif'");
                          
        $this->db->bind('nama', $nama);
        $this->db->bind('password', $password);
        
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

      public function Daftar($data)
      {

            $query = "INSERT INTO user VALUES
                      ('', :email, :password, :nama, :nim, :jenis_kelamin, :ttl, :id_fakultas, :id_prodi, :id_kelas, '', '')";
        
            $this->db->query($query);
      
            $this->db->bind('email', $data['email']);
            $this->db->bind('password', $data['password']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('nim', $data['nim']);
            $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
            $this->db->bind('ttl', $data['ttl']);
            $this->db->bind('id_fakultas', $data['fakultas']);
            $this->db->bind('id_prodi', $data['prodi']);
            $this->db->bind('id_kelas', $data['kelas']);
      
            $this->db->execute();
      
            return $this->db->rowCount();
          }
      


    }