<?php

$errors = [];

$sales = new Sales();
$id = $_GET['id'] ? $_GET['id'] : null;

$row = $sales->first(['id' => $id]);

if($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {
    $sales->delete($row['id']);

    redirect('admin&tab=sales');
}


require views_path('sales/sales-delete');


