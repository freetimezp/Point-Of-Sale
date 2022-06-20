<?php

$errors = [];

$product = new Product();
$id = $_GET['id'] ? $_GET['id'] : null;

$row = $product->first(['id' => $id]);

if($_SERVER['REQUEST_METHOD'] == 'POST' && $row) {
    $product->delete($row['id']);

    //delete old image
    if(file_exists($row['image'])) {
        unlink($row['image']);
    }

    redirect('admin&tab=products');
}


require views_path('products/product-delete');


