<?php

$tab = isset($_GET['tab']) ? $_GET['tab'] : '';

if($tab == 'products') {
    $product = new Product();
    $products = $product->query("SELECT * FROM products ORDER BY id DESC");
}

if($tab == 'users') {
    $limit = 10;
    $pager = new Pager($limit);
    $offset = $pager->offset;

    $user = new User();
    $users = $user->query("SELECT * FROM users ORDER BY id DESC LIMIT $limit OFFSET $offset");
}

if($tab == 'sales') {
    $sale = new Sales();

    $limit = 2;
    $pager = new Pager($limit);
    $offset = $pager->offset;

    $sales = $sale->query("SELECT * FROM sales ORDER BY id DESC LIMIT $limit OFFSET $offset");

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

