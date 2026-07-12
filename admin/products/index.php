<?php
include "../security.php";
include "../../koneksi.php";

$sql = "SELECT
            products.*,
            categories.name AS category_name,
            users.username
        FROM products
        LEFT JOIN categories
            ON products.category_id = categories.id
        LEFT JOIN users
            ON products.added_by = users.id
        ORDER BY products.id ASC";
$query = mysqli_query($conn, $sql);
$total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Products</title>
        <link rel="stylesheet" href="../../css/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header class="reveal">
            <h1>Manajemen Produk</h1>
        </header>
        <div class="arah reveal">
            <a href="../dashboard.php">Kembali ke Dashboard |</a>
            <a href="tambah.php"> Tambah Produk</a>
        </div>

        <br><br>
        <div class="info-box reveal">
            Total Produk: <?= $total; ?>
        </div>
        <div class="table-container reveal">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Kategori</th>
                        <th>Waktu</th>
                        <th>Ditambahkan Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while($result = mysqli_fetch_array($query)) {
                        $name = $result['name'];
                        $price = $result['price'];
                        $image = $result['image'];
                        $category_name = $result['category_name'];
                        $date = $result['created_at'];
                        $username = $result['username'];
                        $id = $result['id'];
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= htmlspecialchars($name) ?></td>
                        <td><?= $price ?></td>
                        <td>
                            <img src="../../FOTO/<?= htmlspecialchars($image); ?>" class="produk-img">
                        </td>
                        <td><?= htmlspecialchars($category_name) ?></td>
                        <td><?= date('d M Y H:i', strtotime($result['created_at'])); ?></td>
                        <td><?= $username ?></td>
                        <td>
                            <a class="btn-edit"
                                href="edit.php?id=<?= $id; ?>">
                                Edit
                            </a>

                            <a class="btn-hapus"
                                href="hapus.php?id=<?= $id; ?>"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
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