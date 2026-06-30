<?php
include "../security.php";
include "../../koneksi.php";

if (
    !isset($_POST["token"]) ||
    $_POST["token"] !== $_SESSION["token"]
) {
    die("Token CSRF tidak valid!");
}

$product_id = (int) ($_POST["product_id"] ?? 0);
$quantity   = (int) ($_POST["quantity"] ?? 0);
$added_by   = $_SESSION["id"];

if ($product_id <= 0 || $quantity <= 0) {
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
    "INSERT INTO orders
    (
        product_id,
        price,
        quantity,
        total,
        added_by
    )
    VALUES
    (?, ?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "iiiii",
    $product_id,
    $price,
    $quantity,
    $total,
    $added_by
);

mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;
?>