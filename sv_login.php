<?php
session_start();

include "koneksi.php";

$username = trim($_POST['username']);
$password = $_POST['password'];

$stmt = mysqli_prepare(
    $conn,
    "SELECT * FROM users
     WHERE username = ?"
);

mysqli_stmt_bind_param(
    $stmt,
    "s",
    $username
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if ($data && password_verify($password, $data['password'])) {

    session_regenerate_id(true);

    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $data['username'];

    header("Location: admin/dashboard.php");
    exit;

} else {

    header("Location: login.php");
    exit;

}
?>
