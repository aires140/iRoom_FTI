<?php

class User extends Controller {

    public function index()
    {
        $data['title'] = 'Data User';
        $data['user'] = $this->model('User_model')->getAllUser();


        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function hapus($id_user)
    {
        if( $this->model('User_model')->hapusUser($id_user) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . 'User');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . 'User');
            exit;
        }
    }


    
    // public function akses($id_user)
    // {
    //     if( $this->model('User_model')->aksesUser($id_user) > 0 ) {
    //         Flasher::setFlash('akses banyak ruangan berhasil', 'diaktifkan', 'success');
    //         header('Location: ' . BASEURL . 'User');
    //         exit;
    //     } else {
    //         Flasher::setFlash('akses banyak ruangan gagal', 'diaktifkan', 'danger');
    //         header('Location: ' . BASEURL . 'User');
    //         exit;
    //     }
    // }
    // public function aksess($id_user)
    // {
    //     if( $this->model('User_model')->aksesUserr($id_user) > 0 ) {
    //         Flasher::setFlash('akses satu ruangan berhasil', 'aktif', 'success');
    //         header('Location: ' . BASEURL . 'User');
    //         exit;
    //     } else {
    //         Flasher::setFlash('akses satu ruangan gagal', 'akti', 'danger');
    //         header('Location: ' . BASEURL . 'User');
    //         exit;
    //     }
    // }



}