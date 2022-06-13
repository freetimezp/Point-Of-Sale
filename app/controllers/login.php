<?php

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($row = where(['email' => $_POST['email']], 'users')) {
        if($row[0]['password'] === $_POST['password']) {
            authenticate($row);
            redirect('home');
        }else{
            $errors['password'] = "Wrong password";
        }
    }else{
        $errors['email'] = 'Wrong email';
    }
}

require views_path('auth/login');
