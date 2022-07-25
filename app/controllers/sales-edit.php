<?php

$errors = [];

$sale = new Sales();
$id = $_GET['id'] ? $_GET['id'] : null;

$row = $sale->first(['id' => $id]);

if($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {
    $errors = $sale->validate($_POST, $row['id']);

    if(empty($errors)) {
        $_POST['total'] = $_POST['qty'] * $_POST['amount'];
        $sale->update($row['id'], $_POST);

        redirect('admin&tab=sales');
    }
}


require views_path('sales/sales-edit');


