<?php
include "../security.php";
include "../../koneksi.php";

if (
    !isset($_POST["token"]) ||
    $_POST["token"] !== $_SESSION["token"]
) {
    die("Token CSRF tidak valid!");
}

$id         = (int) ($_POST["id"] ?? 0);
$product_id = (int) ($_POST["product_id"] ?? 0);
$quantity   = (int) ($_POST["quantity"] ?? 0);

if (
    $id <= 0 ||
    $product_id <= 0 ||
    $quantity <= 0
) {
    die("Data tidak valid.");
}

$stmt = mysqli_prepare(
    $conn,
    "SELECT price
     FROM products
     WHERE id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $product_id
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$product = mysqli_fetch_assoc($result);

if (!$product) {
    die("Produk tidak ditemukan.");
}

$price = $product["price"];
$total = $price * $quantity;

$stmt = mysqli_prepare(
    $conn,
    "UPDATE orders
     SET
        product_id = ?,
        price = ?,
        quantity = ?,
        total = ?
     WHERE id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "iiiii",
    $product_id,
    $price,
    $quantity,
    $total,
    $id
);

mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;
?>
