<?php
include "../security.php";
include "../../koneksi.php";

$sql = "select * from products";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard</title>
        <link rel="stylesheet" href="../../CSS/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>Manajemen Produk</h1>
        </header>
        <div class="arah">
            <a href="../dashboard.php">Kembali ke Dashboard |</a>
            <a href="tambah.php"> Tambah Courses</a>
        </div>

        <br><br>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Id_Kategori</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while($result = mysqli_fetch_array($query)) {
                        $name = $result['name'];
                        $price = $result['price'];
                        $image = $result['image'];
                        $category_id = $result['category_id'];
                        $date = $result['date'];
                        $id = $result['id'];
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $name ?></td>
                        <td><?= $price ?></td>
                        <td><?= $image ?></td>
                        <td><?= $category_id ?></td>
                        <td><?= $date ?></td>
                        <td>
                            <a href="edit.php?id=<?= $id; ?>">Edit</a> |
                            <a href="hapus.php?id=<?= $id; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>  
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>