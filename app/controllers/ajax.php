<?php

defined("ABSPATH") ? '' : die();

//capture ajax data
$row_data = file_get_contents("php://input");
if(!empty($row_data)) {
    $obj = json_decode($row_data, true);

    if(is_array($obj)) {
        if($obj['data_type'] == 'search') {
            $product = new Product();
            $limit = 20;

            if(!empty($obj['text'])) {
                //search
                $text = "%" . $obj['text'] . "%";
                $barcode = $obj['text'];
                $query = "SELECT * FROM products WHERE description LIKE :find OR barcode = :barcode ORDER BY views DESC LIMIT $limit";
                $rows = $product->query($query, ['find' => $text, 'barcode' => $barcode]);
            }else{
                //default home page products view
                $rows = $product->findAll($limit, 0, 'DESC', ' views ');
            }

            if($rows) {
                foreach ($rows as $key => $row) {
                    $rows[$key]['image'] = crop($row['image']);
                }

                $info['data'] = $rows;
                $info['data_type'] = "search";

                echo json_encode($info);
            }
        }elseif($obj['data_type'] == 'checkout') {
            $data = $obj['text'];

            //collect data to save
            $receipt_no = get_receipt_no();
            $user_id = auth('id');
            $date = date("Y-m-d H:i:s");

            //read from db
            $db = new Database();
            foreach ($data as $row) {
                $arr = [];

                $arr['id'] = $row['id'];
                $query = "SELECT * FROM products WHERE id = :id LIMIT 1";
                $check = $db->query($query, $arr);

                if(is_array($check)) {
                    $check = $check[0];
                    //save to db
                    $arr = [];
                    $arr['barcode'] = $check['barcode'];
                    $arr['receipt_no'] = $receipt_no;
                    $arr['description'] = $check['description'];
                    $arr['qty'] = $row['qty'];
                    $arr['amount'] = $check['amount'];
                    $arr['total'] = $row['qty'] * $check['amount'];
                    $arr['date'] = $date;
                    $arr['user_id'] = $user_id;

                    $query = "INSERT INTO sales (barcode, receipt_no, description, qty, amount, total, date, user_id)
                                VALUES(:barcode, :receipt_no, :description, :qty, :amount, :total, :date, :user_id)";
                    $db->query($query, $arr);

                    //add view count for product
                    $query = "UPDATE products SET views = views + 1 WHERE id = :id LIMIT 1";
                    $db->query($query, ['id' => $check['id']]);
                }
            }

            $info['data_type'] = "checkout";
            $info['data'] = "Items saved successfully!";

            echo json_encode($info);
        }
    }
}




