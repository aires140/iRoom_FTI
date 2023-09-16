<?php 

class RuanganSaya extends Controller {

    public function index() {

    $data['title'] = 'Ruangan Saya';
    $data['ruang'] = $this->model('RuanganSaya_model')->getRuanganSaya();


    $this->view( 'templates/header', $data );
    $this->view( 'templates/topbar' );
    $this->view( 'templates/sidebar', $data );
    $this->view( 'ruangan_saya/index', $data );
    $this->view( 'templates/footer');

    }



}