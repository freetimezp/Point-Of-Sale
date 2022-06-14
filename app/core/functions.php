<?php

function show($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function views_path($view) {
    if(file_exists("../app/views/$view.view.php")) {
        return ("../app/views/$view.view.php");
    }else{
        echo "page not found";
    }
}

function esc($str) {
    return htmlspecialchars($str);
}

function set_value($key, $default = '') {
    if(!empty($_POST[$key])) {
        return $_POST[$key];
    }

    return $default;
}

function redirect($page) {
    header("Location: index.php?page_name=" . $page);
    die;
}

function authenticate($row) {
    $_SESSION['USER'] = $row;
}

function auth($column) {
    if(!empty($column)) {
        return $_SESSION['USER'][$column];
    }

    return 'Hi, User';
}














