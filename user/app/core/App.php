

<?php

class App {

    protected $controller = 'Home';
    protected $method = 'index'; 
    protected $params = [];

    public function __construct() {

        $url = $this->parseURL();

        // Periksa apakah controller ada di direktori controllers
        if (!empty($url) && file_exists('../user/app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../user/app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller; 

        // Periksa apakah method ada di dalam controller
        if (!empty($url) && isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Set nilai yang tersisa sebagai params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // Panggil controller, method, dan kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL(){

        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }

        // Jika URL tidak diberikan, kembalikan array kosong
        return [];
    }
}




