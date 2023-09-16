<?php


class Aktivasi extends Controller {

    
    public function index()
    {
        $data['title'] = 'Data Aktivasi User';
        $data['aktivasi'] = $this->model('Aktivasi_model')->getAllAktivasi();


        $this->view('templates/header', $data);
        $this->view('templates/topbar');
        $this->view('templates/sidebar', $data);
        $this->view('aktivasi/index', $data);
        $this->view('templates/footer');
    }

    public function hapus($id_user)
    {
        if( $this->model('Aktivasi_model')->hapusUser($id_user) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . 'Aktivasi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . 'Aktivasi');
            exit;
        }
    }

    public function userAktivasi($id_user)
{
    $aktivasiModel = $this->model('Aktivasi_model');
    $user = $aktivasiModel->getUserById($id_user);

    if ($aktivasiModel->aktivasiUser($id_user) > 0) {
        $activationEmailSent = $this->sendActivationEmail($user['email']);
        if ($activationEmailSent) {
            Flasher::setFlash('berhasil', 'diaktifkan dan email telah dikirim', 'success');
        } else {
            Flasher::setFlash('berhasil', 'diaktifkan tetapi email gagal dikirim', 'warning');
        }
    } else {
        Flasher::setFlash('gagal', 'diaktifkan', 'danger');
    }

    header('Location: ' . BASEURL . 'Aktivasi');
    exit;
}

public function sendActivationEmail($email)
{
    $to = $email;
    $subject = 'Aktivasi Akun';
    $message = 'Selamat, akun Anda telah diaktifkan!, Silahkan buka kembali iRoom Informatika';

    // Headers
    $headers = "From: iroom7747@gmail.com" . "\r\n";
    $headers .= "Reply-To: iroom7747@gmail.com" . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Kirim email
    $success = mail($to, $subject, $message, $headers);
    
    if ($success) {
        return true;
    } else {
        return false;
    }
}



}