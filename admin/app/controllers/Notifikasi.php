<?php 

class Notifikasi extends Controller {

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

}