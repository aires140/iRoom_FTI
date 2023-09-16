<?php

      class Identitas extends Controller {

            public function index($nama)
            {
                  $data['title'] = 'Data Diri';
                  $data['admin'] = $this->model('Login_model')->getIdentitas($nama);
                  
                  $this->view('templates/header', $data);
                  $this->view('templates/topbar');
                  $this->view('templates/sidebar', $data);
                  $this->view('templates/identitas', $data);
                  $this->view('templates/footer');
            
      }



      }