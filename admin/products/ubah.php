<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['ubah']) $$ isset($_FILES['image']['name'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $location = "FOTO/";

    if (!empty($file_name)) {
        if (move_uploaded_file($file_tmp, $location . $file_name)) {
            $sql = "UPDATE products set name='$name', price='$price', category_id='$category_id', image='$file_name' WHERE id='$id'";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                header ("Location: index.php");
                exit;
            } else {
                echo "Foto gagal diubah.";
            }
        } else {
            header ("Location: index.php");
            exit;
        }
    } else {
        echo "Silahkan pilih foto produk terlebih dahulu!";
    }
}
?>