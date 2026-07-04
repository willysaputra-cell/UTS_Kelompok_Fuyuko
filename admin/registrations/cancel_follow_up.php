<?php
include "../security.php";
include "../../koneksi.php";

$registration_id = (int)($_GET['id'] ?? 0);

if ($registration_id <= 0) {
    header("Location: index.php");
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    "UPDATE registrations
    SET is_followed_up = 0,
        followed_up_by = NULL,
        followed_up_at = NULL
    WHERE id = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "i",
    $registration_id
);

$query = mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;
?>
