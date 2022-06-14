<?php

class Model extends Database
{
    //multiple insert func for all tables.. - check later
    public function insert($data) {
        $clean_array = $this->get_allowed_columns($data);
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

    protected function get_allowed_columns($data) {
        if(!empty($this->allowed_columns)) {
            foreach ($data as $key => $value) {
                if(!in_array($key, $this->allowed_columns)) {
                    unset($data[$key]);
                }
            }
        }

        return $data;
    }
}