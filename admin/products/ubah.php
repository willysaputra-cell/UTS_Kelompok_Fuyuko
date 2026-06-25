<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['ubah'])) {
    if (
        !isset($_POST['token']) ||
        !hash_equals(
            $_SESSION['token'],
            $_POST['token']
        )
    ) {
        die("CSRF detected");
    }
    $id = (int)$_POST['id'];
    if ($id <= 0) {
        die("ID produk tidak valid");
    }
    $name = trim($_POST['name']);
    $price = (int)$_POST['price'];
    $category_id = (int)$_POST['category_id'];

    $file_name = $_FILES['image']['name'] ?? '';
    $file_tmp = $_FILES['image']['tmp_name'] ?? '';
    $location = "../../FOTO/";
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    $ext = strtolower(
        pathinfo(
            $file_name,
            PATHINFO_EXTENSION
        )
    );

    if ($name == '' || $price <= 0 || $category_id <= 0) {
        die ("Semua data wajib diisi.");
    }   
    if (!empty($file_name)) {
        $image_name =
            time() . "_" .
            uniqid() . "." .
            $ext;

        if (!in_array($ext, $allowed)) {
            die("Format file tidak diizinkan");
        }

        if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
            die("Ukuran file maksimal 2 MB");
        }

        if(move_uploaded_file($file_tmp, $location . $image_name)) {
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
                $image_name,
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