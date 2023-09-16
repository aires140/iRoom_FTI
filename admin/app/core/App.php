<?php

class App {

    protected $controller = 'Home';
    protected $method = 'index'; 
    protected $params = [];

    public function __construct() {

        $url = $this->parseURL();
        
        
        if(empty($url[0])){
            // controller devault
            if(file_exists('home.php')) {
                $this->controller = $url[0];
                unset($url[0]);
                // var_dump($url);
            }

            require_once '../admin/app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller; 
        }else{
        
            // controller
            if(file_exists('../admin/app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
                // var_dump($url);
            }

            require_once '../admin/app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller; 

            //method
            if(isset($url[1])) {
                if(method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

        }

        // params
        if(!empty($url)){
            $this->params = array_values($url);
            // var_dump($url);
        }

        // Jalankan controllers dan methot serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function parseURL(){

        if(isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;

        }

    }

}




