<?php
include "../security.php";
include "../../koneksi.php";

$id = (int) ($_GET["id"] ?? 0);

if ($id <= 0) {
    header("Location: index.php");
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    "SELECT COUNT(*) AS total
     FROM orders
     WHERE product_id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if ($data["total"] > 0) {
    echo "
    <script>
        alert('Produk tidak dapat dihapus karena sudah digunakan pada data order.');
        window.location='index.php';
    </script>
    ";
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    "DELETE
     FROM products
     WHERE id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);

mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;