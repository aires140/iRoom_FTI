<?php

class Controller
{

    public function view($view, $data = [])
    {
        session_start();
        
        if( !isset($_SESSION['nama']) ) {
            require_once '../admin/app/views/login/index.php';
        }else {
            require_once '../admin/app/views/' . $view . '.php';
        }
        
    }



    public function model($model)
    {
        require_once '../admin/app/models/' . $model . '.php';
        return new $model;
    }
}

