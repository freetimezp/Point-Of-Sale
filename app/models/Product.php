<?php

class Product extends Model
{
    protected $table = 'products';

    protected $allowed_columns = [
        'barcode',
        'description',
        'qty',
        'amount',
        'image',
        'date',
        'user_id',
        'views'
    ];

    public function validate($data) {
        $errors = [];

        if(empty($data['description'])) {
            $errors['description'] = 'Product description is required';
        }
        if(!preg_match('/[a-zA-Z0-9 ]+/', $data['description'])) {
            $errors['description'] = 'Only letters, numbers and spaces allowed in description';
        }

        if(empty($data['qty'])) {
            $errors['qty'] = 'Product quantity is required';
        }
        if(!preg_match('/^[0-9]+$/', $data['qty'])) {
            $errors['qty'] = 'Only numbers allowed in quantity';
        }

        if(empty($data['amount'])) {
            $errors['amount'] = 'Product amount is required';
        }
        if(!preg_match('/^[0-9.]+$/', $data['qty'])) {
            $errors['amount'] = 'Only numbers allowed in amount';
        }

        if(empty($data['image'])) {
            $errors['image'] = 'Product image is required';
        }
        if(!($data['image']['type'] == 'image/jpeg' || $data['image']['type'] == 'image/png')) {
            $errors['amount'] = 'Only jpg or png images allowed';
        }
        if($data['image']['error'] > 0) {
            $errors['amount'] = 'Product image failed to upload';
        }
        $image_size = 4;
        $max_size = $image_size * (1024 * 1024);
        if($data['image']['size'] > $max_size) {
            $errors['amount'] = 'Product image is to big. Use image less than 4mb';
        }


        return $errors;
    }

    public function generate_barcode() {
        return "2222" . rand(1000, 999999999);

    }

}