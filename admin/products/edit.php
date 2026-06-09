<?php
include "../security.php";
include "../../koneksi.php";

$id = $_GET['id'] ?? '';

if ($id == '') {
    header("Location: index.php");
    exit;
}

$sql = "select * from courses where id = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);