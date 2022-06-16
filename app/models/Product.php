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

        return $errors;
    }

    public function generate_barcode() {
        return "2222" . rand(1000, 999999999);

    }

}