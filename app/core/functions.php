<?php

function db_connect() {
    $DBHOST = "localhost";
    $DBNAME = "point_of_sale_db";
    $DBUSER = 'root';
    $DBPASS = '';
    $DBDRIVER = "mysql";


    try{
        $con = new PDO("$DBDRIVER:host=$DBHOST;dbname=$DBNAME;", $DBUSER, $DBPASS);
    }catch(PDOException $e) {
        $e->getMessage();
    }

    return $con;
}

function query($query, $data = array()) {
    $con = db_connect();
    $smt = $con->prepare($query);
    $check = $smt->execute($data);

    if($check) {
        $result = $smt->fetchAll(PDO::FETCH_ASSOC);

        if(is_array($result) && count($result) > 0) {
            return $result;
        }
    }

    return false;
}

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

function allowed_columns($data, $table) {
    if($table == 'users') {
        $columns = [
            'username',
            'email',
            'password',
            'date',
            'image',
            'role'
        ];

        foreach ($data as $key => $value) {
            if(!in_array($key, $columns)) {
                unset($data[$key]);
            }
        }

        return $data;
    }
}

//multiple insert func for all tables.. - check later
function insert($data, $table) {
    $clean_array = allowed_columns($data, 'users');
    $keys = array_keys($clean_array);

    $query = "INSERT INTO $table ";
    $query .= "(" . implode(",", $keys) . ") VALUES ";
    $query .= "(:" . implode(",:", $keys) . ")";

    query($query, $clean_array);
}


function validate($data, $table) {
    $errors = [];

    if($table == 'users') {
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

        if(empty($data['password'])) {
            $errors['password'] = 'Password is required';
        }
        if(strlen($data['password']) < 8) {
            $errors['password'] = 'Password is must be more then 8 characters long';
        }
        if($data['password'] !== $data['confirm']) {
            $errors['confirm'] = 'Passwords not match';
        }

    }

    return $errors;
}

function set_value($key, $default = '') {
    if(!empty($_POST[$key])) {
        return $_POST[$key];
    }

    return $default;
}