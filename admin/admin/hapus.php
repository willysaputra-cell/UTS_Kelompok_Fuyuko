<?php
include "../security.php";
include "../../koneksi.php";

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) {
    header("Location: index.php");
    exit;
}

$id = (int)($_GET['id'] ?? 0);

if ($id == $_SESSION['id']) {
    die("Anda tidak dapat menghapus akun sendiri.");
}

$sql = "SELECT COUNT(*) AS total FROM users";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if ($data['total'] <= 1) {
    die("Minimal harus ada satu admin.");
}

$stmt = mysqli_prepare(
    $conn,
    "DELETE FROM users
    WHERE id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $id
);

$query = mysqli_stmt_execute($stmt);

if ($query) {
    header("Location: index.php");
    exit;
} else {
    echo "Admin gagal dihapus!";
}
?>