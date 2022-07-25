<?php

$errors = [];

$user = new User();
$id = $_GET['id'] ? $_GET['id'] : null;
$row = $user->first(['id' => $id]);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['role']) && $_POST['role'] != $row['role']) {
        if(Auth::get('role') != 'admin') {
            $_POST['role'] = $row['role'];
        }
    }

    if(!empty($_FILES['image']['name'])) {
        $_POST['image'] = $_FILES['image'];
    }

    $errors = $user->validate($_POST, $id);

    if(empty($errors)) {
        $folder = 'uploads/';
        if(!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        if(!empty($_POST['image'])) {
            $ext = strtolower(pathinfo($_POST['image']['name'], PATHINFO_EXTENSION));
            $product = new Product();
            $destination = $folder . $product->generate_filename($ext);
            move_uploaded_file($_POST['image']['tmp_name'], $destination);
            $_POST['image'] = $destination;

            //delete old image
            if(file_exists($row['image'])) {
                unlink($row['image']);
            }
        }

        if(empty($_POST['password'])) {
            unset($_POST['password']);
        }else{
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        $user->update($id, $_POST);

        redirect('edit-user&id=' . $id);
    }
}

if(Auth::access('admin') || ($row && Auth::get('id') == $row['id'])) {
    require views_path('auth/edit-user');
}else{
    Auth::setMessage('Only admin pr owner can create a user!');
    require views_path('auth/denied');
}
