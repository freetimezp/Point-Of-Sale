<?php

session_start();
require "../app/core/init.php";

define("ABSPATH", __DIR__);

$controller = 'home';

if(isset($_GET['page_name'])) {
    $controller = $_GET['page_name'];
    $controller = strtolower($controller);
}

if(file_exists('../app/controllers/' . $controller . '.php')) {
    require ('../app/controllers/' . $controller . '.php');
}else{
    echo "not found";
}
