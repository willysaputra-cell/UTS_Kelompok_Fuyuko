<?php
include "../security.php";
include "../../koneksi.php";

$id = $_GET["id"] ?? "";

if ($id == "") {

    header("Location: index.php");
    exit;

}

$sql = "
DELETE FROM registrations
WHERE id = '$id'
";

$query = mysqli_query($conn, $sql);

if ($query) {

    header("Location: index.php");
    exit;

} else {

    echo "Data gagal dihapus.";

}