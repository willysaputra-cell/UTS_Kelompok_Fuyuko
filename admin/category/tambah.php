<?php
include "../security.php";
include "../../koneksi.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
        <title>Tambah Kategori</title>
    </head>

    <body>
        <header class="reveal">
            <h1>Tambah Kategori</h1>
        </header>

        <div class="arah reveal">
            <a href="index.php">Kembali</a>
        </div>

        <section class="form-card reveal">
            <form method="POST" action="simpan.php">
            <input
            type="hidden"
            name="token"
            value="<?= $_SESSION['token'] ?>">

            <label>Nama Kategori</label>
            <input type="text" name="name" required>

            <button type="submit" name="simpan">Simpan</button>

            </form>

        </section>
        <script src="../../js/admin.js"></script>
    </body>
</html>