<?php
include "../security.php";
include "../../koneksi.php";

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: index.php");
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    "DELETE FROM products WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);

$query = mysqli_stmt_execute($stmt);

header ("Location: index.php");
exit;