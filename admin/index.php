<?php
if( !session_id() ) session_start();

ini_set('display_errors', 'On');
error_reporting(error_reporting() & ~E_NOTICE);

// session_start();

// $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// $url = explode("/", $url);

// $folder = '/master-php-mvc/';

//    if (!isset($_SESSION['nama'])) {
//         header("Location: http://localhost/master-php-mvc/Login");
//     } else {

//         $id = $_SESSION['id'];
//         $nama = $_SESSION['nama'];

        require_once '../admin/app/config/config.php';
        require_once '../admin/app/init.php';

        $app = new App;
    // }