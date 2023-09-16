<?php 

class Login extends Controller 
{
  public function index()
  { 

    $this->view( 'login/index');
    
  }

  public function log() 
  {
    $nama = $_POST['nama'];
    $password = $_POST['password'];

    $data['login'] = $this->model('Login_model')->getData($nama, $password);
    
    session_start();

    if( $data['login'] == null ) {
      Flasher::setFlash('tidak', 'ditemukan', 'danger');
      header("Location:" . BASEURL . 'Login');
      exit;
    } else {
      foreach( $data['login'] as $row ):
        $_SESSION['nama'] = $row['nama'];
        header("Location:" . BASEURL);
      endforeach;
    }

  }



public function beritahu() 
{
  $this->view( 'login/beritahu');
}


  public function logout()
  {
    session_start();
    unset($_SESSION['nama']);
    session_destroy();
    header("Location:" . BASEURL);
  }

}