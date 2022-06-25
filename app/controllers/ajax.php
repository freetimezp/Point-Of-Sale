<?php

//defined(ABSPATH) ? '' : die();

$product = new Product();
$rows = $product->findAll();

if($rows) {
    foreach ($rows as $key => $row) {
        $rows[$key]['image'] = crop($row['image']);
    }

    echo json_encode($rows);
}

