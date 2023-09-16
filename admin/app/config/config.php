<?php

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URl]";
$url = explode("/", $url);

$folder = '/iroom/admin/';
$db_name = 'iroom';


$baseurl = 'http://' . $url[2] . '' . $folder;

define('BASEURL', $baseurl);

// DB
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', $db_name);

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);