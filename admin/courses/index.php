<?php
include "../security.php";
include "../../koneksi.php";

$sql = "select * from courses";
$query = mysqli_query($conn, $sql);
?>
<a href="../dashboard.php">Kembali ke Dashboard</a> |
<a href="tambah.php">Tambah Courses</a>

<br><br>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while($result = mysqli_fetch_array($query)) {
            $photo = $result['photo'];
            $name = $result['name'];
            $price = $result['price'];
            $id = $result['id'];
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $photo ?></td>
            <td><?= $name ?></td>
            <td><?= $price ?></td>
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