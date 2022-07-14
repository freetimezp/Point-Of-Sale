<?php

$tab = isset($_GET['tab']) ? $_GET['tab'] : '';

if($tab == 'products') {
    $product = new Product();
    $products = $product->query("SELECT * FROM products ORDER BY id DESC");
}

if($tab == 'users') {
    $user = new User();
    $users = $user->query("SELECT * FROM users ORDER BY id DESC");
}

if($tab == 'sales') {
    $user = new User();
    $users = $user->query("SELECT * FROM users ORDER BY id DESC");
}

if(Auth::access('supervisor')) {
    require views_path('admin/admin');
}else{
    Auth::setMessage('You dont have permissions to this part!');
    require views_path('auth/denied');
}

