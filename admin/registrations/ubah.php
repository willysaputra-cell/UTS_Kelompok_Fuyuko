<?php
include "../security.php";
include "../../koneksi.php";

$id = $_POST["id"] ?? "";

$full_name = mysqli_real_escape_string(
    $conn,
    $_POST["full_name"]
);

$address = mysqli_real_escape_string(
    $conn,
    $_POST["address"]
);

$phone_number = mysqli_real_escape_string(
    $conn,
    $_POST["phone_number"]
);

$email = mysqli_real_escape_string(
    $conn,
    $_POST["email"]
);

$sql = "
UPDATE registrations
SET

    full_name = '$full_name',
    address = '$address',
    phone_number = '$phone_number',
    email = '$email'

WHERE id = '$id'
";

$query = mysqli_query($conn, $sql);

if ($query) {

    header("Location: index.php");
    exit;

} else {

    echo "Data gagal diubah.";

}