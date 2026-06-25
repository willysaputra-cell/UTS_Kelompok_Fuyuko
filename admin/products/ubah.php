<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['ubah'])) {
    $id = (int)$_POST['id'];
    if ($id <= 0) {
        die("ID produk tidak valid");
    }
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
            $stmt = mysqli_prepare(
                $conn,
                "UPDATE products
                SET name = ?,
                    price = ?,
                    image = ?,
                    category_id = ?
                WHERE id = ?"
            );

            mysqli_stmt_bind_param(
                $stmt,
                "sisii",
                $name,
                $price,
                $file_name,
                $category_id,
                $id
            );

            $query = mysqli_stmt_execute($stmt);
        } else {
            die("Upload gambar gagal");
        }
    } else {
        $stmt = mysqli_prepare(
            $conn,
            "UPDATE products
            SET name = ?,
                price = ?,
                category_id = ?
            WHERE id = ?"
        );

        mysqli_stmt_bind_param(
            $stmt,
            "siii",
            $name,
            $price,
            $category_id,
            $id
        );

        $query = mysqli_stmt_execute($stmt);
    }

    if ($query) {
        header ("Location: index.php");
        exit;
    } else {
        echo "Produk gagal diubah!";
    }
}
?>