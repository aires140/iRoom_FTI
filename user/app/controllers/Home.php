<?php


class Home extends Controller {

    public function index()
    {
        session_start();
        $nama = ($_SESSION['nama']);
        $data['title'] = 'Data Diri';
        
        $data['title'] = 'Home';
        $data['jadwal'] = $this->model('Jadwal_model')->getAllJadwal();
        $data['user'] = $this->model('Profil_model')->getIdentitasByNama($nama);
        $data['JmlRuangKosong'] = $this->model('Ruangan_model')->getRuangKosong();
        $data['JmlRuangIsi'] = $this->model('Ruangan_model')->getRuangIsi();



        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}