<?php

class Ruangan extends Controller {

    public function index()
    {
        $data['title'] = 'Data Ruangan';
        $data['ruangan'] = $this->model('Ruangan_model')->getAllRuangan();
        $data['user'] = $this->model('Ruangan_model')->getUserByAkses();

        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('ruangan/index', $data);
        $this->view('templates/footer');
    }


    public function setKosong($id_ruangan)
    {
        if( $this->model('Ruangan_model')->setKosong($id_ruangan) > 0 ) {
            Flasher::setFlash('berhasil', 'dibatalkan', 'success');
            header('Location: ' . BASEURL . 'Ruangan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dibatalkan', 'danger');
            header('Location: ' . BASEURL . 'Ruangan');
            exit;
        }
    }

    public function setTerisi($id_ruangan)
    {
        if( $this->model('Ruangan_model')->setTerisi($id_ruangan) > 0 ) {
            Flasher::setFlash('berhasil', 'digunakan', 'success');
            header('Location: ' . BASEURL . 'Ruangan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'digunakan', 'danger');
            header('Location: ' . BASEURL . 'Ruangan');
            exit;
        }
    }


    public function cari()
    {
        $data['title'] = 'Data Ruangan';
        $data['ruangan'] = $this->model('Ruangan_model')->cariDataRuangan();

        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('ruangan/index', $data);
        $this->view('templates/footer');
    }


}