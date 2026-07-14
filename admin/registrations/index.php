<?php
include "../security.php";
include "../../koneksi.php";

$sql = "SELECT *
        FROM registrations
        ORDER BY created_at DESC";
$query = mysqli_query($conn, $sql);
$total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Registrations</title>
        <link rel="stylesheet" href="../../CSS/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header class="reveal">
            <h1>Manajemen Pendaftaran</h1>
        </header>
        <div class="arah reveal">
            <a href="../dashboard.php">Kembali ke Dashboard</a>
        </div>

        <div class="info-box reveal">
            Total Pendaftar: <?= $total; ?>
        </div>

        <div class="table-container reveal">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Email</th>
                        <th>Waktu Pendaftaran</th>
                        <th>Aksi</th>
                        <th>Produk</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $no = 1;
                    while ($result = mysqli_fetch_assoc($query)) :
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($result['full_name']); ?></td>
                        <td><?= htmlspecialchars($result['address']); ?></td>
                        <td><?= htmlspecialchars($result['phone_number']); ?></td>
                        <td><?= htmlspecialchars($result['email']); ?></td>
                        

                        <td>
                            <?= date('d M Y H:i', strtotime($result['created_at'])); ?>
                        </td>
                        <td>
                            <a
                                class="btn-edit"
                                href="edit.php?id=<?= $result['id']; ?>"
                            >
                                Edit
                            </a>

                            <a
                                class="btn-hapus"
                                href="hapus.php?id=<?= $result['id']; ?>"
                                onclick="return confirm('Yakin ingin menghapus pendaftaran ini?')"
                            >
                                Hapus
                            </a>
                        </td>
                        <td>
                            <a class="btn-edit"
                                href="detail_order/detail_order.php?id=<?= $result['id']; ?>">
                                Detail Pengiriman
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <script src="../../JS/admin.js"></script>
    </body>
</html>
        