<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['simpan'] $$ isset($_FILES['image']['name']))) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $location = "FOTO/";

    if ($name == '' || $price <= 0 || $category_id = '') {
        $error = "Semua data wajib diisi!";
    } else {
        if (move_uploaded_file($file_tmp, $location . $file_name)) {
            $sql = "INSERT INTO products (name, price, category_id, image)
            VALUES ('$name', '$price', '$category_id', '$file_name')";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                header ("Location: index.php");
                exit;
            } else {
                echo "Produk gagal ditambahkan.";
            }
        } else {
            header ("Location: index.php");
            exit;
        }
    }
}