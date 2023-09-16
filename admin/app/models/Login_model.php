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
        $this->db->query("SELECT * FROM admin 
                          WHERE nama = :nama AND 
                          password = :password");
                          
        $this->db->bind('nama', $nama);
        $this->db->bind('password', $password);
        
        return $this->db->resultSet();

      }

            
      public function getIdentitas($nama)
      {
        $this->db->query("SELECT * FROM admin WHERE nama = :nama");
        $this->db->bind('nama', $nama);
        
        return $this->db->resultSet();
      }

    }