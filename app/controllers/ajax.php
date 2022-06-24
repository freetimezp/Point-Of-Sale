<?php

defined(ABSPATH) ? '' : die();

$product = new Product();
$rows = $product->findAll();
json_encode($rows);
