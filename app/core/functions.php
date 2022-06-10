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