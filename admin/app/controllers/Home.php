<?php

class Home extends Controller {

    public function index()
    {
        $data['title'] = 'Home';
        $data['JmlAktivasi'] = $this->model('Aktivasi_model')->getAktivasi();
        $data['JmlUser'] = $this->model('User_model')->getAllUser();
        $data['JmlRuangKosong'] = $this->model('Ruangan_model')->getRuangKosong();
        $data['JmlRuangIsi'] = $this->model('Ruangan_model')->getRuangIsi();


        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
    
    // public function jumlahAktivasi()
    // {
    //     $data['JmlAktivasi'] = $this->model('Home_model')->getAktivasi();
    //     $jml = count($data['JmlAktivasi']);

    //     $this->view('home/index', ['jml' => $jml]);
        
    // }
}