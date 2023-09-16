<?php

class Ruangan extends Controller {

    public function index()
    {
        $data['title'] = 'Data Ruangan';
        $data['ruangan'] = $this->model('Ruangan_model')->getAllRuangan();

        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('ruangan/index', $data);
        $this->view('templates/footer');
    }

    // tambah data ruangan
    public function tambahRuangan()
    {
        if( $this->model('Ruangan_model')->tambahRuangan($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . 'Ruangan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'Ruangan');
            exit;
        }
    }


    // ubah data ruangan
    public function formUbahRuangan($id_ruangan) 
    {
        $data['title'] = 'Ubah Data Ruangan';
        $data['ubahRuangan'] = $this->model('Ruangan_model')->ubahRuangan($id_ruangan);

        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('ruangan/ubah_ruangan', $data);
        $this->view('templates/footer');

    }

    public function prosesUbahRuangan()
    {
        if( $this->model('Ruangan_model')->prosesUbahRuangan($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . 'Ruangan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . 'Ruangan');
            exit;
        }
    }

    // hapus data ruangan
    public function hapusRuangan($id_ruangan)
    {
        if( $this->model('Ruangan_model')->hapusRuangan($id_ruangan) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . 'Ruangan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
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

    public function cetak()
    {
        $data['getRuangan'] = $this->model('Ruangan_model')->getRuangan();

        $this->view('ruangan/cetak', $data) ;
    }

}