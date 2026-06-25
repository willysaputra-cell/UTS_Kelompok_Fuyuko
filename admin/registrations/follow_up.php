<?php
include "../security.php";
include "../../koneksi.php";

$registration_id = (int)($_GET['id'] ?? 0);

if ($registration_id <= 0) {
    header("Location: index.php");
    exit;
}

$stmt_admin = mysqli_prepare(
    $conn,
    "SELECT id FROM users WHERE username = ?"
);

mysqli_stmt_bind_param(
    $stmt_admin,
    "s",
    $username
);

mysqli_stmt_execute($stmt_admin);

$result_admin = mysqli_stmt_get_result($stmt_admin);
$data_admin = mysqli_fetch_assoc($result_admin);

if (!$data_admin) {
    die("Admin tidak ditemukan");
}

$admin_id = $data_admin['id'];

$stmt = mysqli_prepare(
    $conn,
    "UPDATE registrations
     SET is_followed_up = 1,
         followed_up_by = ?,
         followed_up_at = NOW()
     WHERE id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "ii",
    $admin_id,
    $registration_id
);

$query = mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;
?>
