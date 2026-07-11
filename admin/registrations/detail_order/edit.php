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
    registration_orders.*,
    registrations.id AS registration_id,
    registrations.full_name,
    products.name AS product_name

FROM registration_orders

JOIN registrations
ON registration_orders.registration_id = registrations.id

JOIN orders
ON registration_orders.order_id = orders.id

JOIN products
ON orders.product_id = products.id

WHERE registration_orders.id = '$id'
";

$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Pengiriman</title>

    <link
        rel="stylesheet"
        href="../../../CSS/admin.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:wght@400;700&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet"
    >

</head>

<body>

<header class="reveal">
    <h1>Edit Pengiriman</h1>
</header>

<div class="arah reveal">

    <a href="detail_order.php?id=<?= $data["registration_id"]; ?>">
        Kembali
    </a>

</div>

<div class="form-card reveal">

<form
    action="update_order.php"
    method="POST"
>

    <input
        type="hidden"
        name="id"
        value="<?= $data["id"]; ?>"
    >

    <input
        type="hidden"
        name="registration_id"
        value="<?= $data["registration_id"]; ?>"
    >

    <label>Produk</label>

    <input
        type="text"
        value="<?= htmlspecialchars($data["product_name"]); ?>"
        readonly
    >

    <label>Mulai Produksi</label>

    <input
        type="datetime-local"
        name="production_start"
        value="<?= $data["production_start"] ? date("Y-m-d\TH:i", strtotime($data["production_start"])) : ""; ?>"
    >

    <label>Estimasi Pengiriman</label>

    <input
        type="datetime-local"
        name="delivery_time"
        value="<?= $data["delivery_time"] ? date("Y-m-d\TH:i", strtotime($data["delivery_time"])) : ""; ?>"
    >

    <label>Status</label>

    <select name="status">

        <option
            value="Pending"
            <?= $data["status"] == "Pending" ? "selected" : ""; ?>
        >
            Pending
        </option>

        <option
            value="Produksi"
            <?= $data["status"] == "Produksi" ? "selected" : ""; ?>
        >
            Produksi
        </option>

        <option
            value="Siap Dikirim"
            <?= $data["status"] == "Siap Dikirim" ? "selected" : ""; ?>
        >
            Siap Dikirim
        </option>

        <option
            value="Selesai"
            <?= $data["status"] == "Selesai" ? "selected" : ""; ?>
        >
            Selesai
        </option>

    </select>

    <label>Catatan</label>

    <textarea
        name="note"
        rows="4"
    ><?= htmlspecialchars($data["note"]); ?></textarea>

    <br><br>

    <button
        type="submit"
        class="btn-edit"
    >
        Simpan Perubahan
    </button>

</form>

</div>

<script src="../../../JS/admin.js"></script>

</body>

</html>