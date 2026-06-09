<?php
include "../security.php";
include "../../koneksi.php";

$sql = "select * from products";
$query = mysqli_query($conn, $sql);
?>
<a href="../dashboard.php">Kembali ke Dashboard</a> |
<a href="tambah.php">Tambah Courses</a>

<br><br>
<table border="1">
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