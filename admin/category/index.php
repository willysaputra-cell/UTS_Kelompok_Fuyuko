<?php
include "../security.php";
include "../../koneksi.php";

$sql = "SELECT
        categories.*,
        users.username
    FROM categories
    LEFT JOIN users
    ON categories.added_by = users.id
    ORDER BY categories.id ASC";
$query = mysqli_query($conn, $sql);
$total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Manajemen Kategori</title>
        <link rel="stylesheet" href="../../css/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="reveal">
            <h1>Manajemen Kategori</h1>
        </header>

        <div class="arah reveal">
            <a href="../dashboard.php">Kembali ke Dashboard |</a>
            <a href="tambah.php">Tambah Kategori</a>
        </div>
        <br>
        <div class="info-box reveal">
            Total Kategori : <?= $total ?>
        </div>

        <div class="table-container reveal">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Ditambahkan Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $no=1;
                        while($row=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= date('d M Y H:i', strtotime($row['created_at'])); ?></td>
                        <td><?= htmlspecialchars($row['username']) ?></td>
                        <td>
                        <a
                        class="btn-edit"
                        href="edit.php?id=<?= $row['id'] ?>">
                        Edit
                        </a>
                        <a
                        class="btn-hapus"
                        href="hapus.php?id=<?= $row['id'] ?>"
                        onclick="return confirm('Yakin ingin menghapus?')">
                        Hapus
                        </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <script src="../../js/admin.js"></script>
    </body>
</html>