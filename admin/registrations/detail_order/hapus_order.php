<?php
include "../../security.php";
include "../../../koneksi.php";

$id = $_GET["id"] ?? "";

if ($id == "") {
    header("Location: ../index.php");
    exit;
}

$sql = "
SELECT
    registration_id

FROM registration_orders

WHERE id = '$id'
";

$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: ../index.php");
    exit;
}

$sql = "
DELETE FROM registration_orders

WHERE id = '$id'
";

mysqli_query($conn, $sql);

header("Location: detail_order.php?id=" . $data["registration_id"]);
exit;