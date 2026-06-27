<?php
include "../security.php";
include "../../koneksi.php";

$sql = "SELECT * FROM users ORDER BY id ASC";
$query = mysqli_query($conn, $sql);
$total = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manajemen Admin</title>
        <link rel="stylesheet" href="../../css/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="reveal">
            <h1>Manajemen Admin</h1>
        </header>
        <div class="arah reveal">
            <a href="../dashboard.php">
                Kembali ke Dashboard |
            </a>
            
            <a href="tambah.php">
                Tambah Admin
            </a>
        </div>
        <br><br>
        <div class="info-box reveal">
            Total Admin : <?= $total; ?>
        </div>

        <div class="table-container reveal">

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password (Hash)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        while($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td>
                            <?= $no; ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($row['username']); ?>
                        </td>
                        <td>
                            <?= htmlspecialchars(substr($row['password'], 0, 25)); ?>...
                        </td>
                        <td>
                            <a
                                class="btn-edit"
                                href="edit.php?id=<?= $row['id']; ?>">
                                Edit
                            </a>
                            <a
                                class="btn-hapus"
                                href="hapus.php?id=<?= $row['id']; ?>"
                                onclick="return confirm('Yakin ingin menghapus admin ini?')">
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