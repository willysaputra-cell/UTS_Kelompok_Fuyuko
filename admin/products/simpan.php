<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['simpan'])) {
    $name = trim($_POST['name']);
    $price = (int)$_POST['price'];
    $category_id = (int)$_POST['category_id'];
    $added_by = $_SESSION['id'];

    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $location = "../../FOTO/";

    if ($name == '' || $price <= 0 || $category_id <= 0) {
        $error = "Semua data wajib diisi!";
    } else {
        if(!empty($file_name)) {
            if (move_uploaded_file($file_tmp, $location . $file_name)) {
                $sql = "INSERT INTO products (name, price, category_id, image, added_by)
                        VALUES ('$name', '$price', '$category_id', '$file_name', '$added_by')";
            } else {
                die("Upload foto gagal.");
            }
        } else {
            $sql = "INSERT INTO products (name, price, category_id, added_by)
                    VALUES ('$name', '$price', '$category_id', '$added_by')";
        }
    }

    if (!isset($error)) {
    $query = mysqli_query($conn, $sql);
        if ($query) {
            header("Location: index.php");
            exit;
        } else {
            echo "Produk gagal ditambah!";
        }
    }
}
?>