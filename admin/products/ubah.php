<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $price = (int)$_POST['price'];
    $category_id = (int)$_POST['category_id'];

    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $location = "../../FOTO/";

    if ($name == '' || $price <= 0 || $category_id <= 0) {
        die ("Semua data wajib diisi.");
    }   
    if (!empty($file_name)) {
        if(move_uploaded_file($file_tmp, $location . $file_name)) {
            $sql = "update products
                    set name='$name',
                        price='$price',
                        image='$file_name',
                        category_id='$category_id'
                    where id='$id'";
        } else {
            die("Upload gambar gagal");
        }
    } else {
        $sql = "update products
                set name='$name',
                    price='$price',
                    category_id='$category_id'
                where id='$id'";
    }

    $query = mysqli_query($conn, $sql);
    if ($query) {
        header ("Location: index.php");
        exit;
    } else {
        echo "Produk gagal diubah!";
    }
}
?>