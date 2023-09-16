<?php

class Profil extends Controller {

      public function index()
      {
            session_start();
            $nama = ($_SESSION['nama']);
            $data['title'] = 'Data Diri';
            $data['user'] = $this->model('Profil_model')->getIdentitasByNama($nama);

            $this->view('templates/header', $data);
            $this->view('templates/topbar');
            $this->view('templates/sidebar', $data);
            $this->view('Profil/index', $data);
            $this->view('templates/footer');
      
      }


      public function ubahProfil($id_user)
      {
            $data['title'] = 'Ubah Data Diri';
            $data['user'] = $this->model('Profil_model')->getIdentitas($id_user);
            $data['fakultas'] = $this->model('Profil_model')->getFakultas();
            $data['prodi'] = $this->model('Profil_model')->getProdi();
            $data['kelas'] = $this->model('Profil_model')->getKelas();

            $this->view('templates/header', $data);
            $this->view('templates/topbar');
            $this->view('templates/sidebar', $data);
            $this->view('Profil/ubahProfil', $data);
            $this->view('templates/footer');
      }

      public function prosesUbahProfil()
      {
            if( $this->model('Profil_model')->prosesUbahProfil($_POST) > 0 ) {
                  Flasher::setFlash('identitas berhasil', 'diubah, silahkan keluar dan masuk kembali untuk memulihkan data kamu', 'success');
                  header('Location: ' . BASEURL . 'Profil');
                  exit;
            } else {
                  Flasher::setFlash('identitas gagal', 'diubah', 'danger');
                  header('Location: ' . BASEURL . 'Profil');
                  exit;
            }
      }

      }