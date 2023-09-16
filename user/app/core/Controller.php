<?php

class Controller
{

    public function view($view, $data = [])
    {
        if (!isset($_SESSION['nama'])) {
                // Tidak ada session, maka tampilkan halaman login
            require_once '../user/app/views/login/index.php';

            if (isset($_GET['Daftar'])) {
                require_once '../user/app/views/formDaftar.php';
            }


        } else {
            // Ada session, tampilkan halaman yang diminta
            require_once '../user/app/views/' . $view . '.php';
        }
    }
    

    public function model($model)
    {
        require_once '../user/app/models/' . $model . '.php';
        return new $model;
    }
}

