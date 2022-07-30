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

    $limit = $_GET['limit'] ?? 20;
    $limit = (int)$limit;
    $limit = $limit < 1 ? 20 : $limit;
    $pager = new Pager($limit);
    $offset = $pager->offset;

    $query = "SELECT * FROM sales ORDER BY id DESC LIMIT $limit OFFSET $offset";

    //get total sales
    $year = date("Y");
    $month = date("m");
    $day = date("d");
    $query_total = "SELECT sum(total) as total FROM sales WHERE day(date) = $day AND month(date) = $month AND year(date) = $year";

    //check if date is set
    if($startdate) {
        $sdate = $startdate . " 23:59:59";
        $query = "SELECT * FROM sales WHERE date >= '$startdate' AND date < '$sdate' ORDER BY id DESC LIMIT $limit OFFSET $offset";
        $query_total = "SELECT sum(total) as total FROM sales WHERE date >= '$startdate' AND date < '$sdate'";

        if($enddate) {
            $edate = $enddate . " 23:59:59";
            $query = "SELECT * FROM sales WHERE date >= '$startdate' AND date < '$edate' ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $query_total = "SELECT sum(total) as total FROM sales WHERE date >= '$startdate' AND date < '$edate'";
        }
    }

    $sales = $sale->query($query);

    $st = $sale->query($query_total);
    $sales_total = 0;

    if($st) {
        $sales_total = $st[0]['total'] ?? 0;
    }

    //read graph data
    if($section == 'graph') {
        $db = new Database();

        //todays sales
        $today = date("Y-m-d");
        $query = "SELECT total,date FROM sales WHERE date(date) = '$today'";
        $today_records = $db->query($query);

        //month sales
        $thismonth = date("m");
        $thisyear = date("Y");
        $query = "SELECT total,date FROM sales WHERE year(date) = '$thisyear' AND month(date) = '$thismonth'";
        $month_records = $db->query($query);

        //year sales
        $query = "SELECT total,date FROM sales WHERE year(date) = '$thisyear'";
        $year_records = $db->query($query);
    }
}

if(Auth::access('supervisor')) {
    require views_path('admin/admin');
}else{
    Auth::setMessage('You dont have permissions to this part!');
    require views_path('auth/denied');
}

