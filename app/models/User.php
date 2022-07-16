<?php

class User extends Model
{
    protected $table = 'users';
    protected $allowed_columns = [
        'username',
        'email',
        'password',
        'date',
        'image',
        'role',
        'gender'
    ];

    public function validate($data, $id = null) {
        $errors = [];

        if(empty($data['username'])) {
            $errors['username'] = 'Username is required';
        }
        if(!preg_match('/[a-zA-Z ]/', $data['username'])) {
            $errors['username'] = 'Only letters and spaces allowed in username';
        }

        if(empty($data['email'])) {
            $errors['email'] = 'Email is required';
        }
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email is not valid try another';
        }

        if(!$id) {
            if(empty($data['password'])) {
                $errors['password'] = 'Password is required';
            }
            if(strlen($data['password']) < 8) {
                $errors['password'] = 'Password is must be more then 8 characters long';
            }
            if($data['password'] !== $data['confirm']) {
                $errors['confirm'] = 'Passwords not match';
            }
        }else{
            if(!empty($data['password'])) {
                if(strlen($data['password']) < 8) {
                    $errors['password'] = 'Password is must be more then 8 characters long';
                }
                if($data['password'] !== $data['confirm']) {
                    $errors['confirm'] = 'Passwords not match';
                }
            }
        }

        return $errors;
    }
}