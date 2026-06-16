<?php
include "../security.php";
include "../../koneksi.php";

$sql = "select * from products";
$query = mysqli_query($conn, $sql);
$total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Products</title>
        <link rel="stylesheet" href="../../CSS/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header class="reveal">
            <h1>Manajemen Produk</h1>
        </header>
        <div class="arah reveal">
            <a href="../dashboard.php">Kembali ke Dashboard |</a>
            <a href="tambah.php"> Tambah Courses</a>
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
                        <td>
                            <img src="../../FOTO/<?= $image; ?>" class="produk-img">
                        </td>
                        <td>
                            <?php
                            switch($category_id){
                                case 1:
                                    echo "Kue Kering";
                                    break;
                                case 2:
                                    echo "Snack";
                                    break;
                                case 3:
                                    echo "Kue Basah & Puding";
                                    break;
                                default:
                                    echo "-";
                            }
                            ?>
                        </td>
                        <td><?= $date ?></td>
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
        <script src="../../JS/admin.js"></script>
    </body>
</html>