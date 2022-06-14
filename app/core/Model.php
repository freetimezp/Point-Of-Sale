<?php

class Model extends Database
{
    //multiple insert func for all tables.. - check later
    public function insert($data) {
        $clean_array = allowed_columns($data, $this->table);
        $keys = array_keys($clean_array);

        $query = "INSERT INTO $this->table ";
        $query .= "(" . implode(",", $keys) . ") VALUES ";
        $query .= "(:" . implode(",:", $keys) . ")";

        $db = new Database();
        $db->query($query, $clean_array);
    }

    public function where($data) {
        $keys = array_keys($data);

        $query = "SELECT * FROM $this->table WHERE ";
        foreach ($keys as $key) {
            $query .= $key . ' = :' . $key . ' AND ';
        }

        $query = trim($query, 'AND ');

        $db = new Database();
        return $db->query($query, $data);
    }
}