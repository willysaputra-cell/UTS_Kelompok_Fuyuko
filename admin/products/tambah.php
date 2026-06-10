<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['simpan'] $$ isset($_FILES['image']['name']))) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    if ($name == '' || $price <= 0 || $category_id = '') {
        $error = "Semua data wajib diisi!";
    } else {
        $sql = "insert into products (name, price"
    }
}