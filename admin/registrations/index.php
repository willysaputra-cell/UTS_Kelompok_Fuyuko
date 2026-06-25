<?php
include "../security.php";
include "../../koneksi.php";

$sql = "select *
        from registrations 
        order by created_at desc";
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
                        <th>Status Follow Up</th>
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
                                    Followed Up
                                </span>
                            <?php else : ?>
                                <span class="status pending">
                                    Pending
                                </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?= date('d M Y H:i', strtotime($result['created_at'])); ?>
                        </td>
                        <td>
                            <?php if ($result['is_followed_up'] == 0) : ?>
                                <a  class="btn-follow"
                                    href="follow_up.php?id=<?= $result['id']; ?>"
                                    onclick = "return confirm('Mark this registration as followed up?')">
                                    Sudah Follow Up!
                                </a>
                            <?php else : ?>
                                <a  class="btn-cancel"
                                    href="cancel_follow_up.php?id=<?= $result['id']; ?>"
                                    onclick = "return confirm('Cancel follow up status?')">
                                    Cancel Follow Up
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
        