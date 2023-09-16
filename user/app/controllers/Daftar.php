<?php 


class Daftar extends Controller {

  public function index()
  {
        $data['fakultas'] = $this->model('Login_model')->getFakultas();
        $data['prodi'] = $this->model('Login_model')->getProdi();
        $data['kelas'] = $this->model('Login_model')->getKelas();

        $this->view('login/formDaftar', $data);

  }

  public function setDaftar()
  {
        if( $this->model('Login_model')->Daftar($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'didaftarkan!. Tunggu proses aktivasi dari admin', 'success');
            header('Location: ' . BASEURL . 'Login/beritahu');
            exit;
        } else {
            Flasher::setFlash('gagal', 'didaftarkan', 'danger');
            header('Location: ' . BASEURL . 'Login/beritahu');
            exit;
        }
  }
}