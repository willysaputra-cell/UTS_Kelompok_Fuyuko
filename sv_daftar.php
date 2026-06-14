<?php
include "koneksi.php";

$full_name = trim($_POST['full_name'] ?? '') ;
$phone_number = trim($_POST['phone_number'] ?? '');
$address = trim($_POST['address'] ?? '');
$email = trim($_POST['email'] ?? '');

$sql = "insert into registrations (full_name, phone_number, address, email) 
        values ('$full_name',
                '$phone_number',
                '$address',
                '$email')";
$query = mysqli_query($conn, $sql);

header("Location: index.php");
exit;

?>