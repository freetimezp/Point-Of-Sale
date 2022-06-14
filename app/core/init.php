<?php

require "../app/core/config.php";
require "../app/core/functions.php";
require "../app/core/Database.php";
require "../app/core/Model.php";

spl_autoload_register('my_function');

function my_function($classname) {
    $filename = "../app/models/" . ucfirst($classname) . ".php";
    if(file_exists($filename)) {
        require $filename;
    }
}