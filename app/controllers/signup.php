<?php

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST['role'] = 'user';
    $_POST['date'] = date("Y-m-d H:i:s");

    $user = new User();
    $errors = $user->validate($_POST);

    if(empty($errors)) {
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->insert($_POST);

        redirect('login');
    }
}

if(Auth::access('admin')) {
    require views_path('auth/signup');
}else{
    Auth::setMessage('Only admin can create a user!');
    require views_path('auth/denied');
}
