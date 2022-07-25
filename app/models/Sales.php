<?php

class Sales extends Model
{
    protected $table = 'sales';

    protected $allowed_columns = [
        'barcode',
        'receipt_no',
        'description',
        'qty',
        'amount',
        'total',
        'date',
        'user_id'
    ];

    public function validate($data, $id = null) {
        $errors = [];

        if(!$id) {
            if(empty($data['description'])) {
                $errors['description'] = 'Product description is required';
            }
            if(!preg_match('/^[a-zA-Z0-9 ]+$/', $data['description'])) {
                $errors['description'] = 'Only letters, numbers and spaces allowed in description';
            }
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
}
