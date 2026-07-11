<?php
include "../../security.php";
include "../../../koneksi.php";

$registration_id = $_GET["id"] ?? "";

if ($registration_id == "") {
    header("Location: ../index.php");
    exit;
}

$sql_registration = "
    SELECT *
    FROM registrations
    WHERE id = '$registration_id'
";

$query_registration = mysqli_query($conn, $sql_registration);
$registration = mysqli_fetch_assoc($query_registration);

if (!$registration) {
    header("Location: ../index.php");
    exit;
}

$sql_order = "
    SELECT
        orders.id,
        products.name AS product_name

    FROM orders

    JOIN products
        ON orders.product_id = products.id

    WHERE orders.registration_id = '$registration_id'

    ORDER BY products.name ASC
";

$query_order = mysqli_query($conn, $sql_order);
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Pengiriman</title>

    <link
        rel="stylesheet"
        href="../../../css/admin.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:wght@400;700&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet"
    >

</head>

<body>

    <header class="reveal">
        <h1>Tambah Pengiriman</h1>
    </header>

    <div class="arah reveal">

        <a href="detail_order.php?id=<?= $registration_id; ?>">
            Kembali
        </a>

    </div>

    <div class="form-card reveal">

        <h2>

            <?= htmlspecialchars($registration["full_name"]); ?>

        </h2>

        <form
            action="simpan_order.php"
            method="POST"
        >

            <input
                type="hidden"
                name="registration_id"
                value="<?= $registration_id; ?>"
            >

            <label>

                Produk

            </label>

            <select
                name="order_id"
                required
            >

                <option value="">
                    -- Pilih Produk --
                </option>

                <?php while ($row = mysqli_fetch_assoc($query_order)) : ?>

                    <option value="<?= $row["id"]; ?>">

                        <?= htmlspecialchars($row["product_name"]); ?>

                    </option>

                <?php endwhile; ?>

            </select>

            <br><br>

            <label>

                Mulai Produksi

            </label>

            <input
                type="datetime-local"
                name="production_start"
            >

            <br><br>

            <label>

                Estimasi Pengiriman

            </label>

            <input
                type="datetime-local"
                name="delivery_time"
            >

            <br><br>

            <label>

                Status

            </label>

            <select name="status">

                <option value="Pending">
                    Pending
                </option>

                <option value="Produksi">
                    Produksi
                </option>

                <option value="Siap Dikirim">
                    Siap Dikirim
                </option>

                <option value="Selesai">
                    Selesai
                </option>

            </select>

            <br><br>

            <label>

                Catatan

            </label>

            <textarea
                name="note"
                rows="5"
                placeholder="Masukkan catatan (opsional)"
            ></textarea>

            <br><br>

            <button
                type="submit"
            >
                Simpan
            </button>

        </form>

    </div>

    <script src="../../../js/admin.js"></script>

</body>

</html>