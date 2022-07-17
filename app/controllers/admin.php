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
    $sale = new Sales();
    $sales = $sale->query("SELECT * FROM sales ORDER BY id DESC");

    //get today sales
    $year = date("Y");
    $month = date("m");
    $day = date("d");
    $query = "SELECT sum(total) as total FROM sales WHERE day(date) = $day AND month(date) = $month AND year(date) = $year";
    $st = $sale->query($query);
    $sales_total = 0;

    if($st) {
        $sales_total = $st[0]['total'] ?? 0;
    }

}

if(Auth::access('supervisor')) {
    require views_path('admin/admin');
}else{
    Auth::setMessage('You dont have permissions to this part!');
    require views_path('auth/denied');
}

