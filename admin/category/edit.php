<?php
include "../security.php";
include "../../koneksi.php";

$id=(int)($_GET['id']??0);
$stmt=mysqli_prepare(
    $conn,
    "SELECT * FROM categories
    WHERE id=?"
);

mysqli_stmt_bind_param($stmt,"i",$id);
mysqli_stmt_execute($stmt);
$data=mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        <title>Edit Kategori</title>
    </head>
    <body>
        <header class="reveal">
            <h1>Edit Kategori</h1>
        </header>

        <div class="arah reveal">
            <a href="index.php">Kembali</a>
        </div>

        <section class="form-card reveal">
            <form method="POST" action="ubah.php">

            <input
            type="hidden"
            name="token"
            value="<?= $_SESSION['token'] ?>">

            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <label>Nama Kategori</label>
            <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>">

            <button type="submit" name="ubah">Simpan</button>
            </form>
        </section>
        <script src="../../js/admin.js"></script>
    </body>
</html>