<?php
include "koneksi.php";

$full_name = trim($_POST['full_name'] ?? '') ;
$phone_number = trim($_POST['phone_number'] ?? '');
$address = trim($_POST['address'] ?? '');
$email = trim($_POST['email'] ?? '');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Email tidak valid");
}

if (!preg_match('/^[0-9]+$/', $phone_number)) {
    die("Nomor telepon tidak valid");
}

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO registrations
    (full_name, phone_number, address, email)
    VALUES (?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "ssss",
    $full_name,
    $phone_number,
    $address,
    $email
);

$query = mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;

?>