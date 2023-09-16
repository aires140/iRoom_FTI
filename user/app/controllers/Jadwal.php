<?php 

class Jadwal extends Controller {

    public function index() {

    $data['title'] = 'Jadwal Ruangan';
    $data['jadwal'] = $this->model('Jadwal_model')->getAllJadwal();
    

    $this->view( 'templates/header', $data );
    $this->view( 'templates/topbar' );
    $this->view( 'templates/sidebar', $data );
    $this->view( 'jadwal/index', $data );
    $this->view( 'templates/footer');

    }

    

    public function cari()
    {
        $data['title'] = 'Jadwal Ruangan';
        $data['jadwal'] = $this->model('Jadwal_model')->cariDataJadwal();

        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('jadwal/index', $data);
        $this->view('templates/footer');
    }



}

