<?php 

class Matkul extends Controller {

    public function index() {

    $data['title'] = 'Mata Kuliah';
    $data['matkul'] = $this->model('Matkul_model')->getAllMatkul();
    $data['kelas'] = $this->model('Matkul_model')->getKelas();
    

    $this->view( 'templates/header', $data );
    $this->view( 'templates/topbar' );
    $this->view( 'templates/sidebar', $data );
    $this->view( 'matkul/index', $data );
    $this->view( 'templates/footer');

    }

    public function tambahMatkul()
    {
        if( $this->model('Matkul_model')->tambah($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . 'Matkul');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'Matkul');
            exit;
        }
    }

    public function hapusMatkul($id_matkul)
    {
        if( $this->model('Matkul_model')->hapusMatkul($id_matkul) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . 'Matkul');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . 'Matkul');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Mata Kuliah';
        $data['matkul'] = $this->model('Matkul_model')->cariMatkul();

        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('matkul/index', $data);
        $this->view('templates/footer');
    }

    public function formUbahMatkul($id_matkul) 
    {
        $data['title'] = 'Ubah Mata Kuliah';
        $data['matkul'] = $this->model('Matkul_model')->ubahMatkul($id_matkul);
        $data['kelas'] = $this->model('Matkul_model')->getKelas();

        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('matkul/ubah_matkul', $data);
        $this->view('templates/footer');

    }

    public function prosesUbahMatkul()
    {
        if( $this->model('Matkul_model')->prosesUbahMatkul($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . 'Matkul');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . 'Matkul');
            exit;
        }
    }

}