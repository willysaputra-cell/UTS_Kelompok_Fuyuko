<?php
include "../security.php";
include "../../koneksi.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Produk</title>
    </head>
    <body>
        <h1>Tambah Produk</h1>
        <a href="index.php">Kembali</a>
        <br><br>
        <?php if (isset($error)) : ?>
            <p style="color:red;"><?= $error; ?></p>
        <?php endif; ?>

        <form method="POST" action="simpan.php" enctype="multipart/form-data">
            <label>Nama Produk</label><br>
            <input type="text" name="name">
            <br><br>

            <label>Harga</label><br>
            <input type="number" name="price">
            <br><br>

            <label>FOTO</label><br>
            <input type="file" name="image" accept="image/*">
            <br><br>

            <label>Pilih Kategori</label><br>
            <?php
            $sql_category = "select * from categories";
            $query_category = mysqli_query($conn, $sql_category);
            ?>
            <select name="category_id">
                <?php while($category = mysqli_fetch_assoc($query_category)): ?>
                    <option value="<?= $category['id']; ?>">
                        <?= htmlspecialchars($category['name']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <br><br>

            <button type="submit" name="simpan">Simpan</button>
        </form>
    </body>
</html>