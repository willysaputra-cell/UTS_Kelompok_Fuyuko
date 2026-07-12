<?php
include "../security.php";
include "../../koneksi.php";

$sql = "
    SELECT
        orders.*,
        products.name AS product_name,
        products.price,
        categories.name AS category_name,
        users.username,
        registrations.full_name
    FROM orders
    JOIN products
        ON orders.product_id = products.id
    JOIN categories
        ON products.category_id = categories.id
    JOIN users
        ON orders.added_by = users.id
    LEFT JOIN registrations
        ON orders.registration_id = registrations.id
    ORDER BY orders.created_at DESC
";

$query = mysqli_query($conn, $sql);
$total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >

        <title>Manajemen Order</title>

        <link
            rel="stylesheet"
            href="../../css/admin.css"
        >

        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:wght@400;700&family=Quicksand:wght@300..700&display=swap"
            rel="stylesheet"
        >
    </head>

    <body>

        <header class="reveal">
            <h1>Manajemen Order</h1>
        </header>

        <div class="arah reveal">

            <a href="../dashboard.php">
                Kembali ke Dashboard |
            </a>

            <a href="tambah.php">
                Tambah Order 
            </a>

        </div>

        <br><br>

        <div class="info-box reveal">
            Total Order : <?= $total; ?>
        </div>

        <div class="table-container reveal">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pendaftar</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Waktu</th>
                        <th>Ditambahkan Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        $no = 1;

                        while ($row = mysqli_fetch_assoc($query)) {

                            $total_harga =
                                $row["price"] * $row["quantity"];
                    ?>

                    <tr>

                        <td>
                            <?= $no; ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row["full_name"] ?? "-"); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row["product_name"]); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row["category_name"]); ?>
                        </td>

                        <td>
                            Rp <?= number_format($row["price"], 0, ",", "."); ?>
                        </td>

                        <td>
                            <?= $row["quantity"]; ?>
                        </td>

                        <td>
                            Rp <?= number_format($total_harga, 0, ",", "."); ?>
                        </td>

                        <td>
                            <?= date('d M Y H:i', strtotime($row['created_at'])); ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row["username"]); ?>
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
                                href="hapus.php?id=<?= $row["id"]; ?>"
                                onclick="return confirm('Yakin ingin menghapus order ini?')"
                            >
                                Hapus
                            </a>

                        </td>

                    </tr>

                    <?php
                            $no++;
                        }
                    ?>

                </tbody>

            </table>

        </div>

        <script src="../../js/admin.js"></script>

    </body>
</html>