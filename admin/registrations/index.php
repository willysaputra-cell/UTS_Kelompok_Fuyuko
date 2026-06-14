<?php
include "../security.php";
include "../../koneksi.php";

$sql = "select *
        from registrations 
        order by created_at desc";
$query = mysqli_query($conn, $sql);
?>

<a href="../dashboard.php">Kembali ke Dashboard</a> |
<br><br>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
        <th>Email</th>
        <th>Status Follow Up</th>
        <th>Waktu Pendaftaran</th>
        <th></th>
    <tr>

<?php
$no = 1;
while ($result = mysqli_fetch_assoc($query)) :
?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $result['full_name']; ?></td>
        <td><?= $result['address']; ?></td>
        <td><?= $result['phone_number'] ?></td>
        <td><?= $result['email'] ?></td>
        <td>
            <?php if ($result['is_followed_up'] == 1) : ?>
                Followed Up oleh <?= $result['followed_up_by']; ?> <?= $result['followed_up_at']; ?>
            <?php else : ?>
                Pending
            <?php endif; ?>
        </td>
        <td>
            <?= $result['created_at']; ?>
        </td>
        <td>
            <?php if ($result['is_followed_up'] == 0) : ?>
                <a href="follow_up.php?id=<?= $result['id']; ?>"
                    onclick = "return confirm('Mark this registration as followed up?')">
                    Sudah Follow Up
                </a>
            <?php else : ?>
                <a href="cancel_follow_up.php?id=<?= $result['id']; ?>"
                    onclick = "return confirm('Cancel follow up status?')">
                    Cancel Follow Up
                </a>
            <?php endif; ?>
        </td>
    </tr>
<?php endwhile; ?>
</table>
        