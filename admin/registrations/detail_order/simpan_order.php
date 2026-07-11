<?php
include "../../security.php";
include "../../../koneksi.php";

$registration_id = $_POST["registration_id"];
$order_id        = $_POST["order_id"];

$production_start = $_POST["production_start"];
$delivery_time    = $_POST["delivery_time"];

$status = $_POST["status"];
$note   = trim($_POST["note"]);

$sql = "
    INSERT INTO registration_orders
    (
        registration_id,
        order_id,
        production_start,
        delivery_time,
        status,
        note
    )
    VALUES
    (
        '$registration_id',
        '$order_id',
        '$production_start',
        '$delivery_time',
        '$status',
        '$note'
    )
";

mysqli_query($conn, $sql);

header("Location: detail_order.php?id=$registration_id");
exit;