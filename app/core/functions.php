<?php

function show($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function views_path($view) {
    if(file_exists("../app/views/$view.view.php")) {
        return ("../app/views/$view.view.php");
    }else{
        echo "page not found";
    }
}

function esc($str) {
    return htmlspecialchars($str);
}

function set_value($key, $default = '') {
    if(!empty($_POST[$key])) {
        return $_POST[$key];
    }

    return $default;
}

function redirect($page) {
    header("Location: index.php?page_name=" . $page);
    die;
}

function authenticate($row) {
    $_SESSION['USER'] = $row;
}

function auth($column) {
    if(!empty($column)) {
        return $_SESSION['USER'][$column];
    }

    return 'Hi, User';
}

function crop($filename, $size = 600, $type = 'product') {
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    //use this
    //$cropped_file = str_replace('.' . $ext, '_cropped.' . $ext, $filename);
    //or
    $cropped_file = preg_replace("/\.$ext$/", '_cropped.' . $ext, $filename);

    //if cropped file already exists
    if(file_exists($cropped_file)) {
        return $cropped_file;
    }

    //if file to be cropped does not exist
    if(!file_exists($filename)) {
        if($type == 'male') {
            return 'assets/images/male.png';
        }elseif($type == 'female') {
            return 'assets/images/female.png';
        }else{
            return 'assets/images/no_image.jpg';
        }

    }

    //create image resource
    switch ($ext) {
        case 'jpg' or 'jpeg':
            $src_image = imagecreatefromjpeg($filename);
            break;

        case 'png':
            $src_image = imagecreatefrompng($filename);
            break;

        case 'gif':
            $src_image = imagecreatefromgif($filename);
            break;

        default:
            return $filename;
            break;
    }

    //set cropping params
    $dst_x = 0;
    $dst_y = 0;
    $dst_w = (int)$size;
    $dst_h = (int)$size;

    $original_width = imagesx($src_image);
    $original_height = imagesy($src_image);

    if($original_width < $original_height) {
        $src_x = 0;
        $src_y = ($original_height - $original_width) / 2;
        $src_w = $original_width;
        $src_h = $original_width;
    }else{
        $src_x = ($original_width - $original_height) / 2;
        $src_y = 0;
        $src_w = $original_height;
        $src_h = $original_height;
    }

    $dst_image = imagecreatetruecolor((int)$size, (int)$size);
    imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

    //save final image
    switch ($ext) {
        case 'jpg' or 'jpeg':
            imagejpeg($dst_image, $cropped_file);
            break;

        case 'png':
            imagepng($dst_image, $cropped_file);
            break;

        case 'gif':
            imagegif($dst_image, $cropped_file);
            break;

        default:
            return $filename;
            break;
    }

    imagedestroy($dst_image);
    imagedestroy($src_image);

    return $cropped_file;
}

function get_receipt_no() {
    $num = 1;

    $db = new Database();
    $rows = $db->query("SELECT receipt_no FROM sales ORDER BY id DESC LIMIT 1");

    if(is_array($rows)) {
        $num = (int)$rows[0]['receipt_no'] + 1;
    }

    return $num;
}

function get_date($date) {
    return date("jS M, Y", strtotime($date));

}













