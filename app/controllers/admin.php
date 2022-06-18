<?php

$tab = isset($_GET['tab']) ? $_GET['tab'] : '';

if($tab == 'products') {
    $product = new Product();

    $products = $product->query("SELECT * FROM products ORDER BY id DESC");
}

require views_path('admin/admin');
