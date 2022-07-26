<?php

$tab = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard';

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
    $section = isset($_GET['s']) ? $_GET['s'] : 'table';
    $startdate = $_GET['start'] ?? null;
    $enddate = $_GET['end'] ?? null;

    $sale = new Sales();

    $limit = 20;
    $pager = new Pager($limit);
    $offset = $pager->offset;

    $query = "SELECT * FROM sales ORDER BY id DESC LIMIT $limit OFFSET $offset";

    if($startdate) {
        $syear = date("Y", strtotime($startdate));
        $smonth = date("m", strtotime($startdate));
        $sday = date("d", strtotime($startdate));

        $eyear = date("Y", strtotime($enddate));
        $emonth = date("m", strtotime($enddate));
        $eday = date("d", strtotime($enddate));

        $query = "SELECT * FROM sales WHERE year(date) = '$syear' AND month(date) = '$smonth' AND day(date) = '$sday' 
                    ORDER BY id DESC LIMIT $limit OFFSET $offset";
    }

    $sales = $sale->query($query);

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

