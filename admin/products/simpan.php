```php
<?php
include "../security.php";
include "../../koneksi.php";

if (isset($_POST['simpan'])) {

    $name = trim($_POST['name']);
    $price = (int)$_POST['price'];
    $category_id = (int)$_POST['category_id'];
    $added_by = (int)$_SESSION['id'];

    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $location = "../../FOTO/";

    if ($name == '' || $price <= 0 || $category_id <= 0) {
        $error = "Semua data wajib diisi!";
    } else {

        if (!empty($file_name)) {

            if (move_uploaded_file($file_tmp, $location . $file_name)) {

                $stmt = mysqli_prepare(
                    $conn,
                    "INSERT INTO products
                    (name, price, category_id, image, added_by)
                    VALUES (?, ?, ?, ?, ?)"
                );

                mysqli_stmt_bind_param(
                    $stmt,
                    "siisi",
                    $name,
                    $price,
                    $category_id,
                    $file_name,
                    $added_by
                );

                $query = mysqli_stmt_execute($stmt);

            } else {
                die("Upload foto gagal.");
            }

        } else {

            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO products
                (name, price, category_id, added_by)
                VALUES (?, ?, ?, ?)"
            );

            mysqli_stmt_bind_param(
                $stmt,
                "siii",
                $name,
                $price,
                $category_id,
                $added_by
            );

            $query = mysqli_stmt_execute($stmt);
        }
    }

    if (!isset($error)) {

        if ($query) {
            header("Location: index.php");
            exit;
        } else {
            echo "Produk gagal ditambah!";
        }

    }
}
?>
```
