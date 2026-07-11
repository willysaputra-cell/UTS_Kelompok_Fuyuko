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

$sql = "
SELECT

    registration_orders.id,
    registration_orders.registration_id,
    registration_orders.order_id,

    products.name AS product_name,

    registration_orders.production_start,
    registration_orders.delivery_time,
    registration_orders.status,
    registration_orders.note

FROM registration_orders

JOIN orders
ON registration_orders.order_id = orders.id

JOIN products
ON orders.product_id = products.id

WHERE registration_orders.registration_id = '$registration_id'

ORDER BY registration_orders.created_at DESC
";

$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Detail Pengiriman</title>

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

        <h1>Detail Pengiriman</h1>

    </header>

    <div class="arah reveal">

        <a href="../index.php">
            Kembali |
        </a>

        <a href="tambah_order.php?id=<?= $registration_id; ?>">
            Tambah Pengiriman
        </a>

    </div>

    <div class="form-card reveal">

        <h2>
            <?= htmlspecialchars($registration["full_name"]); ?>
        </h2>

        <p>
            <b>Alamat :</b>
            <?= htmlspecialchars($registration["address"]); ?>
        </p>

        <p>
            <b>Nomor Telepon :</b>
            <?= htmlspecialchars($registration["phone_number"]); ?>
        </p>

        <p>
            <b>Email :</b>
            <?= htmlspecialchars($registration["email"]); ?>
        </p>

    </div>

    <div class="table-container reveal">

        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Produk</th>
                    <th>Mulai Produksi</th>
                    <th>Pengiriman</th>
                    <th>Status</th>
                    <th>Catatan</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                <?php
                $no = 1;

                while ($row = mysqli_fetch_assoc($query)) :
                ?>

                <tr>

                    <td>
                        <?= $no++; ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row["product_name"]); ?>
                    </td>

                    <td>

                        <?= $row["production_start"]
                            ? date(
                                "d M Y H:i",
                                strtotime($row["production_start"])
                            )
                            : "-"; ?>

                    </td>

                    <td>

                        <?= $row["delivery_time"]
                            ? date(
                                "d M Y H:i",
                                strtotime($row["delivery_time"])
                            )
                            : "-"; ?>

                    </td>

                    <td>

                        <?php if ($row["status"] == "Pending") : ?>

                            <span class="status pending">
                                Pending
                            </span>

                        <?php elseif ($row["status"] == "Produksi") : ?>

                            <span class="status process">
                                Produksi
                            </span>

                        <?php elseif ($row["status"] == "Siap Dikirim") : ?>

                            <span class="status ready">
                                Siap Dikirim
                            </span>

                        <?php else : ?>

                            <span class="status done">
                                Selesai
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>

                        <?= !empty($row["note"])
                            ? htmlspecialchars($row["note"])
                            : "-"; ?>

                    </td>

                    <td>

                        <a
                            class="btn-edit"
                            href="edit.php?id=<?= $row["id"]; ?>"
                        >
                            Edit
                        </a>

                        <a
                            class="btn-hapus"
                            href="hapus_order.php?id=<?= $row["id"]; ?>"
                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                        >
                            Hapus
                        </a>

                    </td>

                </tr>

                <?php endwhile; ?>

            </tbody>

        </table>

    </div>

    <script src="../../../JS/admin.js"></script>

</body>

</html>