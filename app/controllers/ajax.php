<?php

defined("ABSPATH") ? '' : die();

//capture ajax data
$row_data = file_get_contents("php://input");
if(!empty($row_data)) {
    $obj = json_decode($row_data, true);

    if(is_array($obj)) {
        if($obj['data_type'] == 'search') {
            $product = new Product();

            if(!empty($obj['text'])) {
                //search
                $text = "%" . $obj['text'] . "%";
                $barcode = $obj['text'];
                $query = "SELECT * FROM products WHERE description LIKE :find OR barcode = :barcode LIMIT 10";
                $rows = $product->query($query, ['find' => $text, 'barcode' => $barcode]);
            }else{
                //default home page products view
                $rows = $product->findAll();
            }

            if($rows) {
                foreach ($rows as $key => $row) {
                    $rows[$key]['image'] = crop($row['image']);
                }

                $info['data'] = $rows;
                $info['data_type'] = "search";

                echo json_encode($info);
            }
        }
    }
}




