<?php
include "../security.php";
include "../../koneksi.php";

$sql = "SELECT registrations.*, users.username AS followed_up_by_name
        FROM registrations
        LEFT JOIN users
        ON registrations.followed_up_by = users.id
        ORDER BY registrations.created_at DESC";
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
                        <th>Status Pesanan</th>
                        <th>Diatur oleh</th>
                        <th>Waktu Pendaftaran</th>
                        <th>Aksi</th>
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
                            <?php if ($result['is_followed_up'] == 1) : ?>
                                <span class="status done">
                                    Selesai
                                </span>
                            <?php else : ?>
                                <span class="status pending">
                                    Proses Pembuatan
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?= date('d M Y H:i', strtotime($result['created_at'])); ?>
                        </td>
                        <td><?= htmlspecialchars($result['followed_up_by_name'] ?? '-'); ?></td>
                        <td>
                            <?php if ($result['is_followed_up'] == 0) : ?>
                                <a  class="btn-follow"
                                    href="follow_up.php?id=<?= $result['id']; ?>"
                                    onclick = "return confirm('Apakah sudah diterima oleh pelanggan?')">
                                    Sudah Diterima!
                                </a>
                            <?php else : ?>
                                <a  class="btn-cancel"
                                    href="cancel_follow_up.php?id=<?= $result['id']; ?>"
                                    onclick = "return confirm('Apakah lagi dalam proses?')">
                                    Lagi Pembuatan!
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <script src="../../JS/admin.js"></script>
    </body>
</html>
        