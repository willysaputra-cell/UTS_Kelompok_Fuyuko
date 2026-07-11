<?php
include "../../security.php";
include "../../../koneksi.php";

$id = $_POST["id"];
$registration_id = $_POST["registration_id"];

$production_start = $_POST["production_start"];
$delivery_time = $_POST["delivery_time"];
$status = $_POST["status"];
$note = $_POST["note"];

$sql = "
UPDATE registration_orders

SET

production_start = " . ($production_start != ""
    ? "'$production_start'"
    : "NULL") . ",

delivery_time = " . ($delivery_time != ""
    ? "'$delivery_time'"
    : "NULL") . ",

status = '$status',

note = '$note'

WHERE id = '$id'
";

mysqli_query($conn, $sql);

header("Location: detail_order.php?id=$registration_id");
exit;